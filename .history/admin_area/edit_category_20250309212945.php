<?php
if (isset($_GET['edit_category'])) {
    $edit_category = $_GET['edit_category'];
    // echo $edit_category;

    $get_categories = "SELECT * FROM categories WHERE category_id = $edit_category";
    $result = mysqli_query($con, $get_categories);
    $row = mysqli_fetch_assoc($result);
    $category_title = $row['category_title'];
    // echo $category_title;
}

if (isset($_POST['edit_cat'])) {
    $cat_title = $_POST['category_title'];

    $update_query = "UPDATE categories SET category_title = '$cat_title' WHERE category_id = $edit_category";
    $result_cat = mysqli_query($con, $update_query);
    if ($result_cat) {
        echo "<script>alert('Category is been updated successfully')</script>";
        echo "<script>window.open('./view_categories.php', '_self')</script>";
    }
}
?>

<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" name="category_title" id="category_title" class="form-control" required="required" value="<?php echo $category_title ?>">
        </div>
        <input type="submit" value="Update Category" class="btn btn-info px-3 mb-3" name="edit_cat">
    </form>
</div>