<?php require_once 'includes/header.php'; ?>

<div style="background-color: transparent;margin:0px;padding:0px;border-radius:0px;" class="jumbotron">

<p style="color: #000000;">Summary</p>
<div class="row">
<div class="col-sm-4" id="totalBrands">
<div class="card">
<div class="card-body">
<h5 class="card-title">Number of Candidates</h5>
<h2 class="card-text" style="text-align: center;">
<?php
$totalBrands = "SELECT COUNT(product_id) FROM product WHERE status=1";
$totalBrandsResult = $connect->query($totalBrands);
$totalBrandsResultRow = $totalBrandsResult->fetch_array();
echo $totalBrandsResultRow[0];
?>
</h2>
</div>
</div>
</div>


<div class="col-sm-4" id="totalCategories">
<div class="card">
<div class="card-body">
<h5 class="card-title">Number of Positions</h5>
<h2 class="card-text" style="text-align: center;">
<?php
$totalCategories = "SELECT COUNT(category_id) FROM category WHERE category_active=1";
$totalCategoriesResult = $connect->query($totalCategories);
$totalCategoriesResultRow = $totalCategoriesResult->fetch_array();
echo $totalCategoriesResultRow[0];
?>
</h2>
</div>
</div>
</div>


<div class="col-sm-4" id="totalProducts">
<div class="card">
<div class="card-body">
<h5 class="card-title">Number of Companies</h5>
<h2 class="card-text" style="text-align: center;">
<?php
$totalProducts = "SELECT COUNT(brand_id) FROM brands WHERE brand_status = 1";
$totalProductsResult = $connect->query($totalProducts);
$totalProductsResultRow = $totalProductsResult->fetch_array();
echo $totalProductsResultRow[0];
?>
</h2>
</div>
</div>
</div>
</div>

<div class="row" id="rowSeperator">
<div class="col-sm-4" id="totalOrders">
<div class="card">
<div class="card-body">
<h5 class="card-title">Number of Hiring Processes</h5>
<h2 class="card-text" style="text-align: center;">
<?php
$totalOrders = "SELECT COUNT(hire_id) FROM hiring";
$totalOrdersResult = $connect->query($totalOrders);
$totalOrdersResultRow = $totalOrdersResult->fetch_array();
echo $totalOrdersResultRow[0];
?>
</h2>
</div>
</div>
</div>
</div>
<!--
<div class="col-sm-6" id="totalSales">
<div class="card">
<div class="card-body">
<h3 class="card-title">Total Warehouse Dispatch (MYR.)</h3>
<h1 class="card-text" style="text-align: center;overflow: hidden;width: 97%;">
<?php
$totalAmount = "SELECT SUM(rate) FROM product";
$totalAmountResult = $connect->query($totalAmount);
$totalAmountResultRow = $totalAmountResult->fetch_array();
$ta = $totalAmountResultRow[0];
echo $ta;
?>
</h1>
</div>
</div>
</div>


<div class="col-sm-6" id="totalCollected">
<div class="card">
<div class="card-body">
<h3 class="card-title">Total Accumulated Value (X Factory)</h3>
<h1 class="card-text" style="text-align: center;overflow: hidden;width: 97%;">
<?php
$totalCost = "SELECT SUM(total_cost) FROM product";
$totalCostResult = $connect->query($totalCost);
$totalCostResultRow = $totalCostResult->fetch_array();
$tc = $totalCostResultRow[0];
echo $tc;
?>
</h1>
</div>
</div>
</div>
</div>


<div class="row" id="rowSeperator">
<div class="col-sm-4" id="totalCustomers">
<div class="card">
<div class="card-body">
<h5 class="card-title">Number of Request(s)</h5>
<h2 class="card-text" style="text-align: center;">
<?php
$totalCustomers = "SELECT COUNT( DISTINCT(client_name)) FROM orders";
$totalCustomersResult = $connect->query($totalCustomers);
$totalCustomersResultRow = $totalCustomersResult->fetch_array();
echo $totalCustomersResultRow[0];
?>
</h2>
</div>
</div>
</div>-->





<!--<div class="col-sm-4" id="totalDue">
<div class="card">
<div class="card-body">
<h5 class="card-title">Total Number of Items in Warehouse</h5>
<h2 class="card-text" style="text-align: center;"><?php
$totalProd = "SELECT SUM(quantity) FROM product";
$totalProdResult = $connect->query($totalProd);
$totalProdResultRow = $totalProdResult->fetch_array();
$tp = $totalProdResultRow[0];
echo $tp; ?></h2>
</div>
</div>
</div>
</div> -->

</div><!-- /jumbotron -->


<?php require_once 'includes/footer.php'; ?>
