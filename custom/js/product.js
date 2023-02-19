var manageProductTable;

$(document).ready(function(){

	$("#navProduct").addClass('active');

	manageProductTable = $("#manageProductTable").DataTable({
		'ajax' : 'php_action/fetchProduct.php',
		'order' : []
	});
});


function editProducts(productId = null) {
	if(productId) {
		// remove hidden product id text
		$("#productId").remove();

		// remove the error
		$(".text-danger").remove();
		// remove the form-error
		$(".form-group").removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-product-result').addClass('div-hide');
		// modal footer

		$.ajax({
			url: 'php_action/fetchSelectedProduct.php',
			type: 'post',
			data: {productId : productId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-product-result').removeClass('div-hide');

				// product id
				$(".editProductFooter").after('<input type="hidden" name="productId" id="productId" value="'+response.product_id+'" />');

				$("#editcand_name").val(response.cand_name);
				$("#editpers_area").val(response.brand_id);
				$("#editpos_tit").val(response.category_id);
				$("#editmed").val(response.med);
				$("#editvana").val(response.vana);
				$("#editdate_md").val(response.date_md);
				$("#editdate_hr").val(response.date_hr);
				$("#editdate_cand").val(response.date_cand);
				$("#editdate_cand2").val(response.date_cand2);
				$("#editrema").val(response.rema);


				// update product form

				$("#editProductForm").unbind('submit').bind('submit', function() {


					var cand_name	  = $("#editcand_name").val();
					var pers_area 	= $("#editpers_area").val();
					var pos_tit		  = $("#editpos_tit").val();
					var med 				= $("#editmed").val();
					var vana 				= $("#editvana").val();
					var date_md 		= $("#editdate_md").val();
					var date_hr 		= $("#editdate_hr").val();
					var date_cand		= $("#editdate_cand").val();
					var date_cand2	= $("#editdate_cand2").val();
					var rema	  		= $("#editrema").val();



					if(cand_name == "") {
						$("#editcand_name").after('<p class="text-danger">Input Name field is required</p>');
						$('#editcand_name').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editcand_name").find('.text-danger').remove();
						// success out for form
						$("#editcand_name").closest('.form-group').addClass('has-success');
					}

					if(pers_area == "") {
						$("#editpers_area").after('<p class="text-danger">Input Name field is required</p>');

						$('#editpers_area').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editpers_area").find('.text-danger').remove();
						// success out for form
						$("#editpers_area").closest('.form-group').addClass('has-success');
					}

					if(pos_tit == "") {
						$("#editpos_tit").after('<p class="text-danger">Input Name field is required</p>');

						$('#editpos_tit').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editpos_tit").find('.text-danger').remove();
						// success out for form
						$("#editpos_tit").closest('.form-group').addClass('has-success');
					}
					if(med == "") {
						$("#editmed").after('<p class="text-danger">Input Name field is required</p>');
						$('#editmed').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editmed").find('.text-danger').remove();
						// success out for form
						$("#editmed").closest('.form-group').addClass('has-success');
					}

					if(vana == "") {
						$("#editvana").after('<p class="text-danger">Input Name field is required</p>');

						$('#editvana').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editvana").find('.text-danger').remove();
						// success out for form
						$("#editvana").closest('.form-group').addClass('has-success');
					}

					if(date_md == "") {
						$("#editdate_md").after('<p class="text-danger">Input Name field is required</p>');

						$('#editdate_md').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editdate_md").find('.text-danger').remove();
						// success out for form
						$("#editdate_md").closest('.form-group').addClass('has-success');
					}
					if(date_hr == "") {
						$("#editdate_hr").after('<p class="text-danger">Input Name field is required</p>');
						$('#editdate_hr').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editdate_hr").find('.text-danger').remove();
						// success out for form
						$("#editdate_hr").closest('.form-group').addClass('has-success');
					}

					if(date_cand == "") {
						$("#editdate_cand").after('<p class="text-danger">Input Name field is required</p>');

						$('#editdate_cand').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editdate_cand").find('.text-danger').remove();
						// success out for form
						$("#editdate_cand").closest('.form-group').addClass('has-success');
					}

					if(date_cand2 == "") {
						$("#editdate_cand2").after('<p class="text-danger">Input Name field is required</p>');

						$('#editdate_cand2').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editdate_cand2").find('.text-danger').remove();
						// success out for form
						$("#editdate_cand2").closest('.form-group').addClass('has-success');
					}

					if(rema == "") {
						$("#editrema").after('<p class="text-danger">Input Name field is required</p>');

						$('#editrema').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editrema").find('.text-danger').remove();
						// success out for form
						$("#editrema").closest('.form-group').addClass('has-success');
					}

					if(cand_name && pers_area && pos_tit && med && vana && date_md && date_hr && date_cand && date_cand2 && rema) {

						// submit btn
						$('#editProductBtn').button('loading');

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
									$('#editProductBtn').button('reset');

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);

			  	  			$('#edit-product-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert

									// reload the manage member table
									manageProductTable.ajax.reload(null, false);
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');

								} // /if

							}// /success
						});	 // /ajax
					} // /if

					return false;
				}); // /update Product form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit Products function

function removeProducts(productId = null) {
	if(productId) {
		$('#removeProductId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedProduct.php',
			type: 'post',
			data: {productId : productId},
			dataType: 'json',
			success:function(response) {
				$('.removeProductFooter').after('<input type="hidden" name="removeProductId" id="removeProductId" value="'+response.product_id+'" /> ');

				// click on remove button to remove the product
				$("#removeProductBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeProductBtn").button('loading');

					$.ajax({
						url: 'php_action/removeProduct.php',
						type: 'post',
						data: {productId : productId},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeProductBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal
								$('#removeProductModal').modal('hide');

								// reload the Product table
								manageProductTable.ajax.reload(null, false);

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
					}); // /ajax function to remove the Product

				}); // /click on remove button to remove the Product

			} // /success
		}); // /ajax

		$('.removeProductFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove Products function
