<div class="row m-0">
  <div class="col-12 p-0 pt-5 pb-5">
    <div class="container pt-0 pb-5">
      <?php
      if (base64url_decode($_SESSION['editsession']) == 'confirm') {

      ?>
        <h2 class=""><?php echo $translations['epost-header']; ?> : <?php echo $UrlId; ?></h2>
        <?php
        if (isset($_POST['btnUpdate'])) {
          $v_cate       = $_POST['post_category'];
          $v_province   = $_POST['post_province'];
          $v_type       = $_POST['post_type'];
          $v_subject    = htmlspecialchars($_POST['post_subject'], ENT_QUOTES);
          $v_detail     = htmlspecialchars($_POST['post_desc'], ENT_QUOTES);
          $v_description = htmlspecialchars($_POST['post_desc_full'], ENT_QUOTES);
          $v_price      = $_POST['post_price'];
          $v_type_product = $_POST['post_product'];
          $v_day        = $_POST['post_day'];
          $v_comment    = $_POST['post_comment'];

          $v_photo1 = "";
          $v_photo2 = "";
          $v_photo3 = "";
          $v_photo4 = "";
          $v_photo5 = "";

          $n_name       = htmlspecialchars($_POST['post_n_fullname'], ENT_QUOTES);
          $n_address    = htmlspecialchars($_POST['post_n_address'], ENT_QUOTES);
          $n_province   = $_POST['post_n_province'];
          $n_phone      = htmlspecialchars($_POST['post_n_telephone'], ENT_QUOTES);
          $n_email      = htmlspecialchars($_POST['post_n_email'], ENT_QUOTES);
          $n_line       = htmlspecialchars($_POST['post_n_lineid'], ENT_QUOTES);
          $n_code_edit  = $_POST['post_code_edit'];

          $e_mID = "";
          if (!empty($_COOKIE['mID'])) {
            $e_mID = ",mID = '" . base64url_decode($_COOKIE['mID']) . "' ";
          }

          /*

  	 if (isset($_FILES["fileshow"]["tmp_name"][0])){
  	  $fp = fopen($_FILES["fileshow"]["tmp_name"][0],"r");
        $ReadBinary = fread($fp,filesize($_FILES["fileshow"]["tmp_name"][0]));
        fclose($fp);
        $v_photo1 = addslashes($ReadBinary);
  	 }
  	 if (isset($_FILES["fileshow"]["tmp_name"][1])){
  	  $fp = fopen($_FILES["fileshow"]["tmp_name"][1],"r");
        $ReadBinary = fread($fp,filesize($_FILES["fileshow"]["tmp_name"][1]));
        fclose($fp);
        $v_photo2 = addslashes($ReadBinary);
  	 }
  	 if (isset($_FILES["fileshow"]["tmp_name"][2])){
  	  $fp = fopen($_FILES["fileshow"]["tmp_name"][2],"r");
        $ReadBinary = fread($fp,filesize($_FILES["fileshow"]["tmp_name"][2]));
        fclose($fp);
        $v_photo3 = addslashes($ReadBinary);
  	 }
  	 if (isset($_FILES["fileshow"]["tmp_name"][3])){
  	  $fp = fopen($_FILES["fileshow"]["tmp_name"][3],"r");
        $ReadBinary = fread($fp,filesize($_FILES["fileshow"]["tmp_name"][3]));
        fclose($fp);
        $v_photo4 = addslashes($ReadBinary);
  	 }
  	 if (isset($_FILES["fileshow"]["tmp_name"][4])){
  	  $fp = fopen($_FILES["fileshow"]["tmp_name"][4],"r");
        $ReadBinary = fread($fp,filesize($_FILES["fileshow"]["tmp_name"][4]));
        fclose($fp);
        $v_photo5 = addslashes($ReadBinary);
  	 }
  	  */


          for ($i = 1; $i <= count($_FILES['fileshow']['name']); $i++) {
            if ($_FILES['fileshow']['name'][$i] != "") {
              $temp      = end(explode(".", $_FILES['fileshow']['name'][$i]));
              $imagename = $_FILES['fileshow']['name'][$i];
              $source    = $_FILES['fileshow']['tmp_name'][$i];
              $target    = "images/post/picture_job_" . $i . "/$imagename";
              move_uploaded_file($source, $target);

              $imagepath = "postkai_" . date("Y-m-d_His") . '.' . $temp;
              $save      = "images/post/picture_job_" . $i . "/$imagepath"; //This is the new file you saving
              $file      = $target; //This is the original file

              list($width, $height) = getimagesize($target);

              $modwidth  = 1000;
              $diff      = $width / $modwidth;
              $modheight = $height / $diff;

              $tn        = imagecreatetruecolor($modwidth, $modheight);
              $image     = imagecreatefromjpeg($file);
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height);

              imagejpeg($tn, $save, 100);
              unlink($target); //Delete our uploaded file

              if ($i == 1) {
                $v_photo1 = $imagepath;
              } elseif ($i == 2) {
                $v_photo2 = $imagepath;
              } elseif ($i == 3) {
                $v_photo3 = $imagepath;
              } elseif ($i == 4) {
                $v_photo4 = $imagepath;
              } else {
                $v_photo5 = $imagepath;
              }
            }
          }


          $SqlUpdate = "UPDATE sb_job
                      SET jTitle   = '" . $v_subject . "',
                          jDetail  = '" . $v_detail . "',
                          jDesc  = '" . $v_description . "',
                          jPrice  = '" . $v_price . "',
                          jaType  = '" . $v_type . "',
                          jType  = '" . $v_cate . "',
                          jProvince  = '" . $v_province . "',
                          jc_Name  = '" . $n_name . "',
                          jc_Address  = '" . $n_address . "',
                          jc_Province  = '" . $n_province . "',
                          jc_Telephone  = '" . $n_phone . "',
                          jc_Email  = '" . $n_email . "',
                          jComment  = '" . $v_comment . "',
                          jTypeProduct  = '" . $v_type_product . "',
                          jLINEID  = '" . $n_line . "',
                          jEditor  = '" . $n_code_edit . "'
                          $e_mID
                    WHERE ( jID = '" . $UrlId . "' )";

          if (update_tb($SqlUpdate) == true) {
            echo fSuccess(2, "แก้ไขประกาศสำเร็จ", $LinkWeb . "post/" . $UrlId, 2);
            //log_insert("แก้ไขประกาศ เลขที่ : ".$UrlId." สำเร็จ",$_COOKIE[$CookieID]);
          } else {
            echo fError(2, "แก้ไขประกาศไม่สำเร็จ กรุณาตรวจสอบข้อมูล", "");
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
                          sj.jID = '" . $UrlId . "'  AND
                          sj.jStatus = '1'
                        )";
        if (select_num($SqlSelect) > 0) {
          foreach (select_tb($SqlSelect) as $value) {
            // code...
        ?>
            <div class="col-12 p-0 card">
              <form class="" action="<?php echo $LinkPath; ?>" method="post" enctype="multipart/form-data">

                <div class="row m-0">
                  <div class="col-12 p-0 pt-5">
                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for="post_category"><?php echo $translations["post-cate"]; ?>:</label>
                      <div class="col-sm-6 col-12">
                        <select class="form-select" name="post_category" id="post_category" required>
                          <option value=""><?php echo $translations["post-cate-text"]; ?></option>
                          <?php
                          $SqlSelect = "SELECT *
                                    FROM p_category
                                    ORDER BY name_category ASC ";
                          if (select_num($SqlSelect) > 0) {
                            foreach (select_tb($SqlSelect) as $row) {
                          ?>
                              <option value="<?php echo $row['id_category']; ?>" <?php echo $row['id_category'] == $value['id_category'] ? "selected" : ""; ?>><?php echo $row['name_category']; ?></option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for="post_province"><?php echo $translations["post-province"]; ?>:</label>
                      <div class="col-sm-6 col-12">
                        <select class="form-select" name="post_province" required>
                          <option value=""><?php echo $translations["post-province-text"]; ?></option>
                          <?php
                          $SqlSelect = "SELECT *
                                      FROM p_province
                                      ORDER BY PROVINCE_NAME ASC ";
                          if (select_num($SqlSelect) > 0) {
                            foreach (select_tb($SqlSelect) as $row) {
                          ?>
                              <option value="<?php echo $row['PROVINCE_ID']; ?>" <?php echo $row['PROVINCE_ID'] == $value['PROVINCE_ID'] ? "selected" : ""; ?>><?php echo $row['PROVINCE_NAME']; ?></option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for="post_type"><?php echo $translations["post-type"]; ?></label>
                      <div class="col-sm-6 col-12">
                        <select class="form-select" name="post_type" required>
                          <option value=""><?php echo $translations["post-type-text"]; ?></option>
                          <?php
                          $SqlSelect = "SELECT *
                                    FROM p_type
                                    ORDER BY name_Type ASC ";
                          if (select_num($SqlSelect) > 0) {
                            foreach (select_tb($SqlSelect) as $row) {
                          ?>
                              <option value="<?php echo $row['id_Type']; ?>" <?php echo $row['id_Type'] == $value['id_Type'] ? "selected" : ""; ?>><?php echo $row['name_Type']; ?></option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for="post_subject"><?php echo $translations["post-subject"]; ?></label>
                      <div class="col-sm-9">
                        <input class="form-control" type="text" name="post_subject" value="<?php echo $value['jTitle']; ?>" required placeholder="<?php echo $translations["post-subject"]; ?>" autocomplete="off">
                      </div>
                    </div>
                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for="post_desc"><?php echo $translations["post-detail-short"]; ?></label>
                      <div class="col-sm-9">
                        <input class="form-control" type="text" name="post_desc" value="<?php echo $value['jDetail']; ?>" required placeholder="<?php echo $translations["post-detail-short"]; ?>" autocomplete="off">
                      </div>
                    </div>
                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3 text-ll mb-5" for="post_desc_full"><?php echo $translations["post-detail"]; ?></label>
                      <div class="col-sm-9">
                        <textarea class="form-control summernote" name="post_desc_full" required><?php echo $value['jDesc']; ?></textarea>
                      </div>
                    </div>

                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for="post_price"><?php echo $translations["post-price"]; ?></label>
                      <div class="col-sm-6">
                        <input class="form-control" type="text" name="post_price" value="<?php echo $value['jPrice']; ?>" placeholder="<?php echo $translations["post-price-text"]; ?>">
                      </div>
                    </div>
                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for=""><?php echo $translations["post-product"]; ?></label>
                      <div class="col-sm-6">
                        <select class="form-select" name="post_product">
                          <option value="0" <?php echo $value['jTypeProduct'] == '0' ? "selected" : ""; ?>>ไม่ระบุ , N/A</option>
                          <option value="1" <?php echo $value['jTypeProduct'] == '1' ? "selected" : ""; ?>>ใหม่ , New</option>
                          <option value="2" <?php echo $value['jTypeProduct'] == '2' ? "selected" : ""; ?>>มือสอง ,Hand second</option>
                          <option value="3" <?php echo $value['jTypeProduct'] == '3' ? "selected" : ""; ?>>ล้างสต๊อก , Clear Stock</option>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for=""><?php echo $translations["post-day"]; ?></label>
                      <div class="col-sm-6">
                        <select class="form-select" name="post_day">
                          <!-- <option value="0" <?php echo $value['jPostDay'] == '0' ? "selected" : ""; ?>>ไม่จำกัด</option> -->
                          <option value="30" <?php echo $value['jPostDay'] == '30' ? "selected" : ""; ?>>30</option>
                          <option value="90" <?php echo $value['jPostDay'] == '90' ? "selected" : ""; ?>>90</option>
                          <option value="365" <?php echo $value['jPostDay'] == '365' ? "selected" : ""; ?>>365</option>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for="post_comment"><?php echo $translations["post-status"]; ?></label>
                      <div class="col-sm-6">
                        <select class="form-select" name="post_comment" required>
                          <option value="1" <?php echo $value['jComment'] == '1' ? "selected" : ""; ?>>Open Comment</option>
                          <option value="0" <?php echo $value['jComment'] == '0' ? "selected" : ""; ?>>Close Comment</option>
                        </select>
                      </div>
                    </div>

                    <div class="mb-3 row m-0">
                      <?php

                      $varsum = 0;

                      if ($value['jPic1'] != "") {
                      ?><div class="col-lg-2 col-md-2 col-sm-4 col-6 text-center">
                          <img class="img-thumbnail lazyload" data-src="<?php echo $LinkWeb . "images/post/picture_job_1/" . $value['jPic1']; ?>" src="">
                          <button style="margin:5px 5px 15px 5px;" type="button" id="<?php echo $value['jPic1']; ?>" class="btn btn-xs btn-default click_delete_image"><?php echo $translations["epost-picture-edit"]; ?></button>
                        </div><?php
                              $varsum = $varsum + 1;
                            }
                            if ($value['jPic2'] != "") {
                              ?><div class="col-lg-2 col-md-2 col-sm-4 col-6 text-center">
                          <img class="img-thumbnail lazyload" data-src="<?php echo $LinkWeb . "images/post/picture_job_2/" . $value['jPic2']; ?>" src="">
                          <button style="margin:5px 5px 15px 5px;" type="button" id="<?php echo $value['jPic2']; ?>" class="btn btn-xs btn-default click_delete_image"><?php echo $translations["epost-picture-edit"]; ?></button>
                        </div><?php
                              $varsum = $varsum + 1;
                            }
                            if ($value['jPic3'] != "") {
                              ?><div class="col-lg-2 col-md-2 col-sm-4 col-6 text-center">
                          <img class="img-thumbnail lazyload" data-src="<?php echo $LinkWeb . "images/post/picture_job_3/" . $value['jPic3']; ?>" src="">
                          <button style="margin:5px 5px 15px 5px;" type="button" id="<?php echo $value['jPic3']; ?>" class="btn btn-xs btn-default click_delete_image"><?php echo $translations["epost-picture-edit"]; ?></button>
                        </div><?php
                              $varsum = $varsum + 1;
                            }
                            if ($value['jPic4'] != "") {
                              ?><div class="col-lg-2 col-md-2 col-sm-4 col-6 text-center">
                          <img class="img-thumbnail lazyload" data-src="<?php echo $LinkWeb . "images/post/picture_job_4/" . $value['jPic4']; ?>" src="">
                          <button style="margin:5px 5px 15px 5px;" type="button" id="<?php echo $value['jPic4']; ?>" class="btn btn-xs btn-default click_delete_image"><?php echo $translations["epost-picture-edit"]; ?></button>
                        </div><?php
                              $varsum = $varsum + 1;
                            }
                            if ($value['jPic5'] != "") {
                              ?><div class="col-lg-2 col-md-2 col-sm-4 col-6 text-center">
                          <img class="img-thumbnail lazyload" data-src="<?php echo $LinkWeb . "images/post/picture_job_5/" . $value['jPic5']; ?>" src="">
                          <button style="margin:5px 5px 15px 5px;" type="button" id="<?php echo $value['jPic5']; ?>" class="btn btn-xs btn-default click_delete_image"><?php echo $translations["epost-picture-edit"]; ?></button>
                        </div><?php
                              $varsum = $varsum + 1;
                            }
                              ?>
                    </div>
                    <div class="mb-3 row m-0">
                      <div class="col-12 text-danger text-center"><?php echo $translations["epost-picture"]; ?></div>
                    </div>
                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for=""><?php echo $translations["post-contact-name"]; ?></label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="post_n_fullname" value="<?php echo $value['jc_Name']; ?>" placeholder="<?php echo $translations["post-contact-name"]; ?>" autocomplete="off">
                      </div>
                    </div>
                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for=""><?php echo $translations["post-contact-address"]; ?></label>
                      <div class="col-sm-9">
                        <textarea class="form-control" name="post_n_address" placeholder="<?php echo $translations["post-contact-address-text"]; ?>" required autocomplete="off"><?php echo $value['jc_Address']; ?></textarea>
                      </div>
                    </div>
                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for=""><?php echo $translations["post-contact-province"]; ?></label>
                      <div class="col-sm-6">
                        <select class="form-select" name="post_n_province" required>
                          <option value=""><?php echo $translations["post-contact-province-text"]; ?></option>
                          <?php
                          $SqlSelect = "SELECT *
                                        FROM p_province
                                        ORDER BY PROVINCE_NAME ASC ";
                          if (select_num($SqlSelect) > 0) {
                            foreach (select_tb($SqlSelect) as $row) {
                          ?>
                              <option value="<?php echo $row['PROVINCE_ID']; ?>" <?php echo $value['PROVINCE_ID'] == $row['PROVINCE_ID'] ? "selected" : ""; ?>><?php echo $row['PROVINCE_NAME']; ?></option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for=""><?php echo $translations["post-contact-phone"]; ?></label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="post_n_telephone" value="<?php echo $value['jc_Telephone']; ?>" required placeholder="<?php echo $translations["post-contact-phone-text"]; ?>" autocomplete="off">
                      </div>
                    </div>
                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for=""><?php echo $translations["post-contact-email"]; ?></label>
                      <div class="col-sm-6">
                        <input type="email" class="form-control" name="post_n_email" value="<?php echo $value['jc_Email']; ?>" required placeholder="<?php echo $translations["post-contact-email-text"]; ?>" autocomplete="off">
                      </div>
                    </div>
                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for="post_n_lineid"><?php echo $translations["post-contact-line"]; ?></label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="post_n_lineid" value="<?php echo $value['jLINEID']; ?>" placeholder="<?php echo $translations["post-contact-line"]; ?>" autocomplete="off">
                      </div>
                    </div>

                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for=""><?php echo $translations["post-contact-edit"]; ?></label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" name="post_code_edit" required placeholder="<?php echo $translations['post-contact-edit-text']; ?>" autocomplete="off">
                      </div>
                    </div>

                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for=""></label>
                      <div class="col-sm-9">
                        <div class="g-recaptcha" data-sitekey="6LcK9v4pAAAAALh_WlZV5JYCqLFQToygb_lqfxju"></div>
                        <div class="show-alert mt-2 text-danger text-center"></div>
                      </div>
                    </div>
                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for=""></label>
                      <div class="col-sm-9">
                        <input type="checkbox" name="re_check_policy" value="1" required id="re_check_policy">
                        <label style="display: initial; font-size:13px;" for="re_check_policy"><?php echo $translations["post-check"]; ?> <a href="<?php echo $LinkWeb; ?>policy" target="_blank"><?php echo $translations["post-policy-1"]; ?></a> และ <a href="<?php echo $LinkWeb; ?>term-and-condition" target="_blank"><?php echo $translations["post-policy-2"]; ?></a> <?php echo $translations["post-policy-3"]; ?></label>
                      </div>
                    </div>

                    <div class="mb-3 row m-0">
                      <label class="col-form-label col-sm-3" for=""></label>
                      <div class="col-sm-9">
                        <button type="submit" name="btnUpdate" class="btn btn-success btn-md"><?php echo $translations["post-confirm"]; ?></button>
                      </div>
                    </div>
                  </div>
                </div>

              </form>
            </div>
      <?php
          }
        }
      } else {
        header("location:" . $LinkWeb . "post/" . $UrlId . "/?confirm-edit=check");
      }
      ?>

    </div>
  </div>
</div>