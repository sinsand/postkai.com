<?php
if (isset($_POST['update_profile'])) {
  if ($_POST['a_password']==$_POST['a_repassword']) {
    $SqlUpdateLogin = "UPDATE chon_login
                        SET password_encode = '".md5($_POST['a_password'])."'
                       WHERE ( lid = '".base64url_decode($_COOKIE[$CookieID])."' ) ";

    $SqlUpdate = "UPDATE chon_admin
                    SET a_fname = '".$_POST['a_fname']."',
                        a_nickname = '".$_POST['a_nickname']."',
                        a_lname = '".$_POST['a_lname']."',
                        a_position ='".$_POST['a_position']."',
                        a_email = '".$_POST['a_email']."',
                        a_phone = '".$_POST['a_phone']."'
                  WHERE ( a_id = '".base64url_decode($_COOKIE[$CookieAdminID])."' );";

    if (update_tb($SqlUpdate)==true && update_tb($SqlUpdateLogin)==true) {
      echo fSuccess(2,"เปลี่ยนแปลงข้อมูลส่วนตัวสำเร็จ",$LinkPath,2);
      log_insert("เปลี่ยนแปลงข้อมูลส่วนตัวสำเร็จ",$_COOKIE[$CookieID]);
    }else {
      echo fError(2,"เปลี่ยนแปลงข้อมูลส่วนตัวไม่สำเร็จ","","");
      log_insert("เปลี่ยนแปลงข้อมูลส่วนตัวไม่สำเร็จ",$_COOKIE[$CookieID]);
    }
  }else {
    echo fError(2,"เปลี่ยนแปลงข้อมูลส่วนตัวไม่สำเร็จ","รหัสผ่านไม่ถูกต้อง","");
    log_insert("พยายาม เปลี่ยนแปลงข้อมูลส่วนตัวไม่สำเร็จ รหัสผ่านไม่ถูกต้อง ",$_COOKIE[$CookieID]);
  }
}
?>
<div class="row">
  <div class="col-md-3">
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle"  src="<?php echo $LinkWebadmin;?>images/avatar.png" alt="User profile picture">
        </div>
        <?php
          $SqlSelect = "SELECT cl.*
                        FROM chon_admin cl
                        WHERE ( cl.a_id = '".base64url_decode($_COOKIE[$CookieAdminID])."' )";
          if (select_num($SqlSelect)>0) {
            foreach (select_tb($SqlSelect) as $row) {
              ?>
              <h3 class="profile-username text-center"><?php echo $row['a_fname']." ".$row['a_lname'];?></h3>
              <p class="text-muted text-center"><?php echo $row['a_position'];?></p>

              <strong><i class="fas fa-user mr-1"></i> Employee ID</strong>
              <p class="text-muted"><?php echo $row['admin_id'];?></p>

              <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
              <p class="text-muted"><?php echo $row['a_email'];?></p>

              <strong><i class="fas fa-mobile-alt mr-1"></i> Phone</strong>
              <p class="text-muted"><?php echo $row['a_phone'];?></p>
              <?php
            }
          }
        ?>

      </div>
    </div>
  </div>
  <div class="col-md-9">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#Activity" data-toggle="tab">Activity</a></li>
          <li class="nav-item"><a class="nav-link" href="#Settings" data-toggle="tab">Profile</a></li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">

          <div class="active tab-pane" id="Activity">
            <div class="timeline timeline-inverse">
              <?php
                $SqlLogin = "SELECT *
                             FROM chon_log
                             WHERE ( lid = '".base64url_decode($_SESSION[$SessionID])."' )
                             ORDER BY log_id DESC
                             LIMIT 100;";
                if (select_num($SqlLogin)>0) {
                  foreach (select_tb($SqlLogin) as $row) {

                    $new = substr($row['date_time_log'],0,10);
  									if($old==''){
  								 		?>
                        <div class="time-label">
                          <span class="bg-danger"><?php echo day_format_month($new);?></span>
                        </div>
                      <?php
  										$old = $new;
  									}else{
  										if($old==$new){

  										}else{
  											?>
                          <div class="time-label">
                            <span class="bg-danger"><?php echo day_format_month($new);?></span>
                          </div>
                        <?php
  											$i=1;
  										}
  										$old = $new;
  									}
                    ?>
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> <?php echo show_time($row['date_time_log']);?></span>
                          <h3 class="timeline-header" style="display:none;"><a href="#">Support Team</a> sent you an email</h3>
                          <div class="timeline-body"><?php echo $row['log_detail'];?></div>
                          <div class="timeline-footer" style="display:none;">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                    <?php

                  }
                }else {
                  ?>
                    <div class="time-label">
                      <span class="bg-danger"><?php echo date("d M Y");?></span>
                    </div>
                    <div>
                      <i class="fas fa-user bg-info"></i>
                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> <?php echo date("H:i:s");?></span>
                        <div class="timeline-body">No Data</div>
                      </div>
                    </div>
                  <?php
                }
              ?>
            </div>
          </div>

          <div class="tab-pane" id="Settings">
            <?php
              $SqlSelect = "SELECT cl.*,ca.*
                            FROM chon_login cl
                            INNER JOIN chon_admin ca ON (cl.link_id = ca.a_id AND cl.l_typeuser = '1')
                            WHERE ( ca.a_id = '".base64url_decode($_SESSION[$SessionAdminID])."' )";
              //echo $SqlSelect;
              if (select_num($SqlSelect)>0) {
                foreach (select_tb($SqlSelect) as $row) {
                  ?>
                    <form class="form-horizontal" autocomplete="off" method="post" action="<?php echo $LinkPath;?>" method="post">
                      <div class="form-group row">
                        <label for="e_firstname" class="col-sm-2 col-form-label">FirstName</label>
                        <div class="col-sm-10">
                          <input type="name" class="form-control" id="a_fname" name="a_fname" value="<?php echo $row['a_fname'];?>" placeholder="FirstName" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="e_lastname" class="col-sm-2 col-form-label">LastName</label>
                        <div class="col-sm-10">
                          <input type="name" class="form-control" id="a_lname" name="a_lname" value="<?php echo $row['a_lname'];?>" placeholder="LastName" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="e_lastname" class="col-sm-2 col-form-label">Nickname</label>
                        <div class="col-sm-10">
                          <input type="name" class="form-control" id="a_nickname" name="a_nickname" value="<?php echo $row['a_nickname'];?>" placeholder="LastName" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="e_Email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="a_email" name="a_email" value="<?php echo $row['a_email'];?>" placeholder="Email" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="e_Position" class="col-sm-2 col-form-label">Position</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="a_position" name="a_position" value="<?php echo $row['a_position'];?>" placeholder="Position" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="e_Username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="a_username" name="a_username" value="<?php echo $row['username'];?>" placeholder="Username" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="e_Password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="a_password" name="a_password" placeholder="Password" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="e_RePassword" class="col-sm-2 col-form-label">Re-Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="a_repassword" name="a_repassword" placeholder="Re-Password" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" required> I agree
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-success" name="update_profile">Update</button>
                        </div>
                      </div>
                    </form>
                  <?php
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
