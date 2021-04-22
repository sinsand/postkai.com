<?php include 'config/isLogon.php' ; 
include '../lib/connect.php' ; ?>
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
$limit = $_GET["limit"] ;
$offset = $_GET["offset"] ;
$db = new mydb;


?>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td height="70" colspan="3" class="contentbody"><font color="#464646" size="8">ผู้ดูแลระบบ</font></td>
  </tr>
  <tr> 
    <td width="160" align="left" valign="top">
<?php include ('include_menu.php') ; ?></td>
    <td width="10" align="left" valign="top"><img src="images/spacer.gif" width="10" height="100"></td>
    <td width="100%" align="left" valign="top"> <table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td colspan="2" valign="top"></td>
        </tr>
        <tr> 
          <td width="50%" height="30" valign="middle" class="boldbodytx"></td>
          <td width="58%" height="30" valign="middle" class="boldbodytx"><div align="right"> 
             
<a href="banner_add.php"></a> 
            </div></td>
        </tr>
      </table>
      </p>
	  <?
	  if (empty($offset) || $offset < 0)
{ 
	$offset=0; 
}

$limit = 25;


$sql = "SELECT * FROM sb_job where mID = '".$_GET['mID']."' ORDER BY jDate_Create DESC";


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

if($totalrows > 0)
{
	  ?>
     
	 <table width="100%" height="58" border="0" cellpadding="0" class="menutx">
      <tr>
        <td>&nbsp;มี <? echo $totalrows ; ?> ประกาศ</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
		<td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td width="53%" style="padding-left:10px;">&nbsp; <b>หัวข้อ</b></td>
        <td width="22%" align="center"><b>ประเภทอสังหาริมทรัพย์</b></td>
        <td width="15%" align="center"><b>อ่าน/ตอบ</b></td>
		<td width="15%" align="center"><b>ลบ</b></td>
      </tr>
	  <?  
	$color = "#FFFFFF";
	while ($row = mysql_fetch_array($result))
	{
	  ?>
      <tr bgcolor="<?php echo $color; ?>">
        <td style="padding-left:10px;">&nbsp;<? echo $row['jID']; ?>. <a href="sing-member-job-show-detail.php?jID=<? echo $row['jID']; ?>" target="_blank">
		<?
			$position=40; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jTitle']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
			?>
		</a>
		<? if($row['jaType'] == 1){echo "<em><font color='#CC0000'>[B]</font></em>";}else if($row['jaType'] == 2){echo "<em><font color='#CC0000'>[S]</font></em>";}else{echo "<em><font color='#CC0000'>[R]</font></em>";} ?>
		<a href="../picture_job_1/<?=$row['jPic1']?>" target="_blank">
			<?
			if($row['jPic1'] != "")
			{
				echo "<img src='../images/pictures.gif' width='16' height='16'  align='absmiddle' border='0' alt='คลิกเพื่อดูรูปใหญ่'>";
			}
			//$select = "select * from rejob where jID = '".$row['jID']."'";
			//$Rselect = $db->query($select);
			//$numselect = mysql_num_rows($Rselect);
		  ?>
		  	</a>		</td>
        <td align="center">
		<? 
		if($row['jType'] == 1)
		{
		echo "House";
		}
		else if($row['jType'] == 2)
		{
		echo "Condo"; 
		}
		else if($row['jType'] == 3)
		{
		echo "Building";
		}
		else if($row['jType'] == 4)
		{
		echo "Land";
		}
		else if($row['jType'] == 5)
		{
		echo "Rent";
		}
		else if($row['jType'] == 6)
		{
		echo "Funiture";
		}
		else if($row['jType'] == 7)
		{
		echo "Car";
		}
		else if($row['jType'] == 8)
		{
		echo "Others";
		}
		?>		 </td>
        <td align="center"><? echo $row['jRead']." : ".$numselect;?></td>
		<td align="center"><a href="sing-member-job-function.php?mID=<? echo $_GET['mID'] ?>&jID=<? echo $row['jID']; ?>&flag=deletejob">ลบ</a></td>
      </tr>  
	  
	  <?
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
	  
    </table>           
<span class="boldbodytx"><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; หน้า : <?php page($offset,$limit,$totalrows,"","blue","black","black"); ?></span>
      <div align="center" class="menutx"><?php echo $msg ; ?></div>
	  <? 
	}else{
	echo "<br><div  align='center'><b><font color='#FF0000'>ยังไม่มีข้อมูล</font><b></div><br>";
	}
	 ?>
	  
	  </td>
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
