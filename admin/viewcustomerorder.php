<?php include('includes/header.php') ?>
<?php 
	//include('../inc/myconnect.php');
	/*$query="SELECT * FROM customer_order";
	$result=mysqli_query($dbc,$query);*/
	//CÁCH KHÁC KẾT NỐI CSDL BẰNG pdo
	$dbc = new PDO(
        'mysql:host=localhost;dbname=traveltour;charset=utf8',
        'root','');
	$sql="SELECT * FROM customer_order ORDER BY order_date";
	//$sql="SELECT * FROM vw_subcategory ";
	$query=$dbc->prepare($sql);
	$query->execute();
	$resultfetch = $query->fetchAll(PDO::FETCH_OBJ);
	//class="table table-bordered"
 ?>
 <form method="POST">
<!-- <div  class="card-body"> -->
	<table style="table-layout: fixed;">
		<tr>
			<th>ID</th>
			<th>HỌ TÊN</th>
			<th>EMAIL</th>
			<th>DI ĐỘNG</th>
			<th>ĐỊA CHỈ</th>
			<th>NGÀY ĐẶT</th>
			<th>TRẠNG THÁI</th>
			
		</tr>
		<?php foreach($resultfetch as $r) : ?>
		<tr>
			<td><?= $r->ID  ?></td>
			<td><?= $r->contact_name; ?></td>
			<td><?=  $r->email; ?></td>
			<td><?=  $r->phone; ?></td>
			<td><?=  $r->address; ?></td>
			<td><?= $r->order_date?></td>
			<td>
				<?php if($r->status==0){ ?>
				<a onclick= "return confirm('Xác nhận đặt tour?')" class='btn btn-primary' href='confirmorder.php?id=<?=$r->ID ?>'>Xác nhận</a> <?php } ?>
				<?php if($r->status==1){ ?>
				<a onclick= "return confirm('Xác nhận hủy tour?')" class='btn btn-primary' style="height:38px ;width:90.66px; " href='cancelorder.php?id=<?= $r->ID?>'>Hủy</a> <?php } ?>			
			</td>
			<td>
				<a href='edit.php?id=<?= $r->ID ?>' class="btn btn-info">Edit</a>
			</td>
			<td>
				<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="deleteorder.php?id=<?=$r->ID ?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<!-- </div> -->
</form>
<?php include('includes/footer.php') ?>