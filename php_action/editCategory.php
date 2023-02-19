<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$categoryId = $_POST['categoryId'];
	$pos_id = $_POST['editpos_id'];
	$pers_area = $_POST['editpers_area'];
	$pos_tit = $_POST['editpos_tit'];
	$budg = $_POST['editbudg'];
	$emp_group = $_POST['editemp_group'];
	$emp_sgroup = $_POST['editemp_sgroup'];
	$reg = $_POST['editreg'];
	$loc = $_POST['editloc'];
	$act_type = $_POST['editact_type'];

	$sql = "UPDATE category SET pos_id = '$pos_id', brand_id = '$pers_area', pos_tit = '$pos_tit', budg = '$budg',
															emp_group = '$emp_group', emp_sgroup = '$emp_sgroup', reg = '$reg',
															loc = '$loc',  act_type = '$act_type', category_active = 1, category_status = 1
					WHERE  category_id = $categoryId";

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
