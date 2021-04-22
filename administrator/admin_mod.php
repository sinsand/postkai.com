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

if ($_SESSION['aAdmin'] == "2"){
$Sel  = "select * from admin  order by aID desc" ; 
}
else if ($_SESSION['aAdmin'] == "1")
{
$Sel  = "select * from admin  where aID != '1' order by aID desc" ; 
}
else
{

$Sel  = "select * from admin where aID =".$_SESSION['aaID']." " ; 

}
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
          <td width="50%" height="30" valign="middle" class="boldbodytx">มี <font color="#009900"><?php echo $totalrows ; ?></font> ผู้ดูแลระบบ</td>
          <td width="58%" height="30" valign="middle" class="boldbodytx"><div align="right"> 
              <?php if ($_SESSION['aAdmin'] == "1" || $_SESSION['aAdmin'] == '2'){ ?>
<a href="admin_add.php"><font color="#000000">เพิ่มผู้ดูแลระบบ</font></a> <?php } ?>
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
        <form action="admin_function.php" method="post">
          <tr bgcolor="#003399" class="menutx"> 
            <td height="25" align=middle bgcolor="#838383"><div align="left" class="boldbodytx"><b><font color="#FFFFFF">ชื่อ - สกุล</font></b></div></td>
           
<td width="11%" height="25" align=middle bgcolor="#838383"><div align="center" class="boldbodytx"><b><font color="#FFFFFF">แก้ไข</font></b></div></td>
            <?php if ($_SESSION['aAdmin'] == "1" || $_SESSION['aAdmin'] == "2"){ ?> <td width="18%" height="25" align=middle bgcolor="#838383"><div align="center" class="boldbodytx"><strong><font color="#FFFFFF">ลบ</font></strong></div></td><?php } ?>
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
            <td height="25" bgcolor="<?php echo $color ; ?>" ><font face="MS Sans Serif, Microsoft Sans Serif" size="2" color="#000000"> 
              <?php echo htmlspecialchars($R['aName']); ?>&nbsp;<?php echo htmlspecialchars($R['aSurname']); ?>
              </font></td>
            <td height="25" bgcolor="<? echo $color ; ?>"><div align="center" class="menutx"><a href="admin_add.php?offset=<?php echo $offset ; ?>&limit=<?php echo $limit ; ?>&flag=Edit&aID=<?php echo $R['aID'] ; ?>"><font color="#000000">แก้ไข</font></a></div></td>
            <?php if ($_SESSION['aAdmin'] == "1" || $_SESSION['aAdmin'] == "2"){ ?>
<td height="25" bgcolor="<? echo $color ; ?>"> <div align="center"> 
                <?php if ($R['aID'] != 1){ ?><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $R['aID'] ; ?>"><?php } ?>
              </div></td><?php } ?>
          </tr>
          <?php $i++; 
} // end while?>
          <tr> 
            <td height="26" colspan=3 align=right bgcolor="#ffffff" class="fixfont"> 
              <div align="right"> 
                <input name="offset" type="hidden" id="offset" value="<?php echo 0 ; ?>">
                <input name="limit" type="hidden" id="limit" value="<?php echo 25 ; ?>">
                <input name="flag" type="hidden" id="flag" value="Delete">
               <?php if ($_SESSION['aAdmin'] == "1" || $_SESSION['aAdmin'] == "2" ){ ?>
<input name="Submit" type="submit" class="aceButton" value="  ลบ  " onClick="return confirm('ต้องการลบผูดูแลระบบใช่หรือไม่?');">
<?php } ?>
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
