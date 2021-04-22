<? session_start() ; 
include 'lib/connect.php' ;
error_reporting (E_ALL ^ E_NOTICE);
$flag=$_POST["flag"] ; 
$user = $_POST["user"] ;
$pass = $_POST["pass"] ; 
$logout = $_GET["logout"] ; 
$db = new mydb ;


if ($flag == 'login')
{
		if (checklogin($user,$pass))
		{
			 $member = checklogin($user,$pass);
			 $mID = $member["mID"];
			 $mName = $member["mName"] ; 
			 $_SESSION["mID"] = $mID ; 
			 $_SESSION["mName"] = $mName ; 
			 $msg = "เข้าสู่ระบบเรียบร้อย" ; 
			 $url = "$page_link/index.php" ;
	
		}
		else
		{
	
			if(!checklogin($user,$pass))
			{
				$msg = "ชื่อล็อกอินหรือรหัสผ่านไม่ถูกต้อง หรือ ชื่อล็อกอินนี้ไม่สามารถใช้งานได้ กรุณาตรวจสอบหรือติดต่อผู้ดูแล" ; 
				$url = "$page_link/index.php" ; 
			}

	}

	$db->close() ; 
}

if ($logout == 'logout'){
$_SESSION["mID"] = '' ;
$msg = "Logout Complete." ; 
$url = "$page_link/index.php" ; 		
}

?>
<script type="text/javascript">alert("<?=$msg?>");window.location.replace("<?=$url?>");</script>
