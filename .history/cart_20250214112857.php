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
                            <a class="nav-link" href="./users_area/user_registration.php">register</a>
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



        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">


                        <?php
                        global $con;
                        $get_ip_add = getIPAddress();
                        $total_price = 0;
                        $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<thead>
                            <tr>
                                <th>product title</th>
                                <th>product image</th>
                                <th>quantity</th>
                                <th>total price</th>
                                <th> ordered quantity</th>
                                <th>remove</th>
                                <th colspan='2'>operations</th>
                            </tr>
                        </thead>
                        <tbody>";

                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $quantity = ($row['quantity'] > 0) ? $row['quantity'] : 1;
                                $select_products = "Select * from `products` where product_id='$product_id'";
                                $result_products = mysqli_query($con, $select_products);
                                while ($row_product_price = mysqli_fetch_array($result_products)) {
                                    $product_price = array($row_product_price['product_price']);
                                    $price_table = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $product_values = array_sum($product_price);
                                    $total_product_price = $price_table * $quantity; // Nhân giá với số lượng
                        
                                    $total_price += $total_product_price;

                                    ?>

                                    <tr>
                                        <td><?php echo $product_title ?></td>
                                        <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt=""
                                                class="cart_img"></td>
                                        <td><input type="text" name="qty" id="" class="form-input w-50"
                                                value="<?php echo $quantity; ?>"></td>
                                        <?php
                                        $get_ip_add = getIPAddress();
                                        // if (isset($_POST['update_cart'])) {
                                        //     $quantities = $_POST['qty'];
                                        //     $update_cart = "update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                                        //     $result_products_quantity = mysqli_query($con, $update_cart);
                                        //     $total_price = $total_price * $quantities;
                                        // }
                                        if (isset($_POST['update_cart'])) {
                                            $quantities = $_POST['qty'];
                                            $update_cart = "UPDATE cart_details SET quantity=$quantities WHERE ip_address='$get_ip_add' AND product_id='$product_id'";
                                            $result_products_quantity = mysqli_query($con, $update_cart);
                                            echo "<script>window.open('cart.php','_self')</script>"; // Refresh lại giỏ hàng
                                        }
                                        ?>


                                        <?php
                                        $get_order_quantity = "SELECT quantity FROM `cart_details` WHERE product_id='$product_id' AND ip_address='$get_ip_add'";
                                        $order_quantity_result = mysqli_query($con, $get_order_quantity);
                                        $order_quantity_row = mysqli_fetch_assoc($order_quantity_result);
                                        $ordered_quantity = $order_quantity_row ? $order_quantity_row['quantity'] : 1;
                                        ?>

                                        <td><?php echo $price_table ?></td>
                                        <td><?php echo $ordered_quantity ?></td>
                                        <td><input type="checkbox" name="remove_item[]" value="<?php echo $product_id; ?>"></td>
                                        <td>
                                            <!-- <button class="bg-info px-3 py-2 border-0 mx-3">update</button> -->
                                            <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3"
                                                name="update_cart">

                                            <!-- <button class="bg-secondary p-3 py-2 border-0 text-light">remove</button> -->
                                            <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3"
                                                name="remove_cart">
                                        </td>
                                    </tr>
                                <?php }
                            }
                        } else {
                            echo "<h2 class='text-center text-danger'>cart empty<h2>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="d-flex mb-5">
                        <?php
                        $get_ip_add = getIPAddress();
                        $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<h4 class='px-3 py-2'>Total: <strong> $total_price VND</strong></h4>
                            <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3'
                                                name='continue_shopping'>

                            <button class='bg-secondary p-3 py-2 border-0 '><a href='./users_area/checkout.php' class=' text-light text-decoration-none'>Checkout</a></button>";
                        } else {
                            echo " <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3'
                                                name='continue_shopping'>";
                        }
                        if (isset($_POST['continue_shopping'])) {
                            echo "<script>window.open('index.php','_self')</script>";
                        }


                        ?>

                    </div>
            </div>
        </div>
        </form>

        <!-- function to remove -->
        <?php
        function remove_cart_item()
        {
            global $con;
            if (isset($_POST['remove_cart'])) {
                foreach ($_POST['remove_item'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "Delete from `cart_details` where product_id=$remove_id";
                    $run_delete = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }
        echo $remove_item = remove_cart_item();
        ?>

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