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
    <title>website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="product_details.css">
<link rel="stylesheet" href="index.css">

</head>

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
                            <a class="nav-link" aria-current="page" href="index.php">
                                <i class="fas fa-home me-1"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="display_all.php">
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


        <?php
        cart();
        ?>

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
                <h3 class="text-center">Product Details</h3>
                <p class="text-center">Product items</p>
            </div>
        </div>

        <div class="row px-3">
            <div class="col-md-10">
                <div class="row">




                    <!-- fetching products -->

                    <?php
                    view_details();
                    get_unique_categories();
                    get_unique_brands();
                    ?>
                  




                    <!-- row end    -->
                </div>
                <!-- col end -->
            </div>

            <div class="col-md-2 bg-secondary p-0">
                <!--branch-->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Delivery Brands</h4>
                        </a>
                    </li>

                    <?php
                    // $select_brands="select * from `brands`";
                    // $result_brands=mysqli_query($con,$select_brands);
                    // // $row_data=mysqli_fetch_assoc($result_brands);
                    // // echo $row_data['brand_title'];
                    // // echo $row_data['brand_title'];
                    // while($row_data=mysqli_fetch_assoc($result_brands)){
                    //     $brand_title=$row_data['brand_title'];
                    //     $brand_id=$row_data['brand_id'];
                    //     echo "<li class='nav-item'>
                    //     <a href='index.php?brand=$brand_id' class='nav-link text-light'> $brand_title</a>
                    // </li>";
                    // }                     
                    getbrands();

                    ?>


                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link text-light"> Brands1</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light"> Brands2</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light"> Brands3</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light"> Brands4</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light"> Brands3</a>
                    </li> -->
                </ul>


                <!--category-->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>categories</h4>
                        </a>
                    </li>

                    <?php
                    // $select_categories="select * from `categories`";
                    // $result_categories=mysqli_query($con,$select_categories);
                    // // $row_data=mysqli_fetch_assoc($result_brands);
                    // // echo $row_data['brand_title'];
                    // // echo $row_data['brand_title'];
                    // while($row_data=mysqli_fetch_assoc($result_categories)){
                    //     $category_title=$row_data['category_title'];
                    //     $category_id=$row_data['category_id'];
                    //     echo "<li class='nav-item'>
                    //     <a href='index.php?category=$category_id' class='nav-link text-light'> $category_title</a>
                    // </li>";
                    // }                     
                    getcategories();
                    ?>




                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link text-light">categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light"> categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light"> categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light"> categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light">categories</a>
                    </li> -->
                </ul>
            </div>
        </div>

        <!-- include footer  -->
         <footer><?php
        include("./includes/footer.php")
            ?></footer>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
        
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
    </>
    </script>
</body>

</html>