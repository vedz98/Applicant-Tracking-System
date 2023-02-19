<?php require_once 'includes/header.php'; ?>

<style type="text/css">
  .container{
    width:100%;
  }
</style>

<div class="row">
  <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">Manage Position</div>
        <div class="panel-body">
          <div class="div-action"">
            <button class="btn btn-success" data-toggle="modal" data-target="#addCategoryModal">Add a Category</button>

          </div>

          <table class="tables" id="manageCategoryTable" style="width:100%;">
            <thead>
              <tr>
                <th style="text-align: left;">Position ID</th>
                <th style="text-align: left;">Company</th>
                <th style="text-align: left;">Position Title</th>
                <th style="text-align: left;">Budgeted</th>

                <th style="text-align: left;">Employee Group</th>
                <th style="text-align: left;">Employee Sub-Group</th>
                <!---->



                <th style="text-align: left;">Options</th>


                <!-- <th style="text-align: center;">Business</th> -->
              </tr>
            </thead>
          </table>


        </div>
    </div>


  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="addCategoryModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

  <form class="form-horizontal" id="submitCategoryForm" action="php_action/createCategory.php" method="POST">
      <div class="modal-body">
        <div id="add-category-messages"></div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="pos_id">Position ID:</label>
    <div class="col-sm-9">
      <input type="number" class="form-control" id="pos_id" name="pos_id" placeholder="Enter Position ID" required>
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
    <label class="control-label col-sm-3" for="pos_tit">Position Title:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="pos_tit" name="pos_tit" placeholder="Enter Position Title" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="budg">Budgeted:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="budg" name="budg" placeholder="Name (SAP ID) Additional - Budgeted New-Budgeted New-UnBudgeted" required>
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-3" for="emp_group" required>Employee Group:</label>
    <div class="col-sm-9">
      <select class="form-control" id="emp_group" name="emp_group">
        <option value="Permanent">Permanent</option>
        <option value="Contract of Service">Contract of Service</option>

      </select>

    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="emp_sgroup" required>Employee Sub-Group:</label>
    <div class="col-sm-9">
      <select class="form-control" id="emp_sgroup" name="emp_sgroup">
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
    <label class="control-label col-sm-3" for="reg" required>Region:</label>
    <div class="col-sm-9">
      <select class="form-control" id="reg" name="reg">
        <option value="EM">EM</option>
        <option value="WM">WM</option>

      </select>

    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="loc">Location:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="loc" name="loc" placeholder="Enter Location" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="act_type" required>Action Type:</label>
    <div class="col-sm-9">
      <select class="form-control" id="act_type" name="act_type">
        <option value="Resignation">Resignation</option>
        <option value="Movement">Movement</option>
        <option value="Retirement">Retirement</option>
        <option value="New">New</option>
        <option value="Transfer to SDIA">Transfer to SDIA</option>
        <option value="Transfer to SDI">Transfer to SDI Group</option>
        <option value="Succession Plan">Succession Plan</option>

      </select>

    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="categoryStatus" required>Status:</label>
    <div class="col-sm-9">
      <select class="form-control" id="categoryStatus" name="categoryStatus">
        <option value="1">Available</option>

      </select>

    </div>
  </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="createCategoryBtn" data-loading-text="Loading..">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
</form>

    </div>
  </div>
</div>

<div class="modal fade" id="removeCategoryModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Category</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeCategoryFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeCategoryBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove category-->

<div class="modal fade" id="editCategoryModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" id="editCategoryForm" action="php_action/editCategory.php" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Update Personnel Area</h4>
        </div>
        <div class="modal-body">

          <div id="edit-category-messages"></div>
          <div class="edit-category-result">
            <div class="form-group">
              <label class="control-label col-sm-3" for="editpos_id">Position ID:</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" id="editpos_id" name="editpos_id" placeholder="Enter Position ID" required>
              </div>
            </div>

            <div class="edit-category-result">
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

              <div class="edit-category-result">
              <div class="form-group">
                <label class="control-label col-sm-3" for="editpos_tit">Position Title:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="editpos_tit" name="editpos_tit" placeholder="Enter Position Title" required>
                </div>
              </div>
                </div>

              <div class="edit-category-result">
                <div class="form-group">
                <label class="control-label col-sm-3" for="editbudg">Budgeted:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="editbudg" name="editbudg" placeholder="Name (SAP ID) Additional - Budgeted New-Budgeted New-UnBudgeted" required>
                </div>
              </div>
                </div>


              <div class="edit-category-result">
                <div class="form-group">
                <label class="control-label col-sm-3" for="editemp_group" required>Employee Group:</label>
                <div class="col-sm-9">
                  <select class="form-control" id="editemp_group" name="editemp_group">
                    <option value="Permanent">Permanent</option>
                    <option value="Contract of Service">Contract of Service</option>

                  </select>

                </div>
              </div>
                </div>

              <div class="edit-category-result">
                <div class="form-group">
                <label class="control-label col-sm-3" for="editemp_sgroup" required>Employee Sub-Group:</label>
                <div class="col-sm-9">
                  <select class="form-control" id="editemp_sgroup" name="editemp_sgroup">
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

              <div class="edit-category-result">
                <div class="form-group">
                <label class="control-label col-sm-3" for="editreg" required>Region:</label>
                <div class="col-sm-9">
                  <select class="form-control" id="editreg" name="editreg">
                    <option value="EM">EM</option>
                    <option value="WM">WM</option>

                  </select>

                </div>
              </div>
                </div>

              <div class="edit-category-result">
                <div class="form-group">
                <label class="control-label col-sm-3" for="editloc">Location:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="editloc" name="editloc" placeholder="Enter Location" required>
                </div>
              </div>
                </div>

              <div class="edit-category-result">
                <div class="form-group">
                <label class="control-label col-sm-3" for="editact_type" required>Action Type:</label>
                <div class="col-sm-9">
                  <select class="form-control" id="editact_type" name="editact_type">
                    <option value="Resignation">Resignation</option>
                    <option value="Movement">Movement</option>
                    <option value="Retirement">Retirement</option>
                    <option value="New">New</option>
                    <option value="Transfer to SDIA">Transfer to SDIA</option>
                    <option value="Transfer to SDI">Transfer to SDI Group</option>
                    <option value="Succession Plan">Succession Plan</option>

                  </select>

                </div>
              </div>


        <div class="modal-footer editCategoryFooter">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" id="editCategoryBtn" data-loading-text="Loading..">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>



<script type="text/javascript" src="custom/js/category.js"></script>

<?php require_once 'includes/footer.php'; ?>
