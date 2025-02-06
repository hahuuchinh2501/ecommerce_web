<?php
include('includes/connect.php');
include('functions/common_function.php');
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

</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="./images/shop.jpg" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">cart <i
                                    class="fa-solid fa-cart-shopping"><sup><?php cart_item(); ?></sup></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><?php total_cart_price(); ?></a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <?php
        cart();
        ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">welcome guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">login</a>
                </li>
            </ul>
        </nav>
        <div class="bg-light">
            <h3 class="text-center">store</h3>
            <p class="text-center">Communications is at the heart of e-commerce and community</p>
        </div>

        <div class="row px-3">
            <div class="col-md-10">
                <div class="row">
                    <!-- fetching products -->

                    <?php
                    get_all_products();
                    get_unique_categories();
                    get_unique_brands();
                    ?>
                    <!-- <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="./images/4.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-info">Add to cart</a>
                                <a href="#" class="btn btn-secondary">View more</a>
                            </div>
                        </div>
                    </div> -->




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

        <?php
        include("./includes/footer.php")
            ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>