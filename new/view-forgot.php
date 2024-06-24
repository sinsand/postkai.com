<div class="row m-0">
  <div class="col-12 p-0 pt-5 pb-5">
    <div class="container pt-0 pb-5">


      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['PostUpdatePass'])) {

          $SqlUpdate = "UPDATE n_member
                    SET mpass = '" . md5(md5($_POST['pPass'])) . "'
                  WHERE ( uid = '" . $_POST['uid'] . "' ) ";
          if (update_tb($SqlUpdate) == true) {
            $_SESSION['show'] = fSuccess(2, $translations["forgot-submit-completed"], $LinkWeb . "login", 0);
            header("Location:" . $LinkWeb . "login");
            exit();
          } else {
            echo fError(2, $translations["forgot-submit-error"], "");
          }
        }

      ?>
        <h2 class=""><?php echo $translations["forgot-header"]; ?></h2>
        <div class="row m-0">
          <div class="col-12 col-sm-10 sm-offset-1 col-md-8 md-offset-2 col-lg-8 lg-offset-2 card p-3 pt-5 pb-5">
            <form class="form-horizontal" id="FormForgotMember" action="<?php echo $LinkPath; ?>" method="post">
              <div class="mb-2 row">
                <label class="col-form-label col-sm-3" for=""><?php echo $translations["forgot-phone"]; ?>:</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" id="" value="<?php echo $_POST['pPhoneNumber']; ?>" placeholder="<?php echo $translations["forgot-phone"]; ?>" readonly>
                  <input type="hidden" class="form-control" name="uid" value="<?php echo $_POST['uid']; ?>">
                </div>
              </div>
              <div class="mb-2 row">
                <label class="col-form-label col-sm-3"><?php echo $translations["forgot-password"]; ?></label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" id="pPass" name="pPass" placeholder="<?php echo $translations["forgot-password"]; ?>" required autocomplete="off">
                </div>
              </div>
              <div class="mb-2 row">
                <label class="col-form-label col-sm-3" for=""></label>
                <div class="col-sm-9">
                  <button type="submit" name="PostUpdatePass" id="" class="btn btn-success"><?php echo $translations["forgot-submit"]; ?></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      <?php

      } else {
      ?>
        <h2 class=""><?php echo $translations["forgot-submit-head"]; ?></h2>
        <div class="row m-0">
          <div class="col-12 col-sm-10 sm-offset-1 col-md-8 md-offset-2 col-lg-8 lg-offset-2 card p-3 pt-5 pb-5">
            <form class="form-horizontal" id="FormForgotMember" action="<?php echo $LinkPath; ?>" method="post">
              <div class="mb-2 row">
                <label class="col-form-label col-sm-3" for=""><?php echo $translations["forgot-submit-code"]; ?>:</label>
                <div class="col-sm-9">
                  <select class="form-control js-example-basic-multiple" name="pCodeNumber" id="pCodeNumber">
                    <option value=""><?php echo $translations["forgot-submit-country"]; ?></option>
                    <?php
                    $SqlSelect = "SELECT * FROM countries ORDER BY country_name ASC";
                    if (select_num($SqlSelect) > 0) {
                      foreach (select_tb($SqlSelect) as $kalue) {
                    ?>
                        <option <?php echo  $kalue['phone_code'] == '66' ? "selected" : ""; ?> code="<?php echo $kalue['phone_code']; ?>" value="<?php echo $kalue['countriesid']; ?>"><?php echo "(+" . $kalue['phone_code'] . ") " . $kalue['country_name']; ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="mb-2 row">
                <label class="col-form-label col-sm-3" for=""><?php echo $translations["forgot-phone"]; ?>:</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" id="pPhoneNumber" name="pPhoneNumber" placeholder="<?php echo $translations["forgot-phone"]; ?>" required autocomplete="off">
                </div>
              </div>
              <div class="mb-2 row">
                <label class="col-form-label col-sm-3"></label>
                <div class="col-sm-9">
                  <div id="recaptcha-container"></div>
                  <input type="hidden" name="linkweb" id="linkweb" value="<?php echo $LinkWeb; ?>">
                </div>
              </div>
              <div class="mb-2 row">
                <label class="col-form-label col-sm-3" for=""></label>
                <div class="col-sm-9">
                  <button type="button" name="btnlogin" id="btnlogin" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#view-otp-comfirm" data-bs-backdrop="static" data-bs-keyboard="false" onclick="phoneAuth_forgot();"><?php echo $translations["forgot-sumbit-otp"]; ?></button>
                </div>
              </div>
              <div class="modal fade" id="view-otp-comfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">

                    <div class="modal-header text-white bg-danger">
                      <h4 class="modal-title fs-5" id="exampleModalLabel"><?php echo $translations["forgot-submit-keycode"]; ?></h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <div class="modal-body p-2">
                      <div class="mb-0 row m-0 text-center">
                        <input type="text" class="form-control" name="verificationCode" id="verificationCode" placeholder="<?php echo $translations["forgot-submit-keytext"]; ?>">
                        <div class="col-form-label p-2" id="show_log_member"></div>
                        <input type="hidden" name="uid" id="puid" value="">
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between text-center">
                      <button type="button" style="width:100%" class=" btn btn-success" onclick="codeverify_forgot();" class="disabled btn btn-primary btn_PostConfirm" name="PostConfirm" id="PostConfirm"><?php echo $translations["forgot-submit-confirm-otp"]; ?></button>
                    </div>

                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

      <?php
      }
      ?>


    </div>
  </div>
</div>