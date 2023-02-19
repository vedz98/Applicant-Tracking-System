<?php require_once 'includes/header.php'; ?>

<?php
if($_POST) {
      $product_id = $_POST["product_id"];

      $result = "SELECT * FROM product WHERE product_id = '$product_id'";
      $resultConn = $connect->query($result);
      $row = $resultConn->fetch_array();
}
?>


<div class="row">
  <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">Edit Employee</div>
          <div class="panel-body">
            <div class="addOrderMessages"></div>

<div class="okay">
<form class="form-inline" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  <div class="form-group">
    <input type="text" class="form-control" id="product_id" name="product_id" placeholder="Enter Employee ID">
  </div>
  <button type="submit" class="btn btn-primary">Extract details</button>
</form>
</div>


    <form class="form-horizontal" id="submitOrderForm" action="php_action/editProduct.php" method="POST">
    <div style="display:none;" class="form-group">
    <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $row['product_id'];?>">
  </div>
    <h4>Edit Employee</h4><hr style="margin-top: 10px;">

    <div class="form-group">
  <label class="control-label col-sm-2" for="productName">Employee Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Employee Name" value="<?php echo $row['name'];?>" required>
    </div>
  </div>


   <div class="form-group">
    <label class="control-label col-sm-2" for="division">Division:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="division" name="division" placeholder="Division"  value="<?php echo $row['division'];?>" required>
    </div>
  </div>


    <div class="form-group">
    <label class="control-label col-sm-2" for="startDate">Start Date:</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Start Date" value="<?php echo $row['startDate'];?>" required>
    </div>
  </div>

  <div class="form-group">
  <label class="control-label col-sm-2" for="endDate">End Date:</label>
  <div class="col-sm-10">
    <input type="date" class="form-control" id="endDate" name="endDate" placeholder="End Date" value="<?php echo $row['endDate'];?>" required>
  </div>
  </div>

  <div class="form-group">
   <label class="control-label col-sm-2" for="location">Location:</label>
   <div class="col-sm-10">
     <input type="text" class="form-control" id="location" name="location" placeholder="location"  value="<?php echo $row['location'];?>" required>
   </div>
  </div>


<button style="margin: 30px 0 30px 0;float:left;" type="submit" class="btn btn-success">Update Employee Detail</button>
</form>


      </div>
    </div>
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>
