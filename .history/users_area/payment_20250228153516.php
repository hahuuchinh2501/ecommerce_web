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
<body>
    <div class="container">
        <h2>Payment options</h2>
        <div class="row">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank"><img src="../images/upi.jpg"></a>

            </div>
            <div class="col-md-6">
                <a href="order.php">Pay offline</a>
            </div>
        </div>
    </div>
</body>
</html>