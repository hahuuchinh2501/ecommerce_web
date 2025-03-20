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
    <title>Fashion Store - Cart Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cart.css">
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
                            <a class="nav-link" href="index.php">
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
                            <a class="nav-link active" aria-current="page" href="cart.php">
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
                <h3 class="text-center">YOUR SHOPPING CART</h3>
                <p class="text-center">Review your items and proceed to checkout</p>
            </div>
        </div>

        <div class="container">
            <form action="" method="post">
                <?php
                global $con;
                $get_ip_add = getIPAddress();
                $total_price = 0;
                $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                $result = mysqli_query($con, $cart_query);
                $result_count = mysqli_num_rows($result);
                
                if ($result_count > 0) {
                    ?>
                    <div class="cart-table">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
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
                                        $total_product_price = $price_table * $quantity;
                                        $total_price += $total_product_price;
                                        ?>
                                        <tr>
                                            <td class="fw-medium"><?php echo $product_title ?></td>
                                            <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="<?php echo $product_title ?>" class="cart_img"></td>
                                            <td>
                                                <input type="number" name="qty" class="cart-form-input" min="1" value="<?php echo $quantity; ?>">
                                            </td>
                                            <td><?php echo number_format($price_table) ?> VND</td>
                                            <td class="fw-bold"><?php echo number_format($total_product_price) ?> VND</td>
                                            <td><input type="checkbox" class="checkbox-remove" name="remove_item[]" value="<?php echo $product_id; ?>"></td>
                                            <td>
                                                <input type="submit" value="Update" class="btn-update-cart" name="update_cart">
                                                <input type="submit" value="Remove" class="btn-remove-cart mt-2" name="remove_cart">
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                
                                if (isset($_POST['update_cart'])) {
                                    $quantities = $_POST['qty'];
                                    $update_cart = "UPDATE cart_details SET quantity=$quantities WHERE ip_address='$get_ip_add' AND product_id='$product_id'";
                                    $result_products_quantity = mysqli_query($con, $update_cart);
                                    echo "<script>window.open('cart.php','_self')</script>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="cart-summary">
                        <div class="cart-total">
                            Total: <span><?php echo number_format($total_price) ?> VND</span>
                        </div>
                        <div class="cart-actions">
                            <input type="submit" value="Continue Shopping" class="btn-continue" name="continue_shopping">
                          <?php
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $get_user = "SELECT * FROM `user_table` WHERE username='$username'";
    $result = mysqli_query($con, $get_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];
    echo "<a href='./users_area/checkout.php?user_id=$user_id' class='btn-checkout'>Proceed to Checkout</a>";
} else {
    echo "<a href='./users_area/user_login.php' class='btn-checkout'>Login to Checkout</a>";
}
?>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="cart-empty">
                        <i class="fas fa-shopping-cart"></i>
                        <h2 class="text-center">Your cart is empty</h2>
                        <p class="text-center">Looks like you haven't added anything to your cart yet.</p>
                        <div class="text-center mt-4">
                            <input type="submit" value="Start Shopping" class="btn-continue" name="continue_shopping">
                        </div>
                    </div>
                    <?php
                }
                
                if (isset($_POST['continue_shopping'])) {
                    echo "<script>window.open('index.php','_self')</script>";
                }
                ?>
            </form>

            <?php
            function remove_cart_item() {
                global $con;
                if (isset($_POST['remove_cart'])) {
                    foreach ($_POST['remove_item'] as $remove_id) {
                        $delete_query = "Delete from `cart_details` where product_id=$remove_id";
                        $run_delete = mysqli_query($con, $delete_query);
                        if ($run_delete) {
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                    }
                }
            }
            $remove_item = remove_cart_item();
            ?>
        </div>

        <!-- Footer -->
        <footer>
            <?php include("./includes/footer.php") ?>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>