<link href="../css/style_text.css" rel="stylesheet" type="text/css">
<table width="160" border="0" cellspacing="1" cellpadding="0">
  <?php 
  error_reporting (E_ALL ^ E_NOTICE);
 /* $db = new mydb ;  */
	$permission = "select * from admin where aID = ".$_SESSION['aaID']."" ; 
  		$rpermiss = $db->query($permission) ; 
		$Rpermiss = mysql_fetch_array($rpermiss) ;

   ?>
  <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin_mod.php"><font color="#FFFFFF">หน้าหลัก</font></a> </td>
  </tr>
  
    <tr> 
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="member_mod.php"><font color="#FFFFFF">สมาชิก</font> </a> </td>
  </tr>
  
  <tr> 
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="news_mod.php"><font color="#FFFFFF">ข่าวอสังหาริมทรัพย์</font> </a> </td>
  </tr>

  <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="link_mod.php"><font color="#FFFFFF">แลกลิ้ง</font></a></td>
  </tr> 

  <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FFFFFF">โฆษณาแบนเนอร์ C 777x100</font></td>
  </tr>
  <tr>
    <td height="23" class="menutx">
	<ul>
        <li><a href="banner_top_show.php"><font color="#0033669C">แบนเนอร์ที่แสดง</font></a></li>
        <!--<li><a href="banner_top_hid.php"><font color="#0033669C">แบนเนอร์ที่ติดต่อมา</font></a></li>     --> 
    </ul>	</td>
  </tr>
  
    <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FFFFFF">โฆษณาแบนเนอร์ 125x125</font></td>
  </tr>
  <tr>
    <td height="23" class="menutx">
	<ul>
        <li><a href="banner_center_show.php"><font color="#0033669C">แบนเนอร์ที่แสดง</font></a></li>
        <!--<li><a href="banner_center_hid.php"><font color="#0033669C">แบนเนอร์ที่ติดต่อมา</font></a></li>-->      
    </ul>	</td>
  </tr>
  
  <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FFFFFF">โฆษณาแบนเนอร์ B 777x100</font></td>
  </tr>
  <tr>
    <td height="23" class="menutx">
	<ul>
        <li><a href="banner_left_show.php"><font color="#0033669C">แบนเนอร์ที่แสดง</font></a></li>
        <!--<li><a href="banner_left_hid.php"><font color="#0033669C">แบนเนอร์ที่ติดต่อมา</font></a></li>    -->  
    </ul>	</td>
  </tr>
  
 <!-- <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FFFFFF">โฆษณาแบนเนอร์ Right</font></td>
  </tr>
  <tr>
    <td height="23" class="menutx">
	<ul>
        <li><a href="banner_right_show.php"><font color="#0033669C">แบนเนอร์ที่แสดง</font></a></li>
        <li><a href="banner_right_hid.php"><font color="#0033669C">แบนเนอร์ที่ติดต่อมา</font></a></li>      
    </ul>
	</td>
  </tr>-->

  <tr> 
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin_mod.php"><font color="#FFFFFF">ผู้ดูแลระบบ</font> </a> </td>
  </tr>
  <tr> 
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="login_function.php?logout=logout"><font color="#FFFFFF">ออกจากระบบ</font></a></td>
  </tr>
</table>
