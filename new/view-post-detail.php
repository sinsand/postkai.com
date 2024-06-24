<div class="row m-0 mt-mb-5">
  <div class="col-12 p-0 pt-5 pb-5">


    <?php
    if ($_GET['confirm-edit'] == "check" || $_GET['confirm-delete'] == "check") {

      if ($_GET['confirm-edit'] == "check") {

        if (isset($_POST['confirmcheck'])) {
          $SqlSelect = "SELECT jID
                      FROM sb_job
                      WHERE (
                         jID = '" . $UrlId . "' AND
                         jEditor = '" . $_POST['numbercheck'] . "'
                      ) ";
          if (select_num($SqlSelect) > 0) {
            $_SESSION['editsession'] = base64url_encode('confirm');
            header("location:" . $LinkWeb . "post-edit/" . $UrlId);
          } else {
            fError(4, $translations["pd_edit_re_show"], $translations["pd_edit_re_show2"]);
          }
        }


    ?>
        <h2 class=""><?php echo $translations["pd_edit_no"]; ?> : <?php echo $UrlId; ?></h2>
        <div class="col-12 col-md-6 pt-0 pb-5">
          <form class="" action="<?php echo $LinkPath; ?>" method="post">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="<?php echo $translations["pd_edit_text"]; ?>" required name="numbercheck">
              <button class="btn btn-success" type="submit" name="confirmcheck"><?php echo $translations["pd_edit_confirm"]; ?></button>
            </div>
          </form>
        </div>
      <?php
      } else if ($_GET['confirm-delete'] == "check") {

        ///// notify
        if (isset($_POST['nsubmit'])) {
          if (empty($_SESSION['captcha_code']) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0) {
            echo fError(1, $translations["pd_delete_re_show"], "");
          } else {
            $valuecolumn = "";
            $valuedata = "";
            if (!empty($_POST['ndetail'])) {
              $valuecolumn = ",ncomment";
              $valuedata = ",'" . $_POST['ndetail'] . "'";
            }

            $SqlInsert = "INSERT INTO n_notify
                         (nid,jID,tid,nphone,nemail,ncreatedate" . $valuecolumn . ")
                         VALUES(0,
                           '" . $UrlId . "',
                           '" . $_POST['nreason'] . "',
                           '" . $_POST['ntel'] . "',
                           '" . $_POST['nemail'] . "',
                           now()
                           " . $valuedata . "
                         );";
            if (insert_tb($SqlInsert) == true) {


              $SqlSelect = "SELECT n.nid,n.ncreatedate
                          FROM n_notify n
                          ORDER BY n.ncreatedate DESC
                          LIMIT 1;";
              foreach (select_tb($SqlSelect) as $rowi) {
                $sMessage = "\nการแจ้ง.." . $rowi['ncreatedate'] . "\nเหตุผล : " . $_POST['ndetail'] . "\nดูการแจ้ง : " . $LinkWeb . "isys/view-report/\nดูประกาศ : " . $LinkWeb . "post/" . $UrlId;
                line_notify($sMessage);
              }

              $_SESSION['show'] =  fSuccess(1, $translations["pd_delete_re_show_complete"], $LinkWeb . "post/" . $UrlId, 2);
              header("Location:" . $LinkPath);
              exit();
            } else {
              echo fError(1, $translations["pd_delete_re_show_notify"], '');
            }
          }
        }

      ?>
        <h2 class=""><?php echo $translations["delete-post-header"]; ?> : <?php echo $UrlId; ?></h2>
        <div class="col-12 col-md-12 col-lg-6 p-3 pb-5 card">
          <form action="<?php echo $LinkPath; ?>" method="post" onsubmit="return onSubmit(event)">
            <div class="row m-0">
              <div class="col-12 col-sm-3 col-md-2 col-lg-2">
                <label for="InputReason"><?php echo $translations["delete-post-reason"]; ?></label>
              </div>
              <div class="col-12 col-sm-9 col-md-10 col-lg-10">
                <div class="mb-3">
                  <?php
                  $SqlSelect = "SELECT *
                                FROM n_type
                                ORDER BY tid ASC";
                  if (select_num($SqlSelect) > 0) {
                    $i = 0;
                    foreach (select_tb($SqlSelect) as $value) {
                  ?>
                      <div class="radio">
                        <label><input type="radio" name="nreason" value="<?php echo $value['tid']; ?>" <?php echo $i == 0 ? "checked" : ""; ?>> <?php echo $value['tname']; ?></label>
                      </div>
                  <?php $i++;
                    }
                  }
                  ?>
                </div>
              </div>
            </div>
            <div class="row m-0">
              <div class="col-12 col-sm-3 col-md-2 col-lg-2">
                <label for=""><?php echo $translations["delete-post-remark"]; ?></label>
              </div>
              <div class="col-12 col-sm-9 col-md-10 col-lg-10">
                <div class="mb-3">
                  <div class="col">
                    <textarea name="ndetail" class="form-control" placeholder="<?php echo $translations["pd_report_text_placeholder"]; ?>" required></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="row m-0">
              <div class="col-12 col-sm-3 col-md-2 col-lg-2">
                <label for="InputEmail"><?php echo $translations["delete-post-email"]; ?></label>
              </div>
              <div class="col-12 col-sm-9 col-md-10 col-lg-10">
                <div class="mb-3">
                  <div class="input-group">
                    <input type="email" class="form-control" name="nemail" id="email" placeholder="Email" required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row m-0">
              <div class="col-12 col-sm-3 col-md-2 col-lg-2">
                <label for="InputTel"><?php echo $translations["delete-post-phone"]; ?></label>
              </div>
              <div class="col-12 col-sm-9 col-md-10 col-lg-10">
                <div class="mb-3">
                  <div class="input-group">
                    <input type="text" class="form-control" name="ntel" id="tel" placeholder="<?php echo $translations["pd_report_mobile"]; ?>" required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row m-0">
              <div class="col-12 col-sm-3 col-md-2 col-lg-2"></div>
              <div class="col-12 col-sm-9 col-md-6 col-lg-6">
                <div class="g-recaptcha" data-sitekey="6LcK9v4pAAAAALh_WlZV5JYCqLFQToygb_lqfxju"></div>
                <div class="show-alert mt-2 text-danger text-center"></div>
              </div>
            </div>
            <div class="row m-0">
              <div class="col-12 col-sm-3 col-md-2 col-lg-2"></div>
              <div class="col-12 col-sm-9 col-md-6 col-lg-6">
                <button type="submit" name="nsubmit" class="btn btn-success btn-block"><?php echo $translations["delete-post-submit"]; ?></button>
              </div>
            </div>
          </form>
        </div>
        <?php
      }
    } else {

      /////  comment
      if (isset($_POST['btnPostComment'])) {
        $column = "";
        $data = "";
        if (!empty($_COOKIE['mid'])) {
          $column = ",mid";
          $data  = "," . base64url_decode($_COOKIE['mid']);
        }
        $SqlInsert = "INSERT INTO n_comment
                          (cid,jID,cname,cemail,ccomment,ccreatedate" . $column . ")
                        VALUES(0,
                          '" . $UrlId . "',
                          '" . htmlspecialchars($_POST['nname'], ENT_QUOTES) . "',
                          '" . htmlspecialchars($_POST['nemail'], ENT_QUOTES) . "',
                          '" . htmlspecialchars($_POST['ncomment'], ENT_QUOTES) . "',
                          now()" . $data . "
                        )";
        if (insert_tb($SqlInsert) == true) {
          $sMessage = "\nมีความคิดเห็นใหม่.." . date("Y-m-d H:i:s") . "\nดูประกาศ : " . $LinkWeb . "post/" . $UrlId;
          line_notify($sMessage);
          $_SESSION['show'] = fSuccess(1, $translations["pd_comment_confirm_show_complete"], $LinkPath, 2);
          header("Location:" . $LinkPath);
          exit();
        } else {
          echo fError(1, $translations["pd_comment_confirm_show_error"], "");
        }
      }

      if (isset($_SESSION['show'])) {
        echo $_SESSION['show'];
        unset($_SESSION['show']);
      }

      $SqlSelect = "SELECT sj.*,pt.name_Type,p.PROVINCE_NAME,pc.name_category
                  FROM sb_job sj
                  LEFT OUTER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                  LEFT OUTER JOIN p_category pc ON (sj.jType = pc.id_category)
                  LEFT OUTER JOIN p_province p  ON (sj.jProvince = p.PROVINCE_ID)
                  WHERE (
                          sj.jID = '" . $UrlId . "'  AND
                          sj.jStatus = '1'
                        )";
      if (select_num($SqlSelect) > 0) {
        $SqlUpdate = "UPDATE sb_job SET jRead = jRead+1 WHERE ( jID = '" . $UrlId . "'  AND jStatus = '1') ";
        update_tb($SqlUpdate);
        $mID = "";
        foreach (select_tb($SqlSelect) as $row) {
        ?>
          <div class="col-12">
            <h2 class="mt-3"><?php echo htmlspecialchars_decode($row['jTitle']); ?></h2>
            <h4 class="text-black-50"><?php echo $translations["dpost-no"]; ?> : <?php echo $row['jID']; ?></h4>

            <div class="row m-0">
              <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-7 pt-5 p-0">
                <div id="gallery--getting-started" class="pswp-gallery row m-0" data-pswp-uid="1">
                  <?php

                  $Link_noimage = $LinkWeb . "images/system/no-image.jpeg";
                  $Link_wait_image = "https://placehold.co/600x600?text=Waiting";
                  list($width, $height, $type, $attr) = getimagesize($LinkWeb . "images/system/no-image.jpeg");



                  if (!empty($row['jPic1']) || $row['jPic1'] != "") {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb . "images/post/picture_job_1/" . $row['jPic1']);
                    $Link_p1  = $LinkWeb . "images/post/picture_job_1/" . $row['jPic1'];
                    $Title_p1 = $row['jTitle'] . "-1";
                  ?>
                    <a href="<?php echo $LinkWeb; ?>images/post/picture_job_1/<?php echo $row['jPic1']; ?>" data-med="<?php echo $LinkWeb; ?>images/post/picture_job_1/<?php echo $row['jPic1']; ?>" class="col-12 p-0 pb-2" data-size="<?php echo $width . "x" . $height; ?>" data-med-size="<?php echo $width . "x" . $height; ?>" data-author="<?php echo $row['jTitle']; ?>">
                      <img class="col-12 p-0 pb-2 lazyload" data-src="<?php echo $LinkWeb; ?>images/post/picture_job_1/<?php echo $row['jPic1']; ?>" src="<?php echo $LinkWeb . "images/loading-screen.gif"; ?>" alt="<?php echo $row['jTitle']; ?>" style="width:100%;height:100%;" />
                      <figure style="display:none;" class="text-center"><?php echo $row['jTitle']; ?> 1</figure>
                    </a>
                  <?php
                  } else {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb . "images/system/no-image.jpeg");
                  ?>
                    <a href="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" class="col-12 p-0 pb-2" data-size="<?php echo $width . "x" . $height; ?>" data-med-size="<?php echo $width . "x" . $height; ?>" data-author="รูปที่ 1">
                      <img class="col-12 p-0 pb-2 lazyload" data-src="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" src="<?php echo $LinkWeb . "images/loading-screen.gif"; ?>" alt="" />
                      <figure style="display:none;" class="text-center"><?php echo $translations["pd_view_nopic"]; ?></figure>
                    </a>
                  <?php
                  }
                  /// pic2
                  if (!empty($row['jPic2']) || $row['jPic2'] != "") {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb . "images/post/picture_job_2/" . $row['jPic2']);
                  ?>
                    <a href="<?php echo $LinkWeb; ?>images/post/picture_job_2/<?php echo $row['jPic2']; ?>" data-med="<?php echo $LinkWeb; ?>images/post/picture_job_2/<?php echo $row['jPic2']; ?>" data-size="<?php echo $width . "x" . $height; ?>" data-med-size="<?php echo $width . "x" . $height; ?>" data-author="<?php echo $row['jTitle']; ?>" class="col-6 col-sm-6 col-md-3 p-0 pb-2">
                      <img class="col-12 p-0 lazyload" data-src="<?php echo $LinkWeb; ?>images/post/picture_job_2/<?php echo $row['jPic2']; ?>" src="<?php echo $LinkWeb . "images/loading-screen.gif"; ?>" alt="<?php echo $row['jTitle']; ?>" style="width:100%;height:100%;" />
                      <figure style="display:none;" class="text-center"><?php echo $row['jTitle']; ?> 2</figure>
                    </a>
                  <?php
                  } else {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb . "images/system/no-image.jpeg");
                  ?>
                    <a href="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" class="col-6 col-sm-6 col-md-3 p-0 pb-2" data-size="<?php echo $width . "x" . $height; ?>" data-med-size="<?php echo $width . "x" . $height; ?>" data-author="รูปที่ 2">
                      <img class="col-12 p-0 pb-2 lazyload" data-src="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" src="<?php echo $LinkWeb . "images/loading-screen.gif"; ?>" alt="" />
                      <figure style="display:none;" class="text-center"><?php echo $translations["pd_view_nopic"]; ?></figure>
                    </a>
                  <?php
                  }
                  /// pic3
                  if (!empty($row['jPic3']) || $row['jPic3'] != "") {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb . "images/post/picture_job_3/" . $row['jPic3']);
                  ?>
                    <a href="<?php echo $LinkWeb; ?>images/post/picture_job_3/<?php echo $row['jPic3']; ?>" data-med="<?php echo $LinkWeb; ?>images/post/picture_job_3/<?php echo $row['jPic3']; ?>" data-size="<?php echo $width . "x" . $height; ?>" data-med-size="<?php echo $width . "x" . $height; ?>" data-author="<?php echo $row['jTitle']; ?>" class="col-6 col-sm-3 p-0 pb-2">
                      <img class="col-3 p-0 pb-2 lazyload" data-src="<?php echo $LinkWeb; ?>images/post/picture_job_3/<?php echo $row['jPic3']; ?>" src="<?php echo $LinkWeb . "images/loading-screen.gif"; ?>" alt="<?php echo $row['jTitle']; ?>" style="width:100%;height:100%;" />
                      <figure style="display:none;" class="text-center"><?php echo $row['jTitle']; ?> 3</figure>
                    </a>
                  <?php
                  } else {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb . "images/system/no-image.jpeg");
                  ?>
                    <a href="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" class="col-6 col-sm-6 col-md-3 p-0 pb-2" data-size="<?php echo $width . "x" . $height; ?>" data-med-size="<?php echo $width . "x" . $height; ?>" data-author="รูปที่ 3">
                      <img class="col-12 p-0 pb-2 lazyload" data-src="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" src="<?php echo $LinkWeb . "images/loading-screen.gif"; ?>" alt="" />
                      <figure style="display:none;" class="text-center"><?php echo $translations["pd_view_nopic"]; ?></figure>
                    </a>
                  <?php
                  }
                  /// pic4
                  if (!empty($row['jPic4']) || $row['jPic4'] != "") {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb . "images/post/picture_job_4/" . $row['jPic4']);
                  ?>
                    <a href="<?php echo $LinkWeb; ?>images/post/picture_job_4/<?php echo $row['jPic4']; ?>" data-med="<?php echo $LinkWeb; ?>images/post/picture_job_4/<?php echo $row['jPic4']; ?>" data-med-size="<?php echo $width . "x" . $height; ?>" data-size="<?php echo $width . "x" . $height; ?>" data-author="<?php echo $row['jTitle']; ?>" class="col-6 col-sm-6 col-md-3 p-0 pb-2">
                      <img class="col-12 p-0 lazyload" data-src="<?php echo $LinkWeb; ?>images/post/picture_job_4/<?php echo $row['jPic4']; ?>" src="<?php echo $LinkWeb . "images/loading-screen.gif"; ?>" alt="<?php echo $row['jTitle']; ?>" style="width:100%;height:100%;" />
                      <figure style="display:none;" class="text-center"><?php echo $row['jTitle']; ?> 4</figure>
                    </a>
                  <?php
                  } else {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb . "images/system/no-image.jpeg");
                  ?>
                    <a href="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" class="col-6 col-sm-6 col-md-3 p-0 pb-2" data-size="<?php echo $width . "x" . $height; ?>" data-med-size="<?php echo $width . "x" . $height; ?>" data-author="รูปที่ 4">
                      <img class="col-12 p-0 pb-2 lazyload" data-src="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" src="<?php echo $LinkWeb . "images/loading-screen.gif"; ?>" alt="" />
                      <figure style="display:none;" class="text-center"><?php echo $translations["pd_view_nopic"]; ?></figure>
                    </a>
                  <?php
                  }
                  /// pic5
                  if (!empty($row['jPic5']) || $row['jPic5'] != "") {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb . "images/post/picture_job_5/" . $row['jPic5']);
                  ?>
                    <a href="<?php echo $LinkWeb; ?>images/post/picture_job_5/<?php echo $row['jPic5']; ?>" data-med="<?php echo $LinkWeb; ?>images/post/picture_job_5/<?php echo $row['jPic5']; ?>" class="col-6 col-sm-6 col-md-3 p-0 pb-2" data-med-size="<?php echo $width . "x" . $height; ?>" data-size="<?php echo $width . "x" . $height; ?>" data-author="รูปที่ 5">
                      <img class="col-3 p-0 lazyload" data-src="<?php echo $LinkWeb; ?>images/post/picture_job_5/<?php echo $row['jPic5']; ?>" src="<?php echo $LinkWeb . "images/loading-screen.gif"; ?>" alt="<?php echo $row['jTitle']; ?>" style="width:100%;height:100%;" />
                      <figure style="display:none;" class="text-center"><?php echo $row['jTitle']; ?> 5</figure>
                    </a>
                  <?php
                  } else {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb . "images/system/no-image.jpeg");
                  ?>
                    <a href="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" class="col-6 col-sm-6 col-md-3 p-0 pb-2" data-size="<?php echo $width . "x" . $height; ?>" data-med-size="<?php echo $width . "x" . $height; ?>" data-author="รูปที่ 5">
                      <img class="col-12 p-0 pb-2 lazyload" data-src="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" src="<?php echo $LinkWeb . "images/loading-screen.gif"; ?>" alt="" />
                      <figure style="display:none;" class="text-center"><?php echo $translations["pd_view_nopic"]; ?></figure>
                    </a>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-5 pt-5">
                <div class="row m-0 p-2 card">
                  <div class="col">
                    <table class="table col">
                      <tr>
                        <th style="width:40%"><?php echo $translations["dpost-type"]; ?></th>
                        <td class="text-truncate"><?php echo $row['name_Type']; ?></td>
                      </tr>
                      <tr class="fs-15">
                        <th><?php echo $translations["dpost-price"]; ?></th>
                        <td class="text-danger">
                          <?php
                          $vaprice = floatval($row['jPrice']);
                          if (!empty($vaprice) && $vaprice > 0) {
                            echo number_format($vaprice);
                          } else {
                            echo $translations["price-annouce"];
                          }
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <th><?php echo $translations["dpost-province"]; ?></th>
                        <td><?php echo $row['PROVINCE_NAME']; ?></td>
                      </tr>
                      <tr>
                        <th><?php echo $translations["dpost-no"]; ?></th>
                        <td><?php echo $row['jID']; ?></td>
                      </tr>
                      <tr>
                        <th><?php echo $translations["dpost-view"]; ?></th>
                        <td><?php echo number_format($row['jRead']); ?></td>
                      </tr>
                      <tr>
                        <th><?php echo $translations["dpost-edit"]; ?></th>
                        <td><i class="fa fa-cog" aria-hidden="true"></i> <a href="<?php echo $LinkWeb . $UrlPage . "/" . $UrlId; ?>/?confirm-edit=check"><?php echo $translations["dpost-edit-text"]; ?></a></td>
                      </tr>
                      <tr>
                        <th><?php echo $translations["dpost-delete"]; ?></th>
                        <td><i class="fa fa-trash" aria-hidden="true"></i> <a href="<?php echo $LinkWeb . $UrlPage . "/" . $UrlId; ?>/?confirm-delete=check"><?php echo $translations["dpost-delete-text"]; ?></a></td>
                      </tr>
                      <tr>
                        <th><?php echo $translations["dpost-date"]; ?></th>
                        <td><?php echo day_format_month_thai($row['jDate_Create']); ?></td>
                      </tr>
                      <tr>
                        <th><?php echo $translations["dpost-name"]; ?></th>
                        <td><?php echo $row['jc_Name']; ?></td>
                      </tr>
                      <tr>
                        <th><?php echo $translations["dpost-address"]; ?></th>
                        <td>
                          <div class="row m-0">
                            <div class="col p-0"><?php echo $row['jc_Address']; ?></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th><?php echo $translations["dpost-email"]; ?></th>
                        <td><?php echo $row['jc_Email']; ?></td>
                      </tr>
                      <tr>
                        <th><?php echo $translations["dpost-phone"]; ?></th>
                        <td class="text-truncate">
                          <div class="post_click_tel_hide" style="cursor: pointer;color:#004dff;"><?php echo $translations["dpost-phone-click"]; ?></div>
                          <div class="post_click_tel_show" style="display:none;"><?php echo $row['jc_Telephone']; ?></div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="row m-0">
              <div class="col-12 p-0">
                <h3 class="mt-3"><?php echo $translations["dpost-detail"]; ?></h3>
                <div class="row m-0 card">
                  <div class="col-12 p-3">
                    <?php echo check_tags(htmlspecialchars_decode($row['jDesc'])); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
          $mID = $row['mID'];
          ////// view comment
          ?>
          <div class="row m-0">
            <div class="col-12 pt-4 p-0">
              <h2 class="mt-3 mb-1">Comment</h2>
              <div class="row m-0">
                <div class="col-sm-12 col-md-6 p-0">
                  <div class="row m-0 row-cols-1">
                    <?php
                    if ($row['jComment'] == '1') {
                    ?>
                      <div class="col mt-3 p-2 card mb-3">
                        <form class="p-2" action="<?php echo $LinkPath; ?>" method="post" onsubmit="return onSubmit(event)">
                          <div class="mb-2">
                            <textarea class="form-control summernote-comment" name="ncomment" required placeholder="Comment...."></textarea>
                          </div>
                          <div class="mb-2 row m-0">
                            <label class="col-form-label col-sm-5 " for=""><?php echo $translations["dpost-com-name"]; ?></label>
                            <div class="col-sm-7 p-0">
                              <input type="text" class="form-control" name="nname" value="" placeholder="<?php echo $translations["dpost-com-name-text"]; ?>" required autocomplete="off">
                            </div>
                          </div>
                          <div class="mb-2 row m-0">
                            <label class="col-form-label col-sm-5 " for=""><?php echo $translations["dpost-com-email"]; ?></label>
                            <div class="col-sm-7 p-0">
                              <input type="text" class="form-control" name="nemail" value="" required placeholder="<?php echo $translations["dpost-com-email-text"]; ?>" autocomplete="off">
                            </div>
                          </div>
                          <div class="mb-2">
                            <label class="col-form-label col-sm-3 " for=""></label>
                            <div class="col-sm-9">
                              <div class="row m-0">
                                <div class="col-12 p-0 m-0">
                                  <div class="g-recaptcha m-0" data-sitekey="6LcK9v4pAAAAALh_WlZV5JYCqLFQToygb_lqfxju"></div>
                                  <div class="show-alert m-0 text-danger text-center"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="col-form-label col-sm-3 " for=""></label>
                            <div class="col-sm-9 text-right">
                              <button type="submit" name="btnPostComment" class="btn btn-success"><?php echo $translations["dpost-com-submit"]; ?></button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <?php
                    }

                    /* 
                    ////old
                    $SqlSelectCom = "SELECT *
                                        FROM p_comment
                                        WHERE ( jID = '" . $UrlId . "' )
                                        ORDER BY cid_comment DESC ";
                    if (select_num($SqlSelectCom) > 0) {
                      foreach (select_tb($SqlSelectCom) as $rowcom) {
                      ?>
                        <div class="card row m-0 mb-3">
                          <h4 class="lh-15"><?php echo $translations["dpost-com-from"]; ?> <b><a href="mailto:<?php echo $rowcom['c_email']; ?>"><?php echo $rowcom['c_name']; ?></a></b> <span class="label label-default"><?php echo $rowcom['c_create_date']; ?></span> </h4>
                          <div class="col-12 pt-5 pb-5 box-show-left wb">
                            <?php echo check_tags(htmlspecialchars_decode($rowcom['c_detail'])); ?>
                          </div>
                        </div>
                      <?php
                      }
                    } 
                  */

                    ////new
                    $SqlSelectComn = "SELECT *
                                       FROM n_comment
                                       WHERE ( jID = '" . $UrlId . "' )
                                       ORDER BY ccreatedate DESC ";
                    if (select_num($SqlSelectComn) > 0) {
                      foreach (select_tb($SqlSelectComn) as $rowcomn) {
                      ?>
                        <div class="card col m-0 mb-2 p-2">
                          <div class="fs-6">
                            <?php echo $translations["dpost-com-from"]; ?> 
                            <b><a class="text-decoration-none text-black" href="mailto:<?php echo $rowcomn['cemail']; ?>"><?php echo $rowcomn['cname']; ?></a></b> 
                            <span class="label label-default"><?php echo day_format_month_us($rowcomn['ccreatedate']); ?></span> 
                          </div>
                          <div class="col-12 pt-2 pb-2 ">
                            <?php echo check_tags(htmlspecialchars_decode($rowcomn['ccomment'])); ?>
                          </div>
                        </div>
                    <?php
                      }
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php
        }

        ///// post others
        $SqlSelectA = " SELECT sj.*,pt.name_Type,p.PROVINCE_NAME,pc.name_category
                      FROM sb_job sj
                      INNER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                      INNER JOIN p_category pc ON (sj.jType = pc.id_category)
                      INNER JOIN p_province p  ON (sj.jProvince = p.PROVINCE_ID)
                      WHERE (
                              ( sj.mID = '" . $mID . "' )  AND
                              ( sj.jID != '" . $UrlId . "' ) AND
                              ( sj.jStatus = '1' )
                            )
                      ORDER BY sj.jDate_Create DESC
                      LIMIT 0,20;";
        if (select_num($SqlSelectA) > 0) {
        ?>
          <div class="row m-0">
            <div class="col-12 p-0" style="margin-top:20px;">
              <h2 class="mb-3 mt-3"><?php echo $translations["dpost-other-header"]; ?></h2>
              <div class="row m-0">
                <?php
                foreach (select_tb($SqlSelectA) as $row) {
                  $image_p1 = $LinkWeb . "images/system/no-image.jpeg";
                  if (!empty($row['jPic1'])) {
                    $image_p1 = $LinkWeb . "images/post/picture_job_1/" . $row['jPic1'];
                  }
                ?>
                  <div class="p-1 col">
                    <div class="card shadow-sm p-0">
                      <a href="<?php echo $LinkWeb; ?>post/<?php echo $row['jID']; ?>" class="row m-0 text-decoration-none text-black row-cols-2">
                        <div class="col-4 col-sm-3 p-0 lazyload" style="background-image: url('<?php echo $image_p1; ?>');background-size: cover;background-repeat: no-repeat;">
                          <div class="col-12 p-0">
                            <div class="position-relative">
                              <div class="position-absolute" style="top: 10px;left: 5px;">
                                <span class="text-white pt-1 pb-1 pe-2 ps-2 rounded" style="background: rgb(108 117 125 / 75%);">
                                  <?php echo $row['name_Type']; ?>
                                </span>
                              </div>
                            </div>
                            <!-- <img class="col-12 p-0 lazyload" data-src="<?php echo $image_p1; ?>" src="<?php echo $LinkWeb . "images/loading-screen.gif"; ?>" style="width:100%;height:auto;" alt="<?php echo $row['jTitle']; ?>" /> -->
                          </div>
                        </div>
                        <div class="col-8 col-sm-9 p-2 ps-3">
                          <div class="col-12">
                            <div class="text-row pt-2 pb-1 fs-4 text-truncate"><?php echo $row['jTitle']; ?></div>
                            <p class="text-secondary text-truncate m-0"><?php echo $row['jDetail']; ?></p>
                            <p class="m-0 float-left">
                              <span class="text-secondary-subtle bg-warning pt-1 pb-1 pe-2 ps-2 rounded" style="font-size: 11px;"><?php echo $row['PROVINCE_NAME']; ?></span>&nbsp;&nbsp;
                              <span class="text-secondary-subtle bg-warning pt-1 pb-1 pe-2 ps-2 rounded" style="font-size: 11px;"><?php echo $row['name_category']; ?></span>
                            </p>
                            <p class="m-0">
                              <span class="text-muted" style="font-size: 11px;"><i class="fa-regular fa-clock"></i> <?php echo day_format_month_thai($row['jDate_Create']); ?></span>
                            </p>
                            <div class="row row-cols-2 d-flex ">
                              <div class="col-4 align-items-end justify-content-start">
                                <p class="mt-2 m-0">
                                  <span style="font-size: 16px;"><i class="fa-regular fa-eye"></i> <?php echo number_format($row['jRead']); ?></span>
                                </p>
                              </div>
                              <div class="col-8 text-end d-flex align-items-end justify-content-end">
                                <div class="fs-4 pe-2 pe-sm-3 pt-10 pb-10 m-0 text-danger fw-bold">
                                  <?php
                                  $vaprice = floatval($row['jPrice']);
                                  if (!empty($vaprice) && $vaprice > 0) {
                                    echo $translations["price"] . " " . number_format($vaprice);
                                  } else {
                                    echo $translations["price-annouce"];
                                  }
                                  ?>
                                </div>
                              </div>
                            </div>


                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        <?php
        }
      } else {
        ?>
        <div class="text-center rounded border border-secondary-subtle text-black fs-4 pt-3 pb-3">
          <i class="fa fa-exclamation-triangle animate__animated animate__flash animate__infinite" aria-hidden="true"></i> <?php echo $translations["dpost-no-post"]; ?>
        </div>
    <?php
      }
    }


    /* ADS  */
    require('mv-ads.php');

    ?>

  </div>
</div>