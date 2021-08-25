<section>
   <div class="bg_in">
      <?php
         if(!empty($_GET['msg'])){
            $msg = unserialize(urldecode($_GET['msg']));
            foreach ($msg as $key => $value) {
               echo '<span>'.$value.'</span>';  
            }
         } 
      ?>
      <div class="contact_form">
         <form action="<?php echo BASE_URL ?>/khachhang/dangki" method="POST">
            <div class="contact_left">
               <div class="ch-contacts-details">
                  <ul class="contact-list">
                     <li class="addr">
                        <strong class="title">Đăng kí thành viên</strong>
                        <div class="form_contact_in">
                           <div class="box_contact">
                              <form name="FormDatHang" method="post" action="gio-hang/" >
                                 <div class="content-box_contact">
                                    <div class="row">
                                       <div class="input">
                                          <label>Họ và tên: <span style="color:red;">*</span></label>
                                          <input type="text" name="name" required class="clsip">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                       <div class="input">
                                          <label>Số điện thoại: <span style="color:red;">*</span></label>
                                          <input type="text" name="dienthoai" required onkeydown="return checkIt(event)" class="clsip">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                       <div class="input">
                                          <label>Địa chỉ: <span style="color:red;">*</span></label>
                                          <input type="text" name="diachi" required class="clsip" >
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                       <div class="input">
                                          <label>Email: <span style="color:red;">*</span></label>
                                          <input type="email" required="true" name="email">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                       <div class="input">
                                          <label>Mật khẩu: <span style="color:red;">*</span></label>
                                          <input type="password" name="password">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row btnclass">
                                       <div class="input ipmaxn ">
                                          <input type="submit" class="btn-gui" name="dangnhap" id="frmSubmit" value="Đăng nhập">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="clear"></div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </form>
         <form autocomplete="off" action="<?php echo BASE_URL ?>/khachhang/login_customer" method="POST">
            <div class="contact_right">
               <div class="form_contact_in">
                  <div class="box_contact">
                     <form name="FormDatHang" method="post" action="gio-hang/" >
                        <div class="content-box_contact">
                           <!---row---->
                           <div class="row">
                              <div class="input">
                                 <label>Email: <span style="color:red;">*</span></label>
                                 <input type="email" required="true" name="username">
                              </div>
                              <div class="clear"></div>
                           </div>
                           <!---row---->
                           <div class="row">
                              <div class="input">
                                 <label>Mật khẩu: <span style="color:red;">*</span></label>
                                 <input type="password" name="password">
                              </div>
                              <div class="clear"></div>
                           </div>
                           <!---row---->
                           <div class="row btnclass">
                              <div class="input ipmaxn ">
                                 <input type="submit" class="btn-gui" name="dangnhap" id="frmSubmit" value="Đăng nhập">
                              </div>
                              <div class="clear"></div>
                           </div>
                           <!---row---->
                           <div class="clear"></div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</section>