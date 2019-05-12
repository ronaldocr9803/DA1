	
<?php
$date1=date_create("2013-05-09");
$date2=date_create("2013-05-14");
$diff=date_diff($date1,$date2);
//echo "$diff";
$so = (int)$diff->format("%ah");
echo $so;
if(is_int($so))
{
	echo "okk";
}
?>



	<?php include('../traveltour/inc/myconnect.php'); ?>
	<?php include('../traveltour/admin/tiente.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/traveltour/css/custom.css">
</head>
<body>


<h1>Bootstrap 4 carousel with description</h1>
<div class="container">
  
  <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators mb-0 pb-0">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->

  <div class="carousel-inner no-padding my-5" style="max-width:100%; max-height:100% !important;"> 
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
    <div class="carousel-item">
    	<div class="row">
      <div class="col-xs-4 col-sm-4 col-md-4">
        <a href="#" onclick=abc(this) class="slider_info">
          <img class="img-fluid card-img-top" src="http://via.placeholder.com/300x300">
          <div class="card-img-overlay t_img">
            <span class="float-left text-uppercase">article</span>
            <span class="float-right text-uppercase">2345 views</span>
          </div>
        </a>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi nesciunt quam obcaecati maiores atque labore fugiat tenetur tempore veritatis temporibus!</p>

      </div>
      <div class="col-xs-4 col-sm-4 col-md-4">
        <a href="#" onclick=abc(this) class="slider_info">
          <img class="img-fluid card-img-top" src="http://via.placeholder.com/300x300">
          <div class="card-img-overlay t_img">
            <span class="float-left text-uppercase">article</span>
            <span class="float-right text-uppercase">2345 views</span>
          </div>
        </a>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi nesciunt quam obcaecati maiores atque labore fugiat tenetur tempore veritatis temporibus!
        </p>

      </div>
      <div class="col-xs-4 col-sm-4 col-md-4">
        <a href="#" onclick=abc(this) class="slider_info">
          <img class="img-fluid card-img-top" src="http://via.placeholder.com/300x300">
          <div class="card-img-overlay t_img">
            <span class="float-left text-uppercase">article</span>
            <span class="float-right text-uppercase">2345 views</span>
          </div>
        </a>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi nesciunt quam obcaecati maiores atque labore fugiat tenetur tempore veritatis temporibus!</p>

      </div>
    </div>
    </div>
    <div class="carousel-item">
    	<div class="row">
      <div class="col-xs-4 col-sm-4 col-md-4">
        <a href="#" onclick=abc(this) class="slider_info">
          <img class="img-fluid card-img-top" src="http://via.placeholder.com/300x300">
          <div class="card-img-overlay t_img">
            <span class="float-left text-uppercase">article</span>
            <span class="float-right text-uppercase">2345 views</span>
          </div>
        </a>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi nesciunt quam obcaecati maiores atque labore fugiat tenetur tempore veritatis temporibus!</p>

      </div>
      <div class="col-xs-4 col-sm-4 col-md-4">
        <a href="#" onclick=abc(this) class="slider_info">
          <img class="img-fluid card-img-top" src="http://via.placeholder.com/300x300">
          <div class="card-img-overlay t_img">
            <span class="float-left text-uppercase">article</span>
            <span class="float-right text-uppercase">2345 views</span>
          </div>
        </a>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi nesciunt quam obcaecati maiores atque labore fugiat tenetur tempore veritatis temporibus!</p>

      </div>
      <div class="col-xs-4 col-sm-4 col-md-4">
        <a href="#" onclick=abc(this) class="slider_info">
          <img class="img-fluid card-img-top" src="http://via.placeholder.com/300x300">
          <div class="card-img-overlay t_img">
            <span class="float-left text-uppercase">article</span>
            <span class="float-right text-uppercase">2345 views</span>
          </div>
        </a>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi nesciunt quam obcaecati maiores atque labore fugiat tenetur tempore veritatis temporibus!
        </p>
      </div>
    </div>
  </div>
</div>
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
     <span class="carousel-control-prev-icon sp"></span>
                </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon sp"></span>
                </a>
</div>
 </div>

</body>
</html>