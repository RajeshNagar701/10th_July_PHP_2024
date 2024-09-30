<?php

include_once('../Admin/model.php');   // step 1 load model 


class control extends model  // step 2 extends model class
{
	
		function __construct(){ // magic function call automatic when we declare class object
		
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
				$arr_course=$this->select('products');
				if(isset($_REQUEST['btn_course']))
				{
					$cate_id=$_REQUEST['btn_course'];
					$where='cate_id='.$cate_id;
					$arr_course=$this->select_where('products',$where);
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
				include_once('login.php');
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