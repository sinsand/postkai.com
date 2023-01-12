<h2 class="main-head-cate t-search f-k">สมัครสมาชิก</h2>
<div class="row">
  <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">

    <form class="form-horizontal" method="post" onSubmit="return false;" enctype="multipart/form-data">

      <div class="form-group">
        <label class="control-label col-sm-3" for="pFullname">ชื่อ-นามสกุล:</label>
        <div class="col-sm-9">
          <input type="text" id="pFullname" class="form-control" name="pFullname" placeholder="กรอก ชื่อ-นามสกุล" required autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="pPhoneNumber">เบอร์มือถือ:</label>
        <div class="col-sm-9">
          <div class="col-xs-4" style="padding:0px;">
            <select class="form-control" name="pCodeNumber" id="pCodeNumber">
              <option value="">เลือกประเทศ</option>
              <?php
                $SqlSelect = "SELECT * FROM countries ORDER BY country_name ASC";
                if (select_num($SqlSelect)>0) {
                  foreach (select_tb($SqlSelect) as $kalue) {
                    ?><option <?php echo  $kalue['phone_code']=='66'?"selected":"";?> code="<?php echo $kalue['phone_code'];?>" value="<?php echo $kalue['countriesid'];?>"><?php echo "(+".$kalue['phone_code'].") ".$kalue['country_name'];?></option><?php
                  }
                }
              ?>
            </select>
          </div>
          <div class="col-xs-8" style="padding-right:0px;">
            <input type="text" id="pPhoneNumber" class="form-control" name="pPhoneNumber" placeholder="กรอกเบอร์มือถือ 08xxxxxxxx" required autocomplete="off">
          </div>
          <span class="help-block">สำหรับใช้เข้าสู่ระบบ และรับ OTP</span>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="pPassword">รหัสผ่าน:</label>
        <div class="col-sm-9">
          <input type="password" id="pPassword" class="form-control" name="pPassword" placeholder="กรอกรหัสผ่าน" required autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3"></label>
        <div class="col-sm-9">
          <div id="recaptcha-container"></div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3"></label>
        <div class="col-sm-9">
          <button class="btn btn-primary" type="button" onclick="phoneAuth();">ส่ง OTP ยืนยัน</button>
          <span id="alertShowError"></span>
        </div>
      </div>

      <div class="modal" id="register-view-show"  role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">ยืนยัน Cloud OTP</h5>
            </div>
            <div class="modal-body">

                <div class="form-group">
                  <label class="control-label col-sm-3" for="email">รหัสยืนยัน:</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" id="verificationCode" placeholder="Enter verification code" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3"></label>
                  <div class="col-sm-9">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <button class="btn btn-primary" style="width:100%;" type="button" onclick="codeverify();">ยืนยันรหัส OTP</button>
                  </div>
                  <div class="col-sm-12">
                    <span id="alertShowcompleted"></span>
                  </div>
                </div>

            </div>
          </div>
        </div>
      </div>
    </form>




    <!--<form class="form-horizontal" action="<?php echo $LinkPath;?>" method="post">
      <div class="form-group">
        <label class="control-label col-sm-3" for="email">Username:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="Username" placeholder="Enter Username" required autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="email">Email:</label>
        <div class="col-sm-9">
          <input type="email" class="form-control" name="email" placeholder="Enter email" required autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="password">Password:</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" name="password" placeholder="Enter password" required autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="password">Re-Password:</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" name="repassword" placeholder="Enter password" required autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="">เบอร์ติดต่อ:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="telephone" placeholder="เบอร์ติดต่อ ตัวเลขเท่านั้น" required autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-9">
          <input type="checkbox" name="re_check_policy" value="1" required id="re_check_policy"> <label style="display: initial;" for="re_check_policy">ยอมรับ <a href="<?php echo $LinkWeb;?>policy" target="_blank">นโยบายการให้บริการ</a> และ <a href="<?php echo $LinkWeb;?>term-and-condition" target="_blank">กฏ กติกา ระเบียบข้อบังคับ</a> ของ postkai</label>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-9">
          <button type="submit" name="btnlogin" class="btn btn-success">สมัครสมาชิก</button> | <a href="<?php echo $LinkWeb;?>login">เข้าสูระบบ</a>
        </div>
      </div>
    </form>-->
  </div>
</div>
