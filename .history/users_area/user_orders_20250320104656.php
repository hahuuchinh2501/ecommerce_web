<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

// Check if user is logged in
if(!isset($_SESSION['username'])){
    header('location:user_login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - Fashion Store</title>
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
    <style>
        :root {
          --primary-color: #212529;
          --accent-color: #f8f9fa;
          --secondary-color: #6c757d;
          --highlight-color: #e83e8c;
          --light-bg: #f8f9fa;
          --dark-bg: #495057;
          --success-color: #28a745;
        }
        
        body {
          overflow-x: hidden;
          font-family: "Poppins", sans-serif;
          background-color: #f9f9f9;
        }
        
        /* Order content container */
        .orders-container {
          padding: 40px 0;
        }
        
        /* Order table styling */
        .table {
          border-radius: 10px;
          overflow: hidden;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
          margin-bottom: 30px;
          background-color: white;
          animation: fadeInUp 0.5s ease-out forwards;
        }
        
        .table thead {
          background-color: var(--highlight-color) !important;
          color: white;
        }
        
        .table th {
          font-weight: 600;
          padding: 15px;
          text-align: center;
          border-color: rgba(0, 0, 0, 0.05);
        }
        
        .table td {
          padding: 15px;
          text-align: center;
          vertical-align: middle;
          border-color: rgba(0, 0, 0, 0.05);
          transition: background-color 0.3s;
        }
        
        .table tbody tr {
          transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .table tbody tr:hover {
          background-color: rgba(232, 62, 140, 0.05);
          transform: translateY(-2px);
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        /* Order status styling */
        .text-success {
          font-weight: 700;
          color: var(--success-color) !important;
          margin-bottom: 25px;
          position: relative;
          display: inline-block;
          animation: fadeInUp 0.5s ease-out forwards;
        }
        
        .text-success::after {
          content: "";
          position: absolute;
          width: 50%;
          height: 3px;
          background-color: var(--highlight-color);
          bottom: -5px;
          left: 0;
        }
        
        /* Confirm payment button */
        .confirm-btn {
          display: inline-block;
          background-color: var(--highlight-color);
          color: white !important;
          border-radius: 20px;
          padding: 8px 15px;
          text-decoration: none;
          font-weight: 500;
          transition: all 0.3s;
        }
        
        .confirm-btn:hover {
          background-color: #d33077;
          transform: translateY(-2px);
          box-shadow: 0 4px 8px rgba(232, 62, 140, 0.3);
          text-decoration: none;
        }
        
        /* Payment status */
        .status-paid {
          font-weight: 600;
          color: var(--success-color);
        }
        
        /* Empty orders message */
        .no-orders {
          text-align: center;
          padding: 30px;
          background-color: white;
          border-radius: 10px;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
          margin: 20px 0;
          animation: fadeInUp 0.5s ease-out forwards;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
          .table thead {
            display: none;
          }
          
          .table, .table tbody, .table tr, .table td {
            display: block;
            width: 100%;
          }
          
          .table tr {
            margin-bottom: 15px;
            border-bottom: 2px solid var(--highlight-color);
          }
          
          .table td {
            text-align: right;
            padding-left: 50%;
            position: relative;
          }
          
          .table td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-weight: 600;
            text-align: left;
          }
        }
        
        /* Animation for order page elements */
        @keyframes fadeInUp {
          from {
            opacity: 0;
            transform: translateY(20px);
          }
          to {
            opacity: 1;
            transform: translateY(0);
          }
        }
        
        /* Page header */
        .page-header {
          background-color: var(--light-bg);
          padding: 30px 0;
          margin-bottom: 30px;
          background-image: linear-gradient(
            135deg,
            rgba(248, 249, 250, 0.9),
            rgba(232, 62, 140, 0.1)
          );
          border-bottom: 1px solid rgba(0, 0, 0, 0.05);
          animation: fadeInUp 0.5s ease-out forwards;
        }
        
        .page-title {
          font-weight: 700;
          color: var(--primary-color);
          margin-bottom: 10px;
          position: relative;
          display: inline-block;
        }
        
        .page-title::after {
          content: "";
          position: absolute;
          width: 50%;
          height: 3px;
          background-color: var(--highlight-color);
          bottom: -5px;
          left: 25%;
        }
    </style>
</head>

<body>
    <!-- navbar -->
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
                            <a class="nav-link" aria-current="page" href="../index.php">
                                <i class="fas fa-home me-1"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">
                                <i class="fas fa-tshirt me-1"></i> Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="profile.php">
                                <i class="fas fa-user me-1"></i> My Account
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-envelope me-1"></i> Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php">
                                <span class="cart-icon">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <sup><?php cart_item(); ?></sup>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-money-bill-wave me-1"></i> <?php total_cart_price(); ?>VND
                            </a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm..." aria-label="Search"
                            name="search_data">
                        <input type="submit" value="Search" class="btn btn-search" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-dark secondary-navbar">
            <div class="container">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user-circle me-1"></i> Welcome <?php echo $_SESSION['username']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt me-1"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page header -->
        <div class="page-header">
            <div class="container">
                <h3 class="page-title text-center">My Orders</h3>
                <p class="text-center text-muted">View and manage your order history</p>
            </div>
        </div>

        <!-- Orders content -->
        <div class="container orders-container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $username = $_SESSION['username'];
                    $get_user = "SELECT * FROM user_table WHERE username='$username'";
                    $result = mysqli_query($con, $get_user);
                    $row_fetch = mysqli_fetch_assoc($result);
                    $user_id = $row_fetch['user_id'];
                    
                    $get_order_details = "SELECT * FROM user_orders WHERE user_id=$user_id ORDER BY order_date DESC";
                    $result_orders = mysqli_query($con, $get_order_details);
                    $count_orders = mysqli_num_rows($result_orders);
                    
                    if($count_orders > 0) {
                        echo "<table class='table table-bordered'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>No.</th>";
                        echo "<th>Amount Due</th>";
                        echo "<th>Total Products</th>";
                        echo "<th>Invoice Number</th>";
                        echo "<th>Order Date</th>";
                        echo "<th>Status</th>";
                        echo "<th>Payment</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        
                        $number = 1;
                        while($row_orders = mysqli_fetch_assoc($result_orders)) {
                            $order_id = $row_orders['order_id'];
                            $amount_due = number_format($row_orders['amount_due'], 0, ',', '.') . " VND";
                            $total_products = $row_orders['total_products'];
                            $invoice_number = $row_orders['invoice_number'];
                            $order_date = date('d-m-Y', strtotime($row_orders['order_date']));
                            
                            $order_status = $row_orders['order_status'];
                            if($order_status == 'pending') {
                                $order_status = 'Incomplete';
                            } else {
                                $order_status = 'Complete';
                            }
                            
                            echo "<tr>";
                            echo "<td data-label='No.'>$number</td>";
                            echo "<td data-label='Amount Due'>$amount_due</td>";
                            echo "<td data-label='Total Products'>$total_products</td>";
                            echo "<td data-label='Invoice Number'>$invoice_number</td>";
                            echo "<td data-label='Order Date'>$order_date</td>";
                            echo "<td data-label='Status'>$order_status</td>";
                            
                            if($order_status=='Complete'){
                                echo "<td data-label='Payment'><span class='status-paid'>Paid</span></td>";
                            } else {
                                echo "<td data-label='Payment'><a href='confirm_payment.php?order_id=$order_id' class='confirm-btn'>Confirm</a></td>";
                            }
                            echo "</tr>";
                            
                            $number++;
                        }
                        
                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "<div class='no-orders'>";
                        echo "<i class='fas fa-shopping-bag fa-3x mb-3 text-muted'></i>";
                        echo "<h4>You haven't placed any orders yet</h4>";
                        echo "<p class='text-muted'>Explore our products and make your first purchase!</p>";
                        echo "<a href='../display_all.php' class='btn btn-info mt-3'>Shop Now</a>";
                        echo "</div>";
                    }
                    ?>
                </div>
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
    
    <script>
        // Add stagger animation for table rows
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach((row, index) => {
                row.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>

</html>