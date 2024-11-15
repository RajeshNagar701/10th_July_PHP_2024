<?php
	if(isset($_SESSION['userid']))
	{
		
	}
	else
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
                <h3 class="display-4 text-white text-uppercase">Edit Profile</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Edit Profile</p>
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
                <h1>Edit Profile</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-secondary rounded p-5">
                       
                        <form method="post" enctype="multipart/form-data">
                            
							<div class="control-group">
                                <input type="text" name="name" class="form-control border-0 p-4" id="name" value="<?php echo $fetch->name?>" placeholder="Your Name" required="required"  />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" name="email" class="form-control border-0 p-4" id="email" value="<?php echo $fetch->email?>" placeholder="Your Email" required="required"/>
                                <p class="help-block text-danger"></p>
                            </div>
							<br>
							<div class="control-group">
								<b>Gender :</b> 
								<?php 
									$gender=$fetch->gender;
								?>
                                Male : <input type="radio" name="gender"  value="Male" <?php if($gender=="Male") { echo "checked";}?>/>
                                Female : <input type="radio" name="gender"  value="Female" <?php if($gender=="Female") { echo "checked";}?>/>
                            </div>
							<br>
							<div class="control-group">
								<b>Hobby :</b> 
								<?php 
									$lag=$fetch->lag; // Dance,Sports,Music
									$lag_arr=explode(",",$lag);
								?>
                                Dance : <input type="checkbox" name="lag[]"  value="Dance" <?php if(in_array("Dance",$lag_arr)){ echo "checked";}?>/>
                                Sports : <input type="checkbox" name="lag[]"  value="Sports" <?php if(in_array("Sports",$lag_arr)){ echo "checked";}?>/>
								Music : <input type="checkbox" name="lag[]"  value="Music"/ <?php if(in_array("Music",$lag_arr)){ echo "checked";}?>>
                            </div>
							<br>
							 <div class="control-group">
                                Country : 
								<select name="cid" class="form-control" >
									<option style="color:black">------ Select Country ------</option>
									
									<?php
									foreach($arr_country as $w)
									{
										if($fetch->cid==$w->id)
										{
									?>
											<option value="<?php echo $w->id;?>" selected ><?php echo $w->name;?></option>
									<?php
										}
										else
										{
									?>
											<option value="<?php echo $w->id;?>" ><?php echo $w->name;?></option>
									<?php
										}
									}
									?>
								</select>
                                <p class="help-block text-danger"></p>
                            </div>
							<div class="control-group">
                                <input type="file" name="img" class="form-control border-0 p-4"/>
                                <img class="rounded mb-4 mb-lg-0" src="img/customer/<?php echo $fetch->img?>" height="50px" width="50px" alt="">
								<p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                                <input name="submit" class="btn btn-primary py-3 px-5" type="submit" value="Save">
                            </div>
							
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