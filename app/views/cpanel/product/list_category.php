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
		      <th scope="col">ID</th>
		      <th scope="col">Tên danh mục</th>
		      <th scope="col">Mô tả</th>
		      <th scope="col">Quản lí</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$i=0;
		  		foreach ($category as $key => $cate) {
					$i++;		  		 	
		  	?>
		    <tr>
		      <td style="font-size: 20px;"><?php echo $i ?></td>
		      <td style="font-size: 20px;"><?php echo $cate['title_category_product'] ?></td>
		      <td style="font-size: 20px;"><?php echo $cate['description'] ?></td>
		      <td style="font-size: 20px;"><a href="<?php echo BASE_URL ?>/product/delete_category/<?php echo $cate['id_category_product'] ?>">Xóa</a> || <a href="<?php echo BASE_URL ?>/product/edit_category/<?php echo $cate['id_category_product'] ?>">Cập nhật</a></td>
		    </tr>
		    <?php
		    	} 
		    ?>
		  </tbody>
		</table>
	</div>
</div>
