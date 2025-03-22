<?php
// Check if delete_order_pending parameter is set in URL
if(isset($_GET['delete_order_pending'])) {
    $delete_id = $_GET['delete_order_pending'];
    
    // Delete query
    $delete_order = "DELETE FROM `orders_pending` WHERE order_id='$delete_id'";
    $run_delete = mysqli_query($con, $delete_order);
    
    if($run_delete) {
        echo "<script>alert('Order has been deleted successfully!')</script>";
        echo "<script>window.open('index.php?orders_pending','_self')</script>";
    } else {
        echo "<script>alert('Failed to delete order!')</script>";
    }
}
?>