<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
        $get_users = "Select * from `user_table`";
        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);
        


            if ($row_count == 0) {
    echo "<h2 class='text-danger text-center mt-5'>No payment</h2>";
} else {
    echo "<tr>
                <th>SL</th>
                
                <th>username</th>
                <th>user email</th>
                <th>user image</th>
                <th>user address</th>
                <th>user mobile</th>
                <th>Delete</th>
            </tr>";
    $number = 0;
while ($row_data = mysqli_fetch_assoc($result)) {
    $order_id = $row_data['order_id'];
    $payment_id = $row_data['payment_id'];
    $amount = $row_data['amount'];
    $invoice_number = $row_data['invoice_number'];
    $payment_mode = $row_data['payment_mode'];
    $date = $row_data['date'];
    $number++;

    echo "<tr>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$date</td>
             <td><a href='index.php?delete_payment=$payment_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
          </tr>";
}
}

        ?>
    </thead>
        </tbody>
</table>