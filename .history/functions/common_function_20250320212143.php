<?php
// include('./includes/connect.php');


function getproducts()
{

    global $con;
    //condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "Select * from `products` order by rand() LIMIT 0,9";
            $result_query = mysqli_query($con, $select_query);
            // $row=mysqli_fetch_assoc($result_query);
            // echo $row['product_title'];
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Giá: $product_price</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";
            }
        }

    }
}

// getting all product
function get_all_products()
{
    global $con;
    //condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "Select * from `products` order by rand()";
            $result_query = mysqli_query($con, $select_query);
            // $row=mysqli_fetch_assoc($result_query);
            // echo $row['product_title'];
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Giá: $product_price</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";
            }
        }

    }
}


//getting unique categories
function get_unique_categories()
{

    global $con;
    //condition to check isset or not
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "Select * from `products` where category_id=$category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'> No stock for this category</h2>";
        }
        // $row=mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Giá: $product_price</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                 <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";
        }
    }

}


//getting unique brands
function get_unique_brands()
{

    global $con;
    //condition to check isset or not
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "Select * from `products` where brand_id=$brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'> this brand available for service</h2>";
        }
        // $row=mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Giá: $product_price</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";
        }
    }

}



function getbrands()
{
    global $con;
    $select_brands = "select * from `brands`";
    $result_brands = mysqli_query($con, $select_brands);
    // $row_data=mysqli_fetch_assoc($result_brands);
    // echo $row_data['brand_title'];
    // echo $row_data['brand_title'];
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item'>
                        <a href='index.php?brand=$brand_id' class='nav-link text-light'> $brand_title</a>
                    </li>";
    }
}

function getcategories()
{
    global $con;
    $select_categories = "select * from `categories`";
    $result_categories = mysqli_query($con, $select_categories);
    // $row_data=mysqli_fetch_assoc($result_brands);
    // echo $row_data['brand_title'];
    // echo $row_data['brand_title'];
    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-item'>
                        <a href='index.php?category=$category_id' class='nav-link text-light'> $category_title</a>
                    </li>";
    }
}

//function search product

function search_product()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "Select * from `products` where product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'> No have product this category</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Giá: $product_price</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                 <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";
        }
    }
}


// view details product 
function view_details() {
    global $con;
    
    // Condition to check isset or not
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];
                $select_query = "SELECT p.*, c.category_title, b.brand_title 
                                FROM `products` p 
                                JOIN `categories` c ON p.category_id = c.category_id 
                                JOIN `brands` b ON p.brand_id = b.brand_id 
                                WHERE p.product_id=$product_id";
                $result_query = mysqli_query($con, $select_query);
                
                if ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    $category_title = $row['category_title'];
                    $brand_title = $row['brand_title'];
                    
                    // Format price with commas for better readability
                    $formatted_price = number_format($product_price, 0, ',', '.');
                    
                    // Main product details section
                    echo "<div class='container product-details-section mt-4 mb-5'>
                            <div class='row'>
                                <div class='col-md-5'>
                                    <img src='./admin_area/product_images/$product_image1' class='product-main-img' alt='$product_title'>
                                </div>
                                <div class='col-md-7'>
                                    <div class='product-details-card'>
                                        <h1 class='product-title'>$product_title</h1>
                                        <div class='d-flex align-items-center mb-3'>
                                            <span class='badge bg-secondary me-2'>$category_title</span>
                                            <span class='badge bg-dark'>$brand_title</span>
                                        </div>
                                        <div class='product-price'>{$formatted_price} VND</div>
                                        <p class='product-description'>$product_description</p>
                                        
                                        <div class='product-specs'>
                                            <table class='specs-table'>
                                                <tr>
                                                    <td>Mã Sản Phẩm</td>
                                                    <td>#$product_id</td>
                                                </tr>
                                                <tr>
                                                    <td>Danh Mục</td>
                                                    <td>$category_title</td>
                                                </tr>
                                                <tr>
                                                    <td>Thương Hiệu</td>
                                                    <td>$brand_title</td>
                                                </tr>
                                                <tr>
                                                    <td>Tình Trạng</td>
                                                    <td><span class='text-success'>Còn Hàng</span></td>
                                                </tr>
                                            </table>
                                        </div>
                                        
                                        <div class='quantity-selector'>
                                            <label for='quantity'>Số Lượng:</label>
                                            <button class='quantity-btn' onclick='decreaseQuantity()'><i class='fas fa-minus'></i></button>
                                            <input type='number' id='quantity' class='quantity-input' value='1' min='1'>
                                            <button class='quantity-btn' onclick='increaseQuantity()'><i class='fas fa-plus'></i></button>
                                        </div>
                                        
                                        <div class='product-action-buttons'>
                                            <a href='index.php?add_to_cart=$product_id' class='btn btn-add-cart'>
                                                <i class='fas fa-shopping-cart me-2'></i>Thêm Vào Giỏ Hàng
                                            </a>
                                            <a href='index.php' class='btn btn-home'>
                                                <i class='fas fa-home me-2'></i>Về Trang Chủ
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    
                    // Related images section
                    echo "<div class='container mb-5'>
                            <h2 class='related-products-title'>Hình Ảnh Khác Của Sản Phẩm</h2>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='related-img-container'>
                                        <img src='./admin_area/product_images/$product_image2' class='related-product-img' alt='$product_title'>
                                        <div class='related-img-overlay'>
                                            <h5 class='text-white'>$product_title</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='related-img-container'>
                                        <img src='./admin_area/product_images/$product_image3' class='related-product-img' alt='$product_title'>
                                        <div class='related-img-overlay'>
                                            <h5 class='text-white'>$product_title</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    
                    // Related products section
                    echo "<div class='container mb-5'>
                            <h2 class='related-products-title'>Sản Phẩm Liên Quan</h2>
                            <div class='row'>";
                    
                    // Query for related products (same category or brand)
                    $related_query = "SELECT * FROM `products` WHERE 
                                    (category_id=$category_id OR brand_id=$brand_id) AND 
                                    product_id != $product_id LIMIT 3";
                    $related_result = mysqli_query($con, $related_query);
                    
                    while ($related_row = mysqli_fetch_assoc($related_result)) {
                        $rel_product_id = $related_row['product_id'];
                        $rel_product_title = $related_row['product_title'];
                        $rel_product_image = $related_row['product_image1'];
                        $rel_product_price = $related_row['product_price'];
                        $rel_formatted_price = number_format($rel_product_price, 0, ',', '.');
                        
                        echo "<div class='col-md-4 mb-4'>
                                <div class='card'>
                                    <img src='./admin_area/product_images/$rel_product_image' class='card-img-top' alt='$rel_product_title'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$rel_product_title</h5>
                                        <p class='card-text'>Giá: $rel_formatted_price VND</p>
                                        <a href='product_details.php?product_id=$rel_product_id' class='btn btn-info'>Xem Chi Tiết</a>
                                        <a href='index.php?add_to_cart=$rel_product_id' class='btn btn-secondary'>Thêm Vào Giỏ</a>
                                    </div>
                                </div>
                            </div>";
                    }
                    
                    echo "</div>
                        </div>";
                }
            }
        }
    }
}
//get ip address
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();
// echo 'User Real IP Address - ' . $ip;


function cart() {
    if(isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        
        // Check if user is logged in
        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $get_user = "SELECT * FROM user_table WHERE username='$username'";
            $result_user = mysqli_query($con, $get_user);
            $row_user = mysqli_fetch_assoc($result_user);
            $user_id = $row_user['user_id'];
            
            // Check if product is already in cart
            $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add' AND product_id=$get_product_id AND user_id=$user_id";
            $result_query = mysqli_query($con, $select_query);
            
            if(mysqli_num_rows($result_query) > 0) {
                echo "<script>alert('This item is already in your cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            } else {
                $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity, user_id) 
                                VALUES ($get_product_id, '$get_ip_add', 1, $user_id)";
                $result_query = mysqli_query($con, $insert_query);
                echo "<script>alert('Item added to cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        } else {
            // For guest users, continue using IP only
            $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add' AND product_id=$get_product_id AND user_id IS NULL";
            $result_query = mysqli_query($con, $select_query);
            
            if(mysqli_num_rows($result_query) > 0) {
                echo "<script>alert('This item is already in your cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            } else {
                $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) 
                                VALUES ($get_product_id, '$get_ip_add', 1)";
                $result_query = mysqli_query($con, $insert_query);
                echo "<script>alert('Item added to cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    }
}

// cart item 
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();

        $select_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $get_ip_add = getIPAddress();

        $select_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

//total price function

function total_cart_price()
{
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
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}



function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $get_details="Select * from `user_table` where username='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="Select * from `user_orders` where user_id=$user_id and order_status='pending'";
                    $result_orders_query=mysqli_query($con,$get_orders);
                    $row_count=mysqli_num_rows($result_orders_query);
                    if($row_count>0){
    echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span 
    class='text-danger'>$row_count</span> pending orders</h3>
    <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order 
    Details</a></p>";
}else{
    echo "<h3 class='text-center text-success mt-5 mb-2'>You have zero pending orders</
    h3>
    <p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>";
}
                }
            }
        }
    }
}


?>