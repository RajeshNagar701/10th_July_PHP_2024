
<?php
$a=100;
$b=100;
if($a==$b)
{
	header('location:wellcome_location.php'); //you will redirected in wellcome.php page  	
	/*
	
	echo "<script>
		window.location='wellcome_location.php';
	</script>";
	
	*/
	
}
else
{
	echo "Wrong condition";	
}
?>
