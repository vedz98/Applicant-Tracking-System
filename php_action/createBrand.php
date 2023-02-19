<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$pers_area = $_POST['pers_area'];
	$int_div = $_POST['int_div'];
	$dept = $_POST['dept'];

	$sql = "INSERT INTO brands (pers_area, int_div, dept, brand_active, brand_status) VALUES ('$pers_area', '$int_div', '$dept', 1, 1)";

	if($connect->query($sql) === TRUE) {


					header('location: http://localhost/inventory/brand.php');



	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the brand.";
	}


	$connect->close();

	echo json_encode($valid);

}
