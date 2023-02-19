<?php

require_once 'core.php';

$hireId = $_POST['hireId'];

$sql = "SELECT hire_id, h_type, brand_id, category_id, product_id, rec_date, rece_md,
               fin_pos, grade, emp_type, con_end, comp_stats, hr_pic,
               h_active, h_status
        FROM   hiring WHERE hire_id = $hireId";
$result = $connect->query($sql);

if($result->num_rows > 0) {
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);
