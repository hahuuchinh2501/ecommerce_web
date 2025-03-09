<h3 class="text-center text-success">All products</h3>
<table class="table table-bordered mt-5">
  <thead class="bg-info">
    <tr>
      <th>Product ID</th>
      <th>Product Title</th>
      <th>Product Image</th>
      <th>Product Price</th>
      <th>Total Sold</th>
      <th>Status</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody class="bg-secondary text-light">
   <?php
$get_products="Select * from `products`";
$result=mysqli_query($con,$get_products);
$number=0;
while($row=mysqli_fetch_assoc($result)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $status=$row['status'];
    $number++;
    echo "<tr class='text-center'>
        <td>$number</td>
        <td>$product_title</td>
        <td><img src='./product_images/$product_image1' class='product_img'/></td>
        <td>$product_price/-</td>
        <td>0</td>
        <td>$status</td>
        <td><a href='' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
    </tr>
    ";
}
?>
  </tbody>
</table>