<?php

require_once 'core.php';

$sql = "SELECT category.category_id, category.pos_id, brands.pers_area,category.pos_tit, category.budg,
               category.emp_group, category.emp_sgroup, category.loc,
               category.act_type, category.category_active, category.category_status
        FROM category
        INNER JOIN brands ON category.brand_id = brands.brand_id";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) {

$activeCategory="";

 while($row = $result->fetch_array()) {
 	$categoryId = $row[0];
  $brand = $row[9];
  $active = $row[10];

  $button = '<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a type="button" data-toggle="modal" id="editCategoryModelBtn" data-target="#editCategoryModel" onclick="editCategories('.$categoryId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
    <li><a type="button" data-toggle="modal" id="removeCategoryModalBtn" data-target="#removeCategoryModal" onclick="removeCategories('.$categoryId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>
  </ul>
</div>';

 	$output['data'][] = array(
 		$row[1],
    $row[2],
    $row[3],
    $row[4],
    $row[5],
    $row[6],




    $button,



 		);
 }

}
$connect->close();

echo json_encode($output);
