<?php
include('../includes/connect.php');

if(!isset($_SESSION['username'])){
    echo "<script>window.open('user_login.php','_self')</script>";
    exit();
}

// Get user ID
$username = $_SESSION['username'];
$get_user = "SELECT * FROM user_table WHERE username='$username'";
$result_user = mysqli_query($con, $get_user);
$row_user = mysqli_fetch_assoc($result_user);
$user_id = $row_user['user_id'];

// Fetch orders from information_order table
$get_orders = "SELECT * FROM information_order WHERE user_id='$user_id' ORDER BY order_date DESC";
$result_orders = mysqli_query($con, $get_orders);
$order_count = mysqli_num_rows($result_orders);
?>

<h4 class="section-title"><i class="fas fa-info-circle me-2"></i>Order Information</h4>

<?php
if($order_count > 0) {
    ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Username</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Order Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row_orders = mysqli_fetch_assoc($result_orders)) {
                    $order_id = $row_orders['order_id'];
                    $username = $row_orders['username'];
                    $product_title = $row_orders['product_title'];
                    $quantity = $row_orders['quantity'];
                    $amount_due = $row_orders['amount_due'];
                    $order_date = $row_orders['order_date'];
                    $formatted_date = date('d M Y, h:i A', strtotime($order_date));
                    
                    // Get status
                    $status_class = '';
                    $status = '';
                    
                    if(isset($row_orders['order_status'])) {
                        $status = $row_orders['order_status'];
                        if($status == 'Complete' || $status == 'Paid') {
                            $status_class = 'text-success';
                        } elseif($status == 'Pending') {
                            $status_class = 'text-warning';
                        } else {
                            $status_class = 'text-danger';
                        }
                    } else {
                        $status = 'Pending';
                        $status_class = 'text-warning';
                    }
                    
                    echo "<tr>
                            <td>$order_id</td>
                            <td>$username</td>
                            <td>$product_title</td>
                            <td>$quantity</td>
                            <td>" . number_format($amount_due) . " VND</td>
                            <td>$formatted_date</td>
                            <td class='$status_class'>$status</td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
} else {
    echo "<div class='alert alert-info'>
            <i class='fas fa-info-circle me-2'></i> You haven't placed any orders yet.
          </div>";
}
?>