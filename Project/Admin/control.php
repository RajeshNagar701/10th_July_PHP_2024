<?php

include_once('model.php');   // step 1 load model 


class control extends model  // step 2 extends model class
{
	
	function __construct(){ // magic function call automatic when we declare class object
				
		session_start();		
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
					
					$res=$this->select_where('admin',$where);
					$chk=$res->num_rows; //check row wise condition
					if($chk==1) // 1 true 0 false
					{
						// session
						$fetch=$res->fetch_object();
						
						$_SESSION['adminname']=$fetch->name;
						$_SESSION['adminid']=$fetch->id;
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
			
			case '/adminlogout':
			
				unset($_SESSION['adminid']);
				unset($_SESSION['adminname']);
				echo "<script>
							alert('Logout Succesfull');
							window.location='admin-login';
						</script>";
				
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
			
			
			case '/edit_categories':
				if(isset($_REQUEST['editbtn']))
				{
					$id=$_REQUEST['editbtn'];
					
					$where=array("id"=>$id);
					$res=$this->select_where('categories',$where);
					$fetch=$res->fetch_object();
					
					$old_cate_img=$fetch->cate_img;
					
					include_once('edit_categories.php');
					
					if(isset($_REQUEST['save']))
					{
						$cate_name=$_REQUEST['cate_name'];
						
						if($_FILES['cate_img']['size']>0)
						{
							echo $cate_img=$_FILES['cate_img']['name'];
							// upload img in folder
							$path='upload/categories/'.$cate_img;     // path
							$dupcate_img=$_FILES['cate_img']['tmp_name'];  // duplicate imag get
							move_uploaded_file($dupcate_img,$path);  // move duplicate img in path
							
							$arr=array("cate_name"=>$cate_name,"cate_img"=>$cate_img);
							unlink('upload/categories/'.$old_cate_img);
						}
						else
						{
							$arr=array("cate_name"=>$cate_name);
						}
						
						$res=$this->update('categories',$arr,$where);
						if($res)
						{
							echo "<script>
								alert('Categories Update suuccessfully');
								window.location='manage_categories';
							</script>";
						}
						else
						{
							echo "Not success";
						}
					}
					
				}
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
			
			
			
			case '/delete':
				
				if(isset($_REQUEST['del_categories']))
				{
					$id=$_REQUEST['del_categories'];
					$where=array("id"=>$id);
					
					// image get for delete
					$sel_sel=$this->select_where('categories',$where);
					$fetch=$sel_sel->fetch_object();
					$del_img=$fetch->cate_img;
					
					$res=$this->delete_where('categories',$where);
					if($res)
					{
						unlink('upload/categories/'.$del_img); // del image
						echo "<script>
							alert('Categories Deleted suuccessfully');
							window.location='manage_categories';
						</script>";
					}
				}
				
				if(isset($_REQUEST['del_product']))
				{
					$id=$_REQUEST['del_product'];
					$where=array("id"=>$id);
					
					// image get for delete
					$sel_sel=$this->select_where('products',$where);
					$fetch=$sel_sel->fetch_object();
					$del_img=$fetch->img;
					
					$res=$this->delete_where('products',$where);
					if($res)
					{
						unlink('upload/course/'.$del_img); // del image
						echo "<script>
							alert('Products Deleted suuccessfully');
							window.location='manage_product';
						</script>";
					}
				}
				if(isset($_REQUEST['del_customer']))
				{
					$id=$_REQUEST['del_customer'];
					$where=array("id"=>$id);
					
					// image get for delete
					$sel_sel=$this->select_where('customer',$where);
					$fetch=$sel_sel->fetch_object();
					$del_img=$fetch->img;
					
					$res=$this->delete_where('customer',$where);
					if($res)
					{
						unlink('../website/img/customer/'.$del_img); // del image
						echo "<script>
							alert('Customer Deleted suuccessfully');
							window.location='manage_customer';
						</script>";
					}
				}
				
				if(isset($_REQUEST['del_contacts']))
				{
					$id=$_REQUEST['del_contacts'];
					$where=array("id"=>$id);
					$res=$this->delete_where('contacts',$where);
					if($res)
					{
						echo "<script>
							alert('Contacts Deleted suuccessfully');
							window.location='manage_inquiry';
						</script>";
					}
				}
				
				
				
			break;
			
			
			
			case '/status':
				
				if(isset($_REQUEST['status_customer']))
				{
					$id=$_REQUEST['status_customer'];
					$where=array("id"=>$id);
					
					// status get for delete
					$sel_sel=$this->select_where('customer',$where);
					$fetch=$sel_sel->fetch_object();
					$status=$fetch->status;
					
					if($status=="Block")
					{
						$arr=array("status"=>"Unblock");
						$res=$this->update('customer',$arr,$where);
						if($res)
						{
							
							echo "<script>
								alert('Customer Unblock suuccessfully');
								window.location='manage_customer';
							</script>";
						}
					}
					else
					{
						$arr=array("status"=>"Block");
						$res=$this->update('customer',$arr,$where);
						if($res)
						{
							unset($_SESSION['userid']);
							unset($_SESSION['username']);
							echo "<script>
								alert('Customer Block suuccessfully');
								window.location='manage_customer';
							</script>";
						}
					}
					
				}
				
				
				if(isset($_REQUEST['status_product']))
				{
					$id=$_REQUEST['status_product'];
					$where=array("id"=>$id);
					
					// status get for delete
					$sel_sel=$this->select_where('products',$where);
					$fetch=$sel_sel->fetch_object();
					$status=$fetch->status;
					
					if($status=="Not Available")
					{
						$arr=array("status"=>"Available");
						$res=$this->update('products',$arr,$where);
						if($res)
						{
							
							echo "<script>
								alert('Product Available suuccessfully');
								window.location='manage_product';
							</script>";
						}
					}
					else
					{
						$arr=array("status"=>"Not Available");
						$res=$this->update('products',$arr,$where);
						if($res)
						{
							echo "<script>
								alert('Product Not Available suuccessfully');
								window.location='manage_product';
							</script>";
						}
					}
					
				}
				
				
			break;
			
			
			default:
				include_once('pnf.php');
			break;
		}
		
	}
	
}
$obj=new control;




?>