
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['PostUpdatePass'])) {

    $SqlUpdate = "UPDATE n_member
                    SET mpass = '".md5(md5($_POST['pPass']))."'
                  WHERE ( uid = '".$_POST['uid']."' ) ";
    if (update_tb($SqlUpdate)==true) {
      echo fSuccess(2,$translations["forgot-submit-completed"],$LinkWeb."login",2);
    }else {
      echo fError(2,$translations["forgot-submit-error"],"");
    }
  }

  ?>
  <h2 class="main-head-cate t-search f-k"><?php echo $translations["forgot-header"];?></h2>
  <div class="row">
    <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
      <form class="form-horizontal" id="FormForgotMember" action="<?php echo $LinkPath;?>" method="post">
        <div class="form-group">
          <label class="control-label col-sm-3" for=""><?php echo $translations["forgot-phone"];?>:</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" id="" value="<?php echo $_POST['pPhoneNumber'];?>"  placeholder="<?php echo $translations["forgot-phone"];?>" readonly>
            <input type="hidden" class="form-control" name="uid" value="<?php echo $_POST['uid'];?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3"><?php echo $translations["forgot-password"];?></label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="pPass" name="pPass" placeholder="<?php echo $translations["forgot-password"];?>" required autocomplete="off">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for=""></label>
          <div class="col-sm-9">
            <button type="submit" name="PostUpdatePass" id="" class="btn btn-success"><?php echo $translations["forgot-submit"];?></button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php

}else {
  ?>
  <h2 class="main-head-cate t-search f-k"><?php echo $translations["forgot-submit-head"];?></h2>
  <div class="row">
    <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
      <form class="form-horizontal" id="FormForgotMember" action="<?php echo $LinkPath;?>" method="post">
        <div class="form-group">
          <label class="control-label col-sm-3" for=""><?php echo $translations["forgot-submit-code"];?>:</label>
          <div class="col-sm-9">
            <select class="form-control js-example-basic-multiple" name="pCodeNumber" id="pCodeNumber">
              <option value=""><?php echo $translations["forgot-submit-country"];?></option>
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
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for=""><?php echo $translations["forgot-phone"];?>:</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" id="pPhoneNumber" name="pPhoneNumber" placeholder="<?php echo $translations["forgot-phone"];?>" required autocomplete="off">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3"></label>
          <div class="col-sm-9">
            <div id="recaptcha-container"></div>
            <input type="hidden" name="linkweb" id="linkweb" value="<?php echo $LinkWeb;?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for=""></label>
          <div class="col-sm-9">
            <button type="button" name="btnlogin" id="btnlogin" class="btn btn-success" data-target="#view-otp-comfirm" data-toggle="modal" data-backdrop="static" data-keyboard="false" onclick="phoneAuth_forgot();" ><?php echo $translations["forgot-sumbit-otp"];?></button>
          </div>
        </div>
        <div class="modal fade" id="view-otp-comfirm"  aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header"  style="color: white;background-color: #f00;">
                <h4 class="modal-title"><span class="glyphicon glyphicon-lock" style=" color: #FFF"></span> <?php echo $translations["forgot-submit-keycode"];?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" color: #FFF">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group" style="text-align: center; margin: 0;">
                  <input type="text" class="form-control" name="verificationCode" id="verificationCode" placeholder="<?php echo $translations["forgot-submit-keytext"];?>">
                  <div class="control-label" id="show_log_member" style="padding:25px 0;"></div>
                  <input type="hidden" name="uid" id="puid" value="">
                </div>
              </div>
              <div class="modal-footer justify-content-between text-center">
                <button type="button" style="width:100%" class=" btn btn-success"  onclick="codeverify_forgot();" class="disabled btn btn-primary btn_PostConfirm" name="PostConfirm" id="PostConfirm"><?php echo $translations["forgot-submit-confirm-otp"];?></button>
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
