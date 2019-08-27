<?php include("include/header.php"); ?>

<?php include("include/sidebar.php"); ?>

<?php 
$arrAllUsers = getAllUsers();

 ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Coach</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <?php include 'include/flash_message.php'; ?>
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <a href="add_coach.php" class="btn btn-primary">Add New Coach</a>
               <br>  
              <table id="example1" class="table table-bordered table-hover">
                <thead>
	                <tr>
	                  <th>S.No</th>
	                  <th>Name</th>
                    <th>Email</th>
	                  <th>Phone</th>
                    <th>Status</th>
	                </tr>
                </thead>
                <tbody>

                  <?php 
                  if(!empty($arrAllUsers)){
                    $i = 1;
                      foreach ($arrAllUsers as $arrUser) {
                  ?>
                    <tr class="coach-row">
                      <td><?php echo $i; ?></td>
                      <td><?php echo $arrUser['details']['first_name']. ' '.$arrUser['details']['last_name'] ; ?></td>
                      <td><?php echo !empty($arrUser['email']) ? $arrUser['email'] : '-'; ?></td>
                      <td><?php echo !empty($arrUser['details']['phone']) ? $arrUser['details']['phone'] : '-'; ?></td>
                      <td><?php 
                        echo "<a href='edit_coach.php?uid=".$arrUser['id']."' class='btn btn-primary'>Edit</a> &nbsp;";

                        if($arrUser['status'] == 0) {
                          echo "<a data-userid='".$arrUser['id']."' data-userstatus='deactive' class='btn btn-success coach-status'>Active</a>";
                        } else {
                          echo "<a data-userid='".$arrUser['id']."' data-userstatus='active' class='btn btn-danger coach-status'>Deactive</a>";
                        }
                       ?></td>
                    </tr>
                  <?php
                    $i++;
                      }
                    } else { ?>
                    <tr><td colspan="5"><strong>No Records Found</strong></td></tr>
                  <?php } ?> 
                </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include("include/footer.php"); ?>