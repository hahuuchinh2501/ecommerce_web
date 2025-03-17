<?php
include('config.php'); // Kết nối đến database

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Câu lệnh xóa đơn hàng
    $delete_query = "DELETE FROM `user_orders` WHERE order_id = $order_id";
    $result = mysqli_query($con, $delete_query);

    if ($result) {
        echo "<script>alert('Đơn hàng đã được xóa thành công!');</script>";
          echo "<script>window.open('./index.php?list_orders', '_self')</script>";
    } else {
        echo "<script>alert('Lỗi khi xóa đơn hàng!');</script>";
    }
}
?>
