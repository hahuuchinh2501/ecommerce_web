<?php
include('../includes/connect.php');
include('../functions/common_function.php');

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
}

$get_ip_address = getIPAddress();
$total_price = 0;

// Lấy danh sách sản phẩm trong giỏ hàng
$cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query_price);
$count_products = mysqli_num_rows($result_cart_price); // Đếm số lượng sản phẩm
$invoice_number = mt_rand();
$status = 'pending';

while ($row_price = mysqli_fetch_array($result_cart_price)) {
    $product_id = $row_price['product_id'];
    $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
    $run_price = mysqli_query($con, $select_products);

    while ($row_product_price = mysqli_fetch_array($run_price)) {
        $product_price = $row_product_price['product_price'];
        $total_price += $product_price;
    }
}

// Lấy số lượng sản phẩm từ giỏ hàng
$get_cart = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
$run_cart = mysqli_query($con, $get_cart);
$get_item_quantity = mysqli_fetch_array($run_cart);
$quantity = isset($get_item_quantity['quantity']) ? $get_item_quantity['quantity'] : 1;
$subtotal = $total_price * $quantity;

// Chèn dữ liệu vào bảng user_orders
$insert_orders = "INSERT INTO `user_orders` (user_id, amount_due, invoice_number, total_products, order_date, order_status) 
VALUES ('$user_id', '$subtotal', '$invoice_number', '$count_products', NOW(), '$status')";

$result_query = mysqli_query($con, $insert_orders);
if ($result_query) {
    echo "<script>alert('Orders are submitted successfully');</script>";
    echo "<script>window.open('profile.php', '_self');</script>";
}
?>
