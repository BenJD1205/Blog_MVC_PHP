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
		      <td style="font-size: 20px;"><?php echo $cate['title_category_post'] ?></td>
		      <td style="font-size: 20px;"><?php echo $cate['desc_category_post'] ?></td>
		      <td style="font-size: 20px;"><a href="<?php echo BASE_URL ?>/post/delete_category/<?php echo $cate['id_category_post'] ?>">Xóa</a> || <a href="<?php echo BASE_URL ?>/post/edit_category/<?php echo $cate['id_category_post'] ?>">Cập nhật</a></td>
		    </tr>
		    <?php
		    	} 
		    ?>
		  </tbody>
		</table>
	</div>
</div>
