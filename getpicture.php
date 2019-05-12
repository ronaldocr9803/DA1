<?php 
	function getPictureFromIDSubcat($idSubcat)
	{
		include('../traveltour/inc/myconnect.php'); 
		$sql=$dbc->prepare("SELECT * FROM picture WHERE idSubcat=:idSubcat limit 1");
		$sql->execute([":idSubcat"=>$idSubcat]);
		$result=$sql->fetchAll(PDO::FETCH_OBJ);
		foreach ($result as $row):
			return $row->pic;
		endforeach;
	}
 ?>
