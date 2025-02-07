<?php
include('includes/connect.php');
include('functions/common_function.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>website-cart details</title>
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
                            <a class="nav-link" href="cart.php">cart <i
                                    class="fa-solid fa-cart-shopping"><sup><?php cart_item(); ?></sup></i></a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>

        <!-- call function cart -->
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



        <div class="container">
            <div class="row">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>product title</th>
                            <th>product image</th>
                            <th>quantity</th>
                            <th>total price</th>
                            <th>remove</th>
                            <th>operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>nike</td>
                            <td><img src="./images/1.jpg" alt=""></td>
                            <td><input type="text" name="" id=""></td>
                            <td>900000</td>
                            <td>
                                <p>update</p>
                                <p>remove</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex">
                    <h4 class="px-3">total: <strong>700000 VND</strong></h4>
                    <a href="index.php"><button class="bg-info px-3 border-0">continue shopping</button></a>
                    <a href="#"><button class="bg-info px-3 border-0">checkout</button></a>
                </div>
            </div>
        </div>

        <!-- include footer  -->
        <?php
        include("./includes/footer.php")
            ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>