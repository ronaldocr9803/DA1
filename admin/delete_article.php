<?php 
	$dbc = new PDO(
        'mysql:host=localhost;dbname=traveltour;charset=utf8',
        'root','');
	$id=$_GET['id'];
	$delete ="DELETE FROM subcategory WHERE IDSubca =:id";
	$statement = $dbc->prepare($delete);
	if($statement->execute([":id" => $id]))
	{
		header("Location: view_article.php");
	}
 ?>