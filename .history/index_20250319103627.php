<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<style>
    :root {
        --primary-color: #212529;
        --accent-color: #f8f9fa;
        --secondary-color: #6c757d;
        --highlight-color: #e83e8c;
        --light-bg: #f8f9fa;
        --dark-bg: #495057;
    }

    body {
        overflow-x: hidden;
        font-family: 'Poppins', sans-serif;
        background-color: #f9f9f9;
    }

    /* Navbar styling */
    .navbar {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .main-navbar {
        background-color: var(--primary-color);
        padding: 15px 0;
    }

    .navbar-brand {
        font-weight: 700;
        color: var(--accent-color) !important;
        font-size: 1.6rem;
        letter-spacing: 1px;
    }

    .logo {
        height: 50px;
        border-radius: 8px;
        transition: transform 0.3s;
    }

    .logo:hover {
        transform: scale(1.05);
    }

    .nav-link {
        color: var(--accent-color) !important;
        font-weight: 500;
        padding: 8px 15px !important;
        transition: color 0.3s, transform 0.3s;
        position: relative;
    }

    .nav-link:hover {
        color: var(--highlight-color) !important;
        transform: translateY(-2px);
    }

    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 50%;
        background-color: var(--highlight-color);
        transition: width 0.3s, left 0.3s;
    }

    .nav-link:hover::after {
        width: 70%;
        left: 15%;
    }

    .nav-link.active {
        color: var(--highlight-color) !important;
        font-weight: 600;
    }

    .nav-link.active::after {
        width: 70%;
        left: 15%;
    }

    .form-control {
        border-radius: 20px;
        padding: 10px 20px;
        border: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .btn-search {
        border-radius: 20px;
        padding: 10px 20px;
        background-color: var(--highlight-color);
        color: white;
        border: none;
        transition: all 0.3s;
        font-weight: 500;
    }

    .btn-search:hover {
        background-color: #d33077;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(232, 62, 140, 0.3);
    }

    /* Secondary navbar */
    .secondary-navbar {
        background-color: var(--secondary-color);
        padding: 8px 0;
    }

    /* Header section */
    .header-section {
        background-color: var(--light-bg);
        padding: 40px 0;
        margin-bottom: 30px;
        background-image: linear-gradient(135deg, rgba(248, 249, 250, 0.9), rgba(232, 62, 140, 0.1));
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .header-section h3 {
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 10px;
        position: relative;
        display: inline-block;
    }

    .header-section h3::after {
        content: '';
        position: absolute;
        width: 50%;
        height: 3px;
        background-color: var(--highlight-color);
        bottom: -5px;
        left: 25%;
    }

    .header-section p {
        color: var(--secondary-color);
        font-size: 1.1rem;
    }

    /* Card styling */
    .card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        height: 100%;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
        transition: transform 0.5s;
    }

    .card:hover .card-img-top {
        transform: scale(1.05);
    }

    .card-body {
        padding: 20px;
        background-color: white;
    }

    .card-title {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 10px;
    }

    .card-text {
        color: var(--secondary-color);
        margin-bottom: 20px;
        font-size: 0.9rem;
    }

    .btn-info {
        background-color: var(--highlight-color);
        color: white;
        border: none;
        border-radius: 20px;
        padding: 8px 15px;
        font-weight: 500;
        transition: all 0.3s;
    }

    .btn-info:hover {
        background-color: #d33077;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(232, 62, 140, 0.3);
    }

    .btn-secondary {
        background-color: var(--secondary-color);
        border: none;
        border-radius: 20px;
        padding: 8px 15px;
        font-weight: 500;
        transition: all 0.3s;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
    }

    /* Sidebar styling */
    .sidebar {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .sidebar-header {
        background-color: var(--primary-color);
        color: white;
        padding: 15px;
        font-weight: 600;
        text-align: center;
        font-size: 1.1rem;
    }

    .sidebar-item {
        padding: 12px 20px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s;
    }

    .sidebar-item:hover {
        background-color: rgba(232, 62, 140, 0.05);
        padding-left: 25px;
    }

    .sidebar-item a {
        color: var(--secondary-color);
        text-decoration: none;
        display: block;
        transition: color 0.3s;
    }

    .sidebar-item:hover a {
        color: var(--highlight-color);
    }

    /* Cart icon animation */
    .cart-icon {
        position: relative;
        transition: transform 0.3s;
    }

    .cart-icon:hover {
        transform: scale(1.1);
    }

    .cart-icon sup {
        position: absolute;
        top: -10px;
        right: -10px;
        background-color: var(--highlight-color);
        color: white;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 0.7rem;
        font-weight: bold;
    }

    /* Footer styling */
    footer {
        background-color: var(--primary-color);
        color: var(--accent-color);
        padding: 40px 0 20px;
        margin-top: 50px;
    }

    .footer-heading {
        font-weight: 600;
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }

    .footer-heading::after {
        content: '';
        position: absolute;
        width: 50%;
        height: 2px;
        background-color: var(--highlight-color);
        bottom: -5px;
        left: 0;
    }

    .footer-link {
        color: var(--accent-color);
        text-decoration: none;
        transition: color 0.3s, padding-left 0.3s;
        display: block;
        margin-bottom: 10px;
    }

    .footer-link:hover {
        color: var(--highlight-color);
        padding-left: 5px;
    }

    .social-icon {
        color: var(--accent-color);
        font-size: 1.5rem;
        margin-right: 15px;
        transition: color 0.3s, transform 0.3s;
    }

    .social-icon:hover {
        color: var(--highlight-color);
        transform: translateY(-3px);
    }

    .copyright {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 20px;
        margin-top: 30px;
        text-align: center;
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.7);
    }

    /* Animation for elements */
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

    .card, .header-section, .sidebar {
        animation: fadeInUp 0.5s ease-out forwards;
    }
</style>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg main-navbar">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="./images/shop.jpg" alt="Fashion Store Logo" class="logo me-2">
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
                            <a class="nav-link active" aria-current="page" href="index.php">
                                <i class="fas fa-home me-1"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">
                                <i class="fas fa-tshirt me-1"></i> Products
                            </a>
                        </li>
                        <?php
                        if(isset($_SESSION['username'])) {
                            echo "<li class='nav-item'>";
                            echo "<a class='nav-link' href='./users_area/profile.php'><i class='fas fa-user me-1'></i> My Account</a>";
                            echo "</li>";
                        } else {
                            echo "<li class='nav-item'>";
                            echo "<a class='nav-link' href='./users_area/user_registration.php'><i class='fas fa-user-plus me-1'></i> Register</a>";
                            echo "</li>";
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-envelope me-1"></i> Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">
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
                    <form class="d-flex" role="search" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm..." aria-label="Search"
                            name="search_data">
                        <input type="submit" value="Search" class="btn btn-search" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- call function cart -->
        <?php cart(); ?>

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
                        echo "<a class='nav-link' href='./users_area/user_login.php'><i class='fas fa-sign-in-alt me-1'></i> Login</a>";
                        echo "</li>";
                    } else {
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link' href='./users_area/logout.php'><i class='fas fa-sign-out-alt me-1'></i> Logout</a>";
                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <div class="header-section">
            <div class="container">
                <h3 class="text-center">FASHION STORE</h3>
                <p class="text-center">Discover the latest trends and express your unique style</p>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <!-- fetching products -->
                        <?php
                        getproducts();
                        get_unique_categories();
                        get_unique_brands();
                        ?>
                    </div>
                    <!-- row end -->
                </div>
                <!-- col end -->

                <div class="col-md-3">
                    <!-- Brands sidebar -->
                    <div class="sidebar mb-4">
                        <div class="sidebar-header">
                            <i class="fas fa-tags me-2"></i> Top Brands
                        </div>
                        <ul class="list-unstyled mb-0">
                            <?php getbrands(); ?>
                        </ul>
                    </div>

                    <!-- Categories sidebar -->
                    <div class="sidebar">
                        <div class="sidebar-header">
                            <i class="fas fa-list me-2"></i> Categories
                        </div>
                        <ul class="list-unstyled mb-0">
                            <?php getcategories(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5 class="footer-heading">About Us</h5>
                        <p>Fashion Store là điểm đến hoàn hảo cho những ai yêu thích phong cách và thời trang hiện đại.</p>
                        <div class="mt-4">
                            <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h5 class="footer-heading">Quick Links</h5>
                        <a href="index.php" class="footer-link">Home</a>
                        <a href="display_all.php" class="footer-link">Products</a>
                        <a href="#" class="footer-link">Contact</a>
                        <a href="cart.php" class="footer-link">Shopping Cart</a>
                    </div>
                    <div class="col-md-3">
                        <h5 class="footer-heading">Customer Service</h5>
                        <a href="#" class="footer-link">FAQs</a>
                        <a href="#" class="footer-link">Shipping Policy</a>
                        <a href="#" class="footer-link">Returns & Exchanges</a>
                        <a href="#" class="footer-link">Size Guide</a>
                    </div>
                    <div class="col-md-2">
                        <h5 class="footer-heading">Contact</h5>
                        <p class="mb-1"><i class="fas fa-map-marker-alt me-2"></i> 123 Fashion St.</p>
                        <p class="mb-1"><i class="fas fa-phone me-2"></i> +84 123 456 789</p>
                        <p class="mb-1"><i class="fas fa-envelope me-2"></i> contact@fashion.com</p>
                    </div>
                </div>
                <div class="copyright">
                    <p>&copy; <?php echo date('Y'); ?> Fashion Store. All Rights Reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    
    <script>
        // Add hover effect for cards
        document.addEventListener('DOMContentLoaded', function() {
            // Stagger animation for cards
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
            
            // Smooth scroll for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>

</html>