<?php

// collection values 

$name1="Raj";
$name2="Raheen";
$name3="Mayank";
		
		// index 0
$students=array("Raj","Raheen","Mayank","Akash","Nisha");

print_r($students);


echo $students[0]."<br>";
echo $students[1]."<br>";



for($i=0;$i<count($students);$i++)
{
	echo $students[$i]."<br>";
}

//===========================================

foreach($students as $s)
{
	echo $s."<br>";
}








?>
