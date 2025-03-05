<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    img {
        width: 100%;
    }
</style>
<body>
    <div class="container">
        <h2 class="text-center text-info">Payment options</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank"><img src="../images/upi.jpg" alt="pay"></a>

            </div>
            <div class="col-md-6">
                <a href="order.php"><h2>Pay offline</h2></a>
            </div>
        </div>
    </div>
</body>
</html>