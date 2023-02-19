<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$brandId = $_POST['brandId'];
	$pers_area = $_POST['editPersArea'];
	$int_div = $_POST['editIntDiv'];
	$dept = $_POST['editDept'];


	$sql = "UPDATE brands SET pers_area = '$pers_area', int_div = '$int_div', dept = '$dept',
	brand_active = 1, brand_status = 1
	WHERE brand_id = $brandId";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}
}
$connect->close();

echo json_encode($valid);
