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
			 $msg = "�������к����º����" ; 
			 $url = "$page_link/index.php" ;
	
		}
		else
		{
	
			if(!checklogin($user,$pass))
			{
				$msg = "������͡�Թ�������ʼ�ҹ���١��ͧ ���� ������͡�Թ����������ö��ҹ�� ��سҵ�Ǩ�ͺ���͵Դ��ͼ�����" ; 
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
