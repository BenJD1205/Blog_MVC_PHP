<?php
	if(!empty($_GET['msg'])){
		$msg = unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo '<span>'.$value.'</span>';	
		}
	} 
?>
<h4 class="text-center">Cập nhật danh mục</h4>
<div class="container">
	<div class="col-md-12">
		<?php
			foreach ($categoryid as $key => $cate) {
			 	
		?>
		<form action="<?php echo BASE_URL ?>/product/update_cate_product/<?php echo $cate['id_category_product']  ?>" method="POST">
			<div class="form-group">
				<label>Tên sản phẩm</label>
				<input class="form-control" value="<?php echo $cate['title_category_product'] ?>" type="text" name="title_category_product">
			</div>
			<div class="form-group">
				<label >Miêu tả</label>
				<textarea class="form-control" name="description"><?php echo $cate['description'] ?></textarea>
			</div>
			<button type="submit" class="btn btn-success" style="margin-top: 10px;">Cập nhật sản phẩm</button>
		</form>
		<?php
			} 
		?>
	</div>
</div>