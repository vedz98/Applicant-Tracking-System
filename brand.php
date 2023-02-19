<?php require_once 'includes/header.php';
?>

<style type="text/css">
  .container{
    width:100%;
  }
</style>

<div class="row">
  <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">Manage Company Info</div>
        <div class="panel-body">
          <div class="div-action"">
            <button class="btn btn-success" data-toggle="modal" data-target="#addBrandModal">Add Company</button>

          </div>

          <table class="tables" id="manageBrandTable" style="width:100%;">
            <thead>
              <tr>
                <th style="text-align: left;">Personnel Area</th>
                <th style="text-align: left;">Internal Division</th>
                <th style="text-align: left;">Department</th>

                <th style="text-align: left;">Options</th>




                <!-- <th style="text-align: center;">Status</th> -->
              </tr>
            </thead>
          </table>


        </div>
    </div>


  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="addBrandModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add SAP Company</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

  <form class="form-horizontal" id="submitBrandForm" action="php_action/createBrand.php" method="POST">
      <div class="modal-body">
        <div id="add-brand-messages"></div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="pers_area" required>Personnel Area:</label>
          <div class="col-sm-10">
            <select class="form-control" id="pers_area" name="pers_area">
              <option value="Sime Darby Industrial Sdn Bhd">Sime Darby Industrial Sdn Bhd</option>
              <option value="Sime Darby Industrial Brunei Sdn Bhd">Sime Darby Industrial Brunei Sdn Bhd</option>
              <option value="Sime Darby Industrial Singapura Sdn Bhd">Sime Darby Industrial Singapura Sdn Bhd</option>
              <option value="Sime Darby Industrial TMR Sdn Bhd">Sime Darby Industrial TMR Sdn Bhd</option>
              <option value="Sime Darby Industrial SiTech Sdn Bhd">Sime Darby Industrial SiTech Sdn Bhd</option>

            </select>

          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="int_div" required>Internal Division:</label>
          <div class="col-sm-10">
            <select class="form-control" id="int_div" name="int_div">
              <option value="Cat Operations">Cat Operations</option>
              <option value="Cat Marketing & Sales">Cat Marketing & Sales</option>
              <option value="Corporate Services">Corporate Services</option>
              <option value="Finance">Finance</option>
              <option value="Cat E&T">Cat E&T</option>
            </select>

          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="dept" required>Department:</label>
          <div class="col-sm-10">
            <select class="form-control" id="dept" name="dept">
              <option value="After Sales Marketing">After Sales Marketing</option>
              <option value="Sales">Sales</option>
              <option value="Product Support Marketing">Product Support Marketing</option>
              <option value="Product Support Marketing">Product Support Marketing</option>
              <option value="Credit Management">Credit Management</option>
              <option value="Product Support">Product Support</option>
              <option value="Service">Service</option>
              <option value="Project Sales">Project Sales</option>
              <option value="Administration">Administration</option>
              <option value="HSE">HSE</option>

            </select>

          </div>
        </div>

          <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
</form>

    </div>
  </div>
</div>

<div class="modal fade" id="removeMemberModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Brand</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeBrandFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeBrandBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove brand -->

<div class="modal fade" id="editBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" id="editBrandForm" action="php_action/editBrand.php" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Update Personnel Area</h4>
        </div>
        <div class="modal-body">

          <div id="edit-brand-messages"></div>
          <div class="edit-brand-result">
            <div class="form-group">
              <label for="editPersArea" class="col-sm-3 control-label">Personnel Area:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="editPersArea" placeholder="Enter Personnel Area" name="editPersArea" autocomplete="off">
              </div>
            </div>

            <div class="edit-brand-result">
              <div class="form-group">
                <label for="editIntDiv" class="col-sm-3 control-label">Internal Division:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="editIntDiv" placeholder="Enter Internal Division" name="editIntDiv" autocomplete="off">
                </div>
              </div>

              <div class="edit-brand-result">
                <div class="form-group">
                  <label for="editDept" class="col-sm-3 control-label">Department:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="editDept" placeholder="Enter Department" name="editDept" autocomplete="off">
                  </div>
                </div>

        <div class="modal-footer editBrandFooter">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" id="editBrandBtn" data-loading-text="Loading..">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>




<script type="text/javascript" src="custom/js/brand.js"></script>

<?php require_once 'includes/footer.php'; ?>
