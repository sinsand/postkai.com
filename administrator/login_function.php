<?php
include '../lib/connect.php' ;
error_reporting (E_ALL ^ E_NOTICE);
$flag=$_POST["flag"] ;
$user = $_POST["user"] ;
$pass = $_POST["pass"] ;
$logout = $_GET["logout"] ;
if ($flag == 'login'){

	if (checkloginadmin($user,$pass)){
		$admin = checkloginadmin($user,$pass);
		$aID = $admin["aID"];
		$aName = $admin["aName"] ;
		$aSurname = $admin["aSurname"] ;
		$aAdmin = $admin["aAdmin"] ;
	  $_SESSION["aaID"] = $aID ;
	  $_SESSION["aAdmin"] = $aAdmin ;

	 $url = "admin_mod.php?msg=��������к����º����" ;

	}else{
		if(!checkloginadmin($user,$pass)){
			$url = "index.php?msg=������͡�Թ��� ��ʼ�ҹ����١��ͧ";
		}
	}close() ;
}

if ($logout == 'logout'){
  $_SESSION["aaID"] = '' ;
  $url = "index.php?msg=�͡�ҡ�к����º����";
}
?>

 <script language="javascript">
window.location.replace("<?php echo $url;?>");
</script>
