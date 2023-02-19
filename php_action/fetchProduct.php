<?php

require_once 'core.php';

$sql = "SELECT 	product.product_id, product.cand_name, brands.pers_area,
    	category.pos_tit, product.med, product.vana, product.date_md,
   	 	product.date_hr, product.date_cand, product.date_cand2,
  	  	product.rema, product.active, product.status
 	    FROM product
		INNER JOIN brands ON product.brand_id = brands.brand_id
		INNER JOIN category ON product.category_id = category.category_id";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) {

$activeProduct = "";

 while($row = $result->fetch_array()) {
 	$productId = $row[0];


	$brand = $row[2];
	$category = $row[3];
  $active = $row[11];

  $button = '<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a type="button" data-toggle="modal" id="editProductModelBtn" data-target="#editProductModel" onclick="editProducts('.$productId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
    <li><a type="button" data-toggle="modal" id="removeProductModalBtn" data-target="#removeProductModal" onclick="removeProducts('.$productId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>
  </ul>
</div>';

 	$output['data'][] = array(
 		$row[1],
    $brand,
    $category,
    $row[4],
    $row[5],

    $button,

 		);
 }
}

$connect->close();

echo json_encode($output);
