<?php

require_once 'core.php';

$sql = "SELECT 	hiring.hire_id, hiring.h_type, brands.pers_area,
    	category.pos_tit, product.cand_name, hiring.fin_pos,
   	 	hiring.grade, hiring.emp_type, hiring.con_end,
  	  	hiring.comp_stats, hiring.hr_pic, hiring.h_active, hiring.h_status
 	    FROM hiring
		INNER JOIN brands ON hiring.brand_id = brands.brand_id
		INNER JOIN category ON hiring.category_id = category.category_id
    INNER JOIN product ON hiring.product_id = product.product_id";


$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) {

$activeHire = "";

 while($row = $result->fetch_array()) {
 	$hireId = $row[0];


	$brand = $row[2];
	$category = $row[3];
  $product = $row[4];
  $active = $row[11];

  $button = '<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a type="button" data-toggle="modal" id="editHireModelBtn" data-target="#editHireModel" onclick="editHires('.$hireId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
    <li><a type="button" data-toggle="modal" id="removeHireModalBtn" data-target="#removeHireModal" onclick="removeHires('.$hireId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>
  </ul>
</div>';

 	$output['data'][] = array(

    $row[1],
    $brand,
    $category,
    $product,
    $row[5],


    $row[8],
    $row[9],
    $row[10],

    $button,


 		);
 }
}

$connect->close();

echo json_encode($output);
