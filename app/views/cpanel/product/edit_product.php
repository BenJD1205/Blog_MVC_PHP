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
			foreach ($productid as $key => $pro) {
			 	
		?>
		<form action="<?php echo BASE_URL ?>/product/update_product/<?php echo $pro['id_product'] ?>" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label>Tên sản phẩm</label>
				<input class="form-control" type="text" value="<?php echo $pro['title_product'] ?>" name="title_product">
			</div>
			<div class="form-group">
				<label>Giá sản phẩm</label>
				<input class="form-control" value="<?php echo $pro['price_product'] ?>" type="text" name="price_product">
			</div>
			<div class="form-group">
				<label >Miêu tả sản phẩm</label>
				<textarea class="form-control" type="text" name="desc_product" style="resize: none;"><?php echo $pro['desc_product'] ?></textarea>
			</div>
			<div class="form-group">
				<label>Số lượng</label>
				<input class="form-control" value="<?php echo $pro['quantity_product'] ?>"  type="number" name="quantity_product">
			</div>
			<div class="form-group">
				<label>Hình ảnh</label>
				<input class="form-control" type="file" name="image_product">
				<p><img style="width: 100px;" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $pro['image_product'] ?>"></p>
			</div>
			<div class="form-group">
				<label>Danh mục sản phẩm</label>
				<select class="form-control" type="text" name="category_product">
					<?php
						foreach ($category as $key => $cate) {
					?>
					<option <?php if($pro['id_category_product']==$cate[
						'id_category_product']){ echo 'selected';} ?> value="<?php echo $cate['id_category_product'] ?>"><?php echo $cate['title_category_product'] ?></option>
					<?php
						} 
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Sản phẩm hot</label>
				<select class="form-control" type="text" name="product_hot">
					<?php
						if($pro==0){

						 
					?>
					<option selected value="0">Không</option>
					<option value="1">Có</option>
					<?php
						}else{

					?>
					<option value="0">Không</option>
					<option selected value="1">Có</option>
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
