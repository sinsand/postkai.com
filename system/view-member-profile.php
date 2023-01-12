<?php

if (isset($_POST['btnUpdate'])) {
  if ($_POST['npasswordnew'] == $_POST['nconfirmpasswordnew']) {
    $SqlSelect = "SELECT mpass FROM n_member WHERE ( uid = '".base64url_decode($_COOKIE['uid'])."' )";
    foreach (select_tb($SqlSelect) as $value) {
      if ($_POST['npassword']) {
        $SqlUpdate = "UPDATE n_member
                          SET npassword = '".md5(md5($_POST['npasswordnew']."==1"))."',
                              mfullname = '".$_POST['mfullname']."'
                      WHERE ( uid = '".base64url_decode($_COOKIE['uid'])."' )";
        if (update_tb($SqlUpdate)==true) {
          echo  fSuccess(1,"บันทึกรหัสผ่านใหม่สำเร็จ",$LinkPath,2);
        }else {
          echo fError(1,"ไม่สามารถบันทึก รหัสผ่านใหม่ได้","");
        }
      }
    }
  }else {
    echo fError(1,"รหัสผ่านไม่ตรงกัน กรุณากรอกใหม่","");
  }
}



  $SqlSelect = "SELECT *
                FROM n_member
                WHERE ( mid = '".base64url_decode($_COOKIE['mid'])."' )";
  foreach (select_tb($SqlSelect) as $row) {
    ?>
    <div class="row">
      <div class="col-xs-12">
        <form class="form-horizontal" action="<?php echo $LinkPath;?>" method="post">
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">ชื่อ-นามสกุล:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="mfullname" value="<?php echo $row['mfullname'];?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">เบอร์มือถือ:</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" name="nphone" value="<?php echo $row['mphone'];?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="password">รหัสผ่านเก่า:</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" name="npassword" placeholder="รหัสผ่านเก่า" required autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="password">รหัสผ่านใหม่:</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" name="npasswordnew" placeholder="รหัสผ่านใหม่" required autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="password">ยืนยัน รหัสผ่านใหม่:</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" name="nconfirmpasswordnew" placeholder="ยืนยัน รหัสผ่านใหม่อีกครั้ง" required autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12 text-right">
              <button type="submit" name="btnUpdate" class="btn btn-success">บันทึกข้อมูล</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php
  }
?>
