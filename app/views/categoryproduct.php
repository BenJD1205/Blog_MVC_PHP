<?php
   $name = 'Danh mục sản phẩm chưa có';
   foreach ($categorybyid as $key => $product) {
      $name = $product['title_category_product'];
   }       
?>
<section>
   <div class="bg_in">
   <div class="breadcrumbs">
      <ol itemscope itemtype="http://schema.org/BreadcrumbList">
         <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="<?php echo BASE_URL ?>">
            <span itemprop="name">Trang chủ</span></a>
            <meta itemprop="position" content="1" />
         </li>
         <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="sanpham.php">
            <span itemprop="name"><?php echo $name ?></span></a>
            <meta itemprop="position" content="2" />
         </li>
      </ol>
   </div>
   <div class="module_pro_all">
      <div class="box-title">
         <div class="title-bar">
            <h1><?php echo $name ?></h1>
         </div>
      </div>
      <div class="pro_all_gird">
         <div class="girds_all list_all_other_page ">
            <?php
               foreach ($categorybyid as $key => $pro) {
                   
            ?>
            <form action="<?php echo BASE_URL ?>/giohang/themgiohang" method="POST">
               <input type="hidden" value="<?php echo $pro['id_product'] ?>" name="product_id">
               <input type="hidden" value="<?php echo $pro['title_product'] ?>" name="product_title">
               <input type="hidden" value="<?php echo $pro['image_product'] ?>" name="product_image">
               <input type="hidden" value="<?php echo $pro['price_product'] ?>" name="product_price">
               <input type="hidden" value="1" name="product_quantity">
               <div class="grids">
                  <div class="grids_in">
                     <div class="content">
                        <div class="img-right-pro">
                           <a href="sanpham.php">
                           <img class="lazy img-pro content-image" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $pro['image_product'] ?>" data-original="image/iphone.png" alt="Máy in Canon MF229DW" />
                           </a>
                           <div class="content-overlay"></div>
                           <div class="content-details fadeIn-top">
                              <ul class="details-product-overlay">
                                 <li><?php echo $pro['desc_product'] ?></li>
                              </ul>
                           </div>
                        </div>
                        <div class="name-pro-right">
                           <a href="<?php echo BASE_URL ?>/sanpham/chitietsanpham/<?php echo $pro['id_product'] ?>">
                              <h3><?php echo $pro['title_product'] ?></h3>
                           </a>
                        </div>
                        <div>
                           <input type="submit" style="box-shadow: none" class="btn btn-success btn-sm" name="addcart" value="Đặt hàng">
                        </div>
                        <div class="price_old_new">
                           <div class="price">
                              <span class="news_price"><?php echo number_format($pro['price_product']).'đ'?> </span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <?php
               } 
            ?>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>
      <div class="clear"></div>
   </div>
</section>