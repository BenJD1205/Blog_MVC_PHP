<h3 style="text-align:center">Liệt kê danh mục bài viết</h3>
<?php
	if(!empty($_GET['msg'])){
		$msg = unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo '<span>'.$value.'</span>';	
		}
	} 
?>	
<div class="container">
	<div class="col-md-12">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Mã đơn hàng</th>
		      <th scope="col">Ngày đặt</th>
		      <th scope="col">Tình trạng đơng hàng</th>
		      <th scope="col">Quản lí</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$i=0;
		  		foreach ($order as $key => $ord) {
					$i++;		  		 	
		  	?>
		    <tr>
		      <td style="font-size: 20px;"><?php echo $i ?></td>
		      <td style="font-size: 20px;"><?php echo $ord['order_code'] ?></td>
		      <td style="font-size: 20px;"><?php echo $ord['order_date'] ?></td>
		      <td style="font-size: 20px;"><?php if($ord['order_status']==0){echo 'Đơn hàng mới';}else{echo 'Đã xử lí';} ?></td>
		      <td style="font-size: 20px;"><a href="<?php echo BASE_URL ?>/order/order_details/<?php echo $ord['order_code'] ?>">Xem đơn hàng</a></td>
		    </tr>
		    <?php
		    	} 
		    ?>
		  </tbody>
		</table>
	</div>
</div>
