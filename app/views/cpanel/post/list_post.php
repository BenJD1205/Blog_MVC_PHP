<?php
	if(!empty($_GET['msg'])){
		$msg = unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo '<span>'.$value.'</span>';	
		}
	} 
?>
<p>Danh mục bài viết</p>
<div class="container">
	<div class="col-md-12">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th style="font-size: 20px;" scope="col">ID</th>
		      <th style="font-size: 20px;" scope="col">Tên sản phẩm</th>
		      <th style="font-size: 30px;" scope="col">Danh mục</th>
		      <th style="font-size: 20px;" scope="col">Mô tả</th>
		      <th style="font-size: 20px;" scope="col">Hình sản phẩm</th>
		      <th style="font-size: 20px;" scope="col">Quản lí</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$i=0;
		  		foreach ($post as $key => $pos) {
					$i++;		  		 	
		  	?>
		    <tr>
		      <td style="font-size: 20px;"><?php echo $i ?></td>
		      <td style="font-size: 20px;"><?php echo $pos['title_post'] ?></td>
		      <td style="font-size: 20px;"><?php echo $pos['title_category_post'] ?></td>	
		      <td style="font-size: 20px;"><?php echo $pos['content_post'] ?></td>
		      <td style="font-size: 20px;"><img style="width: 100px;" src="<?php echo BASE_URL ?>/public/uploads/post/<?php echo $pos['image_post'] ?>"></td>
		      <td style="font-size: 20px;"><a href="<?php echo BASE_URL ?>/post/delete_post/<?php echo $pos['id_post'] ?>">Xóa</a> || <a href="<?php echo BASE_URL ?>/post/edit_post/<?php echo $pos['id_post'] ?>">Cập nhật</a></td>
		    </tr>
		    <?php
		    	} 
		    ?>
		  </tbody>
		</table>
	</div>
</div>


