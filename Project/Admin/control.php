<?php

include_once('model.php');   // step 1 load model 


class control extends model  // step 2 extends model class
{
	
	function __construct(){ // magic function call automatic when we declare class object
				
		model::__construct(); // step 3 call model __construct
				
		$url=$_SERVER['PATH_INFO'];
		
		switch($url)
		{
			case '/admin-login':
				if(isset($_REQUEST['login']))
				{
					$email=$_REQUEST['email'];
					$password=md5($_REQUEST['password']);
					
					$where=array("email"=>$email,"password"=>$password);
					
					$res=$this->select_dynamicwhere('admin',$where);
					$chk=$res->num_rows; //check row wise condition
					if($chk==1) // 1 true 0 false
					{
						echo "<script>
							alert('Login suuccessfully');
							window.location='dashboard';
						</script>";
					}
					else
					{
						echo "<script>
							alert('Login failed due to wrong crendential');
							window.location='admin-login';
						</script>";
					}
				}
				include_once('index.php');
			break;
			
			case '/dashboard':
				include_once('dashboard.php');
			break;
			
			case '/add_categories':
				if(isset($_REQUEST['submit']))
				{
					$cate_name=$_REQUEST['cate_name'];
					
					echo $cate_img=$_FILES['cate_img']['name'];
	
					// upload img in folder
					$path='upload/categories/'.$cate_img;     // path
					$dupcate_img=$_FILES['cate_img']['tmp_name'];  // duplicate imag get
					move_uploaded_file($dupcate_img,$path);  // move duplicate img in path
					
					
					$arr=array("cate_name"=>$cate_name,"cate_img"=>$cate_img);
					
					$res=$this->insert('categories',$arr);
					if($res)
					{
						echo "<script>
							alert('Categories add suuccessfully');
							window.location='add_categories';
						</script>";
					}
					else
					{
						echo "Not success";
					}
				}
				include_once('add_categories.php');
			break;
			
			case '/manage_categories':
				$cate_arr=$this->select('categories');
				include_once('manage_categories.php');
			break;
			
			case '/add_product':
			
				$cate_arr=$this->select('categories');
				if(isset($_REQUEST['submit']))
				{
					$cate_id=$_REQUEST['cate_id'];
					$name=$_REQUEST['name'];
					$price=$_REQUEST['price'];
					$description=$_REQUEST['description'];
				
					echo $course_img=$_FILES['img']['name'];
	
					// upload img in folder
					$path='upload/course/'.$course_img;     // path
					$dupcourse_img=$_FILES['img']['tmp_name'];  // duplicate imag get
					move_uploaded_file($dupcourse_img,$path);  // move duplicate img in path
					
					
					$arr=array("cate_id"=>$cate_id,"name"=>$name,"price"=>$price,"img"=>$course_img,"description"=>$description);
					
					$res=$this->insert('products',$arr);
					if($res)
					{
						echo "<script>
							alert('Course add suuccessfully');
							window.location='add_product';
						</script>";
					}
					else
					{
						echo "Not success";
					}
				}
				include_once('add_product.php');
			break;
			
			case '/manage_product':
				$prod_arr=$this->select_join('products','categories','cate_name','categories.id=products.cate_id');
				include_once('manage_product.php');
			break;
			
			case '/manage_inquiry':
				$cont_arr=$this->select('contacts');
				include_once('manage_inquiry.php');
			break;
			
			case '/manage_customer':
				$cust_arr=$this->select('customer');
				include_once('manage_customer.php');
			break;
			
			default:
				include_once('pnf.php');
			break;
		}
		
	}
	
}
$obj=new control;




?>