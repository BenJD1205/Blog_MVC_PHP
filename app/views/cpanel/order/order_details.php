<h3 style="text-align:center">Liệt kê chi tiết sản phẩm</h3>
<div class="container">
	<div class="col-md-12">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Tên người đặt</th>
		      <th scope="col">Email</th>
		      <th scope="col">Số điện thoại</th>
		      <th scope="col">Địa chỉ</th>
		      <th scope="col">Ghi chú</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$i=0;
		  		foreach ($order_info as $key => $order) {
					$i++;		  		 	
		  	?>
		    <tr>
		      <td style="font-size: 20px;"><?php echo $i ?></td>
		      <td style="font-size: 20px;"><?php echo $order['name'] ?></td>
		      <td style="font-size: 20px;"><?php echo $order['email'] ?></td>
		      <td style="font-size: 20px;"><?php echo $order['sdt'] ?></td>
		      <td style="font-size: 20px;"><?php echo $order['diachi'] ?></td>
		      <td style="font-size: 20px;"><?php echo $order['noidung'] ?></td>
		    </tr>
		    <?php
		    	} 
		    ?>
		  </tbody>
		</table>
	</div>
	<div class="col-md-12">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Tên sản phẩm</th>
		      <th scope="col">Hình ảnh</th>
		      <th scope="col">Số lượng</th>
		      <th scope="col">Đơn giá</th>
		      <th scope="col">Thành tiền</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$i=0;
		  		$total=0;
		  		foreach ($order_details as $key => $ord) {
		  			$total += $ord['product_quantity']*$ord['price_product'];
					$i++;		  		 	
		  	?>
		    <tr>
		      <td style="font-size: 20px;"><?php echo $i ?></td>
		      <td style="font-size: 20px;"><?php echo $ord['title_product'] ?></td>
		      <td><img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $ord['image_product'] ?>" width="100" height="100"></td>
		      <td style="font-size: 20px;"><?php echo $ord['product_quantity'] ?></td>
		      <td style="font-size: 20px;"><?php echo number_format($ord['price_product'],0,',','.').'đ' ?></td>
		      <td style="font-size: 20px;"><?php echo number_format($ord['product_quantity']*$ord['price_product'],0,',','.').'đ' ?></td>
		    </tr>
		    <?php
		    	} 
		    ?>
		    <form method="POST" action="<?php echo BASE_URL ?>/order/order_confirm/<?php echo $ord['order_code'] ?>">
		    	<tr>
			    	<td><input type="submit" name="update_order" value="Đã xử lí" class="btn btn-success"></td>
			    	<td>Tổng tiền: <?php echo number_format($total,0,',','.').'đ' ?></td>
		    	</tr>
		    </form>
		  </tbody>
		</table>
	</div>
</div>
