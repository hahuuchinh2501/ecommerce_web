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
<style>
    .cart_img {
        width: 50px;
        height: 50px;
        object-fit: contain;
    }
</style>

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
                            <th> ordered quantity</th>
                            <th>remove</th>
                            <th colspan="2">operations</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        global $con;
                        $get_ip_add = getIPAddress();
                        $total_price = 0;
                        $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $select_products = "Select * from `products` where product_id='$product_id'";
                            $result_products = mysqli_query($con, $select_products);
                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                $product_price = array($row_product_price['product_price']);
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_image1'];
                                $product_values = array_sum($product_price);
                                $total_price += $product_values;

                                ?>

                                <tr>
                                    <td><?php echo $product_title ?></td>
                                    <td><img src="./admin_area/product_images<?php echo $product_image1 ?>" alt=""
                                            class="cart_img"></td>
                                    <td><input type="text" name="" id=""></td>
                                    <td>900000</td>
                                    <td>2</td>
                                    <td><input type="checkbox"></td>
                                    <td>
                                        <button class="bg-info px-3 py-2 border-0 mx-3">update</button><button
                                            class="bg-secondary p-3 py-2 border-0 text-light">remove</button>
                                    </td>
                                </tr>
                            <?php }
                        } ?>
                    </tbody>
                </table>
                <div class="d-flex mb-5">
                    <h4 class="px-3 py-2">total: <strong>700000 VND</strong></h4>
                    <a href="index.php"><button class="bg-info px-3 py-2 border-0 mx-3">continue shopping</button></a>
                    <a href="#"><button class="bg-secondary p-3 py-2 border-0 text-light">checkout</button></a>
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