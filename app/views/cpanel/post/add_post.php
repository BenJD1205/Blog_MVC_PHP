<?php
	if(!empty($_GET['msg'])){
		$msg = unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo '<span>'.$value.'</span>';	
		}
	} 
?>
<h4 class="text-center">Thêm bài viết</h4>
<div class="container">
	<div class="col-md-12">
		<form action="<?php echo BASE_URL ?>/post/insert_post" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label>Tên bài viết</label>
				<input class="form-control" type="text" name="title_post">
			</div>
			<div class="form-group">
				<label >Chi tiết bài viết</label>
				<textarea id="editor" class="form-control" type="text" name="content_post" style="resize: none;"></textarea>
			</div>
			<div class="form-group">
				<label>Hình ảnh</label>
				<input class="form-control" type="file" name="image_post">
			</div>
			<div class="form-group">
				<label>Danh mục bài viết</label>
				<select class="form-control" type="text" name="category_post">
					<?php
						foreach ($category as $key => $cate) {
						 	 
					?>
					<option value="<?php echo $cate['id_category_post'] ?>"><?php echo $cate['title_category_post'] ?></option>
					<?php
						} 
					?>
				</select>
			</div>
			<button type="submit" class="btn btn-success" style="margin-top: 10px;">Thêm bài viết</button>
		</form>
	</div>
</div>
