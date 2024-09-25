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
	
	function insert($tbl,$arr)
	{
		
		$col_arr=array_keys($arr); // array("0"=>"name","1"=>"email");
		$col=implode(",",$col_arr); // arr to string  name,email
		
		$value_arr=array_values($arr); // array("0"=>"raj","1"=>"raj@gmail");
		$value=implode("','",$value_arr); // arr to string  ' raj','raj@gmail','12345678 '

		
		echo $sel="insert into $tbl ($col) values ('$value')";  // query
		$run=$this->conn->query($sel);   // query run on db
		return $run;
	}
	
}
$obj=new model;



?>