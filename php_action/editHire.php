<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$hireId = $_POST['hireId'];
	$h_type = $_POST['edit_h_type'];
	$pers_area = $_POST['edit_pers_area'];
	$pos_tit = $_POST['edit_pos_tit'];
  $cand_name = $_POST['edit_cand_name'];
  $rec_date = $_POST['edit_rec_date'];
	$rece_md = $_POST['edit_rece_md'];
	$fin_pos = $_POST['edit_fin_pos'];
	$grade = $_POST['edit_grade'];
	$emp_type = $_POST['edit_emp_type'];
	$con_end = $_POST['edit_con_end'];
	$comp_stats = $_POST['edit_comp_stats'];
  $hr_pic = $_POST['edit_hr_pic'];

	$sql = "UPDATE hiring SET h_type = '$h_type',
                            brand_id = '$pers_area',
                            category_id = '$pos_tit',
                            product_id = '$cand_name',
														rec_date = '$rec_date',
                            rece_md = '$rece_md',
                            fin_pos = '$fin_pos',
                            grade = '$grade',
                            emp_type = '$emp_type',
														con_end = '$con_end',
                            comp_stats = '$comp_stats',
                            hr_pic = '$hr_pic',
                            h_active = 1, h_status = 1
					WHERE  hire_id = $hireId";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating hire info";
	}
}
$connect->close();

echo json_encode($valid);
