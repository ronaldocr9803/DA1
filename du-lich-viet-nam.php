<?php include('../traveltour/header.php'); ?>
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
	<div class="container">       
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Về chúng tôi        
				</h1> 
				<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="aboutme.php"> Về chúng tôi</a></p>
			</div>  
		</div>
	</div>
</section> <br>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<img style="width:350px;height:190px;" src="/traveltour/img/aodai.jpg">
		</div>
		<div class="col-md-8">
			<h1><a href="du-lich-viet-nam.php"><span class="title" style="color: orange;">Du lịch trong nước</span></a></h1><hr>
			<p style="font-style:italic;color: black;font-family: 'Roboto';font-size: 15px;">
				Du lịch trong nước luôn là lựa chọn tuyệt vời. Đường bờ biển dài hơn 3260km, những khu bảo tồn thiên nhiên tuyệt vời, những thành phố nhộn nhịp, những di tích lịch sử hào hùng, nền văn hóa độc đáo và hấp dẫn, cùng một danh sách dài những món ăn ngon nhất thế giới, Việt Nam có tất cả những điều đó. Với lịch trình dày, khởi hành đúng thời gian cam kết, Vietravel là công ty lữ hành uy tín nhất hiện nay tại Việt Nam, luôn sẵn sàng phục vụ du khách mọi lúc, mọi nơi, đảm bảo tính chuyên nghiệp và chất lượng dịch vụ tốt nhất thị trường
			</p><br>
		</div>
	</div>
</div>
<div class="container">
	<div class="col-md-12 text-center">
		<h2 style="color:#fc6600;font-family: 'Roboto';font-size: 28px;">
			Danh sách tour du lịch trong nước
		</h2>
	</div>
<?php 
	$sqltotal = $dbc->prepare('SELECT COUNT(IDSubca) as total FROM subcategory WHERE IDCat=1');
	$sqltotal->execute();
	$result=$sqltotal->fetchAll(PDO::FETCH_OBJ);
    foreach ($result as $r):
        $total_records = $r->total;
    endforeach;
 	//tim limit page va current page
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      echo "current_page: ".$current_page;
      $limitt=3;

      // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
      // tổng số trang
      $total_page = ceil($total_records / $limitt);
       
      // Giới hạn current_page trong khoảng 1 đến total_page
      if ($current_page > $total_page){
          $current_page = $total_page;
      }
      else if ($current_page < 1){
          $current_page = 1;
      }
       
      // Tìm Start
      $start = ($current_page - 1) * $limitt;
      echo '  '.$start.' ';
      echo $limitt.' ';
      $start=(int)$start;
      $limitt=(int)$limitt;
      // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
      // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
      $limit = ' LIMIT ' . $start . ', ' . $limitt;
      $sql = $dbc->prepare('SELECT * FROM subcategory WHERE IDCat=1'.$limit) ; // ok lun
	//$sql=$dbc->prepare("SELECT * FROM subcategory WHERE IDCat=1");
	$sql->execute();
	$result=$sql->fetchAll(PDO::FETCH_OBJ);
	//var_dump($result->Ten);
	foreach ($result as $row):
 ?>
	<div class="section-top-border1">
		<div class="row">
			<div class="col-md-3">
				<div style="position: relative;">
					<a href="/tourNDSGN5621-009-110519XE-H/ninh-chu-vinh-vinh-hy-co-thach-tu-khoi-hanh-toi-tour-mua-ngay-.aspx" title="Ninh Chữ - Vịnh Vĩnh Hy - Cổ Thạch Tự (Khởi hành Tối. Tour Mua Ngay) ">
						<?php require_once('../traveltour/getpicture.php'); ?>
						<!-- "https://travel.com.vn/Images/destination/tf_170821035418_454492.jpg" -->
						<img src="/traveltour/subcatimg/<?php echo getPictureFromIDSubcat($row->IDSubca); ?>" class="img-responsive pic" alt="Ninh Chữ - Vịnh Vĩnh Hy - Cổ Thạch Tự (Khởi hành Tối. Tour Mua Ngay) ">
					</a>
				</div>								
			</div>
			<!-- style="font-family:'Roboto', sans-serif;font-size: 17px;color:#333333;-->
			<div class="col-md-9 mt-sm-20 left-align-p">
				<div class="row">
					<div class="col-xs-12">
						<div class="tour-name">
							<a  id="nameoftour" href="" title="">
								<p style="font-family:'Roboto', sans-serif;font-size:20px;"><?= $row->Ten; ?></p></a>
								
						<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>				
						</div>	
						</div>
					</div>
				</div>

				<br><div class="row">
					<div class="col-lg-9 col-md-9 col-sm-9 border-right mg-bot10">
						<div class="row mg-listtour">
							<div class="col-lg-6 col-md-6 mg-bot10">
								<i class="fa fa-barcode"></i>&nbsp;&nbsp;<?= $row->IDSubca; ?>
							</div>
							<div class="col-lg-6 col-md-6 mg-bot10">
								<i class="fa fa-calendar"></i>&nbsp;&nbsp;Khởi hành: <?= date("d-m-Y",strtotime($row->NGAY_DI)); ?>
							</div>
							<div class="col-lg-6 col-md-6 mg-bot10">
								<i class="fa fa-clock-o"></i>&nbsp;&nbsp;Số ngày: <?= $row->THOI_GIAN ?>
							</div>
							<div class="col-lg-6 col-md-6 mg-bot10">
								<i class="fa fa-user"></i>&nbsp;&nbsp;Số khách đã đặt: <?= $row->SoNguoiDaDat; ?>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-3">
						<div style="text-align: right">
							<div class="price-new">
								<?= convertToVND($row->Gia); ?>
							</div>
							<a class="btn btn-sm btn-chitiet" href="/tourNDSGN5621-009-110519XE-H/ninh-chu-vinh-vinh-hy-co-thach-tu-khoi-hanh-toi-tour-mua-ngay-.aspx" title="Chi tiết">CHI TIẾT</a>
						</div>
					</div>
				</div>                				
			</div>
		</div>
	</div>
<?php endforeach;  ?>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <?php 
      for($i=1;$i<=$total_page;$i++)
      { ?>
        <li class="page-item"><a class="page-link" href="du-lich-viet-nam.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php } ?>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
<?php include('../traveltour/footer.php'); ?>