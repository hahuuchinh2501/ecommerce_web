<?php
if (isset($_GET['edit_brands'])) {
    $edit_brand = $_GET['edit_brands'];
    // echo $edit_category;

    $get_brands = "SELECT * FROM brands WHERE brand_id = $edit_brand";
    $result = mysqli_query($con, $get_brands);
    $row = mysqli_fetch_assoc($result);
    $brand_title = $row['brand_title'];
    
}

if (isset($_POST['edit_brand'])) {
    $cat_title = $_POST['brand_title'];

    $update_query = "UPDATE brands SET brand_title = '$cat_title' WHERE brand_id = $edit_brand";
    $result_cat = mysqli_query($con, $update_query);
    if ($result_cat) {
        echo "<script>alert('brand is been updated successfully')</script>";
        echo "<script>window.open('./index.php?view_categories', '_self')</script>";
    }
}
?>

<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">brand title</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control" required="required" value="<?php echo $brand_title ?>">
        </div>
        <input type="submit" value="Update Brand" class="btn btn-info px-3 mb-3" name="edit_brand">
    </form>
</div>