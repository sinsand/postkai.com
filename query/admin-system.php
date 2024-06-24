<?php
require ("../config/config.php");


/////// insert member
if ($_POST['post']=="insert_member") {
  $SqlInsert = "INSERT INTO n_member
                  VALUES(0,
                    '".$_POST['uid']."',
                    '".$_POST['_fullname']."',
                    '".$_POST['_phone']."',
                    '".$_POST['_codephone']."',
                    '".md5($_POST['_password'])."',
                    '0',
                    now()
                  );";
  if (insert_tb($SqlInsert)==true) {
    echo fSuccess(6,"สมัครสมาชิกสำเร็จ ระบบทำการส่งอีเมล กรุณาเข้าอีเมลเพื่อคลิกยืนยันการใช้งาน",$LinkWeb."login",5);
    //log_insert("เพิ่มประกาศใหม่ สำเร็จ",$_COOKIE[$CookieID]);
  }else {
    echo fError(6,"สมัครสมาชิกไม่สำเร็จ กรุณาตรวจสอบข้อมูล",'');
    //log_insert("เพิ่มประกาศใหม่ ไม่สำเร็จ",$_COOKIE[$CookieID]);
  }
}





////// Delete ads banner
if ($_POST['post']=="DeleteAdsBanner") {
  $SqlDelete = "DELETE FROM n_banner WHERE ( bid = '".$_POST['ads_id']."' );";
  if (delete_tb($SqlDelete)==true) {
    echo fSuccess(3,"ลบข้อมูลสำเร็จ",$_POST['linkpath'],2);
  }else {
    echo fError(3,"ลบข้อมูลไม่สำเร็จ กรุณาตรวจสอบข้อมูล",'');
  }
}







////// Delete ads banner Slide
if ($_POST['post']=="DeleteAdsSlide") {
  $SqlDelete = "DELETE FROM n_slide WHERE ( sid = '".$_POST['ads_id']."' );";
  if (delete_tb($SqlDelete)==true) {
    echo fSuccess(3,"ลบข้อมูลสำเร็จ",$_POST['linkpath'],2);
  }else {
    echo fError(3,"ลบข้อมูลไม่สำเร็จ กรุณาตรวจสอบข้อมูล",'');
  }
}





/////// close post
if ($_POST['post']=="ClosePost") {
  $SqlUpdate = "UPDATE sb_job SET jStatus = '0' WHERE ( JID = '".$_POST['post_id']."' );";
  if (update_tb($SqlUpdate)==true) {
    //echo $SqlUpdate;
    echo fSuccess(3,"ปิดประกาศ สำเร็จ",$_POST['linkpath'],2);
  }else {
    echo fError(3,"ปิดประกาศ ไม่สำเร็จ กรุณาตรวจสอบข้อมูล",'');
  }
}



?>

