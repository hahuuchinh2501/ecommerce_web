<?php
include('../includes/connect.php');
session_start();

if(isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_data = "Select * from user_orders where order_id=$order_id";
    $result = mysqli_query($con, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if(isset($_POST['confirm_payment'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "insert into `user_payments` (order_id,invoice_number,amount,payment_mode) 
    values ($order_id,$invoice_number,$amount,'$payment_mode')";
    $result = mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Payment completed successfully!')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders="update `user_orders` set order_status='Complete' where order_id=$order_id";
    $result_orders=mysqli_query($con,$update_orders);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Store - Confirm Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="../confirm_payment.css">
    
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg main-navbar">
            <div class="container">
                <a class="navbar-brand" href="../index.php">
                    <img src="../images/shop.jpg" alt="Fashion Store Logo" class="logo me-2">
                    FASHION STORE
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">
                                <i class="fas fa-home me-1"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">
                                <i class="fas fa-tshirt me-1"></i> Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">
                                <i class="fas fa-user me-1"></i> My Account
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="header-section">
            <div class="container">
                <h3 class="text-center">CONFIRM PAYMENT</h3>
                <p class="text-center">Complete your order by confirming your payment details</p>
            </div>
        </div>

        <div class="container">
            <div class="payment-header">
                <i class="fas fa-credit-card payment-icon"></i>
                <h2>Complete Your Purchase</h2>
                <p>Order #<?php echo $order_id; ?></p>
            </div>
            
            <div class="payment-form-container">
                <h3 class="form-title">Payment Details</h3>
                <form action="" method="post">
                    <div class="mb-4">
                        <label for="invoice_number" class="form-label payment-label">Invoice Number</label>
                        <input type="text" class="form-control payment-input" id="invoice_number" name="invoice_number" value="<?php echo $invoice_number ?>" readonly>
                    </div>
                    
                    <div class="mb-4">
                        <label for="amount" class="form-label payment-label">Amount to Pay</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                            <input type="text" class="form-control payment-input" id="amount" name="amount" value="<?php echo $amount_due ?>" readonly>
                            <span class="input-group-text">VND</span>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="payment_mode" class="form-label payment-label">Select Payment Method</label>
                        <select name="payment_mode" id="payment_mode" class="form-select payment-select" required>
                            <option value="">-- Choose your payment method --</option>
                            <option value="Cash on Delivery">Cash on Delivery</option>
                            <option value="Payoffline">Pay Offline</option>
                            <option value="UPI">UPI / Mobile Payment</option>
                            <option value="Credit Card">Credit Card</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn payment-btn" name="confirm_payment">
                        <i class="fas fa-check-circle me-2"></i> Confirm Payment
                    </button>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <?php include("../includes/footer.php") ?>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>