<?php
	if(!empty($_GET['msg'])){
		$msg = unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo '<span>'.$value.'</span>';	
		}
	} 
?>
<h4 class="text-center">Thêm danh mục</h4>
<div class="container">
	<div class="col-md-12">
		<form action="<?php echo BASE_URL ?>/product/insert_product" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label>Tên sản phẩm</label>
				<input class="form-control" type="text" name="title_product">
			</div>
			<div class="form-group">
				<label>Giá sản phẩm</label>
				<input class="form-control" type="text" name="price_product">
			</div>
			<div class="form-group">
				<label >Miêu tả sản phẩm</label>
				<textarea class="form-control" type="text" name="desc_product" style="resize: none;"></textarea>
			</div>
			<div class="form-group">
				<label>Số lượng</label>
				<input class="form-control" type="number" name="quantity_product">
			</div>
			<div class="form-group">
				<label>Hình ảnh</label>
				<input class="form-control" type="file" name="image_product">
			</div>
			<div class="form-group">
				<label>Danh mục sản phẩm</label>
				<select class="form-control" type="text" name="category_product">
					<?php
						foreach ($category as $key => $cate) {
						 	 
					?>
					<option value="<?php echo $cate['id_category_product'] ?>"><?php echo $cate['title_category_product'] ?></option>
					<?php
						} 
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Sản phẩm hot</label>
				<select class="form-control" type="text" name="product_hot">
					<option value="0">Không</option>
					<option value="1">Có</option>
				</select>
			</div>
			<button type="submit" class="btn btn-success" style="margin-top: 10px;">Thêm sản phẩm</button>
		</form>
	</div>
</div>
