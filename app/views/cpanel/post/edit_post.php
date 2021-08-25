<?php
	if(!empty($_GET['msg'])){
		$msg = unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo '<span>'.$value.'</span>';	
		}
	} 
?>
<h4 class="text-center">Cập nhật bài viết</h4>
<div class="container">
	<div class="col-md-12">
		<?php
			foreach ($postid as $key => $pos) {
			 	
		?>
		<form action="<?php echo BASE_URL ?>/post/update_post/<?php echo $pos['id_post'] ?>" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label>Tên bài viết</label>
				<input class="form-control" type="text" value="<?php echo $pos['title_post'] ?>" name="title_post">
			</div>
			<div class="form-group">
				<label >Chi tiết bài viết</label>
				<textarea class="form-control" type="text" name="content_post" style="resize: none;"><?php echo $pos['content_post'] ?></textarea>
			</div>
			<div class="form-group">
				<label>Hình ảnh</label>
				<input class="form-control" type="file" name="image_post">
				<p><img style="width: 100px;" src="<?php echo BASE_URL ?>/public/uploads/post/<?php echo $pos['image_post'] ?>"></p>
			</div>
			<div class="form-group">
				<label>Danh mục bài viết</label>
				<select class="form-control" type="text" name="category_post">
					<?php
						foreach ($category as $key => $cate) {
					?>
					<option <?php if($pos['id_category_post']==$cate[
						'id_category_post']){ echo 'selected';} ?> value="<?php echo $cate['id_category_post'] ?>"><?php echo $cate['title_category_post'] ?></option>
					<?php
						} 
					?>
				</select>
			</div>
			<button type="submit" class="btn btn-success" style="margin-top: 10px;">Cập nhật sản phẩm</button>
		</form>
		<?php
			} 
		?>
	</div>
</div>
