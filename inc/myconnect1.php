 <!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>
	<?php 
	// kết nối vs csdl
	$dbc=mysqli_connect('localhost','root','','traveltour');
	if(!$dbc)
	{
		echo "Kết nối không thành công";
	}
	else
	{
		mysqli_set_charset($dbc, "utf8");
	}
 ?>
</body>
</html> 