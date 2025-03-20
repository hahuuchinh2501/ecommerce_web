<?php
include('../includes/connect.php');
include('../functions/common_function.php');

// Replace this:
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
} else {
    // Make sure we have a fallback or error handling if user_id isn't provided
    echo "<script>alert('User ID not provided');</script>";
    echo "<script>window.open('index.php', '_self');</script>";
    exit();
}

// With this:
// Get user_id from the session instead of GET parameter
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $get_user = "SELECT * FROM `user_table` WHERE username='$username'";
    $result = mysqli_query($con, $get_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];
} else {
    echo "<script>alert('Please login first');</script>";
    echo "<script>window.open('../users_area/user_login.php', '_self');</script>";
    exit();
}

$get_ip_address = getIPAddress();
$total_price = 0;

// Lấy danh sách sản phẩm trong giỏ hàng
$cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query_price);
$count_products = mysqli_num_rows($result_cart_price); // Đếm số lượng sản phẩm
$invoice_number = mt_rand();
$status = 'pending';

if($count_products == 0) {
    echo "<script>alert('Your cart is empty');</script>";
    echo "<script>window.open('index.php', '_self');</script>";
    exit();
}

while ($row_price = mysqli_fetch_array($result_cart_price)) {
    $product_id = $row_price['product_id'];
    $quantity = $row_price['quantity']; // Get quantity from cart
    
    $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
    $run_price = mysqli_query($con, $select_products);

    while ($row_product_price = mysqli_fetch_array($run_price)) {
        $product_price = $row_product_price['product_price'];
        $product_total = $product_price * $quantity;
        $total_price += $product_total;
    }
}

// Chèn dữ liệu vào bảng user_orders
$insert_orders = "INSERT INTO `user_orders` (user_id, amount_due, invoice_number, total_products, order_date, order_status) 
VALUES ('$user_id', '$total_price', '$invoice_number', '$count_products', NOW(), '$status')";

$result_query = mysqli_query($con, $insert_orders);

// Insert each product from cart into orders_pending table
$cart_items = mysqli_query($con, "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'");
while ($item = mysqli_fetch_array($cart_items)) {
    $product_id = $item['product_id'];
    $quantity = $item['quantity'];
    
    $insert_pending_orders = "INSERT INTO `orders_pending` (user_id, invoice_number, product_id, quantity, order_status) 
    VALUES ('$user_id', '$invoice_number', '$product_id', '$quantity', '$status')";
    $result_pending_orders = mysqli_query($con, $insert_pending_orders);
}

// Clear the cart only after successfully creating all orders
if ($result_query) {
    $empty_cart = "DELETE FROM `cart_details` WHERE ip_address='$get_ip_address'";
    $result_delete = mysqli_query($con, $empty_cart);
    
    echo "<script>alert('Orders are submitted successfully');</script>";
    echo "<script>window.open('profile.php?user_id=$user_id', '_self');</script>";
} else {
    echo "<script>alert('There was an error processing your order');</script>";
}
?>