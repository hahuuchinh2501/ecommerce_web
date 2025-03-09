
<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    // echo $edit_id;
    $get_data="Select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    // echo $product_title;
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];


// fetching category name
$select_category="Select * from `categories` where category_id=$category_id";
$result_category=mysqli_query($con,$select_category);
$row_category=mysqli_fetch_assoc($result_category);
$category_title=$row_category['category_title'];
//    echo $category_title;

// fetching brand name
$select_brand="Select * from `brands` where brand_id=$brand_id";
$result_brand=mysqli_query($con,$select_brand);
$row_brand=mysqli_fetch_assoc($result_brand);
$brand_title=$row_brand['brand_title'];
//    echo $brand_title;
}
?>

<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" value=<?php echo $product_title ?> name="product_title" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" id="product_desc" value=<?php echo $product_description ?> name="product_desc" class="form-control" required="required">
        </div>

<!-- Image 2 -->
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" value=<?php echo $product_keywords ?> name="product_keywords" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
   <label for="product_category" class="form-label">Product Categories</label>
   <select name="product_category" class="form-select">
       <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
       <?php
       $select_category="Select * from `categories` where category_id=$category_id";
$result_category=mysqli_query($con,$select_category);
$row_category=mysqli_fetch_assoc($result_category);
$category_title=$row_category['category_title'];
       ?>
       <option value="">2</option>
       <option value="">3</option>
       <option value="">4</option>
       <option value="">5</option>
   </select>
</div>
<div class="form-outline w-50 m-auto mb-4">
    <label for="product_brands" class="form-label">Product brands</label>
   <select name="product_brands" class="form-select">
       <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
       <option value="">2</option>
       <option value="">3</option>
       <option value="">4</option>
       <option value="">5</option>
   </select>
</div>
<!-- Image 1 -->
<div class="form-outline w-50 m-auto mb-4">
   <label for="product_image1" class="form-label">Product Image1</label>
   <div class="d-flex">
       <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
       <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="poduct_img">
   </div>
</div>

<!-- Image 2 -->
<div class="form-outline w-50 m-auto mb-4">
   <label for="product_image2" class="form-label">Product Image2</label>
   <div class="d-flex">
       <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required="required">
       <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="poduct_img">
   </div>
</div>

<!-- Image 3 -->
<div class="form-outline w-50 m-auto mb-4">
   <label for="product_images3" class="form-label">Product Image3</label>
   <div class="d-flex">
       <input type="file" id="product_images3" name="product_images3" class="form-control w-90 m-auto" required="required">
       <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="poduct_img">
   </div>
</div>
<div class="form-outline w-50 m-auto mb-4">
   <label for="product_price" class="form-label">Product Price</label>
   <input type="text" id="product_price"  name="product_price" class="form-control" required="required" value=<?php echo $product_price ?>>
</div>
<div class="w-50 m-auto">
    <input type="submit" name="edit_product" name="edit_product" value="Update product" class="btn btn-info px-3 mb-3">
</div>
    </form>
</div>