<?php
	if(!empty($_GET['msg'])){
		$msg = unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo '<span>'.$value.'</span>';	
		}
	} 
?>
<p>Danh mục sản phẩm</p>
<div class="container">
	<div class="col-md-12">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th style="font-size: 20px;" scope="col">ID</th>
		      <th style="font-size: 20px;" scope="col">Tên sản phẩm</th>
		      <th style="font-size: 20px;" scope="col">Giá sản phẩm</th>
		      <th style="font-size: 20px;" scope="col">Danh mục</th>
		      <th style="font-size: 20px;" scope="col">Mô tả</th>
		      <th style="font-size: 20px;" scope="col">Số lượng</th>
		      <th style="font-size: 20px;" scope="col">Sản phẩm hot</th>
		      <th style="font-size: 20px;" scope="col">Hình sản phẩm</th>
		      <th style="font-size: 20px;" scope="col">Quản lí</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$i=0;
		  		foreach ($product as $key => $pro) {
					$i++;		  		 	
		  	?>
		    <tr>
		      <td style="font-size: 20px;"><?php echo $i ?></td>
		      <td style="font-size: 20px;"><?php echo $pro['title_product'] ?></td>
		      <td style="font-size: 20px;"><?php echo number_format($pro['price_product']) ?></td>
		      <td style="font-size: 20px;"><?php echo $pro['title_category_product'] ?></td>	
		      <td style="font-size: 20px;"><?php echo $pro['desc_product'] ?></td>
		      <td style="font-size: 20px;"><?php echo $pro['quantity_product'] ?></td>
		      <td style="font-size: 20px;">
		      <?php
		       	if($pro['product_hot']==0){
		       		echo 'Không có';
		       	}else{
		       		echo 'Có';
		       	}
		       ?>
		       </td>
		      <td style="font-size: 20px;"><img style="width: 100px;" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $pro['image_product'] ?>"></td>
		      <td style="font-size: 20px;"><a href="<?php echo BASE_URL ?>/product/delete_product/<?php echo $pro['id_product'] ?>">Xóa</a> || <a href="<?php echo BASE_URL ?>/product/edit_product/<?php echo $pro['id_product'] ?>">Cập nhật</a></td>
		    </tr>
		    <?php
		    	} 
		    ?>
		  </tbody>
		</table>
	</div>
</div>


