
<?php include('includes/header.php') ?>
<div class="row">
	<div class="col-lg-12">
		<?php 
			include('../inc/myconnect1.php');
			$query="SELECT Cat_name from category";
			$cat = mysqli_query($dbc,$query);

			
		 ?>
<?php 
	include('../inc/myconnect1.php');
	if(isset($_POST["sbmt"]))
	{
		$Subcatname=$_POST['Subcatname'];
		$tourOption=$_POST['tourOption'];
		$details=$_POST['details'];
		$Price=$_POST['Price'];
		$ngaydi=$_POST['ngaydi'];
		$thoigian=$_POST['thoigian'];
		$from=$_POST['from'];
		$to=$_POST['to'];
		echo $to;
		if (is_null($to)) {
			$to = "";
		}

		$query ="INSERT INTO subcategory(Ten,IDCat,ChiTiet,Gia,SoNguoiDaDat,NGAY_DI,THOI_GIAN,FromCity,ToCity) VALUES ('{$Subcatname}','{$tourOption}','{$details}','{$Price}',89,'{$ngaydi}',$thoigian, {$from},{$to})";

		    
		
		$result=mysqli_query($dbc,$query);
		$idSubcat = mysqli_insert_id($dbc);
		if(mysqli_affected_rows($dbc)==1)
		{
			echo "<div class='alert alert-success'>";
			echo "<h2 style='color:red;'> Thêm bài viết thành công </h2> ";
			$files = $_FILES['files'];
		    $names      = $files['name'];
		    $types      = $files['type'];
		    $tmp_names  = $files['tmp_name'];
		    $errors     = $files['error'];
		    $sizes      = $files['size'];


		    $numitems = count($names);
		    $numfiles = 0;
		        for ($i = 0; $i < $numitems; $i ++) 
		        {
		            //Kiểm tra file thứ $i trong mảng file, up thành công không
		            if ($errors[$i] == 0)
		            {        
		                //echo "Bạn upload file thứ $numfiles:<br>";
		                //echo "Tên file: $names[$i] <br>";
		               // echo "Lưu tại: $tmp_names[$i] <br>";
		                //echo "Cỡ file: $sizes[$i] <br><hr>";
		                $x=$names[$i];
		                if(NotExist($x))
		                {
		                	$numfiles++;  
		                	$query ="INSERT INTO picture(idSubcat,pic) VALUES ($idSubcat,'{$x}')";
				            $result=mysqli_query($dbc,$query);
				                //Code xử lý di chuyển file đến thư mục cần thiết ở đây
				            move_uploaded_file($tmp_names[$i], "../subcatimg/"."$names[$i]");	
				            
		                }
		                else
		                {
		                	echo "file ".$x." đã tồn tại<br>";
		                }		
		                             
		               /* $query ="INSERT INTO picture(idSubcat,pic) VALUES (1,'{$x}')";

		                $result=mysqli_query($dbc,$query);
		                //Code xử lý di chuyển file đến thư mục cần thiết ở đây
		                move_uploaded_file($tmp_names[$i], "../subcatimg/".".$names[$i]");*/
		            }
		        }
		        echo "Tổng số file upload: " .$numfiles;  
			echo "</div>";
		}
		else
		{
			echo "<p>Thêm không thành công </p>";
		}

		//Ảnh
		/*if (mysqli_query($dbc, $query)) {
    	$idSubcat = mysqli_insert_id($dbc);}*/
		//$data=mysql_fetch_row($idSubcat);
			
	}
 ?>

		<form name="frm_add_article" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label>Tên bài viết</label>
				<input type="text" name="Subcatname" class="form-control" placeholder="Tên bài viết">
			</div>
			<div class="form-group">
				<label>Giá</label>
				<input type="number" name="Price" min="1" max="100000000000" class="form-control" placeholder="Giá">
			</div>
			<div class="form-group">
  				<label>Chi tiết</label><br>
  				<textarea class="" name="details" style="width: 100%;" rows="10" id="comment"></textarea>
			</div>
			<div class="form-groupp">
				<select name="tourOption" /><option value="">Loại tour</option>
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
  				<input type="date" name="ngaydi">			
				 Thời gian 
  				<input type="number" name="thoigian">
			</div>
			<div>
			  <div class="form-group">
   				 <select name="from" /><option value="">Khởi hành</option>
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
   				 <select name="to" /><option value="">Đến</option>
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
				  <button type="submit" class="btn btn-primary" name="sbmt">Thêm mới</button>

		</form> 
	</div>
</div>

 <?php 
	function NotExist($x)
 {
 	include('../inc/myconnect1.php');
 	$check="SELECT pic from picture";
	$checkresult=mysqli_query($dbc,$check);
	while ($data=mysqli_fetch_array($checkresult,MYSQLI_ASSOC)) 
	{
		if($x==$data['pic'])
		{
			return false;
		}	
	}
	return true;
 }
 ?>
<!-- <?php include('includes/footer.php') ?> 





