var manageBrandTable;

$(document).ready(function(){

	$("#navBrand").addClass('active');

	manageBrandTable = $("#manageBrandTable").DataTable({
		'ajax' : 'php_action/fetchBrand.php',
		'order' : []

	});
});
function editBrands(brandId = null) {
	if(brandId) {
		// remove hidden brand id text
		$("#brandId").remove();

		// remove the error
		$(".text-danger").remove();
		// remove the form-error
		$(".form-group").removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-brand-result').addClass('div-hide');
		// modal footer

		$.ajax({
			url: 'php_action/fetchSelectedBrand.php',
			type: 'post',
			data: {brandId : brandId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-brand-result').removeClass('div-hide');

				// brand id
				$(".editBrandFooter").after('<input type="hidden" name="brandId" id="brandId" value="'+response.brand_id+'" />');

				// setting the brand name value
				$("#editPersArea").val(response.pers_area);
				// setting the brand status value
				$("#editIntDiv").val(response.int_div);
				$("#editDept").val(response.dept);


				// update brand form

				$("#editBrandForm").unbind('submit').bind('submit', function() {


					var pers_area = $("#editPersArea").val();
					var int_div = $("#editIntDiv").val();
					var dept = $("#editDept").val();

					if(pers_area == "") {
						$("#editPersArea").after('<p class="text-danger">Brand Name field is required</p>');
						$('#editPersArea').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editPersArea").find('.text-danger').remove();
						// success out for form
						$("#editPersArea").closest('.form-group').addClass('has-success');
					}

					if(int_div == "") {
						$("#editIntDiv").after('<p class="text-danger">Brand Name field is required</p>');

						$('#editIntDiv').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editIntDiv").find('.text-danger').remove();
						// success out for form
						$("#editIntDiv").closest('.form-group').addClass('has-success');
					}

					if(dept == "") {
						$("#editDept").after('<p class="text-danger">Brand Name field is required</p>');

						$('#editDept').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editDept").find('.text-danger').remove();
						// success out for form
						$("#editDept").closest('.form-group').addClass('has-success');
					}

					if(pers_area && int_div && dept) {



						// submit btn
						$('#editBrandBtn').button('loading');

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
									$('#editBrandBtn').button('reset');

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);

			  	  			$('#edit-brand-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert

									// reload the manage member table
									manageBrandTable.ajax.reload(null, false);
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');

								} // /if

							}// /success
						});	 // /ajax
					} // /if

					return false;
				}); // /update brand form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit brands function

function removeBrands(brandId = null) {
	if(brandId) {
		$('#removeBrandId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedBrand.php',
			type: 'post',
			data: {brandId : brandId},
			dataType: 'json',
			success:function(response) {
				$('.removeBrandFooter').after('<input type="hidden" name="removeBrandId" id="removeBrandId" value="'+response.brand_id+'" /> ');

				// click on remove button to remove the brand
				$("#removeBrandBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeBrandBtn").button('loading');

					$.ajax({
						url: 'php_action/removeBrand.php',
						type: 'post',
						data: {brandId : brandId},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeBrandBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal
								$('#removeMemberModal').modal('hide');

								// reload the brand table
								manageBrandTable.ajax.reload(null, false);

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
					}); // /ajax function to remove the brand

				}); // /click on remove button to remove the brand

			} // /success
		}); // /ajax

		$('.removeBrandFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove brands function
