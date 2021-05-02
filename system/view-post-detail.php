<?php
  if ($_GET['confirm-edit']=="check" || $_GET['confirm-delete']=="check") {

    if ($_GET['confirm-edit']=="check") {
      ?>
      <h2 class="main-head-cate t-announce f-k">แก้ไขประกาศเลขที่ : <?php echo $UrlId;?></h2>
      <div class="col-xs-12 pt-10 pb-10">
        <form class="" action="<?php $LinkWeb;?>" method="post">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="ใส่รหัสสำหรับแก้ไขประกาศ">
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
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="">
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
                      <input type="text" class="form-control" name="tel" id="tel" placeholder="เบอร์โทรศัพท์" required="">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                  </div>
              </div>
          	</div>
          </div>
          <div class="row">
          	<div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
              <img src="<?php echo $LinkWeb;?>/plugins/phpcaptcha/captcha.php?rand=<?php echo rand();?>" id='captchaimg' class="col-xs-6 p-0">
              <p style="margin: 0px;">รูปไม่ชัดคลิก <a href='javascript: refreshCaptcha();'>รีโหลด</a> ใหม่</p>
          		<div class="form-group">
                  <div class="input-group">
                      <input type="text" class="form-control" name="captcha_code" id="captcha_code" placeholder="ใส่รหัสยืนยัน" required="">
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
              <?php
                if (!empty($row['jPic1']) || $row['jPic1']!="") {
                  ?><img src="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $row['jPic1'];?>" class="col-xs-12" alt="<?php echo $row['jTitle'];?>" /><?php
                }else {
                  ?><img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12" alt="" /><?php
                }
              ?>
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
                    <td class="wb"><?php echo $row['jDate_Create'];?></td>
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
            <h3 class="f-k">รายละเอียด</h3>
            <p><?php echo htmlspecialchars_decode($row['jDetail']);?></p>
          </div>
        </div>
        <?php
        $mID = $row['mID'];
      }

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
                      <div class="col-md-4 col-xs-3 p-0">
                        <!--<img src="http://placehold.it/500x300" class="col-xs-12" alt="">-->
                        <?php
                          if (!empty($row['jPic1']) || $row['jPic1']!="") {
                            ?><img src="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $row['jPic1'];?>" class="col-xs-12" alt="<?php echo $row['jTitle'];?>" /><?php
                          }else {
                            ?><img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12" alt="" /><?php
                          }
                        ?>
                      </div>
                      <div class="col-md-8 col-xs-9 p-0">
                        <h3 class="text-row pt-5 pb-5"><?php echo $row['jTitle'];?></h3>
                        <p class="text-desc-2 text-row"><?php echo $row['jDetail'];?></p>
                        <p class="m-0"><span class="label label-success t-type t-text-desc"><?php echo $row['name_Type'];?></span> | <span class="label label-warning t-province t-text-desc"><?php echo $row['jProvince'];?></span></p>
                        <p class="mt-2 m-0"><span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $row['jDate_Create'];?></span></p>
                        <p class="mt-2 m-0"><span><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $row['jRead'];?></span></p>
                        <h4 class="pt-10 pb-10 m-0 font-price"><?php echo $row['jPrice'];?></h4>
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
