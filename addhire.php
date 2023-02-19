<?php require_once 'includes/header.php'; ?>

<style type="text/css">
  .container{
    width:100%;
  }
</style>

<div class="row">
  <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">Manage Hiring</div>
        <div class="panel-body">
          <div class="div-action"">
            <button class="btn btn-success" data-toggle="modal" data-target="#addHireModal">Add Employee</button>
          </div>

          <table class="tables" id="manageHireTable" style="width:90%;">
            <thead>
              <tr>


                <th style="text-align: left;">Hiring Type</th>
								<th style="text-align: left;">Company</th>
								<th style="text-align: left;">Position Title</th>
								<th style="text-align: left;">Candidate Name</th>

                <th style="text-align: left;">Final Position Title</th>
                <th style="text-align: left;">Contract End Date</th>
                <th style="text-align: left;">Completion Status</th>
                <th style="text-align: left;">HR PIC</th>
                <th style="text-align: left;">Action</th>




                <!--<th style="text-align: center;">Status</th>-->

              </tr>
            </thead>
            <?PHP

            $query = "SELECT * FROM s"


            ?>


          </table>


        </div>
    </div>


  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="addHireModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

  <form class="form-horizontal" id="submitHireForm" action="php_action/createHire.php" method="POST">
      <div class="modal-body">
        <div id="add-Hire-messages"></div>

				<div class="form-group">
					<label class="control-label col-sm-3" for="h_type" required>Hiring Type:</label>
					<div class="col-sm-9">
						<select class="form-control" id="h_type" name="h_type">
							<option value="">---Select---</option>
							<option value="External Hiring">External Hiring</option>
							<option value="Internal Movement">Internal Movement</option>
							<option value="Transfer">Transfer</option>

						</select>

					</div>
					</div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="pers_area" required>Personnel Area:</label>
            <div class="col-sm-9">
              <select class="form-control" id="pers_area" name="pers_area">
                <option value="">---Select---</option>
                <?php
                $sql = "SELECT brand_id, pers_area FROM brands WHERE brand_status = 1 AND brand_active = 1";
                $result = $connect->query($sql);
                while ($row = $result->fetch_array()){
                  echo "<option value='".$row[0]."'>".$row[1]."</option>";
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
              <label class="control-label col-sm-3" for="pos_tit" required>Position Title:</label>
              <div class="col-sm-9">
                <select class="form-control" id="pos_tit" name="pos_tit">
                  <option value="">---Select---</option>
                  <?php
                  $sql = "SELECT category_id, pos_tit FROM category WHERE category_status = 1 AND category_active = 1";
                  $result = $connect->query($sql);
                  while ($row = $result->fetch_array()){
                    echo "<option value='".$row[0]."'>".$row[1]."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
				<div class="form-group">
						<label class="control-label col-sm-3" for="cand_name" required>Candidate Name:</label>
						<div class="col-sm-9">
							<select class="form-control" id="cand_name" name="cand_name">
								<option value="">---Select---</option>
								<?php
								$sql = "SELECT product_id, cand_name FROM product WHERE status = 1 AND active = 1";
								$result = $connect->query($sql);
								while ($row = $result->fetch_array()){
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="rec_date">Requisition Movement received by HR:</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" id="rec_date" name="rec_date" placeholder="Enter Date" required>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-3" for="rece_md">Received from MD's Office:</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" id="rece_md" name="rece_md" placeholder="Enter Date" required>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3" for="fin_pos">Final Position's Title:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="fin_pos" name="fin_pos" placeholder="Enter Final Position" required>
						</div>
					</div>

					<div class="form-group">
				    <label class="control-label col-sm-3" for="grade" required>Grade:</label>
				    <div class="col-sm-9">
				      <select class="form-control" id="grade" name="grade">
								<option value="">---Select---</option>
				        <option value="VP I">VP I</option>
				        <option value="VP II">VP II</option>
				        <option value="AVP I">AVP I</option>
				        <option value="AVP II">AVP II</option>
				        <option value="Sr Exec">Sr Exec</option>
				        <option value="Exec">Exec</option>
				        <option value="Executive">Executive</option>
				        <option value="Non-Exec">Non-Exec</option>
				        <option value="Bg Misc">Bg Misc</option>
							</select>

						</div>
					</div>
								<div class="form-group">
							    <label class="control-label col-sm-3" for="emp_type" required>Employee Group:</label>
							    <div class="col-sm-9">
							      <select class="form-control" id="emp_type" name="emp_type">
											<option value="">---Select---</option>
							        <option value="Permanent">Permanent</option>
							        <option value="Contract of Service">Contract of Service</option>

							      </select>

							    </div>
							  </div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="con_end">Contract End Date:</label>
									<div class="col-sm-9">
										<input type="date" class="form-control" id="con_end" name="con_end" placeholder="Enter Date" required>
									</div>
								</div>

								<div class="form-group">
							    <label class="control-label col-sm-3" for="comp_stats" required>Completion Status:</label>
							    <div class="col-sm-9">
							      <select class="form-control" id="comp_stats" name="comp_stats">
											<option value="">---Select---</option>
											<option value="Incomplete">Incomplete</option>
											<option value="On Hold">On Hold</option>
							        <option value="2nd Interview Stage">2nd Interview Stage</option>
							        <option value="Pending medical report and VANA Test">Pending medical report and VANA Test</option>
							        <option value="To source candidate">To source candidate</option>
							        <option value="Completed">Completed</option>

							      </select>

							    </div>
							  </div>


								<div class="form-group">
									<label class="control-label col-sm-3" for="hr_pic" required>HR PIC:</label>
									<div class="col-sm-9">
										<select class="form-control" id="hr_pic" name="hr_pic">
											<option value="">---Select---</option>
											<option value="SS - Suzanna Sulaiman">SS - Suzanna Sulaiman</option>
											<option value="SS - Tay Fong Sia">SS - Tay Fong Sia</option>
											<option value="SS - Hafizah Mohamed">SS - Hafizah Mohamed</option>
											<option value="SHM - Hafizah Mohamed">SHM - Hafizah Mohamed</option>
										</select>

									</div>
								</div>




      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="createHireBtn" data-loading-text="Loading..">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
</form>


    </div>
  </div>
</div>

<!-- remove  -->
<div class="modal fade"id="removeHireModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Brand</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeHireFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeHireBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove brand -->


<div class="modal fade" id="editHireModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" id="editHireForm" action="php_action/editHire.php" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Update Candidate Informations</h4>
        </div>
        <div class="modal-body">

          <div id="edit-hire-messages"></div>

          <div class="edit-hire-result">
            <div class="form-group">
					<label class="control-label col-sm-3" for="edit_h_type" required>Hiring Type:</label>
					<div class="col-sm-9">
						<select class="form-control" id="edit_h_type" name="edit_h_type">
							<option value="">---Select---</option>
							<option value="External Hiring">External Hiring</option>
							<option value="Internal Movement">Internal Movement</option>
							<option value="Transfer">Transfer</option>

						</select>

					</div>
					</div>

          <div class="edit-hire-result">
            <div class="form-group">
            <label class="control-label col-sm-3" for="edit_pers_area" required>Personnel Area:</label>
            <div class="col-sm-9">
              <select class="form-control" id="edit_pers_area" name="edit_pers_area">
                <option value="">---Select---</option>
                <?php
                $sql = "SELECT brand_id, pers_area FROM brands WHERE brand_status = 1 AND brand_active = 1";
                $result = $connect->query($sql);
                while ($row = $result->fetch_array()){
                  echo "<option value='".$row[0]."'>".$row[1]."</option>";
                }
                ?>
              </select>
            </div>
          </div>
          </div>

          <div class="edit-hire-result">
            <div class="form-group">
              <label class="control-label col-sm-3" for="edit_pos_tit" required>Position Title:</label>
              <div class="col-sm-9">
                <select class="form-control" id="edit_pos_tit" name="edit_pos_tit">
                  <option value="">---Select---</option>
                  <?php
                  $sql = "SELECT category_id, pos_tit FROM category WHERE category_status = 1 AND category_active = 1";
                  $result = $connect->query($sql);
                  while ($row = $result->fetch_array()){
                    echo "<option value='".$row[0]."'>".$row[1]."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            </div>

            <div class="edit-hire-result">
              <div class="form-group">
						<label class="control-label col-sm-3" for="edit_cand_name" required>Candidate Name:</label>
						<div class="col-sm-9">
							<select class="form-control" id="edit_cand_name" name="edit_cand_name">
								<option value="">---Select---</option>
								<?php
								$sql = "SELECT product_id, cand_name FROM product WHERE status = 1 AND active = 1";
								$result = $connect->query($sql);
								while ($row = $result->fetch_array()){
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								}
								?>
							</select>
						</div>
					</div>
          </div>

          <div class="edit-hire-result">
            <div class="form-group">
						<label class="control-label col-sm-3" for="edit_rec_date">Requisition Movement received by HR:</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" id="edit_rec_date" name="edit_rec_date" placeholder="Enter Date" required>
						</div>
					</div>
          </div>


          <div class="edit-hire-result">
            <div class="form-group">
						<label class="control-label col-sm-3" for="edit_rece_md">Received from MD's Office:</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" id="edit_rece_md" name="edit_rece_md" placeholder="Enter Date" required>
						</div>
					</div>
          </div>

          <div class="edit-hire-result">
            <div class="form-group">
						<label class="control-label col-sm-3" for="edit_fin_pos">Final Position's Title:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="edit_fin_pos" name="edit_fin_pos" placeholder="Enter Final Position" required>
						</div>
					</div>
          </div>

          <div class="edit-hire-result">
            <div class="form-group">
				    <label class="control-label col-sm-3" for="edit_grade" required>Grade:</label>
				    <div class="col-sm-9">
				      <select class="form-control" id="edit_grade" name="edit_grade">
								<option value="">---Select---</option>
				        <option value="VP I">VP I</option>
				        <option value="VP II">VP II</option>
				        <option value="AVP I">AVP I</option>
				        <option value="AVP II">AVP II</option>
				        <option value="Sr Exec">Sr Exec</option>
				        <option value="Exec">Exec</option>
				        <option value="Executive">Executive</option>
				        <option value="Non-Exec">Non-Exec</option>
				        <option value="Bg Misc">Bg Misc</option>
							</select>

						</div>
					</div>
          </div>

          <div class="edit-hire-result">
            <div class="form-group">
							    <label class="control-label col-sm-3" for="edit_emp_type" required>Employee Group:</label>
							    <div class="col-sm-9">
							      <select class="form-control" id="edit_emp_type" name="edit_emp_type">
											<option value="">---Select---</option>
							        <option value="Permanent">Permanent</option>
							        <option value="Contract of Service">Contract of Service</option>

							      </select>

							    </div>
							  </div>
                </div>

                <div class="edit-hire-result">
                  <div class="form-group">
									<label class="control-label col-sm-3" for="edit_con_end">Contract End Date:</label>
									<div class="col-sm-9">
										<input type="date" class="form-control" id="edit_con_end" name="edit_con_end" placeholder="Enter Date" required>
									</div>
								</div>
                </div>

                <div class="edit-hire-result">
                  <div class="form-group">
							    <label class="control-label col-sm-3" for="edit_comp_stats" required>Completion Status:</label>
							    <div class="col-sm-9">
							      <select class="form-control" id="edit_comp_stats" name="edit_comp_stats">
											<option value="">---Select---</option>
											<option value="Incomplete">Incomplete</option>
											<option value="On Hold">On Hold</option>
							        <option value="2nd Interview Stage">2nd Interview Stage</option>
							        <option value="Pending medical report and VANA Test">Pending medical report and VANA Test</option>
							        <option value="To source candidate">To source candidate</option>
							        <option value="Completed">Completed</option>

							      </select>

							    </div>
							  </div>
                </div>

                <div class="edit-hire-result">
                  <div class="form-group">
									<label class="control-label col-sm-3" for="edit_hr_pic" required>HR PIC:</label>
									<div class="col-sm-9">
										<select class="form-control" id="edit_hr_pic" name="edit_hr_pic">
											<option value="">---Select---</option>
											<option value="SS - Suzanna Sulaiman">SS - Suzanna Sulaiman</option>
											<option value="SS - Tay Fong Sia">SS - Tay Fong Sia</option>
											<option value="SS - Hafizah Mohamed">SS - Hafizah Mohamed</option>
											<option value="SHM - Hafizah Mohamed">SHM - Hafizah Mohamed</option>
										</select>

									</div>
								</div>
                </div>



                <div class="modal-footer editHireFooter">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success" id="editHireBtn" data-loading-text="Loading..">Save</button>
      </div>
      </div>
</form>


<script type="text/javascript" src="custom/js/Hire.js"></script>

<?php require_once 'includes/footer.php'; ?>
