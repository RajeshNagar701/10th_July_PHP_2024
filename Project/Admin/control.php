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
				include_once('index.php');
			break;
			
			case '/dashboard':
				include_once('dashboard.php');
			break;
			
			case '/add_categories':
				
				include_once('add_categories.php');
			break;
			
			case '/manage_categories':
				$cate_arr=$this->select('categories');
				include_once('manage_categories.php');
			break;
			
			case '/add_product':
				include_once('add_product.php');
			break;
			
			case '/manage_product':
				$prod_arr=$this->select('products');
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