<?php
include_once('header.php');
?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Product
            <small>Add Course</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Course</a></li>
            <li class="active">Add Course</li>
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
                      <label>Select Categories</label>
                      <select name="cate_id" class="form-control">
                        <option value="">Select Categories</option>
						<?php 
						foreach($cate_arr as $data)
						{
							?>
							<option value="<?php echo $data->id?>"><?php echo $data->cate_name?></option>
							<?php
						}
						?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Course Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Categries Name">
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Course Price</label>
                      <input type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter Categries Price">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Course File</label>
                      <input type="file" name="img" id="exampleInputFile">
                    
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Course Description</label>
                      <textarea  name="description" class="form-control"></textarea>
                    </div>
					
                  
                   
                  <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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