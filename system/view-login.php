<h2 class="main-head-cate t-search f-k">เข้าสู่ระบบ</h2>
<?php
if (isset($_POST['btnlogin'])) {
  $SqlSelect = "SELECT mID
                FROM member
                WHERE ( mEmail = '".$_POST['email']."' AND mPassword = '".$_POST['password']."' ) ";
  if (select_num($SqlSelect)>0) {
    foreach (select_tb($SqlSelect) as $value) {
      setcookie($CookieID, base64url_encode($value['mID']), time()+3600,'/');
      echo fSuccess(5,"เข้าสู่ระบบสำเร็จ รอสักครู่...",$LinkWeb."member",2);
    }
  }else {
    fError(5,"เข้าสู่ระบบไม่สำเร็จ ข้อมูลไม่ถูกต้อง","");
  }
}
?>
<div class="row">
  <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
    <form class="form-horizontal" action="<?php echo $LinkPath;?>" method="post">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" placeholder="Enter email" required autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="password">Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password" placeholder="Enter password" required autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="email"></label>
        <div class="col-sm-10">
          <button type="submit" name="btnlogin" class="btn btn-success">เข้าสูระบบ</button> | <a href="<?php echo $LinkWeb;?>forgot">ลืมรหัสผ่าน</a>
        </div>
      </div>
    </form>
  </div>
</div>
