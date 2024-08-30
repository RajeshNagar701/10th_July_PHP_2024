<?php

/*

$a="raj";
$b="akash";
$c="mahesh";

$names=array("Raj","akash","mahesh");
echo $names[0]



collections of values

$nemeric=array("a","b","c");  index auto generate 0
$associatearray("raj"=>"a","2"=>"b","3"=>"c");  // associate
$multidemetional=array("a","b"=>array("p","q"),"c");  // multidemetional

*/

$name="a";
$name1="b";
$name2="c";

$arr=array("a","b","c","d","e","f","g");
print_r($arr);

echo $arr[0]; 
echo $arr[1]; 
echo $arr[2]."<br>"; 

foreach($arr as $a)
{
	echo "<h1>". $a ."</h1>";
}

?>