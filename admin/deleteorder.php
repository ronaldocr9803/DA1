<?php 
	$dbc = new PDO(
        'mysql:host=localhost;dbname=traveltour;charset=utf8',
        'root','');
	$id=$_GET['id'];
	$delete ="DELETE FROM customer_order WHERE ID =:id";
	$statement = $dbc->prepare($delete);
	if($statement->execute([":id" => $id]))
	{
		header("Location: viewcustomerorder.php");
	}
 ?>