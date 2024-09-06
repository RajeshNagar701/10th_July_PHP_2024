<html>
<head>
<title> </title>
</head>
<body>

<!-- 
Method  get => $_GET['']

-->
<form action="" method="get">
    
	<p>Name: <input type="text" name="name"/></p>
	<p>Age: <input type="text" name="age"/></p>
	<p><input type="submit" name="submit" value="Click"/></p>
	
</form>


<?php
	if(isset($_GET['submit']))
	{
		echo $name=$_GET['name'];
		echo $age=$_GET['age'];
	}
?>




</body>
</html>
