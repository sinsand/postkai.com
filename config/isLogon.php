<? header("content-type: text/html; charset=tis-620"); 
if($_SESSION["mID"]==''){ ?>
	<script language="javascript">
	alert('กรุณาล็อกอินด้วยครับ');
	window.location.href = "index.php";
</script>
<? }?>