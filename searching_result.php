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
      </section> 
 <h1 class="container">KẾT QUẢ TÌM KIẾM</h1>
 <?php //echo $_GET['page']; ?>
 <?php 
      $from=mb_strtoupper($_GET['from'],'UTF-8');
      //$from=$_POST['from'];
      var_dump($from);
      $to=mb_strtoupper($_GET['to'],'UTF-8');
      var_dump($to);
      $start=new DateTime($_GET['start']);
      //$start=date_create($_GET['start']);
      //$return=date_create($_GET['return']);
      $return=new DateTime($_GET['return']);
      $interval = $return->diff($start);
      $THOI_GIAN = (int)$interval->format('%a');
      var_dump($THOI_GIAN);
      $form_data='from='.urlencode($_GET['from']).'&to='.urlencode($_GET['to']).'&start='.urlencode($_GET['start']).'&return='.urlencode($_GET['return']);
      $sql = 'SELECT COUNT(IDSubca) as total from vw_subcategory where UPPER(FROM_CITY) =:FROM_CITY and UPPER(TO_CITY) =:TO_CITY 
          and NGAY_DI=:NGAY_DI and THOI_GIAN=:THOI_GIAN ';
      $statement=$dbc->prepare($sql);
      $statement->execute([":FROM_CITY"=>$from,":TO_CITY"=>$to,":NGAY_DI"=>date("Y-m-d",strtotime($_GET['start'])),":THOI_GIAN"=>$THOI_GIAN]);
      $result=$statement->fetchAll(PDO::FETCH_OBJ);
      foreach ($result as $r):
        $total_records = $r->total;
      endforeach;

      //tim limit page va current page
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      echo "current_page: ".$current_page;
      $limitt=6;

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
      $sql1 = 'SELECT *  from vw_subcategory where UPPER(FROM_CITY) =:FROM_CITY and UPPER(TO_CITY) =:TO_CITY 
          and NGAY_DI=:NGAY_DI and THOI_GIAN=:THOI_GIAN'.$limit ; // ok lun
      /*$sql1->bindParam(":start",$start,PDO::PARAM_INT);
      $sql1->bindParam("limitt",$limitt,PDO::PARAM_INT);*/
      $statement1=$dbc->prepare($sql1);
      $statement1->execute([":FROM_CITY"=>$from,":TO_CITY"=>$to,":NGAY_DI"=>date("Y-m-d",strtotime($_GET['start'])),":THOI_GIAN"=>$THOI_GIAN/*,":start"=>$start,":limitt"=>$limitt*/]);
      $result1=$statement1->fetchAll(PDO::FETCH_OBJ);
      foreach ($result1 as $row):
        $a=$row->Gia;
        echo $a.'  ';
      endforeach;
  ?>
<div class="row">
  <?php 
    foreach ($result1 as $row):
   ?>
      <div class="col-md-4">
        <div class="card mb-2">
          <?php require_once('../traveltour/getpicture.php'); ?>
          <img class="card-img-top"
            src="/traveltour/subcatimg/<?php echo getPictureFromIDSubcat($row->IDSubca); ?>" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title"><?= $row->Ten ;?></h4>
            <i class="fa fa-clock-o"><?= ' '.$row->THOI_GIAN.' ngày'?></i><br>
            <i class="fa fa-calendar"><?= ' '.date("d-m-Y",strtotime($row->NGAY_DI)) ?></i><br>
            <p>Số khách đã đặt: </p>
            <p class="card-text"><?= $row->ChiTiet ?></p>
            <a href="#" class="price-btn"><?= convertToVND($row->Gia) ?></a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

      <!-- <div class="col-md-4">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text"><?= $row->ChiTiet ?></p>
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
      </div>-->
      </div> 

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
        <li class="page-item"><a class="page-link" href="searching_result.php?<?php echo $form_data; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
