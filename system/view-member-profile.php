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
          echo  fSuccess(1,$translations["mem-profile-save"],$LinkPath,2);
        }else {
          echo fError(1,$translations["mem-profile-error"],"");
        }
      }
    }
  }else {
    echo fError(1,$translations["mem-profile-error-match"],"");
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
            <label class="control-label col-sm-3" for="email"><?php echo $translations["mem-fetch-name"];?>:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="mfullname" value="<?php echo $row['mfullname'];?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="email"><?php echo $translations["mem-fetch-phone"];?>:</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" name="nphone" value="<?php echo $row['mphone'];?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="password"><?php echo $translations["mem-fetch-old-pass"];?>:</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" name="npassword" placeholder="<?php echo $translations["mem-fetch-old-pass"];?>" required autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="password"><?php echo $translations["mem-fetch-new-pass"];?>:</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" name="npasswordnew" placeholder="<?php echo $translations["mem-fetch-new-pass"];?>" required autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="password"><?php echo $translations["mem-fetch-confirm-pass"];?>:</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" name="nconfirmpasswordnew" placeholder="<?php echo $translations["mem-fetch-confirm-pass"];?>" required autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12 text-right">
              <button type="submit" name="btnUpdate" class="btn btn-success"><?php echo $translations["mem-fetch-submit"];?></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php
  }
?>
