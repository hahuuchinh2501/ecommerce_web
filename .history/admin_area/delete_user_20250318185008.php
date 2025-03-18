<?php
include('../includes/connect.php');// Kết nối đến database

if (isset($_GET['delete_user'])) {
    $delete_user = intval($_GET['delete_user']); 

    
    if ($delete_order > 0) {
        $delete_query = "DELETE FROM `user_table` WHERE user_id = $delete_user";
        $result = mysqli_query($con, $delete_query);

        if ($result) {
            echo "<script>alert('user deleted successfully!');</script>";
            echo "<script>window.location.href='index.php?list_users';</script>"; 
        } else {
            echo "<script>alert('Error delete user!');</script>";
        }
    } else {
        echo "<script>alert('ID user not found');</script>";
    }
}
?>
