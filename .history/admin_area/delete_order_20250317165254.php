<?php
// Kết nối đến database

if (isset($_GET['delete_order'])) {
    $delete_order = intval($_GET['delete_order']); // Chuyển về số nguyên để tránh lỗi SQL Injection

    // Kiểm tra nếu ID hợp lệ
    if ($delete_order > 0) {
        $delete_query = "DELETE FROM `user_orders` WHERE order_id = $delete_order";
        $result = mysqli_query($con, $delete_query);

        if ($result) {
            echo "<script>alert('Đơn hàng đã được xóa thành công!');</script>";
            echo "<script>window.location.href='index.php?list_orders';</script>"; // Chuyển hướng về danh sách đơn hàng
        } else {
            echo "<script>alert('Lỗi khi xóa đơn hàng!');</script>";
        }
    } else {
        echo "<script>alert('ID đơn hàng không hợp lệ!');</script>";
    }
}
?>
