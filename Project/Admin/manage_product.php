<?php
include_once('header.php');
?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Product
            <small>Manage Product</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Course</a></li>
            <li class="active">Manage Course</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Course Name</th>
						<th>Categories</th>
						<th>Price</th>
                        <th>Image</th>
						<th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
						foreach($prod_arr as $data)
						{
						?>
						  <tr>
							<td><?php echo $data->id?></td>
							<td><?php echo $data->name?></td>
							<td><?php echo $data->cate_name?></td>
							<td><?php echo $data->price?></td>
							<td><img src="upload/course/<?php echo $data->img?>" width="50px"></td>
							<td><?php echo $data->description?></td>
							<td>
								<a href="delete?del_product=<?php echo $data->id?>" class="btn btn-danger">Delete</a>
								<a href="" class="btn btn-primary">Edit</a>
							</td>
							
						  </tr>
					   <?php
						}
				   ?>   
                      
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

         
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php
	  include_once('footer.php');
	  ?>