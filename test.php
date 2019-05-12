	<?php include('../traveltour/inc/myconnect.php'); ?>
	<?php include('../traveltour/admin/tiente.php'); ?>

	<?php 
	/*	$cars = array
  (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
  );*/
  
/*$course = array(
    'FRONTEND' => array(
    'title' => 'Khóa học lập trình Frontend Online',
    'fee' => 1200000
    ),
    'PHP-MYSQL' => array(
    'title' => 'Khóa học  lập trình web PHP-MYSQL',
    'fee' => 1680000
    )
);
foreach($course as $k => $v){
    echo "{$k}<br/>";
    echo "--{$v['title']}<br/>";
    echo "--{$v['fee']}<br/>";
}*/

 /* $x=array(1) {
  [0]=>
  array(1) {
    ["CITY_NAME"]=>
    string(9) "Hà Nội"
  }
}*/
/*foreach ($cars as $r) {
	var_dump($r);
	echo "\n";
}*/

 	 ?>
<?php 
	/*$sql="SELECT * FROM vw_subcategory ORDER BY IDSubca ";
	$statement=$dbc->prepare($sql);
	$statement ->execute();
	//$resultfetch = $statement ->fetch(PDO::FETCH_OBJ);
	 while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        var_dump($row).'\n';
    }*/

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/jquery-ui.css">				
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">				
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="/traveltour/css/custom.css">
 </head>
 <body>
 	<?php 
		if(isset($_POST["sbmt"]))
		{
			$from=mb_strtoupper($_POST['from'],'UTF-8');
			//$from=$_POST['from'];
			var_dump($from);
			$to=mb_strtoupper($_POST['to'],'UTF-8');
			var_dump($to);
			$start=date_create($_POST['start']);
			$start1=date("Y-m-d",strtotime($_POST['start']));
			echo $_POST['start'];
			//date("d-m-Y",strtotime($row['NGAY_DI']))
			//$start1=$_POST['start'];
			//var_dump($_POST['start']);
			//$start=date_create(date("m-d-Y",strtotime($_POST['start'])));
			//$return=date_create(date("m-d-Y",strtotime($_POST['return'])));
			//var_dump($return);
			$return=date_create($_POST['return']);
			$interval = $return->diff($start);
			$THOI_GIAN = (int)$interval->format('%a');
			var_dump($THOI_GIAN);
			$sql = 'SELECT * from vw_subcategory where UPPER(FROM_CITY)=:FROM_CITY and UPPER(TO_CITY)=:TO_CITY and NGAY_DI=:NGAY_DI and THOI_GIAN=:THOI_GIAN limit 0,6';
			/*$sql1="select * from vw_subcategory";
			$statement1=$dbc->prepare($sql1); 
			$result=$statement1->execute();*/
			// UPPER(FROM_CITY)=:FROM_CITY and UPPER(TO_CITY)=:TO_CITY and ":THOI_GIAN"=>$THOI_GIAN]	
					
			$statement=$dbc->prepare($sql);
			$statement->execute([":FROM_CITY"=>$from,":TO_CITY"=>$to,":NGAY_DI"=>date("Y-m-d",strtotime($_POST['start'])),":THOI_GIAN"=>$THOI_GIAN]);
			//$statement->execute([":NGAY_DI"=>date("d-m-Y",strtotime($_POST['start']))]);
			//$statement execute([":NGAY_DI"=>$_POST['start']]);
			/*if($statement->execute([":FROM_CITY"=>'$from',":TO_CITY"=>$to,":NGAY_DI"=>date("m-d-Y",strtotime($_POST['start'])),
				":THOI_GIAN"=>"$THOI_GIAN"]))
			{
				echo "ok";
			}
			else echo "not ok";*/
			$result=$statement->fetchAll(PDO::FETCH_OBJ);
			//echo $result;
			foreach ($result as $r):
				echo $r->Gia;
			endforeach;

			
		}
	 ?>
 	<form class="form-wrap" method="POST">
									<input type="text" class="form-control" name="from" placeholder="Từ " onfocus="this.placeholder = ''" onblur="this.placeholder = 'From '">									
									<input type="text" class="form-control" name="to" placeholder="Đến " onfocus="this.placeholder = ''" onblur="this.placeholder = 'To '">
									<input type="text" class="form-control date-picker" name="start" placeholder="Ngày đi " onfocus="this.placeholder = ''" onblur="this.placeholder = ' '">
									<input type="text" class="form-control date-picker" name="return" placeholder="Ngày về " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">					
									<button type="submit" name="sbmt" class="primary-btn text-uppercase">Tìm tour này</button>							
								</form>
 	<!--Carousel Wrapper-->
 <section class="destinations-area section-gap">
 	<div class="container">
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
  <!--Controls-->
  <!--/.Controls-->
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
    <li data-target="#multi-item-example" data-slide-to="1"></li>
    <li data-target="#multi-item-example" data-slide-to="2"></li>
  </ol> 
  <!--/.Indicators -->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <!--First slide-->
    <div class="carousel-item active">
    	<div class="row">
      <?php 
							$sql="SELECT * FROM vw_subcategory ";
							$statement=$dbc->prepare($sql);
							$statement ->execute();
							$resultfetch = $statement -> fetchAll(PDO::FETCH_ASSOC);
							//while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
							foreach ($resultfetch as $row): 
							
							
						?>
							<div class="col-lg-4">
							<div class="single-destinations">
								<div class="thumb">
									<img src="img/packages/d2.jpg" alt="">
								</div>
								<div class="details">
									<div class="row">
										<div class="col-md-12">
											<a href=""><?=  $row['Ten']; ?></a>							
										</div>
									
									</div>
									
									<ul class="package-list">
										<li class="d-flex justify-content-between align-items-center">
											<span>Thời gian</span>
											<span><?= $row['THOI_GIAN']." ngày" ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Ngày khởi hành</span>
											<span><?= date("d-m-Y",strtotime($row['NGAY_DI'])) ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Loại Tour</span>
											<span><?= $row['NAME'] ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Xuất phát</span>
											<span><?= $row['FROM_CITY'] ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Số khách đã đặt</span>
											<span><?= $row['SoNguoiDaDat'] ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Giá</span>
											<a href="#" class="price-btn"><?= convertToVND($row['Gia']) ?></a>
										</li>													
									</ul>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
      </div>
    </div>
    <!--/.First slide-->

    <!--Second slide-->
    <div class="carousel-item">
    	<div class="row">
      <div class="col-md-4">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>
      </div>
    </div>
    <!--/.Second slide-->
    <!--/.Third slide-->
  </div>
  <!--/.Slides-->
</div>
</div>
</section>
<!--/.Carousel Wrapper-->
<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>		
 			<script src="js/jquery-ui.js"></script>					
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>						
			<script src="js/jquery.nice-select.min.js"></script>					
			<script src="js/owl.carousel.min.js"></script>							
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	

 </body>
 </html>