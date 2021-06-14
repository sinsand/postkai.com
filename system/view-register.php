<?php
if (isset($_POST['btnlogin'])) {
  $SqlSelect = "SELECT
                FROM member
                WHERE ( mUsername = '' OR mEmail = '' OR mTelephone = '' )";
  if (select_num($SqlSelect)>0) {

  }else {
    $SqlInsert = "INSERT INTO member
                    (mUsername,mEmail,mTelephone,mPassword,mStatus,mDate)
                    VALUES('".$_POST['Username']."',
                        '".$_POST['email']."',
                        '".$_POST['telephone']."',
                        '".md5(md5($_POST['password']))."',
                        0,
                        now()); ";
    if (insert_tb($SqlInsert)==true) {
      echo fSuccess(1,"สมัครสมาชิกสำเร็จ ระบบทำการส่งอีเมล กรุณาเข้าอีเมลเพื่อคลิกยืนยันการใช้งาน",$LinkWeb."login",5);
  		//log_insert("เพิ่มประกาศใหม่ สำเร็จ",$_COOKIE[$CookieID]);
  	}else {
  		echo fError(1,"สมัครสมาชิกไม่สำเร็จ กรุณาตรวจสอบข้อมูล",'');
  		//log_insert("เพิ่มประกาศใหม่ ไม่สำเร็จ",$_COOKIE[$CookieID]);
  	}
  }
}
?>
<h2 class="main-head-cate t-search f-k">สมัครสมาชิก</h2>
<div class="row">
  <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
    <form class="form-horizontal" action="<?php echo $LinkPath;?>" method="post">
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
      <!--
      <div class="form-group">
        <label class="control-label col-sm-3" for="">ชื่อ:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="firstname" placeholder="ชื่อ" required autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="">นามสกุล:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="lastname" placeholder="นามสกุล" required autocomplete="off">
        </div>
      </div>-->
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
    </form>
  </div>
</div>
