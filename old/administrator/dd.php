<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>.:: Administrator ::.</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="css/style_text.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td height="70" colspan="3" class="contentbody"><font color="#464646" size="8">ผู้ดูแลระบบ</font></td>
  </tr>
  <tr> 
    <td width="160" align="left" valign="top">
<link href="../css/style_text.css" rel="stylesheet" type="text/css">
<table width="160" border="0" cellspacing="1" cellpadding="0">
    <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin_mod.php"><font color="#FFFFFF">หน้าหลัก</font></a> </td>
  </tr>
  
    <tr> 
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="member_mod.php"><font color="#FFFFFF">สมาชิก</font> </a> </td>
  </tr>
  
  <tr> 
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="news_mod.php"><font color="#FFFFFF">ข่าวสาร</font> </a> </td>
  </tr>

  <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="link_mod.php"><font color="#FFFFFF">แลกลิ้ง</font></a></td>
  </tr> 

  <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FFFFFF">โฆษณาแบนเนอร์ Top</font></td>
  </tr>
  <tr>
    <td height="23" class="menutx">
	<ul>
        <li><a href="banner_top_show.php"><font color="#0033669C">แบนเนอร์ที่แสดง</font></a></li>
        <li><a href="banner_top_hid.php"><font color="#0033669C">แบนเนอร์ที่ติดต่อมา</font></a></li>      
    </ul>
	</td>
  </tr>
  
    <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FFFFFF">โฆษณาแบนเนอร์ Center</font></td>
  </tr>
  <tr>
    <td height="23" class="menutx">
	<ul>
        <li><a href="banner_center_show.php"><font color="#0033669C">แบนเนอร์ที่แสดง</font></a></li>
        <li><a href="banner_center_hid.php"><font color="#0033669C">แบนเนอร์ที่ติดต่อมา</font></a></li>      
    </ul>
	</td>
  </tr>
  
  <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FFFFFF">โฆษณาแบนเนอร์ Left</font></td>
  </tr>
  <tr>
    <td height="23" class="menutx">
	<ul>
        <li><a href="banner_left_show.php"><font color="#0033669C">แบนเนอร์ที่แสดง</font></a></li>
        <li><a href="banner_left_hid.php"><font color="#0033669C">แบนเนอร์ที่ติดต่อมา</font></a></li>      
    </ul>
	</td>
  </tr>
  
  <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FFFFFF">โฆษณาแบนเนอร์ Right</font></td>
  </tr>
  <tr>
    <td height="23" class="menutx">
	<ul>
        <li><a href="banner_right_show.php"><font color="#0033669C">แบนเนอร์ที่แสดง</font></a></li>
        <li><a href="banner_right_hid.php"><font color="#0033669C">แบนเนอร์ที่ติดต่อมา</font></a></li>      
    </ul>
	</td>
  </tr>

  <tr> 
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin_mod.php"><font color="#FFFFFF">ผู้ดูแลระบบ</font> </a> </td>
  </tr>
  <tr> 
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="login_function.php?logout=logout"><font color="#FFFFFF">ออกจากระบบ</font></a></td>
  </tr>
</table>
</td>
    <td width="10" align="left" valign="top"><img src="images/spacer.gif" width="10" height="100"></td>
    <td width="100%" align="left" valign="top"> <table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td colspan="2" valign="top"></td>
        </tr>
        <tr> 
          <td width="50%" height="30" valign="middle" class="boldbodytx">มี <font color="#009900">1</font> แบนเนอร์</td>
          <td width="58%" height="30" valign="middle" class="boldbodytx"><div align="right"> 
             
<a href="link_add.php?flag=Add"><font color="#000000">เพิ่มเว็บลิ้งค์</font></a> 
            </div></td>
        </tr>
      </table>
                  <table width="100%" border=0 cellpadding=3 cellspacing=1 
                  bgcolor=#efefef>
        <tbody>
        <form action="banner_top_function.php" method="post" enctype="multipart/form-data">
          <tr bgcolor="#003399" class="menutx"> 
            <td width="54%" height="25" align=middle bgcolor="#838383"><div align="left" class="boldbodytx"><b><font color="#FFFFFF">Banner / URL</font></b></div></td>
           
            <td width="15%" align=middle bgcolor="#838383"><div align="center" class="boldbodytx"><b><font color="#FFFFFF">สถานะ</font></b></div></td>
            <td width="13%" align=middle bgcolor="#838383"><div align="center" class="boldbodytx"><font color="#FFFFFF">ระยะเวลา</font></div></td>
            <td width="18%" height="25" align=middle bgcolor="#838383"><div align="center" class="boldbodytx"><strong><font color="#FFFFFF">ลบ</font></strong></div></td>
          </tr>
                    <tr valign="middle"   class="bodytx"> 
            <td height="25" bgcolor="#FFFFFF" ><font face="MS Sans Serif, Microsoft Sans Serif" size="2" color="#000000"> 
              
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="495" height="120">
  <param name="movie" value="../picture_banner/banner-top/Singburin__091015234216.swf">
  <param name="quality" value="high">
  <embed src="../picture_banner/banner-top/Singburin__091015234216.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="495" height="120"></embed>
</object>
dsa              (dsa)</font></td>
            <td bgcolor="#FFFFFF" align="center" class="menutx"><strong>
			
			<a href="banner_top_function.php?bID=3&active=0&flag=changstatus"><font color="#006600">ใช้งาน</font></a></strong></td>
            <td bgcolor="#FFFFFF" class="menutx" align="center">3  เดือน</td>
            <td height="25" bgcolor="#FFFFFF"> <div align="center"> 
                <input name="checkbox[]" type="checkbox" id="checkbox[]" value="3">
              </div></td>
          </tr>
                    <tr> 
            <td height="26" colspan=5 align=right bgcolor="#ffffff" class="fixfont"> 
              <div align="right"> 
                <input name="offset" type="hidden" id="offset" value="0">
                <input name="limit" type="hidden" id="limit" value="25">
                <input name="flag" type="hidden" id="flag" value="Delete">
               
<input name="Submit" type="submit" class="aceButton" value="  ลบ  " onClick="return confirm('ต้องการลบขแบนเนอร์ใช่หรือไม่?');">
              </div></td>
          </tr>
        </form>
      </table>
      <p align="left" class="menutx">หน้า  : 
      <font color="blue">1 </font>      </p>
                
              <div align="center" class="menutx"></div></td>
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
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
