<div class="row m-0 mt-mb-5">
  <div class="col-12 p-0 pt-5 pb-5">

    <h2 class=""><?php echo $translations["post-header"]; ?></h2>
    <?php
    if (isset($_POST['btnPost'])) {

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

      $v_mID = "";
      $d_mID = "";
      if (!empty($_COOKIE['mid'])) {
        $v_mID = ",mID";
        $m_mID = ",'" . base64url_decode($_COOKIE['mid']) . "' ";
      }


      for ($i = 0; $i < count($_FILES['fileshow']['name']); $i++) {
        if ($_FILES['fileshow']['name'][$i] != "") {

          $a = $i + 1;
          $temp      = end(explode(".", $_FILES['fileshow']['name'][$i]));
          $imagename = $_FILES['fileshow']['name'][$i];
          $source    = $_FILES['fileshow']['tmp_name'][$i];
          $target    = "images/post/picture_job_" . $a . "/$imagename";
          move_uploaded_file($source, $target);
          $imagepath = "postkai_" . date("Y-m-d_His") . '.' . $temp;
          $save      = "images/post/picture_job_" . $a . "/$imagepath"; //This is the new file you saving
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

          if ($i == 0) {
            $v_photo1 = $imagepath;
          } elseif ($i == 1) {
            $v_photo2 = $imagepath;
          } elseif ($i == 2) {
            $v_photo3 = $imagepath;
          } elseif ($i == 3) {
            $v_photo4 = $imagepath;
          } else {
            $v_photo5 = $imagepath;
          }
        }
      }


      $SqlInsert = "INSERT INTO sb_job
                    (jTitle,jDetail,jDesc,jPrice,jaType,jType,jProvince,jPic1,jPic2,jPic3,jPic4,jPic5,
                     jc_Name,jc_Address,jc_Province,jc_Telephone,jc_Email,jRead,jDate_Create,jStatus,
                     jComment,jTypeProduct,jPostDay,jLINEID,jEditor" . $v_mID . ")
                    VALUES(
                      '$v_subject','$v_detail','$v_description','$v_price','$v_type','$v_cate','$v_province','$v_photo1','$v_photo2','$v_photo3','$v_photo4','$v_photo5',
                      '$n_name','$n_address','$n_province','$n_phone','$n_email','1','" . date('Y-m-d H:i:s') . "','1',
                      '$v_comment','$v_type_product','$v_day','$n_line','$n_code_edit'" . $m_mID . "
                    );";
      if (insert_tb($SqlInsert) == true) {
        $SqlSelectIN = "SELECT jID,jDate_Create FROM sb_job  ORDER BY jID DESC LIMIT 1;";
        foreach (select_tb($SqlSelectIN) as $kueu) {
          //// line notify
          $sMessage = "\nมีประกาศใหม่.." . $kueu['jDate_Create'] . " \nหัวข้อ : *" . $v_subject . "* \nดูประกาศ : " . $LinkWeb . "post/" . $kueu['jID'];
          line_notify($sMessage);

          $_SESSION['show'] = fSuccess(1, "ลงประกาศสำเร็จ", $LinkWeb . "post/" . $kueu['jID'], 3);
          header("Location:" . $LinkPath);
          exit();
        }
      } else {
        echo fError(1, "ลงประกาศไม่สำเร็จ กรุณาตรวจสอบข้อมูล", "");
      }
    }

    if (isset($_SESSION['show'])) {
      echo $_SESSION['show'];
      unset($_SESSION['show']);
    }

    ?>
    <div class="card">
      <div class="col-12">
        <form class="" action="<?php echo $LinkPath; ?>" method="post" enctype="multipart/form-data" onsubmit="return onSubmit(event)">

          <div class="row m-0">
            <div class="col-12 pt-5">
              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for="post_category"><?php echo $translations["post-cate"]; ?> <span class="text-danger">*</span></label>
                <div class="col-sm-6">
                  <select class="form-select" name="post_category" id="post_category" required>
                    <option value=""><?php echo $translations["post-cate-text"]; ?></option>
                    <?php
                    $SqlSelect = "SELECT *
                            FROM p_category
                            ORDER BY name_category ASC ";
                    if (select_num($SqlSelect) > 0) {
                      foreach (select_tb($SqlSelect) as $row) {
                    ?>
                        <option value="<?php echo $row['id_category']; ?>" <?php echo $_POST['post_category'] == $row['id_category'] ? "selected" : ""; ?>><?php echo $row['name_category']; ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for="post_province"><?php echo $translations["post-province"]; ?> <span style="color:#f00;">*</span></label>
                <div class="col-sm-6">
                  <select class="form-select" name="post_province" required>
                    <option value=""><?php echo $translations["post-province-text"]; ?></option>
                    <?php
                    $SqlSelect = "SELECT *
                              FROM p_province
                              ORDER BY PROVINCE_NAME ASC ";
                    if (select_num($SqlSelect) > 0) {
                      foreach (select_tb($SqlSelect) as $row) {
                    ?>
                        <option value="<?php echo $row['PROVINCE_ID']; ?>" <?php echo $_POST['post_province'] == $row['PROVINCE_ID'] ? "selected" : ""; ?>><?php echo $row['PROVINCE_NAME']; ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for="post_type"><?php echo $translations["post-type"]; ?> <span style="color:#f00;">*</span></label>
                <div class="col-sm-6">
                  <select class="form-select" name="post_type" required>
                    <option value=""><?php echo $translations["post-type-text"]; ?></option>
                    <?php
                    $SqlSelect = "SELECT *
                            FROM p_type
                            ORDER BY name_Type ASC ";
                    if (select_num($SqlSelect) > 0) {
                      foreach (select_tb($SqlSelect) as $row) {
                    ?>
                        <option value="<?php echo $row['id_Type']; ?>" <?php echo $_POST['post_type'] == $row['id_Type'] ? "selected" : ""; ?>><?php echo $row['name_Type']; ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-form-label col-sm-3 " for="post_subject"><?php echo $translations["post-subject"]; ?> <span style="color:#f00;">*</span></label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" name="post_subject" value="<?php echo $_POST['post_subject']; ?>" required placeholder="<?php echo $translations["post-subject"]; ?>" autocomplete="off">
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for="post_desc"><?php echo $translations["post-detail-short"]; ?> <span style="color:#f00;">*</span></label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" name="post_desc" value="<?php echo $_POST['post_desc']; ?>" required placeholder="<?php echo $translations["post-detail-short"]; ?>" autocomplete="off">
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for="post_desc_full"><?php echo $translations["post-detail"]; ?> <span style="color:#f00;">*</span></label>
                <div class="col-sm-9">
                  <textarea class="form-control summernote" name="post_desc_full" required><?php echo $_POST['post_desc_full']; ?></textarea>
                  <!-- <div class="summernote"></div> -->
                </div>
              </div>

              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for="post_price"><?php echo $translations["post-price"]; ?></label>
                <div class="col-sm-6">
                  <input class="form-control" type="text" name="post_price" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $_POST['post_price']; ?>" placeholder="<?php echo $translations["post-price-text"]; ?>" autocomplete="off">
                  <span id="error" style="color: Red; display: none">* Number Only (0 - 9)</span>
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for=""><?php echo $translations["post-product"]; ?></label>
                <div class="col-sm-6">
                  <select class="form-select" name="post_product">
                    <option value="0" <?php echo $_POST['post_product'] == "0" ? "selected" : ""; ?>>ไม่ระบุ</option>
                    <option value="1" <?php echo $_POST['post_product'] == "1" ? "selected" : ""; ?>>ใหม่</option>
                    <option value="2" <?php echo $_POST['post_product'] == "2" ? "selected" : ""; ?>>มือสอง</option>
                    <option value="3" <?php echo $_POST['post_product'] == "3" ? "selected" : ""; ?>>ล้างสต๊อก</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for=""><?php echo $translations["post-day"]; ?></label>
                <div class="col-sm-6">
                  <select class="form-select" name="post_day">
                    <!--<option value="0" <?php echo $_POST['post_day'] == "0" ? "selected" : ""; ?>>ไม่จำกัด</option>-->
                    <option value="30" <?php echo $_POST['post_day'] == "30" ? "selected" : ""; ?>>30</option>
                    <option value="90" <?php echo $_POST['post_day'] == "90" ? "selected" : ""; ?>>90</option>
                    <option value="365" <?php echo $_POST['post_day'] == "365" ? "selected" : ""; ?>>365</option>
                  </select>
                  <span class="text-danger" style="font-size:12px;"><?php echo $translations["post-day-notify"]; ?></span>
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for="post_comment"><?php echo $translations["post-status"]; ?> <span style="color:#f00;">*</span></label>
                <div class="col-sm-6">
                  <select class="form-select" name="post_comment" required>
                    <option value="1">open Comment</option>
                    <option value="0">close Comment</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for=""><?php echo $translations["post-attach"]; ?> <span style="color:#f00;">*</span><br>
                  <span class="text-black-50" style="font-size:12px;"><?php echo $translations["post-attach-text"]; ?></span>
                </label>
                <div class="col-sm-6">
                  <div class="col-12 p-0 ">
                    <div class="mb-3">
                      <input id="fileshow1" type="file" class="form-control" name="fileshow[]" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3">
                      <input id="fileshow2" type="file" class="form-control" name="fileshow[]">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3">
                      <input id="fileshow3" type="file" class="form-control" name="fileshow[]">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3">
                      <input id="fileshow4" type="file" class="form-control" name="fileshow[]">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3">
                      <input id="fileshow5" type="file" class="form-control" name="fileshow[]">
                    </div>
                  </div>
                </div>
              </div>

              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for=""><?php echo $translations["post-contact-name"]; ?> <span style="color:#f00;">*</span></label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="post_n_fullname" placeholder="<?php echo $translations["post-contact-name"]; ?>" value="<?php echo !empty($_COOKIE['mfullname']) ? base64url_decode($_COOKIE['mfullname']) : $_POST['post_n_fullname']; ?>" <?php echo !empty($_COOKIE['mfullname']) ? "readonly" : ""; ?> autocomplete="off">
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for=""><?php echo $translations["post-contact-address"]; ?> <span style="color:#f00;">*</span></label>
                <div class="col-sm-6">
                  <textarea class="form-control" name="post_n_address" placeholder="<?php echo $translations["post-contact-address-text"]; ?>" required autocomplete="off"><?php echo $_POST['post_n_address']; ?></textarea>
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for=""><?php echo $translations["post-contact-province"]; ?> <span style="color:#f00;">*</span></label>
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
                        <option value="<?php echo $row['PROVINCE_ID']; ?>" <?php echo $_POST['post_province'] == $row['PROVINCE_ID'] ? "selected" : ""; ?>><?php echo $row['PROVINCE_NAME']; ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for=""><?php echo $translations["post-contact-phone"]; ?> <span style="color:#f00;">*</span></label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="post_n_telephone" required placeholder="<?php echo $translations["post-contact-phone-text"]; ?>" value="<?php echo !empty($_COOKIE['mphone']) ? base64url_decode($_COOKIE['mphone']) : ""; ?>" <?php echo !empty($_COOKIE['mphone']) ? "readonly" : ""; ?> autocomplete="off">
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for=""><?php echo $translations["post-contact-email"]; ?> <span style="color:#f00;">*</span></label>
                <div class="col-sm-6">
                  <input type="email" class="form-control" name="post_n_email" value="<?php echo $_POST['post_n_email']; ?>" required placeholder="<?php echo $translations["post-contact-email-text"]; ?>" autocomplete="off">
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for="post_n_lineid"><?php echo $translations["post-contact-line"]; ?></label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="post_n_lineid" value="<?php echo $_POST['post_n_lineid']; ?>" placeholder="<?php echo $translations["post-contact-line"]; ?>" autocomplete="off">
                </div>
              </div>

              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for=""><?php echo $translations["post-contact-edit"]; ?> <span style="color:#f00;">*</span></label>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="post_code_edit" value="<?php echo $_POST['post_code_edit']; ?>" required placeholder="<?php echo $translations["post-contact-edit-text"]; ?>" autocomplete="off">
                </div>
              </div>

              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for=""></label>
                <div class="col-sm-9">
                  <div class="g-recaptcha" data-sitekey="6LcK9v4pAAAAALh_WlZV5JYCqLFQToygb_lqfxju"></div>
                  <div class="show-alert mt-2 text-danger text-center"></div>
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for=""></label>
                <div class="col-sm-6  pt-1 pb-1">
                  <input type="checkbox" name="re_check_policy" value="1" required id="re_check_policy">
                  <label style="display: initial; font-size:13px;" for="re_check_policy"><?php echo $translations["post-check"]; ?> <a href="<?php echo $LinkWeb; ?>policy" target="_blank"><?php echo $translations["post-policy-1"]; ?></a> <?php echo $translations["post-check-and"]; ?> <a href="<?php echo $LinkWeb; ?>term-and-condition" target="_blank"><?php echo $translations["post-policy-2"]; ?></a> <?php echo $translations["post-policy-3"]; ?></label>
                </div>
              </div>

              <div class="mb-3 row">
                <label class="col-form-label col-sm-3" for=""></label>
                <div class="col-sm-9 pb-5">
                  <button type="submit" name="btnPost" class="btn btn-success btn-md"><?php echo $translations["post-confirm"]; ?></button>
                </div>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>


  </div>
</div>