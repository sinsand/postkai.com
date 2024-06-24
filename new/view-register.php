<div class="row m-0">
  <div class="col-12 p-0 pt-5 pb-5">
    <div class="container pt-0 pb-5">




      <h2 class=""><?php echo $translations["register-header"]; ?></h2>
      <div class="row m-0 mb-5">
        <div class="col-12 col-sm-10 sm-offset-1 col-md-8 md-offset-2 col-lg-8 lg-offset-2 card p-3 pt-5 pb-5">

          <form class="form-horizontal" method="post" onSubmit="return false;">

            <div class="mb-2 row">
              <label class="col-form-label col-sm-3" for="pFullname"><?php echo $translations["register-name"]; ?>:</label>
              <div class="col-sm-9">
                <input type="text" id="pFullname" class="form-control" name="pFullname" placeholder="<?php echo $translations["register-name"]; ?>" required autocomplete="off">
              </div>
            </div>
            <div class="mb-2 row">
              <label class="col-form-label col-sm-3" for="pPhoneNumber"><?php echo $translations["register-phone"]; ?>:</label>
              <div class="col-sm-9">
                <div class="row m-0">
                  <div class="col-4 p-0">
                    <select class="form-select js-example-basic-multiple" name="pCodeNumber" id="pCodeNumber">
                      <option value=""><?php echo $translations["register-country"]; ?></option>
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
                  <div class="col-8 p-0 ps-2">
                    <input type="number" id="pPhoneNumber" class="form-control" name="pPhoneNumber" placeholder="<?php echo $translations["register-phone"]; ?>" required autocomplete="off">
                  </div>
                  <span class="text-muted" style="font-size:13px;"><?php echo $translations["register-text"]; ?></span>
                </div>
              </div>
            </div>
            <div class="mb-2 row">
              <label class="col-form-label col-sm-3" for="pPassword"><?php echo $translations["register-password"]; ?>:</label>
              <div class="col-sm-9">
                <input type="password" id="pPassword" class="form-control" name="pPassword" placeholder="<?php echo $translations["register-password"]; ?>" required autocomplete="off">
              </div>
            </div>
            <div class="mb-2 row">
              <label class="col-form-label col-sm-3"></label>
              <div class="col-sm-9">
                <div id="recaptcha-container"></div>
              </div>
            </div>
            <div class="mb-2 row">
              <label class="col-form-label col-sm-3"></label>
              <div class="col-sm-9">
                <button class="btn btn-primary" type="button" onclick="phoneAuth();"><?php echo $translations["register-submit"]; ?></button>
                <span id="alertShowError"></span>
              </div>
            </div>

            <div class="modal" id="register-view-show" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"><?php echo $translations["register-submit-head"]; ?></h5>
                  </div>
                  <div class="modal-body">

                    <div class="mb-2 row">
                      <label class="col-form-label col-sm-3" for="email"><?php echo $translations["register-submit-text"]; ?>:</label>
                      <div class="col-sm-9">
                        <input class="form-control" type="text" id="verificationCode" placeholder="Enter verification code" required>
                      </div>
                    </div>
                    <div class="mb-2 row">
                      <label class="col-form-label col-sm-3"></label>
                      <div class="col-sm-9">
                      </div>
                    </div>
                    <div class="mb-2 row">
                      <div class="col-sm-12">
                        <button class="btn btn-primary" style="width:100%;" type="button" onclick="codeverify();"><?php echo $translations["register-submit-verify"]; ?></button>
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
        </div>
      </div>






    </div>
  </div>
</div>
