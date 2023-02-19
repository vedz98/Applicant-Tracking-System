<?php

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$hireId = $_POST['hireId'];

if($hireId) {

	$sql = "DELETE from hiring where hire_id = '$hireId'";

	if($connect->query($sql) === TRUE) {
	 $valid['success'] = true;
	 $valid['messages'] = "Successfully Removed";
	} else {
	 $valid['success'] = false;
	 $valid['messages'] = "Error while remove the hire";
	}

	$connect->close();

	echo json_encode($valid);

	} // /if $_POST
