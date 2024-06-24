<div class="row m-0">
  <div class="col-12 p-0 pt-5 pb-5">
    <div class="container pt-0 pb-5">


      <h2 class=""><?php echo $translations["login"]; ?></h2>
      <?php
      if (isset($_POST['btnlogin'])) {
        $SqlSelect = "SELECT mid,uid,mphone
                FROM n_member
                WHERE ( mphone = '" . $_POST['mphone'] . "' AND mpass = '" . md5(md5($_POST['mpassword'])) . "' ) ";
        //echo $SqlSelect;
        if (select_num($SqlSelect) > 0) {
          foreach (select_tb($SqlSelect) as $value) {
            setcookie("uid", base64url_encode($value['uid']), time() + 86400, '/');
            setcookie("mid", base64url_encode($value['mid']), time() + 86400, '/');
            setcookie("mphone", base64url_encode($value['mphone']), time() + 86400, '/');
            setcookie("mfullname", base64url_encode($value['mfullname']), time() + 86400, '/');
            

            $_SESSION['show'] = fSuccess(5, $translations['login-submit-completed'], $LinkWeb . "member", 2);
            header("Location:" . $LinkPath);
            exit();
          }
        } else {
          fError(5, "เข้าสู่ระบบไม่สำเร็จ ข้อมูลไม่ถูกต้อง", "");
        }
      }

      if (isset($_SESSION['show'])) {
        echo $_SESSION['show'];
        unset($_SESSION['show']);
      }

      ?>
      <div class="row m-0">
        <div class="col-12 col-sm-10 sm-offset-1 col-md-8 md-offset-2 col-lg-8 lg-offset-2 card p-3 pt-5 pb-5">
          <form class="form-horizontal" action="<?php echo $LinkPath; ?>" method="post" onsubmit="return onSubmit(event)">
            <div class="mb-2 row">
              <label class="col-form-label col-sm-3"><?php echo $translations["login-phone"]; ?>:</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" name="mphone" placeholder="<?php echo $translations["login-phone-text"]; ?>" required autocomplete="off">
              </div>
            </div>
            <div class="mb-2 row">
              <label class="col-form-label col-sm-3" for="password"><?php echo $translations["login-password"]; ?>:</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="mpassword" placeholder="<?php echo $translations["login-password-text"]; ?>" required autocomplete="off">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-form-label col-sm-3" for=""></label>
              <div class="col-sm-9">
                <div class="g-recaptcha" data-sitekey="6LcK9v4pAAAAALh_WlZV5JYCqLFQToygb_lqfxju"></div>
                <div class="show-alert mt-2 text-danger text-center"></div>
              </div>
            </div>
            <div class="mb-2 row">
              <label class="col-form-label col-sm-3"></label>
              <div class="col-sm-9">
                <button type="submit" name="btnlogin" class="btn btn-success"><?php echo $translations["login-submit"]; ?></button> | <a href="<?php echo $LinkWeb; ?>forgot"><?php echo $translations["login-forgot"]; ?></a>
              </div>
            </div>
          </form>
        </div>
      </div>



    </div>
  </div>
</div>