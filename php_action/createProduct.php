<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$cand_name = $_POST['cand_name'];
	$brand_id = $_POST['pers_area'];
	$category_id = $_POST['pos_tit'];
	$med = $_POST['med'];
	$vana = $_POST['vana'];
	$date_md = $_POST['date_md'];
	$date_hr = $_POST['date_hr'];
	$date_cand = $_POST['date_cand'];
	$date_cand2 = $_POST['date_cand2'];
	$rema = $_POST['rema'];




	$sql = "INSERT INTO product (cand_name, brand_id, category_id, med, vana, date_md, date_hr, date_cand , date_cand2, rema, active, status)
					VALUES 							('$cand_name', '$brand_id', '$category_id', '$med', '$vana', '$date_md', '$date_hr', '$date_cand', '$date_cand2', '$rema', '$active', 1)";

	if($connect->query($sql) === TRUE) {


					header('location: http://localhost/inventory/product.php');



	} else {
	 	echo "Failed!";
	}


	$connect->close();

	echo json_encode($valid);

}
