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
?>