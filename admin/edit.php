<?php 
ob_start();
include('includes/header.php'); 
?>
	<?php 
			$dbc = new PDO(
        'mysql:host=localhost;dbname=traveltour;charset=utf8',
        'root','');
		$id=$_GET['id'];
		$sql="SELECT * FROM customer_order WHERE ID =:id";
		$statement=$dbc->prepare($sql);
		$statement ->execute([":id" => $id]);
		$result = $statement ->fetch(PDO::FETCH_OBJ);

		//include('C:/xampp/htdocs/traveltour/inc/myconnect1.php');
		if(isset($_POST["sbmt"]))
		{
			$contact_name=$_POST['contact_name'];
			//echo $contact_name;
			$email=$_POST['email'];
			$phone=$_POST['phone'];
			$address=$_POST['address'];
			if(is_null($address))
			{
				$address='';
			}
			echo $address;
			$adults=$_POST['adults'];
			$children=$_POST['children'];
			$baby=$_POST['baby'];
			$notes=$_POST['notes'];
			// := this place holder
			/*$query="UPDATE  customer_order SET contact_name:contact_name,email,phone,address,n_of_adults,n_of_children,n_of_baby,order_date,note";*/
			$sql1 ="UPDATE customer_order SET contact_name=:contact_name,email=:email,phone=:phone,address=:address,
				   n_of_children=:children,n_of_adults=:adults,n_of_baby=:baby,notes=:notes WHERE ID=:id";
			$statement1 = $dbc->prepare($sql1);
			if($statement1->execute([":contact_name" => $contact_name,":email" => $email,":phone" => $phone,":address" =>$address,":children" => $children,":adults" => $adults,":baby" => $baby,":notes" => $notes, ":id" => $id]))
			{
				header("Location: http://localhost/traveltour/admin/viewcustomerorder.php");
			}
		}
	 ?>
	<span>GỬI YÊU CẦU ĐẶT TOUR</span>
<div>
<form method="POST" enctype="multipart/form-data">
	<div class="row">
	<div class="col-md-6">
		<label class="label">HỌ TÊN</label>
		<div>
			<input value="<?= $result->contact_name ?>" class="form-control" type="text" name="contact_name">
			<br>
		</div>
	</div>
	<div class="col-md-6">
		<label>EMAIL</label>
		<div>
			<input value="<?= $result->email ?>" class="form-control" type="text" name="email">
		</div>
	</div>
	</div>
	<div class="row">
	<div class="col-md-6">
		<label>DI ĐỘNG</label>
		<div>
			<input value="<?= $result->phone ?>" class="form-control" type="text" name="phone"><br>
		</div>
	</div>
	<div class="col-md-6">
		<label>ĐỊA CHỈ</label>
		<div>
			<input value="<?= $result->address ?>" class="form-control" type="text" name="address">
		</div>
	</div>
	</div>
	<div class="container">
			<div class="row">
			<div class="col-md-3">
				<label>Người lớn</label>
				<input value="<?= $result->n_of_adults ?>" class="form-control" type="text" name="adults">
			</div>
			<div class="col-md-3">
				<label>Trẻ em</label>
				<input value="<?= $result->n_of_children ?>" class="form-control" type="text" name="children">
			</div>
			<div class="col-md-3">
				<label>Trẻ nhỏ</label>
				<input value="<?= $result->n_of_baby ?>" class="form-control" type="text" name="baby">
			</div>
			<div class="col-md-3">
				<label style="color:red;">THÀNH TIỀN</label>
				<p name=""></p>
			</div>
		</div>
	</div>
	<div>
		<label>GHI CHÚ</label>
		<textarea class="form-control" name="notes" style="width: 100%;" rows="8" id="comment"></textarea><br>
	</div>
	 <button type="submit" class="btn btn-primary" name="sbmt">Cập nhật thông tin</button>
</form>
</div>
<?php include('includes/footer.php'); ?>