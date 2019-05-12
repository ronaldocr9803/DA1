<?php include('../inc/myconnect.php'); ?>
<?php include('includes/header.php'); ?>
<?php 
	$sql="SELECT * FROM vw_subcategory";
	$query=$dbc->prepare($sql);
	$query->execute();
	$resultfetch = $query->fetchAll(PDO::FETCH_OBJ);
 ?>
<form method="POST">
<div  class="card-body">
	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>TÊN</th>
			<th>LOẠI TOUR</th>
			<th>GIÁ</th>
			<th>NGÀY ĐI</th>
			<th>THỜI GIAN</th>
			<th>XUẤT PHÁT</th>
			<th>ĐIỂM ĐẾN</th>
		</tr>
		<?php foreach($resultfetch as $r) : ?>
		<tr>
			<td><?= $r->IDSubca;  ?></td>
			<td><?= $r->Ten; ?></td>
			<td><?=  $r->NAME ?></td>
			<td><?=  $r->Gia; ?></td>
			<td><?=  $r->NGAY_DI; ?></td>
			<td><?=  $r->THOI_GIAN; ?></td>
			<td><?=  $r->FROM_CITY; ?></td>
			<td><?=  $r->TO_CITY; ?></td>
			<!--<td>
				<a href='view_article_details.php?id=<?= $r->IDSubca ?>' class="btn btn-info">Details</a>
			</td> -->
			<td>
				<a href='edit_article.php?id=<?= $r->IDSubca ?>' class="btn btn-info">Edit</a>
			</td>
			<td>
				<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="delete_article.php?id=<?=$r->IDSubca ?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
</div>
</form>
<?php include('includes/footer.php'); ?>