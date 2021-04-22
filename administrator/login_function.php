<? session_start() ; 
include '../lib/connect.php' ;
error_reporting (E_ALL ^ E_NOTICE);
$flag=$_POST["flag"] ; 
$user = $_POST["user"] ;
$pass = $_POST["pass"] ; 
$logout = $_GET["logout"] ; 
 $db = new mydb ;


if ($flag == 'login'){

	if (checkloginadmin($user,$pass)){
		$admin = checkloginadmin($user,$pass);
		 $aID = $admin["aID"];
		$aName = $admin["aName"] ; 
		$aSurname = $admin["aSurname"] ; 
		$aAdmin = $admin["aAdmin"] ;
	$_SESSION["aaID"] = $aID ; 
	$_SESSION["aAdmin"] = $aAdmin ; 

	$url = "admin_mod.php?msg=เข้าสู่ระบบเรียบร้อย" ; 

	}else{

		if(!checkloginadmin($user,$pass)){
			$url = "index.php?msg=ชื่อล็อกอินและ หัสผ่านไม่ถูกต้อง";
		}

	}

	$db->close() ; 
}

if ($logout == 'logout'){
$_SESSION["aaID"] = '' ;
$url = "index.php?msg=ออกจากระบบเรียบร้อย";
}
?>

 <script language="javascript">
window.location.replace("<? echo $url;?>");
</script>
