
<html>
  <head>
    <title>i-System Management</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index,follow" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $LinkWeb;?>images/system/logo/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $LinkWeb;?>images/system/logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $LinkWeb;?>images/system/logo/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $LinkWeb;?>images/system/logo/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $LinkWeb;?>images/system/logo/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo $LinkWeb;?>images/system/logo/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
	  <link href="https://cdn.lazywasabi.net/fonts/Anuphan/Anuphan.css?woff2" rel="stylesheet" />

    <style>
      body{
        color: hsla(0,0%,100%,0.6);
        background: url('<?php echo $LinkAdmin;?>images/simple-codelines.svg'),#2b3137;
        background-position: center 10%;
        background-size: cover;
        font-family: 'Anuphan', sans-serif;
      }
      .container{
        margin: 40px auto !important;
        padding: 0px 14px !important;
        max-width: 957px !important;
      }
      .col-center{
        padding: 80px 20px;
        align-items: center!important;
      }
      .col-center div{
        margin: 20px 0px;
      }
      .rounded-1{
        background: #fff;
        padding: 20px;
        border-radius: 3px;
        color: #000;
      }
      .form-label.h5{
        display: block;
        margin-bottom: 5px;
        font-size: 16px;
        font-weight: inherit;
        text-align: left;
      }
      .text-inser{

      }
      .text-inser .mb-3{
        color: #fff;
      }
      .text-inser .mb-4{
        color: #818a91;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row" style="margin:0px;">
        <div class="col-xs-12 col-center">
          <div class="col-md-7 text-inser">
            <h1 class="mb-3">i-System Postkai v.1.0</h1>
			      <p>ระบบจัดการงานโพสขาย ประกาศขายฟรี ประชาสัมพันธ์ต่างๆ</p>
            <p style="margin:0px;">สนใจลงโฆษณา ติดต่อ</p>
            <p style="margin:0px;">Mobile : 084 131 6512 (ซีน)</p>
            <p style="margin:0px;">LINE ID : seen_nuakaew (ซีน)</p>
            <p style="margin:0px;">Email : contact@postkai.com</p>
          </div>
          <div class="col-md-5">
            <div class="rounded-1">
              <form class="" autocomplete="off" action="<?php echo $LinkPath;?>" accept-charset="UTF-8" method="post">
                <div class="form-group mt-0">
                  <div class="input-label">
                    <label class="form-label h5" for="user">Username</label>
                  </div>
                  <div>
                    <input type="text" name="user" placeholder="Username" required id="log_username" class="form-control form-control-lg input-block" autocomplete="off" >
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-label">
                    <label class="form-label h5" for="pass">Password</label>
                  </div>
                  <div>
                    <input type="password" name="pass" placeholder="Password" required id="log_password" class="form-control form-control-lg input-block" autocomplete="off" >
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-label">
                    <label class="form-label h5" id="popup-show">
                      <?php
                        if (isset($_POST['login_submit'])) {
                          $SqlSelect = "SELECT aID
                                        FROM admin
                                        WHERE ( aUsername = '".$_POST['user']."' AND aPassword = '".md5(md5($_POST['pass']."==1"))."' )";
                          if (select_num($SqlSelect)>0) {
                            foreach (select_tb($SqlSelect) as $row) {
                              setcookie("AID", base64url_encode($row['aID']), time()+86400,'/');
                              echo fSuccess(5,"เข้าสู่ระบบสำเร็จ รอสักครู่...",$LinkPath,2);
                            }
                          }
                        }

                      ?>
                    </label>
                  </div>
                  <div>
                    <button type="submit" class="btn btn-success btn-lg " name="login_submit" style="width:100%;">Sign in!</button>
                  </div>
                </div>

              </form>



            </div>
          </div>

        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
