<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$productId = $_POST['productId'];
	$cand_name = $_POST['editcand_name'];
	$pers_area = $_POST['editpers_area'];
	$pos_tit = $_POST['editpos_tit'];
	$med = $_POST['editmed'];
	$vana = $_POST['editvana'];
	$date_md = $_POST['editdate_md'];
	$date_hr = $_POST['editdate_hr'];
	$date_cand = $_POST['editdate_cand'];
	$date_cand2 = $_POST['editdate_cand2'];
	$rema = $_POST['editrema'];


	$sql = "UPDATE product SET cand_name = '$cand_name', brand_id = '$pers_area', category_id = '$pos_tit', med = '$med',
															vana = '$vana', date_md = '$date_md', date_hr = '$date_hr',
															date_cand = '$date_cand',  date_cand2 = '$date_cand2', rema = '$rema', active = 1, status = 1
					WHERE  product_id = $productId";

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
