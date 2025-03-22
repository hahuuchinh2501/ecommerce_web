<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Fashion Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../profile.css">
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
                        echo "<a class='nav-link' href='user_login.php'><i class='fas fa-sign-in-alt me-1'></i> Login</a>";
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
                <h3 class="text-center">MY ACCOUNT</h3>
                <p class="text-center">Manage your profile and track your orders</p>
            </div>
        </div>

        <div class="container mb-5">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3 mb-4">
                    <div class="profile-sidebar">
                        <div class="profile-sidebar-header">
                            <i class="fas fa-user-circle me-2"></i> Your Profile
                        </div>
                        <?php
                        $username = $_SESSION['username'];
                        $user_image_query = "SELECT * FROM `user_table` WHERE username='$username'";
                        $user_image_result = mysqli_query($con, $user_image_query);
                        $row_image = mysqli_fetch_array($user_image_result);
                        $user_image = $row_image['user_image'];
                        ?>
                        <div class="profile-img-container">
                            <img src="./user_images/<?php echo $user_image; ?>" class="profile-img" alt="Profile Image">
                        </div>
                        <ul class="navbar-nav text-center">
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php">
                                    <i class="fas fa-shopping-bag"></i> Pending Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php?edit_account">
                                    <i class="fas fa-user-edit"></i> Edit Account
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php?my_orders">
                                    <i class="fas fa-history"></i> My Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php?delete_account">
                                    <i class="fas fa-user-times"></i> Delete Account
                                </a>
                            </li>
                             <li class="nav-item">
        <a class="nav-link" href="profile.php?information_orders">
            <i class="fas fa-info-circle"></i> Order Information
        </a>
    </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="col-md-9">
                    <div class="profile-content">
                        <?php
                        if (isset($_GET['edit_account'])) {
                            include('edit_account.php');
                        } else if (isset($_GET['my_orders'])) {
                            include('user_orders.php');
                        } else if (isset($_GET['delete_account'])) {
                            include('delete_account.php');
                                    } else if (isset($_GET['information_orders'])) {
            include('information_orders.php');
        
                        } else {
                            // Default content - Pending Orders
                            echo "<h4 class='section-title'><i class='fas fa-shopping-bag me-2'></i>Pending Orders</h4>";
                            get_user_order_details();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- include footer  -->
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
            // Stagger animation for profile elements
            const elements = document.querySelectorAll('.profile-sidebar, .profile-content');
            elements.forEach((element, index) => {
                element.style.animationDelay = `${index * 0.1}s`;
            });
            
            // Add active class to current nav item
            const currentLocation = window.location.href;
            const menuItems = document.querySelectorAll('.profile-sidebar .nav-link');
            menuItems.forEach(item => {
                if (currentLocation.includes(item.getAttribute('href'))) {
                    item.classList.add('active');
                }
            });
        });
    </script>
</body>

</html>