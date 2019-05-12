<?php
ob_start();
 include('includes/header.php'); ?>
<?php include('../inc/myconnect.php'); ?>
<?php 
	$id=$_GET['id'];
	$sql="SELECT * FROM vw_subcategory WHERE IDSubca =:id";
	$statement=$dbc->prepare($sql);
	$statement ->execute([":id" => $id]);
	$result = $statement ->fetch(PDO::FETCH_OBJ);

	if(isset($_POST["sbmt"]))
		{
			$sqlcity=$dbc->prepare("SELECT ID FROM city WHERE CITY_NAME=:city");
			$sqltouroption=$dbc->prepare("SELECT ID FROM category WHERE NAME=:nameoption");
			$Ten=$_POST['Subcatname'];
			//echo $contact_name;
			$Price=$_POST['Price'];
			$details=$_POST['details'];
			/*$tourOption=$_POST['tourOption'];
			var_dump($tourOption);*/
			if($_POST['tourOption']=="")
			{
				$sqltouroption->execute([":nameoption"=>$result->NAME]);
				$a=$sqltouroption->fetch(PDO::FETCH_ASSOC);
				$tourOption=$a['ID'];
			}	
			$ngaydi=$_POST['ngaydi'];
			if(is_null($ngaydi))
			{
				$ngaydi=$result->NGAY_DI;
			}
			$thoigian=$_POST['thoigian'];	
			$fromCity=$_POST['fromCity'];
			if($_POST['fromCity']=="")
			{
				$sqlcity->execute([":city"=>$result->FROM_CITY]);
				$a=$sqlcity->fetch(PDO::FETCH_ASSOC);
				$fromCity=$a['ID'];
			}
			$toCity=$_POST['toCity'];
			if($_POST['toCity']=="")
			{
				$sqlcity->execute([":city"=>$result->TO_CITY]);
				$a=$sqlcity->fetch(PDO::FETCH_ASSOC);
				$toCity=$a['ID'];
			}
			$sql1 ="UPDATE subcategory SET Ten=:Ten,Gia=:Price,ChiTiet=:details,IDCat=:tourOption,
				   NGAY_DI=:ngaydi,THOI_GIAN=:thoigian,FromCity=:fromCity,ToCity=:toCity WHERE IDSubca=:id";
			$statement1 = $dbc->prepare($sql1);
			if($statement1->execute([":Ten" => $Ten,":Price" => $Price,":details" => $details,":tourOption" =>$tourOption,":ngaydi" => $ngaydi,":thoigian" => $thoigian,":fromCity" => $fromCity,":toCity" => $toCity, ":id" => $id]))
			{

				header("Location: http://localhost/traveltour/admin/view_article.php");
			}
		}
 ?>
 <form name="frm_add_article" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label>Tên bài viết</label>
				<input type="text" name="Subcatname" class="form-control" value="<?= $result->Ten ?>" placeholder="Tên bài viết">
			</div>
			<div class="form-group">
				<label>Giá</label>
				<input type="number" name="Price" value="<?= $result->Gia ?>" min="1" max="100000000000" class="form-control" placeholder="Giá">
			</div>
			<div class="form-group">
  				<label>Chi tiết</label><br>
  				<textarea class="" name="details" style="width: 100%;" rows="10" id="comment"><?php echo "$result->ChiTiet"; ?></textarea>
			</div>
			<div class="form-groupp">
				<select name="tourOption" /><option value="" ><?php echo "$result->NAME"; ?></option>
					<?php
					include('../inc/myconnect1.php');
					$query="SELECT * from category";

					$cat = mysqli_query($dbc,$query);	
					
						
						while($data=mysqli_fetch_assoc($cat)/*mysqli_fetch_array($cat)*/)
					{

	
						echo "<option value=$data[ID]>$data[NAME]</option>";
	
					}
					?>

				</select>
			</div> 
			<div class="">
				 Ngày đi: 
  				<input value="<?= $result->NGAY_DI ?>" type="date" name="ngaydi">			
				 Thời gian: 
  				<input value="<?= $result->THOI_GIAN ?>" type="text" name="thoigian"> ngày
			</div>
			<div>
			  <div class="form-group">
   				 <select name="fromCity"  /><option value="" selected="selected"><?php echo "$result->FROM_CITY"; ?></option>
					<?php
					include('../inc/myconnect1.php');
					$query="SELECT * from city";

					$cat = mysqli_query($dbc,$query);	
					
						
						while($data=mysqli_fetch_assoc($cat)/*mysqli_fetch_array($cat)*/)
					{

	
						echo "<option value=$data[ID]>$data[CITY_NAME]</option>";
	
					}
					?>
				</select>
  				</div>
  				  <div class="form-group">
   				 <select name="toCity" /><option value="" selected="selected"><?php echo "$result->TO_CITY" ?></option>
					<?php
					include('../inc/myconnect1.php');
					$query="SELECT * from city";

					$cat = mysqli_query($dbc,$query);	
					
							while($data=mysqli_fetch_assoc($cat)/*mysqli_fetch_array($cat)*/)
					{

	
						echo "<option value=$data[ID]>$data[CITY_NAME]</option>";
	
					}
					?>
					

				</select>
  				</div>
  				</div>
				  <td class="lefttxt">Upload Pic  </td><td><input type="file" name="files[]" multiple /></td>
				  <button type="submit" class="btn btn-primary" name="sbmt">Sửa bài viết</button>

		</form> 
<?php include('includes/footer.php'); ?>