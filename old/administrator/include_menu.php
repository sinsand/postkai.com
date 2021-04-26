<link href="<?php echo $page_link;?>/css/style_text.css" rel="stylesheet" type="text/css">
<table width="160" border="0" cellspacing="1" cellpadding="0">
  <?php
  error_reporting (E_ALL ^ E_NOTICE);
 /* $db = new mydb ;  */
	$permission = "select * from admin where aID = ".$_SESSION['aaID']."" ;
    foreach (select_tb($permission) as $Rpermiss) {
      // code...
    }
   ?>
  <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin_mod.php"><font color="#FFFFFF">˹����ѡ</font></a> </td>
  </tr>

    <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="member_mod.php"><font color="#FFFFFF">��Ҫԡ</font> </a> </td>
  </tr>

  <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="news_mod.php"><font color="#FFFFFF">������ѧ�������Ѿ��</font> </a> </td>
  </tr>

  <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="link_mod.php"><font color="#FFFFFF">�š����</font></a></td>
  </tr>

  <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FFFFFF">��ɳ�ẹ����� C 777x100</font></td>
  </tr>
  <tr>
    <td height="23" class="menutx">
	<ul>
        <li><a href="banner_top_show.php"><font color="#0033669C">ẹ���������ʴ�</font></a></li>
        <!--<li><a href="banner_top_hid.php"><font color="#0033669C">ẹ���������Դ�����</font></a></li>     -->
    </ul>	</td>
  </tr>

    <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FFFFFF">��ɳ�ẹ����� 125x125</font></td>
  </tr>
  <tr>
    <td height="23" class="menutx">
	<ul>
        <li><a href="banner_center_show.php"><font color="#0033669C">ẹ���������ʴ�</font></a></li>
        <!--<li><a href="banner_center_hid.php"><font color="#0033669C">ẹ���������Դ�����</font></a></li>-->
    </ul>	</td>
  </tr>

  <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FFFFFF">��ɳ�ẹ����� B 777x100</font></td>
  </tr>
  <tr>
    <td height="23" class="menutx">
	<ul>
        <li><a href="banner_left_show.php"><font color="#0033669C">ẹ���������ʴ�</font></a></li>
        <!--<li><a href="banner_left_hid.php"><font color="#0033669C">ẹ���������Դ�����</font></a></li>    -->
    </ul>	</td>
  </tr>

 <!-- <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FFFFFF">��ɳ�ẹ����� Right</font></td>
  </tr>
  <tr>
    <td height="23" class="menutx">
	<ul>
        <li><a href="banner_right_show.php"><font color="#0033669C">ẹ���������ʴ�</font></a></li>
        <li><a href="banner_right_hid.php"><font color="#0033669C">ẹ���������Դ�����</font></a></li>
    </ul>
	</td>
  </tr>-->

  <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin_mod.php"><font color="#FFFFFF">��������к�</font> </a> </td>
  </tr>
  <tr>
    <td height="23" bgcolor="#838383" class="menutx">&nbsp;&nbsp;&nbsp;&nbsp;<a href="login_function.php?logout=logout"><font color="#FFFFFF">�͡�ҡ�к�</font></a></td>
  </tr>
</table>
