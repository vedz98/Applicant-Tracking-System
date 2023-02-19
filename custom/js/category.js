var manageCategoryTable;

$(document).ready(function(){

	$("#navCategory").addClass('active');

	manageCategoryTable = $("#manageCategoryTable").DataTable({
		'ajax' : 'php_action/fetchCategory.php',
		'order' : []
	});
});

function editCategories(categoryId = null) {
	if(categoryId) {
		// remove hidden category id text
		$("#categoryId").remove();

		// remove the error
		$(".text-danger").remove();
		// remove the form-error
		$(".form-group").removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-category-result').addClass('div-hide');
		// modal footer

		$.ajax({
			url: 'php_action/fetchSelectedCategory.php',
			type: 'post',
			data: {categoryId : categoryId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-category-result').removeClass('div-hide');

				// category id
				$(".editCategoryFooter").after('<input type="hidden" name="categoryId" id="categoryId" value="'+response.category_id+'" />');

				$("#editpos_id").val(response.pos_id);
				$("#editpers_area").val(response.brand_id);
				$("#editpos_tit").val(response.pos_tit);
				$("#editbudg").val(response.budg);
				$("#editemp_group").val(response.emp_group);
				$("#editemp_sgroup").val(response.emp_sgroup);
				$("#editreg").val(response.reg);
				$("#editloc").val(response.loc);
				$("#editact_type").val(response.act_type);

				// update category form

				$("#editCategoryForm").unbind('submit').bind('submit', function() {


					var pos_id = $("#editpos_id").val();
					var pers_area = $("#editpers_area").val();
					var pos_tit = $("#editpos_tit").val();
					var budg = $("#editbudg").val();
					var emp_group = $("#editemp_group").val();
					var emp_sgroup = $("#editemp_sgroup").val();
					var reg = $("#editreg").val();
					var loc = $("#editloc").val();
					var act_type = $("#editact_type").val();


					if(pos_id == "") {
						$("#editpos_id").after('<p class="text-danger">Category Name field is required</p>');
						$('#editpos_id').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editpos_id").find('.text-danger').remove();
						// success out for form
						$("#editpos_id").closest('.form-group').addClass('has-success');
					}

					if(pers_area == "") {
						$("#editpers_area").after('<p class="text-danger">Category Name field is required</p>');

						$('#editpers_area').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editpers_area").find('.text-danger').remove();
						// success out for form
						$("#editpers_area").closest('.form-group').addClass('has-success');
					}

					if(pos_tit == "") {
						$("#editpos_tit").after('<p class="text-danger">Category Name field is required</p>');

						$('#editpos_tit').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editpos_tit").find('.text-danger').remove();
						// success out for form
						$("#editpos_tit").closest('.form-group').addClass('has-success');
					}
					if(budg == "") {
						$("#editbudg").after('<p class="text-danger">Category Name field is required</p>');
						$('#editbudg').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editbudg").find('.text-danger').remove();
						// success out for form
						$("#editbudg").closest('.form-group').addClass('has-success');
					}

					if(emp_group == "") {
						$("#editemp_group").after('<p class="text-danger">Category Name field is required</p>');

						$('#editemp_group').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editemp_group").find('.text-danger').remove();
						// success out for form
						$("#editemp_group").closest('.form-group').addClass('has-success');
					}

					if(emp_sgroup == "") {
						$("#editemp_sgroup").after('<p class="text-danger">Category Name field is required</p>');

						$('#editemp_sgroup').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editemp_sgroup").find('.text-danger').remove();
						// success out for form
						$("#editemp_sgroup").closest('.form-group').addClass('has-success');
					}
					if(reg == "") {
						$("#editreg").after('<p class="text-danger">Category Name field is required</p>');
						$('#editreg').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editreg").find('.text-danger').remove();
						// success out for form
						$("#editreg").closest('.form-group').addClass('has-success');
					}

					if(loc == "") {
						$("#editloc").after('<p class="text-danger">Category Name field is required</p>');

						$('#editloc').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editloc").find('.text-danger').remove();
						// success out for form
						$("#editloc").closest('.form-group').addClass('has-success');
					}

					if(act_type == "") {
						$("#editact_type").after('<p class="text-danger">Category Name field is required</p>');

						$('#editact_type').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editact_type").find('.text-danger').remove();
						// success out for form
						$("#editact_type").closest('.form-group').addClass('has-success');
					}

					if(pos_id && pers_area && pos_tit && budg && emp_group && emp_sgroup && reg && loc && act_type) {



						// submit btn
						$('#editCategoryBtn').button('loading');

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
									$('#editCategoryBtn').button('reset');

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);

			  	  			$('#edit-category-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert

									// reload the manage member table
									manageCategoryTable.ajax.reload(null, false);
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');

								} // /if

							}// /success
						});	 // /ajax
					} // /if

					return false;
				}); // /update Category form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit Categorys function

function removeCategories(categoryId = null) {
	if(categoryId) {
		$('#removeCategoryId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedCategory.php',
			type: 'post',
			data: {categoryId : categoryId},
			dataType: 'json',
			success:function(response) {
				$('.removeCategoryFooter').after('<input type="hidden" name="removeCategoryId" id="removeCategoryId" value="'+response.category_id+'" /> ');

				// click on remove button to remove the category
				$("#removeCategoryBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeCategoryBtn").button('loading');

					$.ajax({
						url: 'php_action/removeCategory.php',
						type: 'post',
						data: {categoryId : categoryId},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeCategoryBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal
								$('#removeCategoryModal').modal('hide');

								// reload the Category table
								manageCategoryTable.ajax.reload(null, false);

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
					}); // /ajax function to remove the Category

				}); // /click on remove button to remove the Category

			} // /success
		}); // /ajax

		$('.removeCategoryFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove Categories function
