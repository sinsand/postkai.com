<h2 class="main-head-cate t-announce f-k">เพิ่มประกาศใหม่</h2>
<?php
  
?>
<div class="col-xs-12">
  <form class="" action="<?php echo $LinkPath;?>" method="post" enctype="multipart/form-data">

    <div class="row">
      <div class="col-xs-12" style="padding:25px 0px;">
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_category">หมวดหมู่</label>
          <div class="col-sm-6 col-xs-12 pr-0 pl-0">
            <select class="form-control" name="post_category" id="post_category" required>
              <option value="">เลือกหมวดหมู่</option>
              <?php
              $SqlSelect = "SELECT *
                            FROM p_category
                            ORDER BY name_category ASC ";
              if (select_num($SqlSelect)>0) {
                foreach (select_tb($SqlSelect) as $row) {
                  ?><option value="<?php echo $row['id_category'];?>"><?php echo $row['name_category'];?></option><?php
                }
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_province">จังหวัด:</label>
          <div class="col-sm-6 col-xs-12 pr-0 pl-0">
            <select class="form-control" name="post_province" required>
              <option value="">เลือกจังหวัด</option>
              <?php
                $SqlSelect = "SELECT *
                              FROM p_province
                              ORDER BY PROVINCE_NAME ASC ";
                if (select_num($SqlSelect)>0) {
                  foreach (select_tb($SqlSelect) as $row) {
                    ?><option value="<?php echo $row['PROVINCE_ID'];?>"><?php echo $row['PROVINCE_NAME'];?></option><?php
                  }
                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_type">ประเภท</label>
          <div class="col-sm-6 col-xs-12 pr-0 pl-0">
            <select class="form-control" name="post_type" required>
              <option value="">เลือกประเภท</option>
              <?php
              $SqlSelect = "SELECT *
                            FROM p_type
                            ORDER BY name_Type ASC ";
              if (select_num($SqlSelect)>0) {
                foreach (select_tb($SqlSelect) as $row) {
                  ?><option value="<?php echo $row['id_Type'];?>" ><?php echo $row['name_Type'];?></option><?php
                }
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_subject">หัวข้อประกาศ</label>
          <div class="col-sm-9 pr-0 pl-0">
            <input class="form-control" type="text" name="post_subject" value="" required placeholder="หัวข้อประกาศ" autocomplete="off">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_desc">รายละเอียดย่อ</label>
          <div class="col-sm-9 pr-0 pl-0">
            <input class="form-control" type="text" name="post_desc" value="" required placeholder="รายละเอียดย่อ" autocomplete="off">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll mb-5 pr-0 pl-0" for="post_desc_full">รายละเอียดทั้งหมด</label>
          <div class="col-sm-12 pr-0 pl-0">
            <textarea class="form-control summernote" name="post_desc_full" required ></textarea>
          </div>
        </div>

        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_price">ราคา</label>
          <div class="col-sm-9 pr-0 pl-0">
            <input class="form-control" type="text" name="post_price" value="" placeholder="ไม่ใส่ หรือ ใส่เฉพาะตัวเลขเท่านั้น">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">สภาพสินค้า</label>
          <div class="col-sm-9 pr-0 pl-0">
            <select class="form-control" name="post_product">
                <option value="0">ไม่ระบุ</option>
                <option value="1">ใหม่</option>
                <option value="2">มือสอง</option>
                <option value="3">ล้างสต๊อก</option>
            </select>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">จำนวนวันประกาศ</label>
          <div class="col-sm-9 pr-0 pl-0">
            <select class="form-control" name="post_day">
                <option value="0">ไม่จำกัด</option>
                <option value="30">30 วัน</option>
                <option value="90">90 วัน</option>
                <option value="365">365 วัน</option>
            </select>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_comment">สถานะ</label>
          <div class="col-sm-9 pr-0 pl-0">
            <select class="form-control" name="post_comment" required>
                <option value="1">เปิดให้ Comment</option>
                <option value="0">ปิด Comment</option>
            </select>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">แนบรูปภาพ <br>(.jpg .jpeg หรือ .png เท่านั้น)<br> ขนาดเหมาะสม คือ 1:1,800x800px</label>
          <div class="col-sm-9 pr-0 pl-0">
            <div class="col-xs-12 p-0 ">
              <div class="form-group pr-0 pl-0">
                <input id="fileshow" name="fileshow" type="file" class="filestyle" required data-buttonName="btn-primary" />
              </div>
            </div>
            <div class="col-xs-12 pt-5 pl-0 pr-0">
              <div class="form-group pr-0 pl-0">
                <input id="fileshow" name="fileshow" type="file" class="filestyle" data-buttonName="btn-primary" />
              </div>
            </div>
            <div class="col-xs-12 pt-5 pl-0 pr-0">
              <div class="form-group pr-0 pl-0">
                <input id="fileshow" name="fileshow" type="file" class="filestyle" data-buttonName="btn-primary" />
              </div>
            </div>
            <div class="col-xs-12 pt-5 pl-0 pr-0">
              <div class="form-group pr-0 pl-0">
                <input id="fileshow" name="fileshow" type="file" class="filestyle" data-buttonName="btn-primary" />
              </div>
            </div>
            <div class="col-xs-12 pt-5 pl-0 pr-0">
              <div class="form-group pr-0 pl-0">
                <input id="fileshow" name="fileshow" type="file" class="filestyle" data-buttonName="btn-primary" />
              </div>
            </div>
            <!--<div class="col-xs-12 pt-5 pl-0 pr-0">
              <div class="form-group pr-0 pl-0">
                <input id="fileshow-6" name="fileshow-6" type="file" class="filestyle" data-buttonName="btn-primary" />
              </div>
            </div>-->
          </div>
        </div>

        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">ชื่อ - นามสกุล</label>
          <div class="col-sm-9 pr-0 pl-0">
            <input type="text" class="form-control" name="post_n_fullname" placeholder="กรอกชื่อ และ นามสกุล" autocomplete="off">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">ที่อยู่</label>
          <div class="col-sm-9 pr-0 pl-0">
            <textarea class="form-control" name="post_n_address" placeholder="กรอกที่อยู่" required autocomplete="off"></textarea>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">จังหวัด</label>
          <div class="col-sm-6 pr-0 pl-0">
            <select class="form-control" name="post_n_province" required>
                <option value="">เลือกจังหวัด</option>
                <?php
                  $SqlSelect = "SELECT *
                                FROM p_province
                                ORDER BY PROVINCE_NAME ASC ";
                  if (select_num($SqlSelect)>0) {
                    foreach (select_tb($SqlSelect) as $row) {
                      ?><option value="<?php echo $row['PROVINCE_ID'];?>"><?php echo $row['PROVINCE_NAME'];?></option><?php
                    }
                  }
                ?>
            </select>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">เบอร์ติดต่อ</label>
          <div class="col-sm-6 pr-0 pl-0">
            <input type="text" class="form-control" name="post_n_telephone" required placeholder="เบอร์ติดต่อกลับ" autocomplete="off">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">Email</label>
          <div class="col-sm-9 pr-0 pl-0">
            <input type="text" class="form-control" name="post_n_email" required placeholder="email สำหรับติดต่อ" autocomplete="off">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_n_lineid">LINE ID</label>
          <div class="col-sm-6 pr-0 pl-0">
            <input type="text" class="form-control" name="post_n_lineid" placeholder="LINE ID" autocomplete="off">
          </div>
        </div>

        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">รหัสแก้ไข</label>
          <div class="col-sm-6 pr-0 pl-0">
            <input type="number" class="form-control" name="post_code_edit" required placeholder="รหัส สำหรับแก้ไขประกาศ ตัวเลขเท่านั้น" autocomplete="off">
          </div>
        </div>

        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for=""></label>
          <div class="col-sm-9 pr-0 pl-0">
            <div class="row m-0">
              <div class="col-xs-12 col-sm-6 pl-0 pr-0">
                <img src="<?php echo $LinkWeb;?>plugins/phpcaptcha/captcha.php?rand=<?php echo rand();?>" id='captchaimg' class="col-xs-6 col-sm-12 p-0">
              </div>
              <div class="col-xs-12 col-sm-6 pl-0 pr-0">
                <p class="m-0">รูปไม่ชัดคลิก <a href='javascript: refreshCaptcha();'>รีโหลด</a> ใหม่</p>
                <input type="text" class="form-control" id="captcha_code" name="captcha_code" placeholder="กรอกตามรูปภาพ">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for=""></label>
          <div class="col-sm-9 pr-0 pl-0 pt-5 pb-5">
            <input type="checkbox" name="re_check_policy" value="1" required id="re_check_policy"> <label style="display: initial;" for="re_check_policy">ยอมรับ <a href="<?php echo $LinkWeb;?>policy" target="_blank">นโยบายการให้บริการ</a> และ <a href="<?php echo $LinkWeb;?>term-and-condition" target="_blank">กฏ กติกา ระเบียบข้อบังคับ</a> ของ postkai</label>
          </div>
        </div>

        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for=""></label>
          <div class="col-sm-9 pr-0 pl-0">
            <button type="submit" name="btnPost" class="btn btn-success btn-lg">บันทึกประกาศ</button>
          </div>
        </div>
      </div>
    </div>

  </form>
</div>
