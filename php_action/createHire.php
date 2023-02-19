<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$h_type = $_POST['h_type'];
	$brand_id = $_POST['pers_area'];
	$category_id = $_POST['pos_tit'];
  $product_id = $_POST['cand_name'];
	$rec_date = $_POST['rec_date'];
	$rece_md = $_POST['rece_md'];
	$fin_pos = $_POST['fin_pos'];
	$grade = $_POST['grade'];
	$emp_type = $_POST['emp_type'];
	$con_end = $_POST['con_end'];
  $comp_stats = $_POST['comp_stats'];
	$hr_pic = $_POST['hr_pic'];



	$sql = "INSERT INTO hiring (h_type, brand_id, category_id, product_id, rec_date, rece_md, fin_pos, grade, emp_type , con_end, comp_stats, hr_pic, h_active, h_status)
					VALUES 							('$h_type', '$brand_id', '$category_id', '$product_id', '$rec_date', '$rece_md', '$fin_pos', '$grade', '$emp_type', '$con_end', '$comp_stats', '$hr_pic', 1, 1)";

	if($connect->query($sql) === TRUE) {


					header('location: http://localhost/inventory/addhire.php');



	} else {
	 	echo "Failed!";
	}


	$connect->close();

	echo json_encode($valid);

}
