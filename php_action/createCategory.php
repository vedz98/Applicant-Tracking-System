<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$pos_id = $_POST['pos_id'];
	$pos_tit = $_POST['pos_tit'];
	$budg = $_POST['budg'];
	$brand_id = $_POST['pers_area'];
	$emp_group = $_POST['emp_group'];
	$emp_sgroup = $_POST['emp_sgroup'];

	$reg = $_POST['reg'];
	$loc = $_POST['loc'];
	$act_type = $_POST['act_type'];


	$sql = "INSERT INTO category (pos_id, pos_tit, budg, brand_id,
																emp_group, emp_sgroup, reg, loc, act_type, category_active, category_status)
					VALUES     						('$pos_id', '$pos_tit', '$budg', '$brand_id',
																'$emp_group', '$emp_sgroup', '$reg', '$loc', '$act_type', 1, 1)";

	if($connect->query($sql) === TRUE) {


			header('location: http://localhost/inventory/category.php');



	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the category.";
	}


	$connect->close();

	echo json_encode($valid);

}
