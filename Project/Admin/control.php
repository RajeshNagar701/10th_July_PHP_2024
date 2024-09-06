<?php

class control{
	
	function __construct(){ // magic function call automatic when we declare class object
					
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
				include_once('manage_categories.php');
			break;
			
			case '/add_product':
				include_once('add_product.php');
			break;
			
			case '/manage_product':
				include_once('manage_product.php');
			break;
			
			case '/manage_inquiry':
				include_once('manage_inquiry.php');
			break;
			
			
			default:
				include_once('pnf.php');
			break;
		}
		
	}
	
}
$obj=new control;




?>