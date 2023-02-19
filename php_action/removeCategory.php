<?php

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$categoryId = $_POST['categoryId'];

if($categoryId) {

	$sql = "DELETE FROM category WHERE category_id = '$categoryId'";

	if($connect->query($sql) === TRUE) {
	 $valid['success'] = true;
	 $valid['messages'] = "Successfully Removed";
	} else {
	 $valid['success'] = false;
	 $valid['messages'] = "Error while remove the category";
	}

	$connect->close();

	echo json_encode($valid);

	} // /if $_POST
