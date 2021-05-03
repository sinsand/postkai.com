<?php
  if ($_GET['confirm-edit']=="check" || $_GET['confirm-delete']=="check") {

    if ($_GET['confirm-edit']=="check") {
      ?>
      <h2 class="main-head-cate t-announce f-k">แก้ไขประกาศเลขที่ : <?php echo $UrlId;?></h2>
      <div class="col-xs-12 pt-10 pb-10">
        <form class="" action="<?php $LinkWeb;?>" method="post">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="ใส่รหัสสำหรับแก้ไขประกาศ" required>
            <div class="input-group-btn">
              <button class="btn btn-success" type="submit">
                ยืนยัน
              </button>
            </div>
          </div>
        </form>
      </div>
      <?php
    }else if ($_GET['confirm-delete']=="check") {
      ?>
      <h2 class="main-head-cate t-announce f-k">ลบประกาศเลขที่ : <?php echo $UrlId;?></h2>
      <div class="col-xs-12 pt-10 pb-10">
        <form action="<?php echo $LinkWeb;?>" method="post">
          <div class="row">
          	<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
          		<label for="InputReason">เหตุผล</label>
          	</div>
          	<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
          		<div class="form-group">
              	<div class="radio">
                    <label><input type="radio" name="reason_id" value="1">สแปม ประกาศซ้ำ</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="reason_id" value="2">สินค้าต้องห้าม / ผิดกฏหมาย</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="reason_id" value="3">มิจฉาชีพ หลอกลวง</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="reason_id" value="4">เหตุผลอื่น ๆ</label>
                </div>
              </div>
          	</div>
          </div>
          <div class="row">
          	<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
          		<label for="InputEmail">Email</label>
          	</div>
          	<div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
          		<div class="form-group">
                  <div class="input-group">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                  </div>
              </div>
          	</div>
          </div>
          <div class="row">
          	<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
          		<label for="InputTel">เบอร์โทรศัพท์</label>
          	</div>
          	<div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
          		<div class="form-group">
                  <div class="input-group">
                      <input type="text" class="form-control" name="tel" id="tel" placeholder="เบอร์โทรศัพท์" required>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                  </div>
              </div>
          	</div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
          		<label for="InputTel"></label>
          	</div>
            <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
              <img src="<?php echo $LinkWeb;?>/plugins/phpcaptcha/captcha.php?rand=<?php echo rand();?>" id='captchaimg' class="col-xs-6 p-0">
              <p style="margin: 0px;">รูปไม่ชัดคลิก <a href='javascript: refreshCaptcha();'>รีโหลด</a> ใหม่</p>
          		<div class="form-group">
                  <div class="input-group">
                      <input type="text" class="form-control" name="captcha_code" id="captcha_code" placeholder="ใส่รหัสยืนยัน" required>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                  </div>
              </div>
          	</div>
          </div>
          <div class="row">
          	<div class="col-sm-2 col-md-2 col-lg-2 hidden-xs"></div>
          	<div class="col-sm-9 col-md-9 col-lg-9 hidden-xs">
                  <input type="submit" name="submit" id="submit" value="แจ้งลบประกาศ" class="btn btn-success">
              </div>
          	<div class="col-xs-12 visible-xs">
                  <input type="submit" name="submit" id="submit" value="แจ้งลบประกาศ" class="btn btn-success btn-block">
              </div>
          </div>
        </form>
      </div>
      <?php
    }

  }else {
    $SqlUpdate = "UPDATE sb_job SET jRead = jRead+1 WHERE ( jID = '".$UrlId."'  AND jStatus = '1') "; update_tb($SqlUpdate);
    $SqlSelect = "SELECT sj.*,pt.name_Type
                  FROM sb_job sj
                  INNER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                  WHERE (
                          sj.jID = '".$UrlId."'  AND
                          sj.jStatus = '1'
                        )";
    if (select_num($SqlSelect)>0) {
      $mID = "";
      foreach (select_tb($SqlSelect) as $row) {
        ?>
        <h2 class="main-head-cate t-announce f-k">ประกาศเลขที่ : <?php echo $row['jID'];?></h2>
        <div class="col-xs-12">
          <h2 class="lh-15 f-k"><?php echo htmlspecialchars_decode($row['jTitle']);?></h2>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 pt-5">
                <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                  <?php
                    /// pic1
                    if (!empty($row['jPic1']) || $row['jPic1']!="") {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/post/picture_job_1/".$row['jPic1']);
                      ?>
                        <a href="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $row['jPic1'];?>" class="demo-gallery__img--main" data-size="<?php echo $width."x".$height;?>">
                          <img src="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $row['jPic1'];?>" class="col-xs-12 p-0 pb-2" alt="<?php echo $row['jTitle'];?>" />
                        </a>
                      <?php
                    }else {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/system/no-image.jpeg");
                      ?>
                        <a href="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="demo-gallery__img--main"  data-size="<?php echo $width."x".$height;?>">
                          <img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12 p-0 pb-2" alt="" />
                        </a>
                      <?php
                    }
                    /// pic2
                    if (!empty($row['jPic2']) || $row['jPic2']!="") {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/post/picture_job_2/".$row['jPic2']);
                      ?>
                        <a href="<?php echo $LinkWeb;?>images/post/picture_job_2/<?php echo $row['jPic2'];?>" data-med="<?php echo $LinkWeb;?>images/post/picture_job_2/<?php echo $row['jPic2'];?>"  data-size="<?php echo $width."x".$height;?>" class="col-xs-6 col-sm-3 p-0 pb-2" >
                          <img src="<?php echo $LinkWeb;?>images/post/picture_job_2/<?php echo $row['jPic2'];?>" class="col-xs-12 p-0" alt="<?php echo $row['jTitle'];?>" />
                        </a>
                      <?php
                    }else {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/system/no-image.jpeg");
                      ?>
                        <a href="<?php echo $LinkWeb;?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-6 col-sm-3 p-0 pb-2" data-size="<?php echo $width."x".$height;?>" >
                          <img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12 p-0" alt="" />
                        </a>
                      <?php
                    }
                    /// pic3
                    if (!empty($row['jPic3']) || $row['jPic3']!="") {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/post/picture_job_3/".$row['jPic3']);
                      ?>
                        <a href="<?php echo $LinkWeb;?>images/post/picture_job_3/<?php echo $row['jPic3'];?>" data-med="<?php echo $LinkWeb;?>images/post/picture_job_3/<?php echo $row['jPic3'];?>" data-size="<?php echo $width."x".$height;?>" class="col-xs-6 col-sm-3 p-0 pb-2" >
                          <img src="<?php echo $LinkWeb;?>images/post/picture_job_3/<?php echo $row['jPic3'];?>" alt="<?php echo $row['jTitle'];?>" />
                        </a>
                      <?php
                    }else {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/system/no-image.jpeg");
                      ?>
                        <a href="<?php echo $LinkWeb;?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-6 col-sm-3 p-0 pb-2" data-size="<?php echo $width."x".$height;?>" >
                          <img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12 p-0" alt="" />
                        </a>
                      <?php
                    }
                    /// pic4
                    if (!empty($row['jPic4']) || $row['jPic4']!="") {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/post/picture_job_4/".$row['jPic4']);
                      ?>
                        <a href="<?php echo $LinkWeb;?>images/post/picture_job_4/<?php echo $row['jPic4'];?>" data-med="<?php echo $LinkWeb;?>images/post/picture_job_4/<?php echo $row['jPic4'];?>" class="col-xs-6 col-sm-3 p-0 pb-2"  data-size="<?php echo $width."x".$height;?>">
                          <img src="<?php echo $LinkWeb;?>images/post/picture_job_4/<?php echo $row['jPic4'];?>" class="col-xs-12 p-0" alt="<?php echo $row['jTitle'];?>" />
                        </a>
                      <?php
                    }else {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/system/no-image.jpeg");
                      ?>
                      <a href="<?php echo $LinkWeb;?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-6 col-sm-3 p-0 pb-2"  data-size="<?php echo $width."x".$height;?>">
                          <img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12 p-0" alt="" />
                        </a>
                      <?php
                    }
                    /// pic5
                    if (!empty($row['jPic5']) || $row['jPic5']!="") {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/post/picture_job_5/".$row['jPic5']);
                      ?>
                        <a href="<?php echo $LinkWeb;?>images/post/picture_job_5/<?php echo $row['jPic5'];?>" data-med="<?php echo $LinkWeb;?>images/post/picture_job_5/<?php echo $row['jPic5'];?>" class="col-xs-6 col-sm-3 p-0 pb-2"  data-size="<?php echo $width."x".$height;?>">
                          <img src="<?php echo $LinkWeb;?>images/post/picture_job_5/<?php echo $row['jPic5'];?>" class="col-xs-12 p-0" alt="<?php echo $row['jTitle'];?>" />
                        </a>
                      <?php
                    }else {
                      list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/system/no-image.jpeg");
                      ?>
                      <a href="<?php echo $LinkWeb;?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-6 col-sm-3 p-0 pb-2"  data-size="<?php echo $width."x".$height;?>">
                          <img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12 p-0" alt="" />
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
                    <td class="wb" style="color:#f00;"><?php echo $row['jPrice'];?></td>
                  </tr>
                  <tr>
                    <th>จังหวัด</th>
                    <td class="wb"><?php echo $row['jProvince'];?></td>
                  </tr>
                  <tr>
                    <th>เลขที่ประกาศ</th>
                    <td><?php echo $row['jID'];?></td>
                  </tr>
                  <tr>
                    <th>เข้าชม</th>
                    <td><?php echo $row['jRead'];?> ครั้ง</td>
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
          <div class="col-xs-12 p-0">
            <h3 class="main-head-cate t-announce f-k">รายละเอียด</h3>
            <div class="row m-0"><?php echo htmlspecialchars_decode($row['jDetail']);?></div>
          </div>
        </div>
        <?php
        $mID = $row['mID'];


        ////// view comment

          ?>
            <div class="col-xs-12 pt-10 pr-0">
              <h2 class="main-sub-cate-show t-others f-k">Comment</h2>
              <div class="row row-sub mr-0">
                <div class="col-xs-12">
                <?php
                    if ($row['jComment']=='1') {
                      ?>
                      <div class="row mb-10">
                        <form class="" action="<?php echo $LinkPath;?>" method="post" enctype="multipart/form-data">
                          <div class="col-sm-12 pr-0 pl-0">
                            <textarea class="form-control summernote-comment" name="post_comment" required></textarea>
                          </div>
                          <div class="form-group col-xs-12 pr-0 pl-0">
                            <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">ชื่อ - นามสกุล</label>
                            <div class="col-sm-9 pr-0 pl-0">
                              <input type="text" class="form-control" name="" placeholder="กรอกชื่อ และ นามสกุล" required autocomplete="off">
                            </div>
                          </div>
                          <div class="form-group col-xs-12 pr-0 pl-0">
                            <label class="control-label col-sm-3 text-ll pr-0 pl-0" for="">Email</label>
                            <div class="col-sm-9 pr-0 pl-0">
                              <input type="text" class="form-control" name="" required placeholder="email สำหรับติดต่อ" autocomplete="off">
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
                    $SqlSelectCom = "SELECT *
                                     FROM p_comment
                                     WHERE ( jID = '".$UrlId."' )
                                     ORDER BY cid_comment DESC ";
                    if (select_num($SqlSelectCom)>0) {
                      foreach (select_tb($SqlSelectCom) as $rowcom) {
                        ?>
                        <div class="box-comment row m-0 mb-10">
                          <h4 class="lh-15">จากคุณ <b><a href="mailto:<?php echo $rowcom['c_email'];?>"><?php echo $rowcom['c_name'];?></a></b> <span class="label label-default"><?php echo $rowcom['c_create_date'];?></span> </h4>
                          <div class="col-xs-12 pt-5 pb-5 box-show-left">
                            <?php echo htmlspecialchars_decode($rowcom['c_detail']);?>
                          </div>
                        </div>
                        <?php
                      }
                    }
                ?>
                </div>
              </div>
            </div>
          <?php



      }





      ///// post others
      $SqlSelect = "SELECT sj.*,pt.name_Type
                    FROM sb_job sj
                    INNER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                    WHERE (
                            ( sj.mID = '".$mID."' )  AND
                            ( sj.jID != '".$UrlId."' ) AND
                            ( sj.jStatus = '1' )
                          )
                    ORDER BY sj.jDate_Create DESC
                    LIMIT 0,20;";

      ?>
      <div class="col-xs-12 p-0" style="margin-top:20px;">
        <h2 class="main-head-cate f-k">ประกาศอื่นๆ ของสมาชิกท่านนี้</h2>
          <div class="col-xs-12">
          <?php
            if (select_num($SqlSelect)>0) {
                foreach (select_tb($SqlSelect) as $row) {
                  ?>
                    <a href="<?php echo $LinkWeb."post/".$row['jID'];?>" class="row click-post">
                      <div class="col-xs-3 p-0">
                        <!--<img src="http://placehold.it/500x300" class="col-xs-12" alt="">-->
                        <?php
                          if (!empty($row['jPic1']) || $row['jPic1']!="") {
                            ?><img src="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $row['jPic1'];?>" class="col-xs-12" alt="<?php echo $row['jTitle'];?>" /><?php
                          }else {
                            ?><img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12" alt="" /><?php
                          }
                        ?>
                      </div>
                      <div class="col-xs-9 p-0">
                        <h3 class="text-row pt-5 pb-5"><?php echo $row['jTitle'];?></h3>
                        <p class="text-desc-2 text-row"><?php echo $row['jDetail'];?></p>
                        <p class="m-0"><span class="label label-success t-type t-text-desc"><?php echo $row['name_Type'];?></span> | <span class="label label-warning t-province t-text-desc"><?php echo $row['jProvince'];?></span></p>
                        <p class="mt-2 m-0"><span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo day_format_month_thai($row['jDate_Create']);?></span></p>
                        <p class="mt-2 m-0"><span><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $row['jRead'];?></span></p>
                        <h4 class="pt-10 pb-10 m-0 font-price">ราคา <?php echo $row['jPrice'];?></h4>
                      </div>
                    </a>
                  <?php
                }
            }else {
              ?>
              <h4>ไม่มีข้อมูล - not found</h4>
              <?php
            }
          ?>
          </div>
     </div>
     <?php
    }
  }
?>
<div id="gallery" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="pswp__bg"></div>
  <div class="pswp__scroll-wrap">
    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>
    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <div class="pswp__counter"></div>
        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
        <button class="pswp__button pswp__button--share" title="Share"></button>
        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip">
        </div>
      </div>
      <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
      <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
      <div class="pswp__caption">
        <div class="pswp__caption__center">
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
(function() {

var initPhotoSwipeFromDOM = function(gallerySelector) {

  var parseThumbnailElements = function(el) {
      var thumbElements = el.childNodes,
          numNodes = thumbElements.length,
          items = [],
          el,
          childElements,
          thumbnailEl,
          size,
          item;

      for(var i = 0; i < numNodes; i++) {
          el = thumbElements[i];

          // include only element nodes
          if(el.nodeType !== 1) {
            continue;
          }

          childElements = el.children;

          size = el.getAttribute('data-size').split('x');

          // create slide object
          item = {
        src: el.getAttribute('href'),
        w: parseInt(size[0], 10),
        h: parseInt(size[1], 10),
        author: el.getAttribute('data-author')
          };

          item.el = el; // save link to element for getThumbBoundsFn

          if(childElements.length > 0) {
            item.msrc = childElements[0].getAttribute('src'); // thumbnail url
            if(childElements.length > 1) {
                item.title = childElements[1].innerHTML; // caption (contents of figure)
            }
          }


      var mediumSrc = el.getAttribute('data-med');
            if(mediumSrc) {
              size = el.getAttribute('data-med-size').split('x');
              // "medium-sized" image
              item.m = {
                  src: mediumSrc,
                  w: parseInt(size[0], 10),
                  h: parseInt(size[1], 10)
              };
            }
            // original image
            item.o = {
              src: item.src,
              w: item.w,
              h: item.h
            };

          items.push(item);
      }

      return items;
  };

  // find nearest parent element
  var closest = function closest(el, fn) {
      return el && ( fn(el) ? el : closest(el.parentNode, fn) );
  };

  var onThumbnailsClick = function(e) {
      e = e || window.event;
      e.preventDefault ? e.preventDefault() : e.returnValue = false;

      var eTarget = e.target || e.srcElement;

      var clickedListItem = closest(eTarget, function(el) {
          return el.tagName === 'A';
      });

      if(!clickedListItem) {
          return;
      }

      var clickedGallery = clickedListItem.parentNode;

      var childNodes = clickedListItem.parentNode.childNodes,
          numChildNodes = childNodes.length,
          nodeIndex = 0,
          index;

      for (var i = 0; i < numChildNodes; i++) {
          if(childNodes[i].nodeType !== 1) {
              continue;
          }

          if(childNodes[i] === clickedListItem) {
              index = nodeIndex;
              break;
          }
          nodeIndex++;
      }

      if(index >= 0) {
          openPhotoSwipe( index, clickedGallery );
      }
      return false;
  };

  var photoswipeParseHash = function() {
    var hash = window.location.hash.substring(1),
      params = {};

      if(hash.length < 5) { // pid=1
          return params;
      }

      var vars = hash.split('&');
      for (var i = 0; i < vars.length; i++) {
          if(!vars[i]) {
              continue;
          }
          var pair = vars[i].split('=');
          if(pair.length < 2) {
              continue;
          }
          params[pair[0]] = pair[1];
      }

      if(params.gid) {
        params.gid = parseInt(params.gid, 10);
      }

      return params;
  };

  var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
      var pswpElement = document.querySelectorAll('.pswp')[0],
          gallery,
          options,
          items;

    items = parseThumbnailElements(galleryElement);

      // define options (if needed)
      options = {

          galleryUID: galleryElement.getAttribute('data-pswp-uid'),

          getThumbBoundsFn: function(index) {
              // See Options->getThumbBoundsFn section of docs for more info
              var thumbnail = items[index].el.children[0],
                  pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                  rect = thumbnail.getBoundingClientRect();

              return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
          },

          addCaptionHTMLFn: function(item, captionEl, isFake) {
        if(!item.title) {
          captionEl.children[0].innerText = '';
          return false;
        }
        captionEl.children[0].innerHTML = item.title +  '<br/><small>Photo: ' + item.author + '</small>';
        return true;
          }

      };


      if(fromURL) {
        if(options.galleryPIDs) {
          // parse real index when custom PIDs are used
          // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
          for(var j = 0; j < items.length; j++) {
            if(items[j].pid == index) {
              options.index = j;
              break;
            }
          }
        } else {
          options.index = parseInt(index, 10) - 1;
        }
      } else {
        options.index = parseInt(index, 10);
      }

      // exit if index not found
      if( isNaN(options.index) ) {
        return;
      }



    var radios = document.getElementsByName('gallery-style');
    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            if(radios[i].id == 'radio-all-controls') {

            } else if(radios[i].id == 'radio-minimal-black') {
              options.mainClass = 'pswp--minimal--dark';
              options.barsSize = {top:0,bottom:0};
          options.captionEl = false;
          options.fullscreenEl = false;
          options.shareEl = false;
          options.bgOpacity = 0.85;
          options.tapToClose = true;
          options.tapToToggleControls = false;
            }
            break;
        }
    }

      if(disableAnimation) {
          options.showAnimationDuration = 0;
      }

      // Pass data to PhotoSwipe and initialize it
      gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);

      // see: http://photoswipe.com/documentation/responsive-images.html
    var realViewportWidth,
        useLargeImages = false,
        firstResize = true,
        imageSrcWillChange;

    gallery.listen('beforeResize', function() {

      var dpiRatio = window.devicePixelRatio ? window.devicePixelRatio : 1;
      dpiRatio = Math.min(dpiRatio, 2.5);
        realViewportWidth = gallery.viewportSize.x * dpiRatio;


        if(realViewportWidth >= 1200 || (!gallery.likelyTouchDevice && realViewportWidth > 800) || screen.width > 1200 ) {
          if(!useLargeImages) {
            useLargeImages = true;
              imageSrcWillChange = true;
          }

        } else {
          if(useLargeImages) {
            useLargeImages = false;
              imageSrcWillChange = true;
          }
        }

        if(imageSrcWillChange && !firstResize) {
            gallery.invalidateCurrItems();
        }

        if(firstResize) {
            firstResize = false;
        }

        imageSrcWillChange = false;

    });

    gallery.listen('gettingData', function(index, item) {
        if( useLargeImages ) {
            item.src = item.o.src;
            item.w = item.o.w;
            item.h = item.o.h;
        } else {
            item.src = item.m.src;
            item.w = item.m.w;
            item.h = item.m.h;
        }
    });

      gallery.init();
  };

  // select all gallery elements
  var galleryElements = document.querySelectorAll( gallerySelector );
  for(var i = 0, l = galleryElements.length; i < l; i++) {
    galleryElements[i].setAttribute('data-pswp-uid', i+1);
    galleryElements[i].onclick = onThumbnailsClick;
  }

  // Parse URL and open gallery if it contains #&pid=3&gid=1
  var hashData = photoswipeParseHash();
  if(hashData.pid && hashData.gid) {
    openPhotoSwipe( hashData.pid,  galleryElements[ hashData.gid - 1 ], true, true );
  }
};

initPhotoSwipeFromDOM('.demo-gallery');

})();

</script>
