<?php
include('../includes/connect.php');// Kết nối đến database

if (isset($_GET['delete_order'])) {
    $delete_order = intval($_GET['delete_order']); 

    
    if ($delete_order > 0) {
        $delete_query = "DELETE FROM `user_orders` WHERE order_id = $delete_order";
        $result = mysqli_query($con, $delete_query);

        if ($result) {
            echo "<script>alert('orders deleted successfully!');</script>";
            echo "<script>window.location.href='index.php?list_orders';</script>"; 
        } else {
            echo "<script>alert('Error delete orders!');</script>";
        }
    } else {
        echo "<script>alert('ID order not found');</script>";
    }
}
?>
