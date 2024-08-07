<?php

/*
 2 tYPES OF function_exists  block of code
 
 1) BUILD IN function  predifined count()  // php function   print("hello")
 2) USER defined  function sum(){}
 
*/


//1) BUILD IN function  predifined count()



$name="Raj";
echo strlen($name);

echo "<br>";

$sum=3584;
var_dump($sum);
print($sum);








/*
$a=20;
$b=10;
echo $sum=$a+$b;
*/


// user defined function

/*

function sum()
{
	$a=10;
	$b=20;
	echo $sum=$a+$b."<br>";
}
sum();
sum();

*/

// function with parameter

/*
function sum($a,$b)
{
	echo $sum=$a+$b."<br>";
}
sum(50,10);
sum(30,20);
sum(25,20)
*/


/*
// function with parameter with default value
function sum($a=0,$b=0)
{
	echo $sum=$a+$b."<br>";
}
sum(50,10);
sum(30,20);
sum()
*/




// return
/*
function sum()
{
	return 5+7;
}
echo sum();
*/

//===========================================================





?>