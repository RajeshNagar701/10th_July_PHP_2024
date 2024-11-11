<?php
include_once('header.php');
?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Categories
            <small>Edit Categories</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Categories</a></li>
            <li class="active">Edit Categories</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Categries Name</label>
                      <input type="text" value="<?php echo $fetch->cate_name?>" name="cate_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Categries Name">
                    </div>
           
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Categories File</label>
                      <input type="file" name="cate_img" id="exampleInputFile">
					  <img src="upload/categories/<?php echo $fetch->cate_img?>" width="50px"/>
                    </div>
                   
                  <div class="box-footer">
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div><!--/.col (left) -->

          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php
include_once('footer.php');
?>