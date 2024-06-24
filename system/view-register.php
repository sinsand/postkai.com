<h2 class="main-head-cate t-search f-k"><?php echo $translations["register-header"];?></h2>
<div class="row">
  <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">

    <form class="form-horizontal" method="post" onSubmit="return false;" enctype="multipart/form-data">

      <div class="form-group">
        <label class="control-label col-sm-3" for="pFullname"><?php echo $translations["register-name"];?>:</label>
        <div class="col-sm-9">
          <input type="text" id="pFullname" class="form-control" name="pFullname" placeholder="<?php echo $translations["register-name"];?>" required autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="pPhoneNumber"><?php echo $translations["register-phone"];?>:</label>
        <div class="col-sm-9">
          <div class="col-xs-4" style="padding:0px;">
            <select class="form-control js-example-basic-multiple" name="pCodeNumber" id="pCodeNumber">
              <option value=""><?php echo $translations["register-country"];?></option>
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
            <input type="text" id="pPhoneNumber" class="form-control" name="pPhoneNumber" placeholder="<?php echo $translations["register-phone"];?>" required autocomplete="off">
          </div>
          <span class="help-block"><?php echo $translations["register-text"];?></span>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="pPassword"><?php echo $translations["register-password"];?>:</label>
        <div class="col-sm-9">
          <input type="password" id="pPassword" class="form-control" name="pPassword" placeholder="<?php echo $translations["register-password"];?>" required autocomplete="off">
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
          <button class="btn btn-primary" type="button" onclick="phoneAuth();"><?php echo $translations["register-submit"];?></button>
          <span id="alertShowError"></span>
        </div>
      </div>

      <div class="modal" id="register-view-show"  role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?php echo $translations["register-submit-head"];?></h5>
            </div>
            <div class="modal-body">

                <div class="form-group">
                  <label class="control-label col-sm-3" for="email"><?php echo $translations["register-submit-text"];?>:</label>
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
                    <button class="btn btn-primary" style="width:100%;" type="button" onclick="codeverify();"><?php echo $translations["register-submit-verify"];?></button>
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

