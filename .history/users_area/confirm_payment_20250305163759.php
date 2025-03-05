<?php
include('../includes/connect.php');
session_start();

if(isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    echo $order_id;
}

?>
