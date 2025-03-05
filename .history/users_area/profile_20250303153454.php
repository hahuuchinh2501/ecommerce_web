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
    <title>welcome profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">

</head>
<style>
    body {
        overflow-x: hidden;
    }
    .profile-img {
        width: 90%;
        height: 100%;
        margin: auto;
        display: block;
        
    }
</style>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="../images/shop.jpg" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">my account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php">cart <i
                                    class="fa-solid fa-cart-shopping"><sup><?php cart_item(); ?></sup></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">total price: <?php total_cart_price(); ?>VND </a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_data">
                        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- call function cart -->
        <?php
        cart();
        ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">

                <?php
                if (!isset($_SESSION['username'])) {
                    echo "   <li class='nav-item'>
                            <a class='nav-link' href='#'>welcome guest</a>
                        </li>";
                } else {
                    echo "    <li class='nav-item'>
                            <a class='nav-link' href='#'>welcome " . $_SESSION['username'] . "</a>
                        </li>";
                }


                if (!isset($_SESSION['username'])) {
                    echo "  <li class='nav-item'>
                    <a class='nav-link' href='./users_area/user_login.php'>login</a>
                </li>";
                } else {
                    echo "  <li class='nav-item'>
                    <a class='nav-link' href='./users_area/logout.php'>logout</a>
                </li>";
                }
                ?>

            </ul>
        </nav>
        <div class="bg-light">
            <h3 class="text-center">store</h3>
            <p class="text-center">Communications is at the heart of e-commerce and community</p>
        </div>

       <div class="row">
            <div class="col-md-2 ">
                <ul class="navbar-nav bg-secondary text-center">
                    <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="#"><h4>your profile</h4></a>
                    </li>
                     <li class="nav-item">
                        <img src="../images/shop.jpg" class="profile-img my-4" alt="">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">pending orders</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="#">Edit account</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="#">my orders</a>
                    </li>
                     <li class="nav-item ">
                        <a class="nav-link text-light" href="#">Delete account</a>
                    </li>

                     <li class="nav-item ">
                        <a class="nav-link text-light" href="#">logout</a>
                    </li>


                </ul>
            </div>
            <div class="col-md-10">

            </div>
       </div>

        <!-- include footer  -->
        <?php
        include("../includes/footer.php")
            ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>