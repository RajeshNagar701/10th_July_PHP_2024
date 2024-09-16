<?php



class model{
	
	// magic function call automatic when we declare class object
	
	public $conn="";
	function __construct()
	{
					//hostname,username,pass,db name
		$this->conn=new Mysqli('localhost','root','','it_hub');
	}
	
	function select($tbl)
	{
		$sel="select * from $tbl";  // query
		$run=$this->conn->query($sel);   // query run on db
		while($fetch=$run->fetch_object()) // fetch all data
		{
			$arr[]=$fetch;
		}
		return $arr;
	}
	
}
$obj=new model;



?>