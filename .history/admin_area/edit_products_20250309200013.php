<?php


if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];

    // Lấy dữ liệu sản phẩm hiện tại
    $get_data = "SELECT * FROM `products` WHERE product_id = $edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);

    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];

    // Lấy tên danh mục
    $select_category = "SELECT * FROM `categories` WHERE category_id = $category_id";
    $result_category = mysqli_query($con, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title = $row_category['category_title'];

    // Lấy tên thương hiệu
    $select_brand = "SELECT * FROM `brands` WHERE brand_id = $brand_id";
    $result_brand = mysqli_query($con, $select_brand);
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_title = $row_brand['brand_title'];
}
?>

<div class="container mt-5">
    <h1 class="text-center">Chỉnh sửa sản phẩm</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Tên sản phẩm</label>
            <input type="text" id="product_title" value="<?php echo $product_title ?>" name="product_title" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Mô tả sản phẩm</label>
            <input type="text" id="product_desc" value="<?php echo $product_description ?>" name="product_desc" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Từ khóa sản phẩm</label>
            <input type="text" id="product_keywords" value="<?php echo $product_keywords ?>" name="product_keywords" class="form-control" required>
        </div>

        <!-- Danh mục sản phẩm -->
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Danh mục</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_id ?>"><?php echo $category_title ?></option>
                <?php
                $select_category_all = "SELECT * FROM `categories`";
                $result_category_all = mysqli_query($con, $select_category_all);
                while($row_category_all = mysqli_fetch_assoc($result_category_all)){
                    echo "<option value='{$row_category_all['category_id']}'>{$row_category_all['category_title']}</option>";
                }
                ?>
            </select>
        </div>

        <!-- Thương hiệu -->
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brands" class="form-label">Thương hiệu</label>
            <select name="product_brands" class="form-select">
                <option value="<?php echo $brand_id ?>"><?php echo $brand_title ?></option>
                <?php
                $select_brand_all = "SELECT * FROM `brands`";
                $result_brand_all = mysqli_query($con, $select_brand_all);
                while($row_brand_all = mysqli_fetch_assoc($result_brand_all)){
                    echo "<option value='{$row_brand_all['brand_id']}'>{$row_brand_all['brand_title']}</option>";
                }
                ?>
            </select>
        </div>

        <!-- Hình ảnh sản phẩm -->
        <?php
        function display_image_input($name, $label, $image){
            echo "
            <div class='form-outline w-50 m-auto mb-4'>
                <label for='$name' class='form-label'>$label</label>
                <div class='d-flex'>
                    <input type='file' id='$name' name='$name' class='form-control w-90 m-auto'>
                    <img src='./product_images/$image' alt='' class='product_img' width='80'>
                </div>
            </div>";
        }

        display_image_input("product_image1", "Ảnh 1", $product_image1);
        display_image_input("product_image2", "Ảnh 2", $product_image2);
        display_image_input("product_image3", "Ảnh 3", $product_image3);
        ?>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Giá sản phẩm</label>
            <input type="text" id="product_price" name="product_price" class="form-control" required value="<?php echo $product_price ?>">
        </div>

        <div class="w-50 m-auto">
            <input type="submit" name="edit_product" value="Cập nhật sản phẩm" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>

<?php
if(isset($_POST['edit_product'])){
    $product_title = $_POST['product_title'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];

    // Xử lý upload ảnh (chỉ upload nếu có file mới)
    function upload_image($image_name, $old_image){
        if(!empty($_FILES[$image_name]['name'])){
            $new_image = $_FILES[$image_name]['name'];
            $temp_image = $_FILES[$image_name]['tmp_name'];
            move_uploaded_file($temp_image, "./product_images/$new_image");
            return $new_image;
        }
        return $old_image;
    }

    $product_image1 = upload_image('product_image1', $product_image1);
    $product_image2 = upload_image('product_image2', $product_image2);
    $product_image3 = upload_image('product_image3', $product_image3);

    // Cập nhật sản phẩm
    $update_product = "UPDATE `products` SET 
        product_title='$product_title', product_description='$product_desc',
        product_keywords='$product_keywords', category_id='$product_category',
        brand_id='$product_brands', product_image1='$product_image1',
        product_image2='$product_image2', product_image3='$product_image3',
        product_price='$product_price', date=NOW() 
        WHERE product_id=$edit_id";

    $result_update = mysqli_query($con, $update_product);
    if($result_update){
        echo "<script>alert('Sản phẩm đã được cập nhật thành công!')</script>";
        echo "<script>window.open('./insert_product.php','_self')</script>";
    }
}
?>
