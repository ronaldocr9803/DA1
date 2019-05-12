<?php 
	$dbc = new PDO(
        'mysql:host=localhost;dbname=traveltour;charset=utf8',
        'root','');
	$id=$_GET['id'];
	$check ="UPDATE customer_order SET status=0 WHERE ID =:id";
	$statement1 = $dbc->prepare($check);
	if($statement1->execute([":id" => $id]))
	{
		header("Location: viewcustomerorder.php");
	}

 ?>