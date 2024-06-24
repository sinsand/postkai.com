<?php
if (base64url_decode($_SESSION['editsession'])=='confirm') {

  ?>
  <h2 class="main-head-cate t-announce f-k">แก้ไขประกาศ : <?php echo $UrlId;?></h2>
  <?php
    if (isset($_POST['btnUpdate'])) {
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

      $e_mID = "";
      if (!empty($_COOKIE['mID'])) {
        $e_mID = ",mID = '".base64url_decode($_COOKIE['mID'])."' ";
      }



      for ($i=1; $i <= count($_FILES['fileshow']['name']); $i++) {
        if ($_FILES['fileshow']['name'][$i] != "" ) {
          $temp      = end(explode(".",$_FILES['fileshow']['name'][$i]));
          $imagename = $_FILES['fileshow']['name'][$i];
          $source    = $_FILES['fileshow']['tmp_name'][$i];
          $target    = "images/post/picture_job_".$i."/$imagename";
          move_uploaded_file($source, $target);

          $imagepath = "postkai_".date("Y-m-d_His").'.'.$temp;
          $save      = "images/post/picture_job_".$i."/$imagepath"; //This is the new file you saving
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

          if ($i==1) {
            $v_photo1 = $imagepath;
          }elseif ($i==2) {
            $v_photo2 = $imagepath;
          }elseif ($i==3) {
            $v_photo3 = $imagepath;
          }elseif ($i==4) {
            $v_photo4 = $imagepath;
          }else{
            $v_photo5 = $imagepath;
          }


        }
      }


      $SqlUpdate = "UPDATE sb_job
                      SET jTitle   = '".$v_subject."',
                          jDetail  = '".$v_detail."',
                          jDesc  = '".$v_description."',
                          jPrice  = '".$v_price."',
                          jaType  = '".$v_type."',
                          jType  = '".$v_cate."',
                          jProvince  = '".$v_province."',
                          jc_Name  = '".$n_name."',
                          jc_Address  = '".$n_address."',
                          jc_Province  = '".$n_province."',
                          jc_Telephone  = '".$n_phone."',
                          jc_Email  = '".$n_email."',
                          jComment  = '".$v_comment."',
                          jTypeProduct  = '".$v_type_product."',
                          jLINEID  = '".$n_line."',
                          jEditor  = '".$n_code_edit."'
                          $e_mID
                    WHERE ( jID = '".$UrlId."' )";

      if (update_tb($SqlUpdate)==true) {
        echo fSuccess(2,"แก้ไขประกาศสำเร็จ",$LinkWeb."post/".$UrlId,2);
    		//log_insert("แก้ไขประกาศ เลขที่ : ".$UrlId." สำเร็จ",$_COOKIE[$CookieID]);
      }else {
        echo fError(2,"แก้ไขประกาศไม่สำเร็จ กรุณาตรวจสอบข้อมูล","");
    		//log_insert("แก้ไขประกาศ เลขที่ : ".$UrlId." ไม่สำเร็จ",$_COOKIE[$CookieID]);
      }

   

    }

    ///// Select
    $SqlSelect = "SELECT sj.*,pt.id_Type,p.PROVINCE_ID,pc.id_category
                  FROM sb_job sj
                  LEFT OUTER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                  LEFT OUTER JOIN p_category pc ON (sj.jType = pc.id_category)
                  LEFT OUTER JOIN p_province p  ON (sj.jProvince = p.PROVINCE_ID)
                  WHERE (
                          sj.jID = '".$UrlId."'  AND
                          sj.jStatus = '1'
                        )";
    if (select_num($SqlSelect)>0) {
      foreach (select_tb($SqlSelect) as $value) {
        // code...
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
                          ?><option value="<?php echo $row['id_category'];?>" <?php echo $row['id_category']==$value['id_category']?"selected":"";?>><?php echo $row['name_category'];?></option><?php
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
                            ?><option value="<?php echo $row['PROVINCE_ID'];?>" <?php echo $row['PROVINCE_ID']==$value['PROVINCE_ID']?"selected":"";?>><?php echo $row['PROVINCE_NAME'];?></option><?php
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
                          ?><option value="<?php echo $row['id_Type'];?>" <?php echo $row['id_Type']==$value['id_Type']?"selected":"";?>><?php echo $row['name_Type'];?></option><?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group col-xs-12 pr-0 pl-0">
                  <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_subject">หัวข้อประกาศ</label>
                  <div class="col-sm-9 pr-0 pl-0">
                    <input class="form-control" type="text" name="post_subject" value="<?php echo $value['jTitle'];?>" required placeholder="หัวข้อประกาศ" autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-xs-12 pr-0 pl-0">
                  <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_desc">รายละเอียดย่อ</label>
                  <div class="col-sm-9 pr-0 pl-0">
                    <input class="form-control" type="text" name="post_desc" value="<?php echo $value['jDetail'];?>" required placeholder="รายละเอียดย่อ" autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-xs-12 pr-0 pl-0">
                  <label class="control-label col-sm-3 text-ll mb-5 pr-0 pl-0" for="post_desc_full">รายละเอียดทั้งหมด</label>
                  <div class="col-sm-12 pr-0 pl-0">
                    <textarea class="form-control summernote" name="post_desc_full" required ><?php echo $value['jDesc'];?></textarea>
                  </div>
                </div>

                <div class="form-group col-xs-12 pr-0 pl-0">
                  <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_price">ราคา</label>
                  <div class="col-sm-6 pr-0 pl-0">
                    <input class="form-control" type="text" name="post_price" value="<?php echo $value['jPrice'];?>" placeholder="ไม่ใส่ หรือ ใส่เฉพาะตัวเลขเท่านั้น">
                  </div>
                </div>
                <div class="form-group col-xs-12 pr-0 pl-0">
                  <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">สภาพสินค้า</label>
                  <div class="col-sm-6 pr-0 pl-0">
                    <select class="form-control" name="post_product">
                        <option value="0" <?php echo $value['jTypeProduct']=='0'?"selected":"";?>>ไม่ระบุ</option>
                        <option value="1" <?php echo $value['jTypeProduct']=='1'?"selected":"";?>>ใหม่</option>
                        <option value="2" <?php echo $value['jTypeProduct']=='2'?"selected":"";?>>มือสอง</option>
                        <option value="3" <?php echo $value['jTypeProduct']=='3'?"selected":"";?>>ล้างสต๊อก</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-xs-12 pr-0 pl-0">
                  <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">จำนวนวันประกาศ</label>
                  <div class="col-sm-6 pr-0 pl-0">
                    <select class="form-control" name="post_day">
                        <option value="0" <?php echo $value['jPostDay']=='0'?"selected":"";?>>ไม่จำกัด</option>
                        <option value="30" <?php echo $value['jPostDay']=='30'?"selected":"";?>>30 วัน</option>
                        <option value="90" <?php echo $value['jPostDay']=='90'?"selected":"";?>>90 วัน</option>
                        <option value="365" <?php echo $value['jPostDay']=='365'?"selected":"";?>>365 วัน</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-xs-12 pr-0 pl-0">
                  <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_comment">สถานะ</label>
                  <div class="col-sm-6 pr-0 pl-0">
                    <select class="form-control" name="post_comment" required>
                        <option value="1" <?php echo $value['jComment']=='1'?"selected":"";?>>เปิดให้ Comment</option>
                        <option value="0" <?php echo $value['jComment']=='0'?"selected":"";?>>ปิด Comment</option>
                    </select>
                  </div>
                </div>

                <div class="form-group col-xs-12 pr-0 pl-0">
                    <?php

                      $varsum = 0;

                      if ($value['jPic1']!="") {
                        ?><div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-center">
                            <img class="img-thumbnail lazy" data-src="<?php echo $LinkWeb."images/post/picture_job_1/".$value['jPic1'];?>" src="">
                            <button style="margin:5px 5px 15px 5px;" type="button" id="<?php echo $value['jPic1'];?>" class="btn btn-xs btn-default click_delete_image">ลบรูป</button>
                          </div><?php
                          $varsum = $varsum+1;
                      }
                      if ($value['jPic2']!="") {
                        ?><div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-center">
                            <img class="img-thumbnail lazy" data-src="<?php echo $LinkWeb."images/post/picture_job_2/".$value['jPic2'];?>" src="">
                            <button style="margin:5px 5px 15px 5px;" type="button" id="<?php echo $value['jPic2'];?>" class="btn btn-xs btn-default click_delete_image">ลบรูป</button>
                          </div><?php
                          $varsum = $varsum+1;
                      }
                      if ($value['jPic3']!="") {
                        ?><div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-center">
                            <img class="img-thumbnail lazy" data-src="<?php echo $LinkWeb."images/post/picture_job_3/".$value['jPic3'];?>" src="">
                            <button style="margin:5px 5px 15px 5px;" type="button" id="<?php echo $value['jPic3'];?>" class="btn btn-xs btn-default click_delete_image">ลบรูป</button>
                          </div><?php
                          $varsum = $varsum+1;
                      }
                      if ($value['jPic4']!="") {
                        ?><div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-center">
                            <img class="img-thumbnail lazy" data-src="<?php echo $LinkWeb."images/post/picture_job_4/".$value['jPic4'];?>" src="">
                            <button style="margin:5px 5px 15px 5px;" type="button" id="<?php echo $value['jPic4'];?>" class="btn btn-xs btn-default click_delete_image">ลบรูป</button>
                          </div><?php
                          $varsum = $varsum+1;
                      }
                      if ($value['jPic5']!="") {
                        ?><div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-center">
                            <img class="img-thumbnail lazy" data-src="<?php echo $LinkWeb."images/post/picture_job_5/".$value['jPic5'];?>" src="">
                            <button style="margin:5px 5px 15px 5px;" type="button" id="<?php echo $value['jPic5'];?>" class="btn btn-xs btn-default click_delete_image">ลบรูป</button>
                          </div><?php
                          $varsum = $varsum+1;
                      }
                    ?>
                </div>
                <div class="form-group col-xs-12 pr-0 pl-0 text-center" style="color:#f00;">ขออภัยในความไม่สะดวก ไม่สามารถแก้ไขหรือลบรูปภาพได้. กรุณาแจ้งลบประกาศแทน</div>



                <div class="form-group col-xs-12 pr-0 pl-0" style="display:none;">
                  <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">แนบรูปภาพ <br>(.jpg .jpeg หรือ .png เท่านั้น)<br> ขนาดเหมาะสม คือ 1:1<br>800x800px</label>
                  <div class="col-sm-6 pr-0 pl-0">
                    <div class="col-sm-12 p-0 ">
                      <div class="form-group pr-0 pl-0">
                        <input name="fileshow[]" type="file" class="filestyle" data-buttonName="btn-primary" />
                      </div>
                    </div>
                    <div class="col-sm-12 pt-5 pl-0 pr-0">
                      <div class="form-group pr-0 pl-0">
                        <input name="fileshow[]" type="file" class="filestyle" data-buttonName="btn-primary" />
                      </div>
                    </div>
                    <div class="col-sm-12 pt-5 pl-0 pr-0">
                      <div class="form-group pr-0 pl-0">
                        <input name="fileshow[]" type="file" class="filestyle" data-buttonName="btn-primary" />
                      </div>
                    </div>
                    <div class="col-sm-12 pt-5 pl-0 pr-0">
                      <div class="form-group pr-0 pl-0">
                        <input name="fileshow[]" type="file" class="filestyle" data-buttonName="btn-primary" />
                      </div>
                    </div>
                    <div class="col-sm-12 pt-5 pl-0 pr-0">
                      <div class="form-group pr-0 pl-0">
                        <input name="fileshow[]" type="file" class="filestyle" data-buttonName="btn-primary" />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group col-xs-12 pr-0 pl-0">
                  <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">ชื่อ - นามสกุล</label>
                  <div class="col-sm-6 pr-0 pl-0">
                    <input type="text" class="form-control" name="post_n_fullname" value="<?php echo $value['jc_Name'];?>" placeholder="กรอกชื่อ และ นามสกุล" autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-xs-12 pr-0 pl-0">
                  <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">ที่อยู่</label>
                  <div class="col-sm-9 pr-0 pl-0">
                    <textarea class="form-control" name="post_n_address" placeholder="กรอกที่อยู่" required autocomplete="off"><?php echo $value['jc_Address'];?></textarea>
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
                              ?><option value="<?php echo $row['PROVINCE_ID'];?>" <?php echo $value['PROVINCE_ID']==$row['PROVINCE_ID']?"selected":"";?>><?php echo $row['PROVINCE_NAME'];?></option><?php
                            }
                          }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="form-group col-xs-12 pr-0 pl-0">
                  <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">เบอร์ติดต่อ</label>
                  <div class="col-sm-6 pr-0 pl-0">
                    <input type="text" class="form-control" name="post_n_telephone" value="<?php echo $value['jc_Telephone'];?>" required placeholder="เบอร์ติดต่อกลับ" autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-xs-12 pr-0 pl-0">
                  <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">Email</label>
                  <div class="col-sm-6 pr-0 pl-0">
                    <input type="text" class="form-control" name="post_n_email" value="<?php echo $value['jc_Email'];?>" required placeholder="email สำหรับติดต่อ" autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-xs-12 pr-0 pl-0">
                  <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="post_n_lineid">LINE ID</label>
                  <div class="col-sm-6 pr-0 pl-0">
                    <input type="text" class="form-control" name="post_n_lineid" value="<?php echo $value['jLINEID'];?>" placeholder="LINE ID" autocomplete="off">
                  </div>
                </div>

                <div class="form-group col-xs-12 pr-0 pl-0">
                  <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">ยืนยันรหัสแก้ไข</label>
                  <div class="col-sm-6 pr-0 pl-0">
                    <input type="number" class="form-control" name="post_code_edit" required placeholder="ยืนยันรหัส สำหรับแก้ไขประกาศ ตัวเลขเท่านั้น" autocomplete="off">
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
                        <input type="text" class="form-control" id="captcha_code" name="captcha_code" placeholder="กรอกตามรูปภาพ" required>
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
                    <button type="submit" name="btnUpdate" class="btn btn-success btn-lg">บันทึกประกาศ</button>
                  </div>
                </div>
              </div>
            </div>

          </form>
        </div>
        <?php
      }
    }


}else {
  header("location:".$LinkWeb."post/".$UrlId."/?confirm-edit=check");
}
?>
