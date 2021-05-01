<h2 class="main-head-cate t-announce f-k">เพิ่มประกาศใหม่</h2>
<div class="col-xs-12">
  <form class="" action="<?php echo $LinkPath;?>" method="post">

    <div class="row">
      <div class="col-xs-12" style="padding:25px 0px;">
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_category">หมวดหมู่</label>
          <div class="col-sm-6 col-xs-12 pr-0 pl-0">
            <select class="form-control" name="post_category" id="post_category">
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
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="province">จังหวัด:</label>
          <div class="col-sm-6 col-xs-12 pr-0 pl-0">
            <select class="form-control" name="province">
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
            <select class="form-control" name="post_type">
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
            <input class="form-control" type="text" name="post_subject" value="" placeholder="">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_desc">รายละเอียดย่อ</label>
          <div class="col-sm-9 pr-0 pl-0">
            <input class="form-control" type="text" name="post_desc" value="" placeholder="">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll mb-5 pr-0 pl-0" for="post_desc_full">รายละเอียดทั้งหมด</label>
          <div class="col-sm-12 pr-0 pl-0">
            <textarea class="form-control summernote" name="post_desc_full"></textarea>
          </div>
        </div>

        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_subject">ราคา</label>
          <div class="col-sm-9 pr-0 pl-0">
            <input class="form-control" type="text" name="post_subject" value="" placeholder="">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_subject">สภาพสินค้า</label>
          <div class="col-sm-9 pr-0 pl-0">
            <input class="form-control" type="text" name="post_subject" value="" placeholder="">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_subject">จำนวนวันประกาศ</label>
          <div class="col-sm-9 pr-0 pl-0">
            <select class="form-control" name="">
                <option value="">ไม่จำกัด</option>
                <option value="">30 วัน</option>
                <option value="">90 วัน</option>
                <option value="">365 วัน</option>
            </select>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_subject">สถานะ</label>
          <div class="col-sm-9 pr-0 pl-0">
            <select class="form-control" name="">
                <option value="">เปิดให้ Comment</option>
                <option value="">ปิด Comment</option>
            </select>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_subject">แนบรูปภาพ <br>(.jpg .jpeg หรือ .png เท่านั้น)<br> ขนาดเหมาะสม คือ 1:1,800x800px</label>
          <div class="col-sm-9 pr-0 pl-0">
            <div class="col-xs-12">
              <input id="fileshow-1" name="fileshow-1" type="file" class="filestyle form-control">
            </div>
            <div class="col-xs-12 pt-5">
              <input id="fileshow-2" name="fileshow-2" type="file" class="filestyle form-control">
            </div>
            <div class="col-xs-12 pt-5">
              <input id="fileshow-3" name="fileshow-3" type="file" class="filestyle form-control">
            </div>
            <div class="col-xs-12 pt-5">
              <input id="fileshow-4" name="fileshow-4" type="file" class="filestyle form-control">
            </div>
          </div>
        </div>

        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">ชื่อ - นามสกุล</label>
          <div class="col-sm-9 pr-0 pl-0">
            <input type="text" class="form-control" name="" placeholder="">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">ที่อยู่</label>
          <div class="col-sm-9 pr-0 pl-0">
            <textarea class="form-contol" placeholder=""></textarea>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">เบอร์ติดต่อ</label>
          <div class="col-sm-9 pr-0 pl-0">
            <input type="text" class="form-control" name="" placeholder="">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">Email</label>
          <div class="col-sm-9 pr-0 pl-0">
            <input type="text" class="form-control" name="" placeholder="">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">LINE ID</label>
          <div class="col-sm-9 pr-0 pl-0">
            <input type="text" class="form-control" name="" placeholder="">
          </div>
        </div>

        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for=""></label>
          <div class="col-sm-9 pr-0 pl-0">
            <img src="<?php echo $LinkWeb;?>captcha.php?rand=<?php echo rand();?>" id='captchaimg' class="col-12" style="padding:0px;">
            <p style="margin: 0px;">รูปไม่ชัดคลิก <a href='javascript: refreshCaptcha();'>รีโหลด</a> ใหม่</p>
            <input type="text" class="form-control" name="" placeholder="">
          </div>
        </div>








      </div>
    </div>

  </form>
</div>
