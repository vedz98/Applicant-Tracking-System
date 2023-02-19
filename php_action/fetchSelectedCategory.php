<?php

require_once 'core.php';

$categoryId = $_POST['categoryId'];

$sql = "SELECT category_id, pos_id, brand_id, pos_tit, budg, emp_group, emp_sgroup, reg, loc, act_type, 
               category_active, category_status
        FROM   category WHERE category_id = $categoryId";
$result = $connect->query($sql);

if($result->num_rows > 0) {
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);
