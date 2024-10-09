<?php
	if(isset($_SESSION['userid']))
	{
		echo "<script>
			window.location='index';
		</script>";
	}
	include_once('header.php');
?>


    <!-- Header Start -->
    <div class="container-fluid page-header" style="margin-bottom: 90px;">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">Signup</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Signup</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Signup</h5>
                <h1>Signup For Course Details</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-secondary rounded p-5">
                       
                        <form method="post" enctype="multipart/form-data">
                            
							<div class="control-group">
                                <input type="text" name="name" class="form-control border-0 p-4" id="name" placeholder="Your Name" required="required"  />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" name="email" class="form-control border-0 p-4" id="email" placeholder="Your Email" required="required"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="password" name="password" class="form-control border-0 p-4" id="password" placeholder="Your password" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
							<br>
							<div class="control-group">
								<b>Gender :</b> 
                                Male : <input type="radio" name="gender"  value="Male"/>
                                Female : <input type="radio" name="gender"  value="Female"/>
                            </div>
							<br>
							<div class="control-group">
								<b>Hobby :</b> 
                                Dance : <input type="checkbox" name="lag[]"  value="Dance"/>
                                Sports : <input type="checkbox" name="lag[]"  value="Sports"/>
								Music : <input type="checkbox" name="lag[]"  value="Music"/>
                            </div>
							<br>
							 <div class="control-group">
                                Country : 
								<select name="cid" class="form-control" >
									<option style="color:black">------ Select Country ------</option>
									
									<?php
									foreach($arr_country as $w)
									{
									?>
										<option value="<?php echo $w->id;?>"><?php echo $w->name;?></option>
									<?php
									}
									?>
								</select>
                                <p class="help-block text-danger"></p>
                            </div>
							<div class="control-group">
                                <input type="file" name="img" class="form-control border-0 p-4" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                                <input name="submit" class="btn btn-primary py-3 px-5" type="submit" value="Signup">
                            </div>
							<br>
							<a href="login">If you already registered then Click Here</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


   <?php
	include_once('footer.php');
	?>