<?php include("include/header.php"); ?>

<?php include("include/sidebar.php"); ?>

<?php 
  $arrAllSlide = getSlider();
  // pre($arrSlider);
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Slider</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div id="flash_message"></div>
        <?php include 'include/flash_message.php'; ?>
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
            <a href="add_slide.php" class="btn btn-primary">Add New slider</a>
            <br>  
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  if(!empty($arrAllSlide)){
                    $i = 1;
                      foreach ($arrAllSlide as $arrSlide) {
                        $slideId = $arrSlide['id'];
                  ?>
                    <tr class="slide-row">
                      <td><?php echo $i; ?></td>
                      <td><?php echo !empty($arrSlide['title']) ? $arrSlide['title'] : ''; ?></td>
                      <td><?php echo !empty($arrSlide['description']) ? $arrSlide['description'] : ''; ?></td>
                      <td><?php echo !empty($arrSlide['title']) ? $arrSlide['title'] : ''; ?></td>
                      <td>
                        <a href="edit_slide.php?id=<?php echo $slideId; ?>" class="btn btn-primary">Edit</a>
                        <a data-id="<?php echo $slideId; ?>" class="btn btn-danger slide-delete">Delete</a>
                      </td>
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