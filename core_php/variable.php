<?php
/*


$a=10; 

PHP has three different variable scopes:

local  : in function
global : out of function

static : static keywords 


PHP Data Types 

String  $name="rajesh"
Integer $age=34
Float   $per=87.5875          (floating point numbers - also called double)
Boolean $ans=true/false 
Array   $students=array("dhruv","ravi","hitanshi","divya","aarti","rimple") collection of values
Object  $obj=new className
NULL
Resource

php is loosely type laung due to not define any data type 



in c & c++

int i=10;
printf(i);



echo $a=10;

*/


/*


Rules for PHP variables:

A variable starts with the $ sign
A variable name must start with a letter or the underscore character
A variable name cannot start with a number
A variable name can only contain alpha-numeric characters and underscores (A-z, 0-9, and _ )

$abc123  true
$123abc  false
$_1234   true
$abc_123  true


Variable names are case-sensitive ($age and $AGE are two different variables)
*/




$a=10;  			// int
$name="raj nagar";  // string
$float=10.256354;   // float
$char='Y';         // char


echo "a value is ".$a."<br>";
echo "name is ".$name."<br>";
echo "float is ".$float."<br>";
echo "char is ".$char."<br>";



$x=10;
$y=20;
$sum=$x+$y;
echo "Sum of x & y is : ".$sum;

?>