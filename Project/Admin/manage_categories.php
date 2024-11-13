<?php
include_once('header.php');
?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Categories
            <small>Manage Categories</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Categories</a></li>
            <li class="active">Manage Categories</li>
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
                        <th>Categories Name</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					
					<?php
					foreach($cate_arr as $data)
					{
					?>
                      <tr>
                        <td><?php echo $data->id?></td>
                        <td><?php echo $data->cate_name?></td>
                        <td><img src="upload/categories/<?php echo $data->cate_img?>" width="50px"/></td>
                        <td>
							<a href="delete?del_categories=<?php echo $data->id?>" class="btn btn-danger">Delete</a>
							<a href="edit_categories?editbtn=<?php echo $data->id?>" class="btn btn-primary">Edit</a>
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