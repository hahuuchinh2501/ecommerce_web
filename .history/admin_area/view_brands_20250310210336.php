<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Slno</th>
            <th>brands title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
$select_cat = "SELECT * FROM brands";
$result = mysqli_query($con, $select_cat);
$number = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $brand_id = $row['brand_id'];
    $brand_title = $row['brand_title'];
    $number++;
    ?>
    <tr class="text-center">
        <td><?php echo $number; ?></td>
        <td><?php echo $brand_title; ?></td>
        <td><a href="index.php?edit_brands=<?php echo $brand_id ?>" class="text-dark"><i class="fa-solid fa-pen-to-square"></i></a></td>
        <td><a href="index.php?delete_brands=<?php echo $brand_id ?>" class="text-dark"><i class="fa-solid fa-trash"></i></a></td>
    </tr>
    <?php
}
?>
    </tbody>
</table>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>