<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$username = $_SESSION['username'];
$get_user = "Select * from user_table where username='$username'";
$result = mysqli_query($con, $get_user);
$row_fetch = mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];
// echo $user_id;
?>
    <h3 class="text-success"> all my Orders</h3>
    <table class="table table-bordered mt-5" >
        <thead class="bg-info">
             <tr>
        <th>Sl no</th>
        <th>Amount Due</th>
        <th>Total products</th>
        <th>Invoice number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
    </tr>
        </thead>
        <tbody>
    <tr>
        <td>1</td>
        <td>100</td>
        <td>3</td>
        <td>121132</td>
        <td>21212</td>
        <td>Complete</td>
        <td>Confirm</td>
    </tr>
</tbody>
    </table>
</body>
</html>