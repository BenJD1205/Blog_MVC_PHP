<?php
	if(!empty($_GET['msg'])){
		$msg = unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo '<span>'.$value.'</span>';	
		}
	} 
?>
<h4 class="text-center">Thêm danh mục bài viết</h4>
<div class="container">
	<div class="col-md-12">
		<form action="<?php echo BASE_URL ?>/post/insert_category" method="POST">
			<div class="form-group">
				<label>Tên sản phẩm</label>
				<input class="form-control" type="text" name="title_category_post">
			</div>
			<div class="form-group">
				<label >Miêu tả</label>
				<input class="form-control" type="text" name="desc_category_post">
			</div>
			<button type="submit" class="btn btn-success" style="margin-top: 10px;">Thêm sản phẩm</button>
		</form>
	</div>
</div>
