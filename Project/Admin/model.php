<?php



class model{
	
	// magic function call automatic when we declare class object
	
	public $conn="";
	function __construct(){
					//hostname,username,pass,db name
		$this->conn=new Mysqli('localhost','root','','it_hub');
	}
	
}
$obj=new model;



?>