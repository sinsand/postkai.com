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

$Sel  = "select * from web_link order by wDate_Create desc" ; 

/***************** Start Seperate ˹�� ****************/
 //    If $offset is set below zero (invalid) or empty, set to zero 
    if (empty($offset) || $offset < 0) { 
        $offset=0; 
    } 
//    Set $limit,  $limit = Max number of results per '˹��' 
$limit = 25;
//    Set $totalrows = total number of rows that unlimited query would return 
//    (total number of records to display across all ˹��s) 
$ExecSel = $db->query($Sel);
$nof = mysql_num_fields($ExecSel); 
$totalrows = $db->numrows($ExecSel);
?>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td height="70" colspan="3" class="contentbody"><font color="#464646" size="8">�������к�</font></td>
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
          <td width="50%" height="30" valign="middle" class="boldbodytx">�� <font color="#009900"><?php echo $totalrows ; ?></font> �����駤�</td>
          <td width="58%" height="30" valign="middle" class="boldbodytx"><div align="right"> 
             
<a href="link_add.php?flag=Add"><font color="#000000">���������駤�</font></a> 
            </div></td>
        </tr>
      </table>
      <?php
if($totalrows != 0){
	// Set $begin and $end to record range of the current ˹�� 
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
        <form action="link_function.php" method="post" enctype="multipart/form-data">
          <tr bgcolor="#003399" class="menutx"> 
            <td height="25" align=middle bgcolor="#838383"><div align="left" class="boldbodytx"><b><font color="#FFFFFF">Banner / URL</font></b></div></td>
           
            <td width="11%" align=middle bgcolor="#838383"><div align="center" class="boldbodytx"><b><font color="#FFFFFF">ʶҹ�</font></b></div></td>
            <td width="11%" height="25" align=middle bgcolor="#838383"><div align="center" class="boldbodytx"><b><font color="#FFFFFF">���</font></b></div></td>
           <td width="18%" height="25" align=middle bgcolor="#838383"><div align="center" class="boldbodytx"><strong><font color="#FFFFFF">ź</font></strong></div></td>
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
              <?php 
			   if ($R['wPic']!="" ) { 
			   check($R['wPic'],"weblink/",88,30,$tooltip);
			   }
			   echo $R['wURL'];
			   ?>
              </font></td>
            <td bgcolor="<? echo $color ; ?>" align="center" class="menutx"><strong>
			
			<? if($R['wStatus'] == 1){?><a href="link_function.php?wID=<? echo $R['wID']; ?>&active=0&flag=changstatus"><font color="#006600">��ҹ</font></a><? }else{ ?><a href="link_function.php?wID=<? echo $R['wID']; ?>&active=1&flag=changstatus"><font color="#FF0000">¡��ԡ�����ҹ</font></a><? } ?></strong>
			</td>
            <td height="25" bgcolor="<? echo $color ; ?>"><div align="center" class="menutx"><a href="link_add.php?offset=<?php echo $offset ; ?>&limit=<?php echo $limit ; ?>&flag=Edit&wID=<?php echo $R['wID'] ; ?>"><font color="#000000">���</font></a></div></td>
           
<td height="25" bgcolor="<? echo $color ; ?>"> <div align="center"> 
                <input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $R['wID'] ; ?>">
              </div></td>
          </tr>
          <?php $i++; 
} // end while?>
          <tr> 
            <td height="26" colspan=4 align=right bgcolor="#ffffff" class="fixfont"> 
              <div align="right"> 
                <input name="offset" type="hidden" id="offset" value="<?php echo 0 ; ?>">
                <input name="limit" type="hidden" id="limit" value="<?php echo 25 ; ?>">
                <input name="flag" type="hidden" id="flag" value="Delete">
               
<input name="Submit" type="submit" class="aceButton" value="  ź  " onClick="return confirm('��ͧ���ź�ẹ�������������?');">
              </div></td>
          </tr>
        </form>
      </table>
      <p align="left" class="menutx">˹��  : 
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
