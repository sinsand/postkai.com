<?php
if($_SESSION["mID"] == ""){
	?>
	<form action="<?php echo $page_link;?>/login_function.php"  method="post" name="formlogin" id="formlogin" onsubmit="return validFormlogin();">������͡�Թ&nbsp;<input type="text" size="10" class="textbox_gray" name="user" />&nbsp;���ʼ�ҹ&nbsp;<input type="password" size="10" class="textbox_gray" name="pass" />&nbsp;<input name="flag" type="hidden" value="login" /><input name="submit" type="submit" value="��������к�" class="btn" />&nbsp;<a href="<?php echo $page_link?>/��Ѥ���Ҫԡ/register" title="��Ѥ���Ҫԡ">��Ѥ���Ҫԡ</a>&nbsp;<a href="<?php echo $page_link?>/������ʼ�ҹ/forgot-password" title="������ʼ�ҹ">������ʼ�ҹ</a></form>
	<?php
}else{
	$selectmember = "select * from member where  mID = '".$_SESSION["mID"]."'" ;
	$rmember = $db->query($selectmember);
	$Rmember = mysql_fetch_array($rmember);
?>
�Թ�յ�͹�Ѻ&nbsp;
	<font color="#FF0066" size="3">
		<strong><?php echo $Rmember['mUsername'];?></strong>
	</font>&nbsp;&nbsp;&nbsp;&raquo;<a href="<?php echo $page_link;?>/��������ѧ�������Ѿ��/<?php echo $Rmember['mID'];?>" title="��������ѧ�������Ѿ��">��������ѧ�������Ѿ��</a>&nbsp;&nbsp;&nbsp;&raquo;
	<a href="<?php echo $page_link;?>/��������ǹ���/<?php echo $Rmember['mID'];?>" title="��������ǹ���">��������ǹ���</a>&nbsp;&nbsp;&nbsp;&raquo;<a href="<?php echo $page_link;?>/�͡�ҡ�к�/logout" title="�͡�ҡ�к�">�͡�ҡ�к�</a>
<?php
}
?>
