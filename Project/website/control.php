<?php

class control{
	
	function __construct(){ // magic function call automatic when we declare class object
					
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
				include_once('course.php');
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
				echo "<h1>Hello</h1>";	
				include_once('contact.php');
			break;
			
			case '/login':
				include_once('login.php');
			break;
			
			case '/signup':
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