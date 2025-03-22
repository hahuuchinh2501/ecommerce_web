<h3 class="text-center text-success">Pending Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>order_id</th>
            <th>user_id</th>
            <th>invoice_number</th>
            <th>product_id</th>
            <th>quantity</th>
            <th>order_status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $get_orders = "SELECT * FROM `user_orders` WHERE order_status='pending'";
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);
        
        if ($row_count == 0) {
            echo "<tr><td colspan='6'><h2 class='text-danger text-center mt-3'>No pending orders</h2></td></tr>";
        } else {
            while ($row_data = mysqli_fetch_assoc($result)) {
                $order_id = $row_data['order_id'];
                $user_id = $row_data['user_id'];
                $invoice_number = $row_data['invoice_number'];
                $product_id = $row_data['product_id'];
                $quantity = $row_data['quantity'];
                $order_status = $row_data['order_status'];
                
                echo "<tr>
                    <td>$order_id</td>
                    <td>$user_id</td>
                    <td>$invoice_number</td>
                    <td>$product_id</td>
                    <td>$quantity</td>
                    <td>$order_status</td>
                     <td><a href='index.php?delete_order_pending=$order_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
            }
        }
        ?>
    </tbody>
</table>