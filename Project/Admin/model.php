<?php

// rajeshnagar.tops@gmail.com

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
	
	//where condition login / fetch where data
	function select_where($tbl,$where)
	{
		$col_arr=array_keys($where); //array("0"=>"email","1"=>"password")
		$value_arr=array_values($where);  //  array("0"=>"raj@gmail.com","1"=>"abc")
		
		$sel="select * from $tbl where 1=1";  // query continue
		$i=0;
		foreach($where as $w)
		{
			$sel.=" and $col_arr[$i]='$value_arr[$i]'";
			$i++;
		}
		$res=$this->conn->query($sel);   // query run on db
		return $res;
	}
	
	
	
	function select_join($tbl1,$tbl2,$col,$on)
	{
		$sel="select $tbl1.*,$tbl2.$col from $tbl1 join $tbl2 on $on";  // query
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

		$ins="insert into $tbl ($col) values ('$value')";  // query
		$run=$this->conn->query($ins);   // query run on db
		return $run;
	}
	
	function update($tbl,$arr,$where)
	{
		$col_arr=array_keys($arr); // array("0"=>"name","1"=>"email");
		$value_arr=array_values($arr); // array("0"=>"raj","1"=>"raj@gmail");
		
		$upd="update $tbl set"; 
		$j=0;	
		$count=count($arr);
		foreach($arr as $w)
		{
			if($count==$j+1)
			{
				$upd.=" $col_arr[$j]='$value_arr[$j]'";
			}
			else
			{
				$upd.=" $col_arr[$j]='$value_arr[$j]',";
				$j++;
			}
		}
		
		$wcol_arr=array_keys($where); //array("0"=>"email","1"=>"password")
		$wvalue_arr=array_values($where);  //  array("0"=>"raj@gmail.com","1"=>"abc")
		
		$upd.=" where 1=1";  // query continue
		$i=0;
		foreach($where as $w)
		{
			$upd.=" and $wcol_arr[$i]='$wvalue_arr[$i]'";
			$i++;
		}
	
		$run=$this->conn->query($upd);   // query run on db
		return $run;
	}
	
	
	// delete from customer where id=1  
	function delete_where($tbl,$where)
	{
		$col_arr=array_keys($where); //array("0"=>"email","1"=>"password")
		$value_arr=array_values($where);  //  array("0"=>"raj@gmail.com","1"=>"abc")
		
		$del="delete from $tbl where 1=1";  // query continue
		$i=0;
		foreach($where as $w)
		{
			$del.=" and $col_arr[$i]='$value_arr[$i]'";
			$i++;
		}
		$res=$this->conn->query($del);   // query run on db
		return $res;
	}
	
}
$obj=new model;



?>