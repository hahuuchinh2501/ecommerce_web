<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start(); // Make sure session is started

// Check if user is logged in
if(!isset($_SESSION['username'])) {
    echo "<script>alert('Please login to place an order');</script>";
    echo "<script>window.open('../users_area/user_login.php', '_self');</script>";
    exit();
}

// Get user_id from session
$username = $_SESSION['username'];
$get_user = "SELECT * FROM user_table WHERE username='$username'";
$result_user = mysqli_query($con, $get_user);
$row_user = mysqli_fetch_assoc($result_user);
$user_id = $row_user['user_id'];

$get_ip_address = getIPAddress();
$total_price = 0;

// Get cart items specifically for this user
$cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address' AND user_id=$user_id";
$result_cart_price = mysqli_query($con, $cart_query_price);
$count_products = mysqli_num_rows($result_cart_price);
$invoice_number = mt_rand();
$status = 'pending';

if($count_products == 0) {
    echo "<script>alert('Your cart is empty');</script>";
    echo "<script>window.open('../index.php', '_self');</script>";
    exit();
}

while($row_price = mysqli_fetch_array($result_cart_price)) {
    $product_id = $row_price['product_id'];
    $quantity = $row_price['quantity'];
    
    $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
    $run_price = mysqli_query($con, $select_products);

    while($row_product_price = mysqli_fetch_array($run_price)) {
        $product_price = $row_product_price['product_price'];
        $product_total = $product_price * $quantity;
        $total_price += $product_total;
    }
}

// Insert order into user_orders
$insert_orders = "INSERT INTO `user_orders` (user_id, amount_due, invoice_number, total_products, order_date, order_status) 
VALUES ('$user_id', '$total_price', '$invoice_number', '$count_products', NOW(), '$status')";

$result_query = mysqli_query($con, $insert_orders);

// Insert each product from cart into orders_pending table
$cart_items = mysqli_query($con, "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address' AND user_id=$user_id");
while($item = mysqli_fetch_array($cart_items)) {
    $product_id = $item['product_id'];
    $quantity = $item['quantity'];
    
    $insert_pending_orders = "INSERT INTO `orders_pending` (user_id, invoice_number, product_id, quantity, order_status) 
    VALUES ('$user_id', '$invoice_number', '$product_id', '$quantity', '$status')";
    $result_pending_orders = mysqli_query($con, $insert_pending_orders);
}

// Clear the cart only after successfully creating all orders
if($result_query) {
    $empty_cart = "DELETE FROM `cart_details` WHERE ip_address='$get_ip_address' AND user_id=$user_id";
    $result_delete = mysqli_query($con, $empty_cart);
    
    echo "<script>alert('Orders submitted successfully');</script>";
    echo "<script>window.open('../users_area/profile.php', '_self');</script>";
} else {
    echo "<script>alert('There was an error processing your order');</script>";
}



// Insert each product from cart into information_order table
$cart_items = mysqli_query($con, "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address' AND user_id=$user_id");
while($item = mysqli_fetch_array($cart_items)) {
    $product_id = $item['product_id'];
    $quantity = $item['quantity'];
    
    // Get product details
    $product_query = "SELECT * FROM `products` WHERE product_id='$product_id'";
    $product_result = mysqli_query($con, $product_query);
    $product_row = mysqli_fetch_assoc($product_result);
    $product_title = $product_row['product_title'];
    $product_price = $product_row['product_price'];
    $amount_due = $product_price * $quantity;
    
    // Insert into information_order table
    $insert_info_order = "INSERT INTO `information_order` 
        (user_id, username, product_title, quantity, amount_due, order_date, order_status) 
        VALUES ('$user_id', '$username', '$product_title', '$quantity', '$amount_due', NOW(), '$status')";
    $result_info_order = mysqli_query($con, $insert_info_order);
}
?>