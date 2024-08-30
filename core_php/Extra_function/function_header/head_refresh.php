

<?php
$a=100;
$b=100;
if($a==$b)
{
	echo "you will redirected in 5 second look it";
	header("refresh:5;wellcome_location.php"); // you will redirected in five second on wellcome_refresh.php page

}
else
{
	echo "Wrong condition";	
}
?>

