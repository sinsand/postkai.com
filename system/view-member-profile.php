<?php

if (isset($_POST['btnUpdate'])) {
  // code...

}



  $SqlSelect = "SELECT *
                FROM member
                WHERE ( mID = '".base64url_decode($_COOKIE[$CookieID])."' )";
  foreach (select_tb($SqlSelect) as $row) {
    $m_id = $row['mID'];
    //$m_user = $row['mUsername'];
    $m_pass = $row['mPassword'];
    //$m_title = $row['mTitle'];
    $m_fname = $row['mName'];
    $m_middle = $row['mMname'];
    $m_lname = $row['mLname'];
    $m_address = $row['mAddress'];
    $m_postcode = $row['mPostalcode'];
    $m_telephone = $row['mTelephone'];
    $m_email = $row['mEmail	'];
    $m_status = $row['mStatus'];

    ?>
    <div class="row">
      <div class="col-xs-12">
        <form class="form-horizontal" action="<?php echo $LinkPath;?>" method="post">
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">อีเมล:</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="email" value="<?php echo $m_id;?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="password">รหัสผ่าน:</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="password" placeholder="รหัสผ่าน" required autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="password">ยืนยัน รหัสผ่าน:</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="confirm-password" placeholder="ยืนยัน รหัสผ่านอีกครั้ง" required autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">ชื่อจริง:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="fname" value="<?php echo $m_fname;?>" placeholder="ชื่อจริง" required autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">นามสกุล:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="lname" value="<?php echo $m_lname;?>" placeholder="นามสกุล" required autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">ที่อยู่:</label>
            <div class="col-sm-9">
              <textarea name="address" placeholder="ที่อยู่" class="form-control" rows="8">
                <?php echo $m_address;?>
              </textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">รหัสไปรษณีย์:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="postcode" value="<?php echo $m_postcode;?>" placeholder="รหัสไปรษณีย์" required autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">เบอร์ติดต่อ:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="phone" value="<?php echo $m_telephone;?>" placeholder="เบอร์ติดต่อ" required autocomplete="off">
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
