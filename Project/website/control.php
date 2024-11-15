<?php

include_once('../Admin/model.php');   // step 1 load model 


class control extends model  // step 2 extends model class
{
	
		function __construct(){ // magic function call automatic when we declare class object
		session_start();
		model::__construct();  // step 3 call model __construct
		
		$url=$_SERVER['PATH_INFO'];
		
		switch($url)
		{
			case '/index':
				include_once('index.php');
			break;
			
			case '/about':
				include_once('about.php');
			break;
			
			case '/course':
				$arr_categories=$this->select('categories');
				include_once('course.php');
			break;
			
			case '/course_view':
				if(isset($_REQUEST['btn_course']))
				{
					$cate_id=$_REQUEST['btn_course'];
					$where=array("cate_id"=>$cate_id);
					$res=$this->select_where('products',$where);
					while($fetch=$res->fetch_object()) // fetch all data
					{
						$arr_course[]=$fetch;
					}
				}
				include_once('course_view.php');
			break;
			
			case '/teacher':
				include_once('teacher.php');
			break;
			
			case '/blog':
				include_once('blog.php');
			break;
			
			case '/single':
				include_once('single.php');
			break;
			
			case '/contact':
				
				if(isset($_REQUEST['submit']))
				{
					$name=$_REQUEST['name'];
					$email=$_REQUEST['email'];
					$mobile=$_REQUEST['mobile'];
					$comment=$_REQUEST['comment'];
					
					$arr=array("name"=>$name,"email"=>$email,"mobile"=>$mobile,"comment"=>$comment);
					
					$res=$this->insert('contacts',$arr);
					if($res)
					{
						echo "<script>
							alert('Contact submited suuccessfully');
							window.location='contact';
						</script>";
					}
					else
					{
						echo "Not success";
					}
				}
				include_once('contact.php');
			break;
			
			case '/login':
				if(isset($_REQUEST['login']))
				{
					$email=$_REQUEST['email'];
					$password=md5($_REQUEST['password']);
					
					$where=array("email"=>$email,"password"=>$password);
					
					//login
					$res=$this->select_where('customer',$where);
					$chk=$res->num_rows; //check row wise condition
					
					if($chk==1) // 1 true 0 false
					{
						
						$fetch=$res->fetch_object();
						
						if($fetch->status=="Unblock")
						{
							$_SESSION['username']=$fetch->name;
							$_SESSION['userid']=$fetch->id;
							
							echo "<script>
								alert('Login suuccessfully');
								window.location='index';
							</script>";
						}
						else
						{
							echo "<script>
							alert('Login failed due to Account Blocked');
							window.location='login';
							</script>";
						}
					}
					else
					{
						echo "<script>
							alert('Login failed due to wrong crendential');
							window.location='login';
						</script>";
					}
				}
				include_once('login.php');
			break;
			
			
			case '/profile':
			
				$where=array("id"=>$_SESSION['userid']);
				$res=$this->select_where('customer',$where);
				$fetch=$res->fetch_object();
				include_once('profile.php');
			
			break;
			
			case '/edituser':
				if(isset($_REQUEST['editbtn']))
				{
					$id=$_REQUEST['editbtn'];
					
					$where=array("id"=>$id);
					$res=$this->select_where('customer',$where);
					$fetch=$res->fetch_object();
					
					$del_img=$fetch->img;
					
					$arr_country=$this->select('country');
					include_once('edituser.php');
					
					
					if(isset($_REQUEST['submit']))
					{
						$name=$_REQUEST['name'];
						$email=$_REQUEST['email'];
						$gender=$_REQUEST['gender'];
						
						$lag_arr=$_REQUEST['lag'];
						$lag=implode(",",$lag_arr);
						
						$cid=$_REQUEST['cid'];
						
						
						if($_FILES['img']['size']>0)
						{
							$img=$_FILES['img']['name'];
							// upload img in folder
							$path='img/customer/'.$img;     // path
							$dupimg=$_FILES['img']['tmp_name'];  // duplicate imag get
							move_uploaded_file($dupimg,$path);  // move duplicate img in path
							
							$arr=array("name"=>$name,"email"=>$email,"gender"=>$gender,"lag"=>$lag
							,"cid"=>$cid,"img"=>$img);
							
							unlink('img/customer/'.$del_img);
						}
						else
						{
							$arr=array("name"=>$name,"email"=>$email,"gender"=>$gender,"lag"=>$lag
							,"cid"=>$cid);
						}
						
						$res=$this->update('customer',$arr,$where);
						if($res)
						{
							echo "<script>
								alert('Update Data suuccessfully');
								window.location='profile';
							</script>";
						}
						else
						{
							echo "Not success";
						}
					}
					
				}
			break;
			
			
			case '/userlogout':
			
				unset($_SESSION['userid']);
				unset($_SESSION['username']);
				echo "<script>
							alert('Logout Succesfull');
							window.location='index';
						</script>";
				
			break;
			
			
			case '/signup':
				$arr_country=$this->select('country');
				if(isset($_REQUEST['submit']))
				{
					$name=$_REQUEST['name'];
					$email=$_REQUEST['email'];
					$password=$_REQUEST['password'];
					$pass_enc=md5($password);
					$gender=$_REQUEST['gender'];
					
					$lag_arr=$_REQUEST['lag'];
					$lag=implode(",",$lag_arr);
					
					$cid=$_REQUEST['cid'];
					
					
					echo $img=$_FILES['img']['name'];
	
					// upload img in folder
					$path='img/customer/'.$img;     // path
					$dupimg=$_FILES['img']['tmp_name'];  // duplicate imag get
					move_uploaded_file($dupimg,$path);  // move duplicate img in path
					
					
					$arr=array("name"=>$name,"email"=>$email,"password"=>$pass_enc,"gender"=>$gender,"lag"=>$lag
					,"cid"=>$cid,"img"=>$img);
					
					$res=$this->insert('customer',$arr);
					if($res)
					{
						echo "<script>
							alert('Signup suuccessfully');
							window.location='signup';
						</script>";
					}
					else
					{
						echo "Not success";
					}
				}
				include_once('signup.php');
			break;
			
			default:
				include_once('pnf.php');
			break;
		}
		
	}
	
}
$obj=new control;




?>