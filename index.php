	<?php include('../traveltour/header.php'); ?>

	<?php 
		if(isset($_POST["sbmt"]))
		{
			$from=mb_strtoupper($_POST['from'],'UTF-8');
			//$from=$_POST['from'];
			var_dump($from);
			$to=mb_strtoupper($_POST['to'],'UTF-8');
			var_dump($to);
			$start=date_create($_POST['start']);
			$return=date_create($_POST['return']);
			$interval = $return->diff($start);
			$THOI_GIAN = (int)$interval->format('%a');
			var_dump($THOI_GIAN);
			$sql = 'SELECT * from vw_subcategory where UPPER(FROM_CITY) =:FROM_CITY and UPPER(TO_CITY) =:TO_CITY 
					and NGAY_DI=:NGAY_DI and THOI_GIAN=:THOI_GIAN ';
			$statement=$dbc->prepare($sql);
			$statement->execute([":FROM_CITY"=>$from,":TO_CITY"=>$to,":NGAY_DI"=>date("Y-m-d",strtotime($_POST['start'])),":THOI_GIAN"=>$THOI_GIAN]);
			$result=$statement->fetchAll(PDO::FETCH_OBJ);
			foreach ($result as $r):
				echo $r->Ten;
			endforeach;

			
		}
	 ?>
			<!-- start banner Area -->
			<section class="banner-area relative">
				<div class="overlay overlay-bg"></div>				
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						<div class="col-lg-6 col-md-6 banner-left">
							<h6 class="text-white">Away from monotonous life</h6>
							<h1 class="text-white">Magical Travel</h1>
							<p class="text-white">
								If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $.17 each.
							</p>
							<a href="#" class="primary-btn text-uppercase">Get Started</a>
						</div>
						<div class="col-lg-4 col-md-6 banner-right">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link" id="holiday-tab" data-toggle="tab" href="#holiday" role="tab" aria-controls="holiday" aria-selected="false">Bạn muốn đến đâu?</a>
							  </li>
							</ul>
							<div class="tab-content" id="myTabContent">
							  <div class="tab-pane fade show active" id="holiday" role="tabpanel" aria-labelledby="flight-tab">
								<form id="search_tour" class="form-wrap" method="GET" action="searching_result.php">
									<input type="text" class="form-control" name="from" placeholder="Từ " onfocus="this.placeholder = ''" onblur="this.placeholder = 'From '">									
									<input type="text" class="form-control" name="to" placeholder="Đến " onfocus="this.placeholder = ''" onblur="this.placeholder = 'To '">
									<input type="text" class="form-control date-picker" name="start" placeholder="Ngày đi " onfocus="this.placeholder = ''" onblur="this.placeholder = ' '">
									<input type="text" class="form-control date-picker" name="return" placeholder="Ngày về " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">	
									<a href="javascript: search_tour_getvalue()" class="primary-btn text-uppercase">Tìm tour này</a>	
									 <!-- <a href="searching_result.php?from=<?php $_POST['from']; ?>?to=<?php $_POST['to']; ?>?start=<?php $_POST['start']; ?>?days=<?php $_POST['return']; ?>"  class="primary-btn text-uppercase">Tìm tour này</a>			-->			
								</form>
							  </div>					
							</div>
						</div>
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

			<!-- Start popular-destination Area -->
			<section class="popular-destination-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <br><h1 class="mb-10">ĐIỂM ĐẾN VIỆT NAM PHỔ BIẾN</h1>
		                      
		                    </div>
		                </div>
		            </div>						
					<div class="row">
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/d1.jpg" alt="">
								</div>
								<div class="desc">	
									<a href="#" class="price-btn">$150</a>			
									<h4>Mountain River</h4>
									<p>Paraguay</p>			
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/d2.jpg" alt="">
								</div>
								<div class="desc">	
									<a href="#" class="price-btn">$250</a>			
									<h4>Dream City</h4>
									<p>Paris</p>			
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/d3.jpg" alt="">
								</div>
								<div class="desc">	
									<a href="#" class="price-btn">$350</a>			
									<h4>Cloud Mountain</h4>
									<p>Sri Lanka</p>			
								</div>
							</div>
						</div>												
					</div>
				</div>	
			</section>
			<!-- End popular-destination Area -->
			

			<!-- Start price Area -->
			<section class="price-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <br><br><h1 class="mb-10">We Provide Affordable Prices</h1>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
						<div class="col-lg-4">
							<div class="single-price">
								<h4>Tour trong nước</h4>
								<ul class="price-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>New York</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Maldives</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Sri Lanka</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Nepal</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Thiland</span>
										<a href="#" class="price-btn">$1500</a>
									</li>	
									<li class="d-flex justify-content-between align-items-center">
										<span>Singapore</span>
										<a href="#" class="price-btn">$1500</a>
									</li>														
								</ul>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-price">
								<h4>Tour cao cấp</h4>
								<ul class="price-list">
									<?php 
										$sql0 ="SELECT CITY_NAME FROM city where ID=:id";
										$sql="SELECT * FROM subcategory where IDCat=1 limit 3";
										$statement=$dbc->prepare($sql);
										$statement0=$dbc->prepare($sql0);
										$statement->execute();
										$resultfetch = $statement -> fetchAll(PDO::FETCH_ASSOC);
									 ?>
									 <?php 
									 	foreach ($resultfetch as $row): ?>
									 		
									 		<li class="d-flex justify-content-between align-items-center">
									 		<?php 
									 			$IDcity = $row['ToCity'];
									 			$sql0 ="SELECT CITY_NAME FROM city where ID=:id";
									 			$statement0=$dbc->prepare($sql0);
									 			$statement0->execute([":id" => $IDcity]); 
									 			
									 			$resultfetch0 = $statement0 -> fetchAll(PDO::FETCH_ASSOC);
									 			//var_dump($resultfetch0);
									 		//oreach($resultfetch0 as $row1):
									 		?>
									 		<span>
									 			<?php foreach($resultfetch0 as $k => $v)  // ok roi haha
									 			{
									 				echo "{$v['CITY_NAME']}";
									 			}

									 			?>
									 				
									 			</span>
									 		<a href="#" class="price-btn"><?= convertToVND($row['Gia']); ?></a>

									 	<?php endforeach; ?>
									
									<!-- <li class="d-flex justify-content-between align-items-center">
										<span>New York</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Maldives</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Sri Lanka</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Nepal</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Thiland</span>
										<a href="#" class="price-btn">$1500</a>
									</li>	
									<li class="d-flex justify-content-between align-items-center">
										<span>Singapore</span>
										<a href="#" class="price-btn">$1500</a>
									</li>-->													
								</ul>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-price">
								<h4>Tour nước ngoài</h4>
								<ul class="price-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>New York</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Maldives</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Sri Lanka</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Nepal</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Thiland</span>
										<a href="#" class="price-btn">$1500</a>
									</li>	
									<li class="d-flex justify-content-between align-items-center">
										<span>Singapore</span>
										<a href="#" class="price-btn">$1500</a>
									</li>														
								</ul>
							</div>
						</div>												
					</div>
				</div>	
			</section>
			<!-- End price Area -->
			
			<!-- Start testimonial Area -->
		    <section class="testimonial-area section-gap">
		        <div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <br><br><h1 class="mb-10">CẢM NHẬN CỦA KHÁCH HÀNG</h1>
		                        <p> </p>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="active-testimonial">
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user1.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                               Cảm ơn HaHa Travel giúp e có chuyến đi xa đầu tiên thuận lợi, vui vẻ, khách sạn Sông Công ở Đà Nẵng rất là oke luôn ạ :)) sau này có đi đâu e sẽ tiếp tục mua voucher của Sông Công. 
		                            </p>
		                            <h4>Trâm Bích Nguyễn</h4>
	                            	<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>				
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user2.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Nhân viên tư vấn rất nhiệt tình, dễ thương. Dịch vụ rất tốt và chu đáo. Tôi đã sử dụng dịch vụ của HaHa Travel đi Quảng Bình và tôi sẽ tiếp tục ủng hộ nếu có dịp. Chúc HaHa Travel (chi nhánh tại HCM) càng ngày càng nhìu khách hàng.
		                            </p>
		                            <h4>Tuyết Mai</h4>
	                           		<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>			
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user1.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                               Mình vừa trải nghiệm voucher 4n3d đi Phú Quốc của ty.<br>
		                               Cảm nhận về resot đẹp sạch sẽ có bể bơi và vew đẹp. Cách biển khoảng 2km nhưng đáp ứng nhu cầu của mình vì resot là 3* Nói chung hài lòng về voucher bên HaHa Travel.     
		                            </p>
		                            <h4>Bích (Bích Chuột)</h4>
	                            	<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>				
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user2.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                - Tư vấn và chăm sóc KH rất nhiệt tình<br>
		                                - Về xe đưa đón thì rất ok, tài xế vui vẻ, thân thiện<br>
		                                - Phòng khá ổn, sạch sẽ<br>
		                                Nchung thích nhất là về cách chăm sóc KH của HaHa<br>
		                            </p>
		                            <h4>Haru Neiru</h4>
	                           		<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>			
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user1.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Mình có đặt phòng trọn gói của HaHa Travel (chi nhánh tại Hồ Chí Minh).<br>
		                                Cảm nghiệm của mình rất là hài lòng và mình sẽ nhất định ủng hộ. Cám ơn đội ngũ nhân viên Alabay và riêng em sale - GẤM rất nhiều, rất nhiệt tình và dễ thương nữa.

		                            </p>
		                            <h4>Song Bien</h4>
	                            	<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>				
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user2.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Nhân viên tư vấn rất nhiệt tình, dễ thương. Dịch vụ rất tốt và chu đáo. Tôi đã sử dụng dịch vụ của Alabay đi Quảng Bình và tôi sẽ tiếp tục ủng hộ nếu có dịp. Chúc Alabay (chi nhánh Songcongtravel tại HCM) càng ngày càng nhìu khách hàng.
		                            </p>
		                            <h4>Tuyết Mai</h4>
	                           		<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>			
									</div>	
		                        </div>
		                    </div>		                    		                    
		                </div>
		            </div>
		        </div>
		    </section>
		    <!-- End testimonial Area -->

			<!-- Start home-about Area -->
			<section class="home-about-area">
				<div class="container-fluid">
					<div class="row align-items-center justify-content-end">
						<div class="col-lg-7 col-md-12 home-about-left">
							<h1>
								Bạn không tìm được tour? <br>
								Hãy để chúng tôi giúp bạn! <br>
								<br><br>
							<a href="bookingrequest.php" class="primary-btn text-uppercase">Gửi yêu cầu đặt tour</a>
						</div>
						<div class="col-lg-5 col-md-12 home-about-right no-padding">
							<img class="img-fluid" src="img/about-img.jpg" alt="">
						</div>
					</div>
				</div>	
			</section>
			<!-- End home-about Area -->
			
	
			<!-- Start blog Area -->
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
 <?php include('../traveltour/footer.php'); ?>