<h2 class="main-head-cate t-announce f-k">เพิ่มประกาศใหม่</h2>
<?php
  if (isset($_POST['btnPost'])) {
    if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){
      echo fError(1,"รหัสยืนยันไม่ถูกต้อง","");
    }else {
      $v_cate       = $_POST['post_category'];
      $v_province   = $_POST['post_province'];
      $v_type       = $_POST['post_type'];
      $v_subject    = htmlspecialchars($_POST['post_subject'],ENT_QUOTES);
      $v_detail     = htmlspecialchars($_POST['post_desc'],ENT_QUOTES);
      $v_description = htmlspecialchars($_POST['post_desc_full'],ENT_QUOTES);
      $v_price      = $_POST['post_price'];
      $v_type_product = $_POST['post_product'];
      $v_day        = $_POST['post_day'];
      $v_comment    = $_POST['post_comment'];

      $v_photo1 = "";
      $v_photo2 = "";
      $v_photo3 = "";
      $v_photo4 = "";
      $v_photo5 = "";

      $n_name       = htmlspecialchars($_POST['post_n_fullname'],ENT_QUOTES);
      $n_address    = htmlspecialchars($_POST['post_n_address'],ENT_QUOTES);
      $n_province   = $_POST['post_n_province'];
      $n_phone      = htmlspecialchars($_POST['post_n_telephone'],ENT_QUOTES);
      $n_email      = htmlspecialchars($_POST['post_n_email'],ENT_QUOTES);
      $n_line       = htmlspecialchars($_POST['post_n_lineid'],ENT_QUOTES);
      $n_code_edit  = $_POST['post_code_edit'];

      $v_mID = "";
      $d_mID = "";
      if (!empty($_COOKIE['mid'])) {
        $v_mID = ",mID";
        $m_mID = ",'".base64url_decode($_COOKIE['mid'])."' ";
      }


      for ($i=0; $i < count($_FILES['fileshow']['name']); $i++) {
        if ($_FILES['fileshow']['name'][$i] != "" ) {

  		    $a= $i+1;
          $temp      = end(explode(".",$_FILES['fileshow']['name'][$i]));
          $imagename = $_FILES['fileshow']['name'][$i];
          $source    = $_FILES['fileshow']['tmp_name'][$i];
          $target    = "images/post/picture_job_".$a."/$imagename";
          move_uploaded_file($source, $target);
          $imagepath = "postkai_".date("Y-m-d_His").'.'.$temp;
          $save      = "images/post/picture_job_".$a."/$imagepath"; //This is the new file you saving
          $file      = $target; //This is the original file

          list($width, $height) = getimagesize($target);

          $modwidth  = 1000;
          $diff      = $width / $modwidth;
          $modheight = $height / $diff;

          $tn        = imagecreatetruecolor($modwidth, $modheight) ;
          $image     = imagecreatefromjpeg($file) ;
          imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;

          imagejpeg($tn, $save, 100) ;
          unlink($target); //Delete our uploaded file

          if ($i==0) {
            $v_photo1 = $imagepath;
          }elseif ($i==1) {
            $v_photo2 = $imagepath;
          }elseif ($i==2) {
            $v_photo3 = $imagepath;
          }elseif ($i==3) {
            $v_photo4 = $imagepath;
          }else{
            $v_photo5 = $imagepath;
          }


        }
      }


      $SqlInsert = "INSERT INTO sb_job
                    (jTitle,jDetail,jDesc,jPrice,jaType,jType,jProvince,jPic1,jPic2,jPic3,jPic4,jPic5,
                     jc_Name,jc_Address,jc_Province,jc_Telephone,jc_Email,jRead,jDate_Create,jStatus,
                     jComment,jTypeProduct,jPostDay,jLINEID,jEditor".$v_mID.")
                    VALUES(
                      '$v_subject','$v_detail','$v_description','$v_price','$v_type','$v_cate','$v_province','$v_photo1','$v_photo2','$v_photo3','$v_photo4','$v_photo5',
                      '$n_name','$n_address','$n_province','$n_phone','$n_email','1','".date('Y-m-d H:i:s')."','1',
                      '$v_comment','$v_type_product','$v_day','$n_line','$n_code_edit'".$m_mID."
                    );";
      if (insert_tb($SqlInsert)==true) {
        $SqlSelectIN = "SELECT jID,jDate_Create FROM sb_job  ORDER BY jID DESC LIMIT 1;";
        foreach (select_tb($SqlSelectIN) as $kueu) {

          echo fSuccess(1,"ลงประกาศสำเร็จ",$LinkWeb."post/".$kueu['jID'],2);
      		//log_insert("เพิ่มประกาศใหม่ สำเร็จ",$_COOKIE[$CookieID]);
          //// line notify
          $sMessage = "\nมีประกาศใหม่..".$kueu['jDate_Create']." \nหัวข้อ : *".$v_subject."* \nดูประกาศ : ".$LinkWeb."post/".$kueu['jID'];
      		line_notify($sMessage);
      		//// line notify
        }

    	}else {
    		echo fError(1,"ลงประกาศไม่สำเร็จ กรุณาตรวจสอบข้อมูล","");
    		//log_insert("เพิ่มประกาศใหม่ ไม่สำเร็จ",$_COOKIE[$CookieID]);
    	}
    }
  }
?>
<div class="col-xs-12">
  <form class="" action="<?php echo $LinkPath;?>" method="post" enctype="multipart/form-data">

    <div class="row">
      <div class="col-xs-12" style="padding:25px 0px;">
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_category">หมวดหมู่ <span style="color:#f00;">*</span></label>
          <div class="col-sm-6 col-xs-12 pr-0 pl-0">
            <select class="form-control" name="post_category" id="post_category" required>
              <option value="">เลือกหมวดหมู่</option>
              <?php
              $SqlSelect = "SELECT *
                            FROM p_category
                            ORDER BY name_category ASC ";
              if (select_num($SqlSelect)>0) {
                foreach (select_tb($SqlSelect) as $row) {
                  ?><option value="<?php echo $row['id_category'];?>" <?php echo $_POST['post_category']==$row['id_category']?"selected":"";?>><?php echo $row['name_category'];?></option><?php
                }
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_province">จังหวัด <span style="color:#f00;">*</span></label>
          <div class="col-sm-6 col-xs-12 pr-0 pl-0">
            <select class="form-control" name="post_province" required>
              <option value="">เลือกจังหวัด</option>
              <?php
                $SqlSelect = "SELECT *
                              FROM p_province
                              ORDER BY PROVINCE_NAME ASC ";
                if (select_num($SqlSelect)>0) {
                  foreach (select_tb($SqlSelect) as $row) {
                    ?><option value="<?php echo $row['PROVINCE_ID'];?>" <?php echo $_POST['post_province']==$row['PROVINCE_ID']?"selected":"";?>><?php echo $row['PROVINCE_NAME'];?></option><?php
                  }
                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_type">ประเภท <span style="color:#f00;">*</span></label>
          <div class="col-sm-6 col-xs-12 pr-0 pl-0">
            <select class="form-control" name="post_type" required>
              <option value="">เลือกประเภท</option>
              <?php
              $SqlSelect = "SELECT *
                            FROM p_type
                            ORDER BY name_Type ASC ";
              if (select_num($SqlSelect)>0) {
                foreach (select_tb($SqlSelect) as $row) {
                  ?><option value="<?php echo $row['id_Type'];?>" <?php echo $_POST['post_type']==$row['id_Type']?"selected":"";?> ><?php echo $row['name_Type'];?></option><?php
                }
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_subject">หัวข้อประกาศ <span style="color:#f00;">*</span></label>
          <div class="col-sm-9 pr-0 pl-0">
            <input class="form-control" type="text" name="post_subject" value="<?php echo $_POST['post_subject'];?>" required placeholder="หัวข้อประกาศ" autocomplete="off">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_desc">รายละเอียดย่อ <span style="color:#f00;">*</span></label>
          <div class="col-sm-9 pr-0 pl-0">
            <input class="form-control" type="text" name="post_desc" value="<?php echo $_POST['post_desc'];?>" required placeholder="รายละเอียดย่อ" autocomplete="off">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll mb-5 pr-0 pl-0" for="post_desc_full">รายละเอียดทั้งหมด <span style="color:#f00;">*</span></label>
          <div class="col-sm-12 pr-0 pl-0">
            <textarea class="form-control summernote" name="post_desc_full" required ><?php echo $_POST['post_desc_full'];?></textarea>
          </div>
        </div>

        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_price">ราคา</label>
          <div class="col-sm-9 pr-0 pl-0">
            <input class="form-control" type="text" name="post_price" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $_POST['post_price'];?>" placeholder="ไม่ใส่ หรือ ใส่เฉพาะตัวเลขเท่านั้น" autocomplete="off">
            <span id="error" style="color: Red; display: none">* ตัวเลขเท่านั้น (0 - 9)</span>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">สภาพสินค้า</label>
          <div class="col-sm-9 pr-0 pl-0">
            <select class="form-control" name="post_product">
                <option value="0" <?php echo $_POST['post_product']=="0"?"selected":"";?>>ไม่ระบุ</option>
                <option value="1" <?php echo $_POST['post_product']=="1"?"selected":"";?>>ใหม่</option>
                <option value="2" <?php echo $_POST['post_product']=="2"?"selected":"";?>>มือสอง</option>
                <option value="3" <?php echo $_POST['post_product']=="3"?"selected":"";?>>ล้างสต๊อก</option>
            </select>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">จำนวนวันประกาศ</label>
          <div class="col-sm-9 pr-0 pl-0">
            <select class="form-control" name="post_day">
                <option value="0" <?php echo $_POST['post_day']=="0"?"selected":"";?>>ไม่จำกัด</option>
                <option value="30" <?php echo $_POST['post_day']=="30"?"selected":"";?>>30 วัน</option>
                <option value="90" <?php echo $_POST['post_day']=="90"?"selected":"";?>>90 วัน</option>
                <option value="365" <?php echo $_POST['post_day']=="365"?"selected":"";?>>365 วัน</option>
            </select>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_comment">สถานะ <span style="color:#f00;">*</span></label>
          <div class="col-sm-9 pr-0 pl-0">
            <select class="form-control" name="post_comment" required>
                <option value="1">เปิดให้ Comment</option>
                <option value="0">ปิด Comment</option>
            </select>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">แนบรูปภาพ <span style="color:#f00;">*</span><br>(.jpg .jpeg หรือ .png เท่านั้น)<br> ขนาดเหมาะสม คือ 1:1,800x800px</label>
          <div class="col-sm-9 pr-0 pl-0">
            <div class="col-xs-12 p-0 ">
              <div class="form-group pr-0 pl-0">
                <input id="fileshow1" name="fileshow[]" type="file" class="filestyle" required data-buttonName="btn-primary" />
              </div>
            </div>
            <div class="col-xs-12 pt-5 pl-0 pr-0">
              <div class="form-group pr-0 pl-0">
                <input id="fileshow2" name="fileshow[]" type="file" class="filestyle" data-buttonName="btn-primary" />
              </div>
            </div>
            <div class="col-xs-12 pt-5 pl-0 pr-0">
              <div class="form-group pr-0 pl-0">
                <input id="fileshow3" name="fileshow[]" type="file" class="filestyle" data-buttonName="btn-primary" />
              </div>
            </div>
            <div class="col-xs-12 pt-5 pl-0 pr-0">
              <div class="form-group pr-0 pl-0">
                <input id="fileshow4" name="fileshow[]" type="file" class="filestyle" data-buttonName="btn-primary" />
              </div>
            </div>
            <div class="col-xs-12 pt-5 pl-0 pr-0">
              <div class="form-group pr-0 pl-0">
                <input id="fileshow5" name="fileshow[]" type="file" class="filestyle" data-buttonName="btn-primary" />
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
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">ชื่อ - นามสกุล <span style="color:#f00;">*</span></label>
          <div class="col-sm-9 pr-0 pl-0">
            <input type="text" class="form-control" name="post_n_fullname" placeholder="กรอกชื่อ และ นามสกุล"value="<?php echo !empty($_COOKIE['mfullname'])?base64url_decode($_COOKIE['mfullname']):$_POST['post_n_fullname'];?>"  <?php echo !empty($_COOKIE['mfullname'])?"readonly":"";?> autocomplete="off">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">ที่อยู่ <span style="color:#f00;">*</span></label>
          <div class="col-sm-9 pr-0 pl-0">
            <textarea class="form-control" name="post_n_address" placeholder="กรอกที่อยู่" required autocomplete="off"><?php echo $_POST['post_n_address'];?></textarea>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">จังหวัด <span style="color:#f00;">*</span></label>
          <div class="col-sm-6 pr-0 pl-0">
            <select class="form-control" name="post_n_province" required>
                <option value="">เลือกจังหวัด</option>
                <?php
                  $SqlSelect = "SELECT *
                                FROM p_province
                                ORDER BY PROVINCE_NAME ASC ";
                  if (select_num($SqlSelect)>0) {
                    foreach (select_tb($SqlSelect) as $row) {
                      ?><option value="<?php echo $row['PROVINCE_ID'];?>"  <?php echo $_POST['post_province']==$row['PROVINCE_ID']?"selected":"";?>><?php echo $row['PROVINCE_NAME'];?></option><?php
                    }
                  }
                ?>
            </select>
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">เบอร์ติดต่อ <span style="color:#f00;">*</span></label>
          <div class="col-sm-6 pr-0 pl-0">
            <input type="text" class="form-control" name="post_n_telephone" required placeholder="เบอร์ติดต่อกลับ" value="<?php echo !empty($_COOKIE['mphone'])?base64url_decode($_COOKIE['mphone']):"";?>"  <?php echo !empty($_COOKIE['mphone'])?"readonly":"";?> autocomplete="off">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">Email <span style="color:#f00;">*</span></label>
          <div class="col-sm-9 pr-0 pl-0">
            <input type="text" class="form-control" name="post_n_email" value="<?php echo $_POST['post_n_email'];?>" required placeholder="email สำหรับติดต่อ" autocomplete="off">
          </div>
        </div>
        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_n_lineid">LINE ID</label>
          <div class="col-sm-6 pr-0 pl-0">
            <input type="text" class="form-control" name="post_n_lineid" value="<?php echo $_POST['post_n_lineid'];?>" placeholder="LINE ID" autocomplete="off">
          </div>
        </div>

        <div class="form-group col-xs-12 pr-0 pl-0">
          <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">รหัสแก้ไข <span style="color:#f00;">*</span></label>
          <div class="col-sm-6 pr-0 pl-0">
            <input type="number" class="form-control" name="post_code_edit" value="<?php echo $_POST['post_code_edit'];?>" required placeholder="รหัส สำหรับแก้ไขประกาศ ตัวเลขเท่านั้น" autocomplete="off">
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
