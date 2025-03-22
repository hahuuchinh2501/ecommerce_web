<?php
if(isset($_GET['delete_order_pending'])) {
    $delete_id = $_GET['delete_order_pending'];
    
   
    if(!$con) {
        echo "<script>alert('Database connection failed: " . mysqli_connect_error() . "')</script>";
    } else {
        
        echo "<script>console.log('Attempting to delete order ID: $delete_id')</script>";
        
        // Delete query with proper escaping to prevent SQL injection
        $delete_id = mysqli_real_escape_string($con, $delete_id);
        $delete_order = "DELETE FROM `orders_pending` WHERE order_id='$delete_id'";
        $run_delete = mysqli_query($con, $delete_order);
        
        if($run_delete) {
            echo "<script>alert('Order has been deleted successfully!')</script>";
            echo "<script>window.open('index.php?orders_pending','_self')</script>";
        } else {
            echo "<script>alert('Failed to delete order! Error: " . mysqli_error($con) . "')</script>";
        }
    }
}
?>

