<?php 
ob_start();
include('../traveltour/header.php'); ?>
   <section class="about-banner relative">
         <div class="overlay overlay-bg"></div>
        <div class="container">       
          <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
              <h1 class="text-white">
                Gửi yêu cầu      
              </h1> 
              <p class="text-white link-nav"><a href="index.php">Home </a>
            </div>  
          </div>
        </div>
      </section> 
	<?php 
		include('C:/xampp/htdocs/traveltour/inc/myconnect1.php');
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
			var_dump($adults);
			if($adults=='')
			{
				$adults=0;
			}
			var_dump($adults);
			$children=$_POST['children'];
			if($children=='')
			{
				$children=0;
			}
			$baby=$_POST['baby'];
			if($baby=='')
			{
				$baby=0;
			}
			$article=$_POST['article'];
			if(is_null($article))
			{
				$article='';
			}
			$notes=$_POST['notes'];
			if(is_null($notes))
			{
				$notes='';
			}

			$query="INSERT INTO customer_order(contact_name,email,phone,address,TieuDe,n_of_adults,n_of_children,n_of_baby,order_date,notes) VALUES('{$contact_name}','{$email}','{$phone}','{$address}','{$article}',{$adults},{$children},{$baby},NOW(),'{$notes}')";
			//$result=mysqli_query($dbc,$query);
			if(mysqli_query($dbc,$query))
			{
				 header("Location: thanks4order.php"); 
			}

		}
	 ?>
	<span>
		<br><br>
		<div class="container">
			<h4>
				Để có thể đáp ứng được các yêu cầu và các ý kiến đóng góp của quý vị một cách nhanh chóng xin vui lòng liên hệ
			</h4>
		</div><br>
	</span>
<div>
<form method="POST" enctype="multipart/form-data">
	<div class="row">
	<div class="col-md-6">
		<label style="font-weight: bold">HỌ TÊN</label>
		<div>
			<input class="form-control" type="text" name="contact_name">
			<br>
		</div>
	</div>
	<div class="col-md-6">
		<label style="font-weight: bold">EMAIL</label>
		<div>
			<input class="form-control" type="text" name="email">
		</div>
	</div>
	</div>
	<div class="row">
	<div class="col-md-6">
		<label style="font-weight: bold">DI ĐỘNG</label>
		<div>
			<input class="form-control" type="text" name="phone"><br>
		</div>
	</div>
	<div class="col-md-6">
		<label style="font-weight: bold">ĐỊA CHỈ</label>
		<div>
			<input class="form-control" type="text" name="address">
		</div>
	</div>
	</div>
	<div class="container">
			<div class="row">
			<div class="col-md-3">
				<label style="font-weight: bold">Người lớn</label>
				<input class="form-control" type="number" name="adults">
			</div>
			<div class="col-md-3">
				<label style="font-weight: bold">Trẻ em</label>
				<input class="form-control" type="number" name="children">
			</div>
			<div class="col-md-3">
				<label style="font-weight: bold">Trẻ nhỏ</label>
				<input class="form-control" type="number 	" name="baby">
			</div>
			<div class="col-md-3">
				<label style="color:red;">THÀNH TIỀN</label>
				<p name=""></p>
			</div>
			

		</div>
	</div>
	<div>
		<label style="font-weight: bold">TIÊU ĐỀ</label>
		<input class="form-control" name="article" style="width: 100%;" rows="8" id="comment"></input><br>
	</div>
	<div>
		<label style="font-weight: bold">NỘI DUNG</label>
		<textarea class="form-control" name="notes" style="width: 100%;" rows="8" id="comment"></textarea><br>
	</div>
	<div class="container">
		<button type="submit" class="btn btn-primary" name="sbmt">Gửi yêu cầu</button><br><br><br>
	</div>
</form>
</div>
</form>
<?php include('../traveltour/footer.php'); ?>