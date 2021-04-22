<?php
include 'config/isLogon.php' ; 
include '../lib/connect.php' ; 
$db = new mydb;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php echo $titles ; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="css/style_text.css" rel="stylesheet" type="text/css">
</head>


<body>
<?php 
error_reporting (E_ALL ^ E_NOTICE);
$flag = $_GET["flag"];
$offset = $_GET["offset"];
$limit = $_GET["limit"] ;


if ($sname != '') 
{
 	$con .= " and (mName like '%$sname%' or mMname like '%$sname%' or mLname like '%$sname%' )" ; 
}
if ($semail != '')
{ 
  	$con .= " and mEmail like '%$semail%'";
}
if ($sstatus == '1')
{ 
  	$con .= " and mStatus = '1'";
}
if ($sstatus == '0')
{ 
  	$con .= " and mStatus = '0'";
}


if (empty($offset) || $offset < 0)
{ 
	$offset=0; 
}

$limit = 25;


$sql = "SELECT * FROM member where mID != '0' $con ORDER BY mID DESC";


$result = $db->query($sql);
$totalrows = mysql_num_rows($result);

if($totalrows != 0)
{
	// Set $begin and $end to record range of the current หน้า 
    $begin = ($offset+1); 
    $end = ($begin+($limit-1)); 
	
    if ($end > $totalrows)
	{ 
        $end = $totalrows; 
    }
}

$sql .= " LIMIT $offset, $limit";
$result = $db->query($sql);
?>

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td height="70" colspan="3" class="contentbody"><font color="#464646" size="8">ผู้ดูแลระบบ</font></td>
  </tr>
  <tr> 
    <td width="160" align="left" valign="top">
<?php include ('include_menu.php') ; ?></td>
    <td width="10" align="left" valign="top"><img src="images/spacer.gif" width="10" height="100"></td>
    <td width="100%" align="left" valign="top"> 
	
	
	  
	  <form action="member_mod.php" method="post">
      <table width="459" height="62" border="0" align="center" cellspacing="1" class="boldbodytx">
        <tr>
          <td colspan="2" align="center"><strong><font size="4">ค้นหาสมาชิก</font></strong></td>
        </tr>
        <tr>
          <td width="179">&nbsp;</td>
          <td width="273">&nbsp;</td>
        </tr>
        <tr>
          <td align="right"><strong>ชื่อ - นามสกุล : </strong></td>
          <td><label>
            <input name="sname" type="text" id="sname" value="<? echo $_POST['sname']; ?>">
          </label></td>
        </tr>
        <tr>
          <td align="right"><strong>อีเมล์ :</strong> </td>
          <td><label>
            <input name="semail" type="text" id="semail" value="<? echo $_POST['semail']; ?>">
          </label></td>
        </tr>
        <tr>
          <td align="right">สถานะ : </td>
          <td><label>
            <select name="sstatus" id="sstatus">
              <option value="1" <?php if($_POST['sstatus'] == '1') {echo 'selected="selected"' ; }  ?> >ใช้งาน</option>
              <option value="0" <?php if($_POST['sstatus']== '0') {echo 'selected="selected"' ; }  ?>>ยกเลิกการใช้งาน</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><label>
            <input type="submit" name="Submit" value=" ค้นหา " class="aceButton">
          </label></td>
        </tr>
      </table>
	  <br>
      <?php
	  if ($totalrows > 0)
	  {
	  ?>
	  </form>
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td valign="top"></td>
        </tr>
        <tr> 
          <td width="50%" height="30" valign="middle" class="boldbodytx">มี <font color="#009900"><?php echo $totalrows ; ?></font> สมาชิก</td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="6" cellspacing="1">
	  <form name="form2" method="post" action="member_function.php">
        <tr bgcolor="#838383">
          <td width="39%" class="boldbodytx"><font color="#FFFFFF">ชื่อ - นามสกุล</font></td>
          <td width="30%" class="boldbodytx"><div align="center"><font color="#FFFFFF">อีเมล์</font></div></td>
          <td width="13%" class="boldbodytx"><div align="center"><font color="#FFFFFF">สถานะ</font></div></td>
          <td width="9%" class="boldbodytx"><div align="center"><font color="#FFFFFF">แก้ไข</font></div></td>
          <td width="9%" class="boldbodytx"><div align="center"><font color="#FFFFFF">ลบ</font></div></td>
        </tr>
		<?php
		$color = "#FFFFFF";
		
		while ($row = mysql_fetch_array($result))
		{
		?>
        <tr bgcolor="<?php echo $color; ?>">
          <td width="39%" class="contenttx"><? echo $row["mID"]; ?>. <a href="member_view.php?mID=<? echo $row["mID"]; ?>"><font color="#000000"><strong><? echo $row['mTitle'];?> <? echo $row['mName'];?> <? echo $row['mLname'];?></strong></font></a></td>
          <td width="30%" class="contenttx" align="center"><font color="#000000"><strong><? echo $row["mEmail"]; ?></strong></td>
          <td width="13%" class="contenttx" align="center"><strong><? if($row['mStatus'] == 1){?><a href="member_function.php?mID=<? echo $row['mID']; ?>&active=0&flag=changstatus"><font color="#006600">ใช้งาน</font></a><? }else{ ?><a href="member_function.php?mID=<? echo $row['mID']; ?>&active=1&flag=changstatus"><font color="#FF0000">ยกเลิกการใช้งาน</font></a><? } ?></strong></td>
          <td width="9%" class="contenttx"><div align="center"><a href="member_edit.php?flag=Editmember&mID=<?php echo $row["mID"]; ?>&offset=<?php echo $offset; ?>&limit=<?php echo $limit; ?>"><font color="#000000"><strong>แก้ไข</strong></font></a></div></td>
          <td width="9%" class="contenttx"><div align="center"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["mID"]; ?>">
          </div></td>
        </tr>
		<?php
			if ($color == "#FFFFFF")
			{
				$color = "#F9F9F9";
			}
			else
			{
				$color = "#FFFFFF";
			}
		}
		?>
        <tr align="right" bgcolor="#FFFFFF">
          <td colspan="9"><input type="hidden" name="flag" value="Delete">
          <input name="Delete" type="submit" class="aceButton" id="Delete" value="  ลบ  " onClick="return confirm('ต้องการลบสมาชิกหรือไม่?');"></td>
        </tr>
		</form>
      </table>
	  
	   <span class="boldbodytx"><br>
	  Page : 
      <?php page($offset,$limit,$totalrows,"&mID=".$mID."","blue","black","black"); ?>
	  </span>
	  
	  <? }else{  echo "<center><font color=#FF0000>No Data.</font></center>"; } ?>
	  
	  
	  <div align="center" class="menutx"><?php echo $msg ; ?></div></td>
        </tr>
      </table>
      <p class="bodytx">&nbsp;</p></td>
  </tr>
  <tr valign="top"> 
    <td colspan="3"><img src="images/spacer.gif" width="200" height="10"></td>
  </tr>
  <tr align="center" valign="top"> 
    <td height="23" colspan="3"><div align="center"> <img src="images/spacer.gif" width="1" height="1"> 
        
      </div>
    </td>
  </tr>
</table>
<?php $db->close() ; ?>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
