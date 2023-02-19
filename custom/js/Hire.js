var manageHireTable;

$(document).ready(function(){

	$("#navHire").addClass('active');

	manageHireTable = $("#manageHireTable").DataTable({
		'ajax' : 'php_action/fetchHire.php',
		'order' : []

	});
});

function editHires(hireId = null) {
	if(hireId) {
		// remove hidden hire id text
		$("#hireId").remove();

		// remove the error
		$(".text-danger").remove();
		// remove the form-error
		$(".form-group").removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-hire-result').addClass('div-hide');
		// modal footer

		$.ajax({
			url: 'php_action/fetchSelectedHire.php',
			type: 'post',
			data: {hireId : hireId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-hire-result').removeClass('div-hide');

				// hire id
				$(".editHireFooter").after('<input type="hidden" name="hireId" id="hireId" value="'+response.hire_id+'" />');

				$("#edit_h_type").val(response.h_type);
				$("#edit_pers_area").val(response.brand_id);
				$("#edit_pos_tit").val(response.category_id);
				$("#edit_cand_name").val(response.product_id);
				$("#edit_rec_date").val(response.rec_date);
				$("#edit_rece_md").val(response.rece_md);
				$("#edit_fin_pos").val(response.fin_pos);
				$("#edit_grade").val(response.grade);
				$("#edit_emp_type").val(response.emp_type);
				$("#edit_con_end").val(response.con_end);
				$("#edit_comp_stats").val(response.comp_stats);
				$("#edit_hr_pic").val(response.hr_pic);


				// update hire form

				$("#editHireForm").unbind('submit').bind('submit', function() {


					var h_type	  = $("#edit_h_type").val();
					var pers_area 	= $("#edit_pers_area").val();
					var pos_tit		  = $("#edit_pos_tit").val();
					var cand_name 				= $("#edit_cand_name").val();
					var rec_date 				= $("#edit_rec_date").val();
					var rece_md 		= $("#edit_rece_md").val();
					var fin_pos 		= $("#edit_fin_pos").val();
					var grade		= $("#edit_grade").val();
					var emp_type	= $("#edit_emp_type").val();
					var con_end	  		= $("#edit_con_end").val();
					var comp_stats		= $("#edit_comp_stats").val();
					var hr_pic	= $("#edit_hr_pic").val();



					if(h_type == "") {
						$("#edit_h_type").after('<p class="text-danger">Input Name field is required</p>');
						$('#edit_h_type').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#edit_h_type").find('.text-danger').remove();
						// success out for form
						$("#edit_h_type").closest('.form-group').addClass('has-success');
					}

					if(pers_area == "") {
						$("#edit_pers_area").after('<p class="text-danger">Input Name field is required</p>');

						$('#edit_pers_area').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#edit_pers_area").find('.text-danger').remove();
						// success out for form
						$("#edit_pers_area").closest('.form-group').addClass('has-success');
					}

					if(pos_tit == "") {
						$("#edit_pos_tit").after('<p class="text-danger">Input Name field is required</p>');

						$('#edit_pos_tit').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#edit_pos_tit").find('.text-danger').remove();
						// success out for form
						$("#edit_pos_tit").closest('.form-group').addClass('has-success');
					}
					if(cand_name == "") {
						$("#edit_cand_name").after('<p class="text-danger">Input Name field is required</p>');
						$('#edit_cand_name').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#edit_cand_name").find('.text-danger').remove();
						// success out for form
						$("#edit_cand_name").closest('.form-group').addClass('has-success');
					}

					if(rec_date == "") {
						$("#edit_rec_date").after('<p class="text-danger">Input Name field is required</p>');

						$('#edit_rec_date').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#edit_rec_date").find('.text-danger').remove();
						// success out for form
						$("#edit_rec_date").closest('.form-group').addClass('has-success');
					}

					if(rece_md == "") {
						$("#edit_rece_md").after('<p class="text-danger">Input Name field is required</p>');

						$('#edit_rece_md').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#edit_rece_md").find('.text-danger').remove();
						// success out for form
						$("#edit_rece_md").closest('.form-group').addClass('has-success');
					}
					if(fin_pos == "") {
						$("#edit_fin_pos").after('<p class="text-danger">Input Name field is required</p>');
						$('#edit_fin_pos').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#edit_fin_pos").find('.text-danger').remove();
						// success out for form
						$("#edit_fin_pos").closest('.form-group').addClass('has-success');
					}

					if(grade == "") {
						$("#edit_grade").after('<p class="text-danger">Input Name field is required</p>');

						$('#edit_grade').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#edit_grade").find('.text-danger').remove();
						// success out for form
						$("#edit_grade").closest('.form-group').addClass('has-success');
					}

					if(emp_type == "") {
						$("#edit_emp_type").after('<p class="text-danger">Input Name field is required</p>');

						$('#edit_emp_type').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#edit_emp_type").find('.text-danger').remove();
						// success out for form
						$("#edit_emp_type").closest('.form-group').addClass('has-success');
					}

					if(con_end == "") {
						$("#edit_con_end").after('<p class="text-danger">Input Name field is required</p>');

						$('#edit_con_end').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#edit_con_end").find('.text-danger').remove();
						// success out for form
						$("#edit_con_end").closest('.form-group').addClass('has-success');
					}

					if(comp_stats == "") {
						$("#edit_comp_stats").after('<p class="text-danger">Input Name field is required</p>');

						$('#edit_comp_stats').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#edit_comp_stats").find('.text-danger').remove();
						// success out for form
						$("#edit_comp_stats").closest('.form-group').addClass('has-success');
					}

					if(hr_pic == "") {
						$("#edit_hr_pic").after('<p class="text-danger">Input Name field is required</p>');

						$('#edit_hr_pic').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#edit_hr_pic").find('.text-danger').remove();
						// success out for form
						$("#edit_hr_pic").closest('.form-group').addClass('has-success');
					}

					if(h_type && pers_area && pos_tit && cand_name && rec_date && rece_md && fin_pos && grade && emp_type && con_end && comp_stats && hr_pic) {

						// submit btn
						$('#editHireBtn').button('loading');

						var form = $(this);
						var formData = new FormData(this);


						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: formData,
							dataType: 'json',
							cache: false,
							contentType: false,
							processData: false,
							success:function(response) {
								console.log(response);
								if(response.success == true) {

									// submit btn
									$('#editHireBtn').button('reset');

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);

			  	  			$('#edit-hire-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert

									// reload the manage member table
									manageHireTable.ajax.reload(null, false);
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');

								} // /if

							}// /success
						});	 // /ajax
					} // /if

					return false;
				}); // /update Hire form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit Hires function

function removeHires(hireId = null) {
	if(hireId) {
		$('#removeHireId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedHire.php',
			type: 'post',
			data: {hireId : hireId},
			dataType: 'json',
			success:function(response) {
				$('.removeHireFooter').after('<input type="hidden" name="removeHireId" id="removeHireId" value="'+response.hire_id+'" /> ');

				// click on remove button to remove the hire
				$("#removeHireBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeHireBtn").button('loading');

					$.ajax({
						url: 'php_action/removeHire.php',
						type: 'post',
						data: {hireId : hireId},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeHireBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal
								$('#removeHireModal').modal('hide');

								// reload the hire table
								manageHireTable.ajax.reload(null, false);

								$('.remove-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
							} else {

							} // /else
						} // /response messages
					}); // /ajax function to remove the Hire

				}); // /click on remove button to remove the Hire

			} // /success
		}); // /ajax

		$('.removeHireFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove Hires function
