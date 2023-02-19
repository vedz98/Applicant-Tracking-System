<?php require_once 'includes/header.php'; ?>

<style type="text/css">
  .container{
    width:100%;
  }
</style>

<div class="row">
  <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">Manage Candidate Table</div>
        <div class="panel-body">
          <div class="div-action"">
            <button class="btn btn-success" data-toggle="modal" data-target="#addProductModal">Add Candidate</button>
          </div>

          <table class="tables" id="manageProductTable" style="width:90%;">
            <thead>
              <tr>

                <th style="text-align: left;">Candidate Name</th>
                <th style="text-align: left;">Company</th>
                <th style="text-align: left;">Position</th>
                <th style="text-align: left;">Medical Checkup</th>
                <th style="text-align: left;">Completed VANA</th>
                <th style="text-align: left;">Action</th>




                <!--<th style="text-align: center;">Status</th>-->

              </tr>
            </thead>
            <?PHP

            $query = "SELECT * FROM "


            ?>


          </table>


        </div>
    </div>


  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="addProductModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

  <form class="form-horizontal" id="submitProductForm" action="php_action/createProduct.php" method="POST">
      <div class="modal-body">
        <div id="add-product-messages"></div>

        <div class="form-group">
          <label class="control-label col-sm-3" for="cand_name">Candidate Name:</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="cand_name" name="cand_name" placeholder="Enter Candidate Name" required>
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
        <label class="control-label col-sm-3" for="med">Medical Checkup:</label>
        <div class="col-sm-9">
                  <select class="form-control" id="med" name="med">
                      <option value="Completed and Fit">Completed</option>
                      <option value="Incomplete">Incomplete</option>
                  </select>
                </div>
              </div>

          <div class="form-group">
          <label class="control-label col-sm-3" for="vana">VANA:</label>
          <div class="col-sm-9">
                    <select class="form-control" id="vana" name="vana">
                        <option value="Completed">Completed</option>
                        <option value="Not Completed">Not Completed</option>
              				  <option value="NA">N/A</option>
                    </select>
                  </div>
                </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="date_md">Received from MD's Office:</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="date_md" name="date_md" placeholder="Enter Received from MD Office" required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="date_hr">Recommendation received by HR:</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="date_hr" name="date_hr" placeholder="Enter Recommendation received by HR" required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="date_cand">Offer Letter emailed to candidate:</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="date_cand" name="date_cand" placeholder="Offer Letter emailed to candidate" required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="date_cand2">Offer letter accepted by Candidate:</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="date_cand2" name="date_cand2" placeholder="Offer letter accepted by Candidate" required>
            </div>
          </div>



      <div class="form-group">
        <label class="control-label col-sm-3" for="rema">Remarks:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="rema" name="rema" placeholder="Remarks" required>
        </div>
      </div>




      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
</form>

    </div>
  </div>
</div>

<!-- remove  -->
<div class="modal fade"id="removeProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Candidate</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove product -->


<div class="modal fade" id="editProductModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" id="editProductForm" action="php_action/editProduct.php" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Update Candidate Informations</h4>
        </div>
        <div class="modal-body">

          <div id="edit-product-messages"></div>
          <div class="edit-product-result">
            <div class="form-group">
              <label class="control-label col-sm-3" for="editcand_name">Candidate Name:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="editcand_name" name="editcand_name" placeholder="Enter Candidate Name" required>
              </div>
            </div>

            <div class="edit-product-result">
              <div class="form-group">
                  <label class="control-label col-sm-3" for="editpers_area" required>Personnel Area:</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="editpers_area" name="editpers_area">
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

              <div class="edit-product-result">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="editpos_tit" required>Position Title:</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="editpos_tit" name="editpos_tit">
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

              <div class="edit-product-result">
                <div class="form-group">
                <label class="control-label col-sm-3" for="editmed">Medical Checkup:</label>
                <div class="col-sm-9">
                          <select class="form-control" id="editmed" name="editmed">
                              <option value="Completed and Fit">Completed</option>
                              <option value="Incomplete">Incomplete</option>
                          </select>
                        </div>
                      </div>
                      </div>


              <div class="edit-product-result">
                <div class="form-group">
                <label class="control-label col-sm-3" for="editvana">VANA:</label>
                <div class="col-sm-9">
                          <select class="form-control" id="editvana" name="editvana">
                              <option value="Completed">Completed</option>
                              <option value="Not Completed">Not Completed</option>
                              <option value="NA">N/A</option>
                          </select>
                        </div>
                      </div>
                      </div>

              <div class="edit-product-result">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="editdate_md">Received from MD's Office:</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="editdate_md" name="editdate_md" placeholder="Enter Received from MD Office" required>
                  </div>
                </div>
                </div>


              <div class="edit-product-result">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="editdate_hr">Recommendation received by HR:</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="editdate_hr" name="editdate_hr" placeholder="Enter Recommendation received by HR" required>
                  </div>
                </div>
                </div>

              <div class="edit-product-result">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="editdate_cand">Offer Letter emailed to candidate:</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="editdate_cand" name="editdate_cand" placeholder="Offer Letter emailed to candidate" required>
                  </div>
                </div>
                </div>

              <div class="edit-product-result">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="editdate_cand2">Offer letter accepted by Candidate:</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="editdate_cand2" name="editdate_cand2" placeholder="Offer letter accepted by Candidate" required>
                  </div>
                </div>
                </div>

                <div class="edit-product-result">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="editrema">Remarks:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="editrema" name="editrema" placeholder="Remarks" required>
                  </div>
                </div>
              </div>

        <div class="modal-footer editProductFooter">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Loading..">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript" src="custom/js/product.js"></script>

<?php require_once 'includes/footer.php'; ?>
