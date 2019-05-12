<?php 
	echo "dkm";
	echo "dmk";
	echo " ";
	if(isset($_POST["sbmt"]))
	{
		$x=htmlspecialchars($_POST['to']);
		echo $x;
	}
 ?>
 <!DOCTYPE html>
<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title></title>
</head>
<body>
	<form name="frm_add_article" method="POST">
					<select name="to" required/><option value="">Đến</option>
					<?php
					
					include('../inc/myconnect1.php');
					$query="SELECT * from city";
					$cat = mysqli_query($dbc,$query);	
					
						
						while($data=mysqli_fetch_assoc($cat)/*mysqli_fetch_array($cat)*/)
					{

	
						echo "<option value=$data[CITY_NAME]>$data[CITY_NAME]</option>";
	
					}
					?>
				</select>
				 <button type="submit" class="btn btn-primary" name="sbmt">Thêm mới</button>
				 </form>
				 <?php 
	
 ?>

</body>
</html>