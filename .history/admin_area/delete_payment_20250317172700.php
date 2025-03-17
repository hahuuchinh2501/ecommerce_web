<?php
include('../includes/connect.php');// Kết nối đến database

if (isset($_GET['delete_payment'])) {
    $delete_payment = intval($_GET['delete_payment']); 

    
    if ($delete_payment > 0) {
        $delete_query = "DELETE FROM `user_payments` WHERE payment_id = $delete_payment";
        $result = mysqli_query($con, $delete_query);

        if ($result) {
            echo "<script>alert('payment deleted successfully!');</script>";
            echo "<script>window.location.href='index.php?list_payments';</script>"; 
        } else {
            echo "<script>alert('Error delete payment!');</script>";
        }
    } else {
        echo "<script>alert('ID payment not found');</script>";
    }
}
?>