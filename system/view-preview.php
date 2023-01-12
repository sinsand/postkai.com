<?php

    $SqlSelect = "SELECT sj.*,pt.name_Type,p.PROVINCE_NAME,pc.name_category
                  FROM sb_job sj
                  LEFT OUTER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                  LEFT OUTER JOIN p_category pc ON (sj.jType = pc.id_category)
                  LEFT OUTER JOIN p_province p  ON (sj.jProvince = p.PROVINCE_ID)
                  WHERE (
                          sj.jID = '".$UrlId."'
                        )";
    if (select_num($SqlSelect)>0) {
      $SqlUpdate = "UPDATE sb_job SET jRead = jRead+1 WHERE ( jID = '".$UrlId."'  AND jStatus = '1') "; update_tb($SqlUpdate);
      $mID = "";
      foreach (select_tb($SqlSelect) as $row) {
        ?>
        <h2 class="head-main-cate-new  f-k">ประกาศเลขที่ : <?php echo $row['jID'];?></h2>
        <div class="col-xs-12">
          <h2 class="lh-15 f-k wb"><?php echo htmlspecialchars_decode($row['jTitle']);?></h2>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 pt-5">
                <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                  <?php
                    //chmod_r("C:/xampp/htdocs/postkai.com/images/system/");
                    /// pic1
                    //chmod_r("C:/xampp/htdocs/postkai.com/images/post/picture_job_1/");
                    if (!empty($row['jPic1']) || $row['jPic1']!="") {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/post/picture_job_1/".$row['jPic1']);
                      ?>
                        <a href="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $row['jPic1'];?>" data-med="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $row['jPic1'];?>" class="demo-gallery__img--main" data-size="<?php echo $width."x".$height;?>" data-med-size="<?php echo $width."x".$height;?>"  data-author="รูปที่ 1">
                          <img src="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $row['jPic1'];?>" class="col-xs-12 p-0 pb-2" alt="<?php echo $row['jTitle'];?>" style="width:100%;height:100%;" />
                          <figure  style="display:none;" class="text-center">รูปที่ 1</figure>
                        </a>
                      <?php
                    }else {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/system/no-image.jpeg");
                      ?>
                        <a href="<?php echo $LinkWeb;?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="demo-gallery__img--main"  data-size="<?php echo $width."x".$height;?>" data-med-size="<?php echo $width."x".$height;?>" data-author="รูปที่ 1">
                          <img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12 p-0 pb-2" alt="" />
                          <figure  style="display:none;" class="text-center">ไม่มีข้อมูลรูป</figure>
                        </a>
                      <?php
                    }
                    /// pic2
                    //chmod_r("C:/xampp/htdocs/postkai.com/images/post/picture_job_2/");
                    if (!empty($row['jPic2']) || $row['jPic2']!="") {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/post/picture_job_2/".$row['jPic2']);
                      ?>
                        <a href="<?php echo $LinkWeb;?>images/post/picture_job_2/<?php echo $row['jPic2'];?>" data-med="<?php echo $LinkWeb;?>images/post/picture_job_2/<?php echo $row['jPic2'];?>"  data-size="<?php echo $width."x".$height;?>" data-med-size="<?php echo $width."x".$height;?>" data-author="รูปที่ 2" class="col-xs-6 col-sm-3 p-0 pb-2" >
                          <img src="<?php echo $LinkWeb;?>images/post/picture_job_2/<?php echo $row['jPic2'];?>" class="col-xs-12 p-0" alt="<?php echo $row['jTitle'];?>" style="width:100%;height:100%;"  />
                          <figure  style="display:none;" class="text-center">รูปที่ 2</figure>
                        </a>
                      <?php
                    }else {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/system/no-image.jpeg");
                      ?>
                        <a href="<?php echo $LinkWeb;?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-6 col-sm-3 p-0 pb-2" data-size="<?php echo $width."x".$height;?>"  data-med-size="<?php echo $width."x".$height;?>" data-author="รูปที่ 2">
                          <img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12 p-0" alt="" />
                          <figure  style="display:none;" class="text-center">ไม่มีข้อมูลรูป</figure>
                        </a>
                      <?php
                    }
                    /// pic3
                    //chmod_r("C:/xampp/htdocs/postkai.com/images/post/picture_job_3/");
                    if (!empty($row['jPic3']) || $row['jPic3']!="") {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/post/picture_job_3/".$row['jPic3']);
                      ?>
                        <a href="<?php echo $LinkWeb;?>images/post/picture_job_3/<?php echo $row['jPic3'];?>" data-med="<?php echo $LinkWeb;?>images/post/picture_job_3/<?php echo $row['jPic3'];?>" data-size="<?php echo $width."x".$height;?>" data-med-size="<?php echo $width."x".$height;?>"  data-author="รูปที่ 3" class="col-xs-6 col-sm-3 p-0 pb-2" >
                          <img src="<?php echo $LinkWeb;?>images/post/picture_job_3/<?php echo $row['jPic3'];?>" alt="<?php echo $row['jTitle'];?>" style="width:100%;height:100%;"  />
                          <figure  style="display:none;" class="text-center">รูปที่ 3</figure>
                        </a>
                      <?php
                    }else {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/system/no-image.jpeg");
                      ?>
                        <a href="<?php echo $LinkWeb;?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-6 col-sm-3 p-0 pb-2" data-size="<?php echo $width."x".$height;?>"  data-med-size="<?php echo $width."x".$height;?>" data-author="รูปที่ 3">
                          <img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12 p-0" alt="" />
                          <figure  style="display:none;" class="text-center">ไม่มีข้อมูลรูป</figure>
                        </a>
                      <?php
                    }
                    /// pic4
                    //chmod_r("C:/xampp/htdocs/postkai.com/images/post/picture_job_4/");
                    if (!empty($row['jPic4']) || $row['jPic4']!="") {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/post/picture_job_4/".$row['jPic4']);
                      ?>
                        <a href="<?php echo $LinkWeb;?>images/post/picture_job_4/<?php echo $row['jPic4'];?>" data-med="<?php echo $LinkWeb;?>images/post/picture_job_4/<?php echo $row['jPic4'];?>" class="col-xs-6 col-sm-3 p-0 pb-2"  data-med-size="<?php echo $width."x".$height;?>" data-size="<?php echo $width."x".$height;?>" data-author="รูปที่ 4">
                          <img src="<?php echo $LinkWeb;?>images/post/picture_job_4/<?php echo $row['jPic4'];?>" class="col-xs-12 p-0" alt="<?php echo $row['jTitle'];?>" style="width:100%;height:100%;"  />
                          <figure  style="display:none;" class="text-center">รูปที่ 4</figure>
                        </a>
                      <?php
                    }else {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/system/no-image.jpeg");
                      ?>
                      <a href="<?php echo $LinkWeb;?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-6 col-sm-3 p-0 pb-2"  data-size="<?php echo $width."x".$height;?>" data-med-size="<?php echo $width."x".$height;?>" data-author="รูปที่ 4">
                          <img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12 p-0" alt="" />
                          <figure  style="display:none;" class="text-center">ไม่มีข้อมูลรูป</figure>
                        </a>
                      <?php
                    }
                    /// pic5
                    //chmod_r("C:/xampp/htdocs/postkai.com/images/post/picture_job_5/");
                    if (!empty($row['jPic5']) || $row['jPic5']!="") {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/post/picture_job_5/".$row['jPic5']);
                      ?>
                        <a href="<?php echo $LinkWeb;?>images/post/picture_job_5/<?php echo $row['jPic5'];?>" data-med="<?php echo $LinkWeb;?>images/post/picture_job_5/<?php echo $row['jPic5'];?>" class="col-xs-6 col-sm-3 p-0 pb-2" data-med-size="<?php echo $width."x".$height;?>"  data-size="<?php echo $width."x".$height;?>" data-author="รูปที่ 5">
                          <img src="<?php echo $LinkWeb;?>images/post/picture_job_5/<?php echo $row['jPic5'];?>" class="col-xs-12 p-0" alt="<?php echo $row['jTitle'];?>" style="width:100%;height:100%;"  />
                          <figure  style="display:none;" class="text-center">รูปที่ 5</figure>
                        </a>
                      <?php
                    }else {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/system/no-image.jpeg");
                      ?>
                      <a href="<?php echo $LinkWeb;?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-6 col-sm-3 p-0 pb-2"  data-size="<?php echo $width."x".$height;?>" data-med-size="<?php echo $width."x".$height;?>" data-author="รูปที่ 5">
                          <img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12 p-0" alt="" />
                          <figure  style="display:none;" class="text-center">ไม่มีข้อมูลรูป</figure>
                        </a>
                      <?php
                    }
                  ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 pt-5">
              <div class="row m-0 p-0" style="background:#f7f7f7;">
                <table class="table fs-11">
                  <tr class="fs-15">
                    <th style="width:40%">ประเภท</th>
                    <td class="wb"><?php echo $row['name_Type'];?></td>
                  </tr>
                  <tr class="fs-15">
                    <th>ราคา</th>
                    <td class="wb" style="color:#f00;">
    					         <?php
                        $vaprice = floatval($row['jPrice']);
          			  			if(!empty($vaprice) && $vaprice>0) {
            							echo number_format($vaprice);
            						}else{
            							echo "ไม่ระบุราคา";
            						}
			  		           ?>
        					  </td>
                  </tr>
                  <tr>
                    <th>จังหวัด</th>
                    <td class="wb"><?php echo $row['PROVINCE_NAME'];?></td>
                  </tr>
                  <tr>
                    <th>เลขที่ประกาศ</th>
                    <td><?php echo $row['jID'];?></td>
                  </tr>
                  <tr>
                    <th>เข้าชม</th>
                    <td><?php echo number_format($row['jRead']);?> ครั้ง</td>
                  </tr>
                  <tr>
                    <th>แก้ไข</th>
                    <td><i class="fa fa-cog" aria-hidden="true"></i> <a href="<?php echo $LinkWeb.$UrlPage."/".$UrlId;?>/?confirm-edit=check">แก้ไขประกาศ</a></td>
                  </tr>
                  <tr>
                    <th>แจ้งลบ</th>
                    <td><i class="fa fa-trash" aria-hidden="true"></i> <a href="<?php echo $LinkWeb.$UrlPage."/".$UrlId;?>/?confirm-delete=check">แจ้งลบประกาศ</a></td>
                  </tr>
                  <tr>
                    <th>วันที่ประกาศ</th>
                    <td class="wb"><?php echo day_format_month_thai($row['jDate_Create']);?></td>
                  </tr>
                  <tr>
                    <th>ผู้ลงประกาศ</th>
                    <td class="wb"><?php echo $row['jc_Name'];?></td>
                  </tr>
                  <tr>
                    <th>ที่อยู่</th>
                    <td class="wb"><?php echo $row['jc_Address'];?></td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td class="wb"><?php echo $row['jc_Email'];?></td>
                  </tr>
                  <tr>
                    <th>เบอร์ติดต่อ</th>
                    <td class="wb">
                      <div class="post_click_tel_hide" style="cursor: pointer;color:#004dff;">กดดูข้อมูล</div>
                      <div class="post_click_tel_show" style="display:none;"><?php echo $row['jc_Telephone'];?></div>
                    </td>
                  </tr>
                </table>



              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 p-0">
              <h3 class="main-head-cate t-announce f-k">รายละเอียด</h3>
              <div class="row m-0 wb">
      				  <div class="col-xs-12 " style="font-family: 'Anuphan', sans-serif;background: #f7f7f7;padding: 20px;">
      				      <?php echo check_tags(htmlspecialchars_decode($row['jDesc']));?>
                </div>
      			  </div>
            </div>
          </div>
        </div>
        <?php
        $mID = $row['mID'];
        ////// view comment
          ?>
            <div class="row">
              <div class="col-xs-12 pt-10 pr-0">
                <h2 class="main-sub-cate-show t-others f-k">Comment</h2>
                <div class="row row-sub mr-0">
                  <div class="col-xs-12">
                  <?php
                      if ($row['jComment']=='1') {
                        ?>
                        <div class="row mb-10">
                          <form class="" action="<?php echo $LinkPath;?>" method="post">
                            <div class="col-sm-12 pr-0 pl-0">
                              <textarea class="form-control summernote-comment" name="ncomment" required></textarea>
                            </div>
                            <div class="form-group col-xs-12 pr-0 pl-0">
                              <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">ชื่อ - นามสกุล</label>
                              <div class="col-sm-9 pr-0 pl-0">
                                <input type="text" class="form-control" name="nname" value="" placeholder="กรอกชื่อ และ นามสกุล" required autocomplete="off">
                              </div>
                            </div>
                            <div class="form-group col-xs-12 pr-0 pl-0">
                              <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">Email</label>
                              <div class="col-sm-9 pr-0 pl-0">
                                <input type="text" class="form-control" name="nemail" value="" required placeholder="email สำหรับติดต่อ" autocomplete="off">
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
                              <div class="col-sm-9 pr-0 pl-0 text-right">
                                <button type="submit" name="btnPostComment" class="btn btn-success">บันทึก Comment</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <?php
                      }

                      ////old
                      $SqlSelectCom = "SELECT *
                                       FROM p_comment
                                       WHERE ( jID = '".$UrlId."' )
                                       ORDER BY cid_comment DESC ";
                      if (select_num($SqlSelectCom)>0) {
                        foreach (select_tb($SqlSelectCom) as $rowcom) {
                          ?>
                          <div class="box-comment row m-0 mb-10">
                            <h4 class="lh-15">Comment จากคุณ <b><a href="mailto:<?php echo $rowcom['c_email'];?>"><?php echo $rowcom['c_name'];?></a></b> <span class="label label-default"><?php echo $rowcom['c_create_date'];?></span> </h4>
                            <div class="col-xs-12 pt-5 pb-5 box-show-left wb">
                              <?php echo check_tags(htmlspecialchars_decode($rowcom['c_detail']));?>
                            </div>
                          </div>
                          <?php
                        }
                      }
                      ////new
                      $SqlSelectComn = "SELECT *
                                       FROM n_comment
                                       WHERE ( jID = '".$UrlId."' )
                                       ORDER BY ccreatedate DESC ";
                      if (select_num($SqlSelectComn)>0) {
                        foreach (select_tb($SqlSelectComn) as $rowcomn) {
                          ?>
                          <div class="box-comment row m-0 mb-10">
                            <h4 class="lh-15">Comment จากคุณ <b><a href="mailto:<?php echo $rowcomn['cemail'];?>"><?php echo $rowcomn['cname'];?></a></b> <span class="label label-default"><?php echo $rowcomn['ccreatedate'];?></span> </h4>
                            <div class="col-xs-12 pt-5 pb-5 box-show-left wb">
                              <?php echo check_tags(htmlspecialchars_decode($rowcomn['ccomment']));?>
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
          <?php
      }
    }else {
      ?><div class="text-center f-k" style="margin:10% 0;font-size:2em;border:1px solid #e1e1e1;border-radius:5px;color: #888888;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ขออภัย!<br>ประกาศนี้ไม่มี หรือ ยกเลิกประกาศแล้ว</div><?php
    }

?>
