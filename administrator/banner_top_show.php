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

$Sel  = "select * from banner where bStatus = '1' and bPosition = 'A' order by bDate_Create asc" ; 

/***************** Start Seperate หน้า ****************/
 //    If $offset is set below zero (invalid) or empty, set to zero 
    if (empty($offset) || $offset < 0) { 
        $offset=0; 
    } 
//    Set $limit,  $limit = Max number of results per 'หน้า' 
$limit = 25;
//    Set $totalrows = total number of rows that unlimited query would return 
//    (total number of records to display across all หน้าs) 
$ExecSel = $db->query($Sel);
$nof = mysql_num_fields($ExecSel); 
$totalrows = $db->numrows($ExecSel);
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
          <td width="50%" height="30" valign="middle" class="boldbodytx">มี <font color="#009900"><?php echo $totalrows ; ?></font> แบนเนอร์</td>
          <td width="58%" height="30" valign="middle" class="boldbodytx"><div align="right"> 
             
<a href="banner_add.php"><font color="#000000">เพิ่มแบนเนอร์</font></a> 
            </div></td>
        </tr>
      </table>
      <?php
if($totalrows != 0){
	// Set $begin and $end to record range of the current หน้า 
    $begin =($offset+1); 
    $end = ($begin+($limit-1)); 
    if ($end > $totalrows) { 
        $end = $totalrows; 
    } 
$Show = $Sel." LIMIT $offset, $limit ";
//echo $Show;
//exit();

$ExecShow = $db->query($Show); ?>
      <?php if ($totalrows > 0 ) { ?>
      <table width="100%" border=0 cellpadding=3 cellspacing=1 
                  bgcolor=#efefef>
        <tbody>
        <form action="banner_top_function.php" method="post" enctype="multipart/form-data">
          <tr bgcolor="#003399" class="menutx"> 
            <td width="64%" height="25" align=middle bgcolor="#838383"><div align="left" class="boldbodytx"><b><font color="#FFFFFF">Banner / URL</font></b></div></td>
           
            <td width="10%" align=middle bgcolor="#838383"><div align="center" class="boldbodytx"><b><font color="#FFFFFF">สถานะ</font></b></div></td>
            <td width="11%" align=middle bgcolor="#838383"><div align="center" class="boldbodytx"><font color="#FFFFFF">ระยะเวลา</font></div></td>
            <td width="7%" align=middle bgcolor="#838383"><div align="center" class="boldbodytx"><strong><font color="#FFFFFF">แก้ไข</font></strong></div></td>
            <td width="8%" height="25" align=middle bgcolor="#838383"><div align="center" class="boldbodytx"><strong><font color="#FFFFFF">ลบ</font></strong></div></td>
          </tr>
          <?php
$i = 0;  
 $color ="#F9F9F9" ;   
while($R = mysql_fetch_array($ExecShow )){
                  
   if  ($color =="#FFFFFF" )
 {
$color= "#F9F9F9";
}
else
{
 $color = "#FFFFFF";
}
				   
				   
				   ?>
          <tr valign="middle"   class="bodytx"> 
            <td height="25" bgcolor="<?php echo $color ; ?>" align="center"><font face="MS Sans Serif, Microsoft Sans Serif" size="2" color="#000000"> 
              <?php 
			   if ($R['bPic3']!="" ) { 
					$checkpic =substring($R['bPic3'],-4,4) ;
					$flash = substring($R['bPic3'],0,-4) ; 
					if ($checkpic ==".swf" ){
					?>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="777" height="100">
  <param name="movie" value="../picture_banner/banner-top/<? echo $R['bPic3']; ?>">
  <param name="quality" value="high">
  <embed src="../picture_banner/banner-top/<? echo $R['bPic3']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="495" height="120"></embed>
</object><br>
					<?
					}else{
					echo"<img src='../picture_banner/banner-top/".$R['bPic3']."' align='absmiddle'><br>" ; 
					}
			   }
			   echo $R['bURL'];
			   ?><br>
              (<? echo $R['bTitle']; ?>)</font></td>
            <td bgcolor="<? echo $color ; ?>" align="center" class="menutx"><strong>
			
			<? if($R['bStatus'] == 1){?><a href="banner_top_function.php?bID=<? echo $R['bID']; ?>&active=0&flag=changstatus"><font color="#006600">ใช้งาน</font></a><? }else{ ?><a href="banner_top_function.php?bID=<? echo $R['bID']; ?>&active=1&flag=changstatus"><font color="#FF0000">ยกเลิกการใช้งาน</font></a><? } ?></strong></td>
            <td bgcolor="<? echo $color ; ?>" class="menutx" align="center"><? echo $R['bMonth']; ?>  เดือน</td>
            <td bgcolor="<? echo $color ; ?>" class="menutx"><div align="center"><a href="banner_edit.php?bID=<? echo $R['bID']; ?>">แก้ไข</a></div></td>
            <td height="25" bgcolor="<? echo $color ; ?>"> <div align="center"> 
                <input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $R['bID'] ; ?>">
              </div></td>
          </tr>
          <?php $i++; 
} // end while?>
          <tr> 
            <td height="26" colspan=6 align=right bgcolor="#ffffff" class="fixfont"> 
              <div align="right"> 
                <input name="offset" type="hidden" id="offset" value="<?php echo 0 ; ?>">
                <input name="limit" type="hidden" id="limit" value="<?php echo 25 ; ?>">
                <input name="flag" type="hidden" id="flag" value="Delete">
               
<input name="Submit" type="submit" class="aceButton" value="  ลบ  " onClick="return confirm('ต้องการลบขแบนเนอร์ใช่หรือไม่?');">
              </div></td>
          </tr>
        </form>
      </table>
      <p align="left" class="menutx">หน้า  : 
      <?php page($offset,$limit,$totalrows,"","blue","black","black"); ?>
      </p>
                
        <?php
} }
?>
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
