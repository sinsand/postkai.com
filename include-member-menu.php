<?
if($_SESSION["mID"] == ""){
?>
<form action="<?=$page_link?>/login_function.php"  method="post" name="formlogin" id="formlogin" onsubmit="return validFormlogin();">ชื่อล็อกอิน&nbsp;<input type="text" size="10" class="textbox_gray" name="user" />&nbsp;รหัสผ่าน&nbsp;<input type="password" size="10" class="textbox_gray" name="pass" />&nbsp;<input name="flag" type="hidden" value="login" /><input name="submit" type="submit" value="เข้าสู่ระบบ" class="btn" />&nbsp;<a href="<?=$page_link?>/สมัครสมาชิก/register" title="สมัครสมาชิก">สมัครสมาชิก</a>&nbsp;<a href="<?=$page_link?>/ลืมรหัสผ่าน/forgot-password" title="ลืมรหัสผ่าน">ลืมรหัสผ่าน</a></form>
<?
}
else
{

$selectmember = "select * from member where  mID = '".$_SESSION["mID"]."'" ; 
$rmember = $db->query($selectmember);
$Rmember = mysql_fetch_array($rmember);
	
?>
ยินดีต้อนรับ&nbsp;<font color="#FF0066" size="3"><strong><?=$Rmember['mUsername']?></strong></font>&nbsp;&nbsp;&nbsp;&raquo;<a href="<?=$page_link?>/ข้อมูลอสังหาริมทรัพย์/<?=$Rmember['mID']?>" title="ข้อมูลอสังหาริมทรัพย์">ข้อมูลอสังหาริมทรัพย์</a>&nbsp;&nbsp;&nbsp;&raquo;<a href="<?=$page_link?>/ข้อมูลส่วนตัว/<?=$Rmember['mID']?>" title="ข้อมูลส่วนตัว">ข้อมูลส่วนตัว</a>&nbsp;&nbsp;&nbsp;&raquo;<a href="<?=$page_link?>/ออกจากระบบ/logout" title="ออกจากระบบ">ออกจากระบบ</a>
<?
}
?>