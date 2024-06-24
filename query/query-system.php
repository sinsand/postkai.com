<?php
require("../config/config.php");
if (!empty($_COOKIE['lang'])) {
  $selectedLang = $_COOKIE['lang'];
} else {
  $selectedLang = 'th'; // Thai
}
$lang = "../language/".$selectedLang.".php";
require($lang);

/////// insert member
if ($_POST['post'] == "insert_member") {
  $SqlInsert = "INSERT INTO n_member
                  VALUES(0,
                    '" . $_POST['uid'] . "',
                    '" . $_POST['_fullname'] . "',
                    '" . $_POST['_phone'] . "',
                    '" . $_POST['_codephone'] . "',
                    '" . md5($_POST['_password']) . "',
                    '0',
                    now()
                  );";

  if (insert_tb($SqlInsert) == true) {
    echo fSuccess(6, "สมัครสมาชิกสำเร็จ ระบบทำการส่งอีเมล กรุณาเข้าอีเมลเพื่อคลิกยืนยันการใช้งาน", $LinkWeb . "login", 5);
    //log_insert("เพิ่มประกาศใหม่ สำเร็จ",$_COOKIE[$CookieID]);
  } else {
    echo fError(6, "สมัครสมาชิกไม่สำเร็จ กรุณาตรวจสอบข้อมูล", '');
    //log_insert("เพิ่มประกาศใหม่ ไม่สำเร็จ",$_COOKIE[$CookieID]);
  }
}





if ($_POST['post'] == "check_member") {
  $SqlSelect = "SELECT mphone
                FROM n_member
                WHERE ( mphone = '" . $_POST['_phone'] . "' )";
  if (select_num($SqlSelect) > 0) {
    echo "1|||";
  } else {
    echo "0|||".$translations['forgot-submit-confirm-otp-result-error']." <a href='" . $_POST['_linkweb'] . "register' class='btn btn-sm btn-outline-primary'>".$translations['forgot-submit-confirm-otp-result-error-2']."</a>";
  }
}

//// Accept cookie Notice
if ($_POST['post'] == "accept-cookie-notice") {
  setcookie($CookieAccept, "Accept-Cookie-Year",  time() + (86400 * 30), "/"); // 30 day
}
