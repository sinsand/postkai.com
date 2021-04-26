<? session_start(); 
if($_SESSION["aaID"]==''){ ?>
	<script language="javascript">
	window.location.href = "index.php?msg=Please Login";
</script>
<? }?>