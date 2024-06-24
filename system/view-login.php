<h2 class="main-head-cate t-search f-k"><?php echo $translations["login"];?></h2>
<?php
if (isset($_POST['btnlogin'])) {
  $SqlSelect = "SELECT mid,uid,mphone
                FROM n_member
                WHERE ( mphone = '".$_POST['mphone']."' AND mpass = '".md5(md5($_POST['mpassword']))."' ) ";
  //echo $SqlSelect;
  if (select_num($SqlSelect)>0) {
    foreach (select_tb($SqlSelect) as $value) {
      setcookie("uid", base64url_encode($value['uid']), time()+86400,'/');
      setcookie("mid", base64url_encode($value['mid']), time()+86400,'/');
      setcookie("mphone", base64url_encode($value['mphone']), time()+86400,'/');
      setcookie("mfullname", base64url_encode($value['mfullname']), time()+86400,'/');
      echo fSuccess(5,$translations["login-submit-completed"],$LinkWeb."member",2);
    }
  }else {
    fError(5,$translations["login-submit-error"],"");
  }
}
?>
<div class="row">
  <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
    <form class="form-horizontal" action="<?php echo $LinkPath;?>" method="post">
      <div class="form-group">
        <label class="control-label col-sm-3" for="email"><?php echo $translations["login-phone"];?>:</label>
        <div class="col-sm-9">
          <input type="number" class="form-control" name="mphone" placeholder="<?php echo $translations["login-phone-text"];?>" required autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="password"><?php echo $translations["login-password"];?>:</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" name="mpassword" placeholder="<?php echo $translations["login-password-text"];?>" required autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="email"></label>
        <div class="col-sm-9">
          <button type="submit" name="btnlogin" class="btn btn-success"><?php echo $translations["login-submit"];?></button> | <a href="<?php echo $LinkWeb;?>forgot"><?php echo $translations["login-forgot"];?></a>
        </div>
      </div>
    </form>
  </div>
</div>
<!--
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.8/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.8/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyDxvrbQGcRSFb68yaaRPaDLd6hEd9YuvDY",
    authDomain: "postkai-otp.firebaseapp.com",
    projectId: "postkai-otp",
    storageBucket: "postkai-otp.appspot.com",
    messagingSenderId: "111722777636",
    appId: "1:111722777636:web:8a346a840fdfe6608cdcb1",
    measurementId: "G-2D0R244E6K"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>-->
