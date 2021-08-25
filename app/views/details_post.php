<?php
   $name = '';
   foreach ($details_post as $key => $value) {
       $name = $value['title_post'];
       $name_category = $value['title_category_post'];
       $id_cate = $value['id_category_post'];
    } 
?>
<section>
   <div class="bg_in">
      <div class="wrapper_all_main">
         <div class="wrapper_all_main_right">
            <div class="breadcrumbs">
               <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                     <a itemprop="item" href="<?php echo BASE_URL ?>">
                     <span itemprop="name">Trang chủ</span></a>
                     <meta itemprop="position" content="1" />
                  </li>
                  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                     <a itemprop="item" href="<?php echo BASE_URL ?>/sanpham/danhmuc/<?php echo $value['id_category_post'] ?>">
                     <span itemprop="name"><?php echo $name_category ?></span></a>
                     <meta itemprop="position" content="2" />
                  </li>
                  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                     <span itemprop="item">
                     <strong itemprop="name">
                        <?php echo $name ?>
                     </strong>
                     </span>
                     <meta itemprop="position" content="3" />
                  </li>
               </ol>
            </div>
            <!--breadcrumbs-->
            <?php
               foreach ($details_post as $key => $post) { 
            ?>
            <div class="content_page">
               <div class="box-title">
                  <div class="title-bar">
                     <h1><?php echo $post['title_post'] ?></h1>
                  </div>
               </div>
               <div class="content_text">
                  <?php echo $post['content_post'] ?>
               </div>
               <div class="clear"></div>
            </div>
            <?php
               } 
            ?>
            <div class="module_pro_all">
               <div class="box-title">
                  <div class="title-bar">
                     <h3>Tin tức liên quan</h3>
                  </div>
               </div>
               <div class="pro_all_gird">
                  <div class="girds_all list_all_other_page ">
                     <?php
                        foreach ($related as $key => $rela){
                     ?>
                  <div class="grids">
                 <div class="grids_in">
                  <div class="content">
                  <div class="img-right-pro">
                    
                     <a href="sanpham.php">
                     <img class="lazy img-pro content-image" src="<?php echo BASE_URL ?>/public/uploads/post/<?php echo $rela['image_post'] ?>" data-original="image/iphone.png" alt="Máy in Canon MF229DW" />
                     </a>

                     <div class="content-overlay"></div>
                     <div class="content-details fadeIn-top">
                       <ul class="details-product-overlay">

                       </ul>
                      
                     </div>
                  </div>
                  <div class="name-pro-right">
                     <a href="<?php echo BASE_URL ?>/tintuc/chitiettin/<?php echo $rela['id_post'] ?>">
                        <h3><?php echo $rela['title_post'] ?></h3>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <?php
            } 
         ?>
         <!--start:left-->
         <div class="wrapper_all_main_left">

         </div>
         <!--end:left-->
         <div class="clear"></div>
      </div>
      <div class="clear"></div>
   </div>
</section>