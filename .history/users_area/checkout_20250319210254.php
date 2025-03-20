<?php
include('../includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Store - Checkout</title>
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
                            <a class="nav-link" href="#">
                                <i class="fas fa-envelope me-1"></i> Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_registration.php">
                                <i class="fas fa-user-plus me-1"></i> Register
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
                    <?php
                    if (!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link' href='#'><i class='fas fa-user-circle me-1'></i> Welcome Guest</a>";
                        echo "</li>";
                    } else {
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link' href='#'><i class='fas fa-user-circle me-1'></i> Welcome " . $_SESSION['username'] . "</a>";
                        echo "</li>";
                    }

                    if (!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link' href='./user_login.php'><i class='fas fa-sign-in-alt me-1'></i> Login</a>";
                        echo "</li>";
                    } else {
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link' href='logout.php'><i class='fas fa-sign-out-alt me-1'></i> Logout</a>";
                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <div class="header-section">
            <div class="container">
                <h3 class="text-center">CHECKOUT</h3>
                <p class="text-center">Complete your purchase with confidence</p>
            </div>
        </div>

        <div class="container">
            <div class="row px-1">
                <div class="col-md-12">
                    <div class="row">
                        <?php
                        if (!isset($_SESSION['username'])) {
                            include('./user_login.php');
                        } else {
                            include('payment.php');
                        }
                        ?>
                    </div>
                    <!-- row end -->
                </div>
                <!-- col end -->
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
        // Add animation effects
        document.addEventListener('DOMContentLoaded', function() {
            // Stagger animation for cards
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>

</html>