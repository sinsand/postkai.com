<?php session_start();
include 'lib/connect.php' ;
include 'config/isLogon.php' ; 
$db = new mydb ;

$select = "select  *  from member  where mID='".$_SESSION['mID']."'";
$result= $db->query($select) ; 
$row = mysql_fetch_array($result);
$old_user = urldecode($row['mUsername']) ; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>��䢢�������ǹ���</title>
<meta name="Keywords" content="��ѧ�������Ѿ��,��ѧ��,����,���,������,��ҹ,��ҹ����ͧ,��ҹ�����,��ҹ�Ѵ���,���ͺ�ҹ����ͧ,���͢�º�ҹ,ŧ��С�ȿ��,��ǹ�������,���ͷ�ǹ�������,��·��Թ,���ͷ��Թ,���ͤ͹�������,��¤͹�������,��Ҥ͹�������,����ö¹������ͧ,���ö¹������ͧ,���ö¹��,��ͧ���" />
<meta name="Description" content="��ѧ�������Ѿ�� ��ѧ�� ���� ��� ������ ��ҹ ��ҹ����ͧ ��ҹ����� ��ҹ�Ѵ��� ���ͺ�ҹ����ͧ ���͢�º�ҹ ŧ��С�ȿ�� ��ǹ������� ���ͷ�ǹ������� ��·��Թ ���ͷ��Թ ���ͤ͹������� ��¤͹������� ��Ҥ͹������� ����ö¹������ͧ ���ö¹������ͧ ���ö¹�� ��ͧ���" />
<meta name="robots" content="index,follow" />
<meta name="stats-in-th" content="f0f5" />
<link href="<?=$page_link?>/css/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="<?=$page_link?>/favicon.ico" />
<script type="text/javascript" src="<?=$page_link?>/js/checkmember.js"></script>
<script type="text/javascript">
function bookmark(title,url){
	if(window.sidebar){ // ����Ѻ firefox
		window.sidebar.addPanel(title, url, "");
	}else if(window.opera & window.print){ // ����Ѻ opera
		var elem = document.createElement('a');
		elem.setAttribute('href',url);
		elem.setAttribute('title',title);
		elem.setAttribute('rel','sidebar');
		elem.click();
	}else if(document.all){// ����Ѻ ie
		window.external.AddFavorite(url, title);
	}	
}
</script>
</head>
<body onload="document.getElementById('word-search').focus();<?php if($row['mTitle'] != '���' && $row['mTitle'] != '�ҧ' && $row['mTitle'] != '�ҧ���') { ?>document.form1.title.value=1;<?php } ?>if(document.form1.title.value==1){document.getElementById('titletxt').innerHTML='<input name=title type=text size=10 value=<?php echo $row['mTitle'] ; ?>  onkeyup=javascript:this.value=this.value.toUpperCase(); id=titles >';}else{document.getElementById('titletxt').innerHTML='';}">
<center>
<!--HEAD-->
<div class="head">
<div class="headlogo"><? include "include-logo.php"; ?></div>
<div class="headmember">
<? include "include-member-menu.php"; ?>
</div>
</div>

<!--MENU-->
<div class="headmenu"><? include "include-head-menu.php"; ?></div>

<!--MENUCAT-->
<div class="headcat">
<div class="menucat"><? include "include-left-menu.php"; ?></div>
<div class="banner"><? include "include-banner.php"; ?><? include "include-remenu.php"; ?></div>
</div>


<!--CONTENT-->
<div class="content">
<div class="lnews"><? include "include-news.php"; ?><? include "include-rerandom.php"; ?></div>

<div class="rjob">
<div class="rjobleft">
<img src="<?=$page_link?>/images/member_edit.jpg" alt="��������ѧ�������Ѿ��ͧ�س" title="��������ѧ�������Ѿ��ͧ�س" /><br />

<div class="alink">

<p style="padding-left:100px;">
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#CC0000">**</font>&nbsp;&nbsp;��سҡ�͡�����Ŵ�ҹ��ҧ���ú�ء��ͧ
</p>
<form name="form1" method="post" action="<?=$page_link?>/member_function.php" onSubmit="return validFormedit();">
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="36%" align="right"><b>������͡�Թ : </b></td>
            <td width="64%">
              <?=$row['mUsername']?></td>
    </tr>
          <tr>
            <td align="right"><b>���ʼ�ҹ���<font color="#CC0000">*</font> :</b></td>
            <td class="mtext1"><input name="password-old" type="password" class="box" id="password-old" size="25" /></td>
          </tr>
          <tr>
            <td align="right"><b>���ʼ�ҹ����<font color="#CC0000">*</font> : </b></td>
            <td class="mtext1">
              <input name="password-new1" type="password" class="box" id="password-new1" size="25" /></td>
          </tr>
          <tr>
            <td align="right"><b>�׹�ѹ���ʼ�ҹ����<font color="#CC0000">*</font> : </b></td>
            <td class="mtext1">
              <input name="cpassword-re-new1" type="password" class="box" id="cpassword-re-new1" size="25" /></td>
          </tr>
  </table>
        
<table width="100%" border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            <td colspan="4">&nbsp;</td>
                            </tr>
                          <tr>
                            <td width="38%" align="right"><b>�ӹ�˹��<font color="#CC0000">*</font> :&nbsp; </b></td>
                            <td width="62%" colspan="3">
                              <select name="title" class="box" id="title" onChange="if(document.getElementById('title').value==1){document.getElementById('titletxt').innerHTML='<input name=titles type=text size=10  onkeyup=javascript:this.value=this.value.toUpperCase();  id=titles class=box>';}else{document.getElementById('titletxt').innerHTML='';}">
                                <option value="���" <?php if($row['mTitle'] == '���') { echo "selected" ; } ?>>���</option>
                                <option value="�ҧ"  <?php if($row['mTitle'] == '�ҧ') { echo "selected" ; } ?>>�ҧ</option>
                                <option value="�ҧ���" <?php if($row['mTitle'] == '�ҧ���') { echo "selected" ; } ?>>�ҧ���</option>
                                <option value="1">��� �</option>
                              </select>
                            &nbsp;&nbsp;<label id='titletxt'></label></td>
                          </tr>
                          <tr>
                            <td align="right"><b>����<font color="#CC0000">*</font>  :&nbsp;</b></td>
                            <td colspan="3"> <input name="fname" id="fname" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" size="25" value="<?=$row['mName']?>" /></td>
                          </tr>
                          <tr>
                            <td align="right"><b>������� :&nbsp; </b></td>
                            <td colspan="3"><input name="mname" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" size="25" value="<?=$row['mMname']?>" /></td>
                          </tr>
                          <tr>
                            <td align="right"><b>���ʡ��<font color="#CC0000">*</font> :&nbsp; </b></td>
                            <td colspan="3"><input name="lname" id="lname" type="text" onKeyUp="javascript:this.value=this.value.toUpperCase();" size="25" value="<?=$row['mLname']?>" /></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top"><b>�������<font color="#CC0000">*</font>&nbsp;:&nbsp;</b></td>
                            <td colspan="3"><textarea name="address" id="address" cols="45" rows="10" onKeyUp="javascript:this.value=this.value.toUpperCase();"><?=$row['mAddress']?></textarea></td>
                          </tr>
                          <tr>
                            <td align="right"><b>������ɳ���<font color="#CC0000">*</font> :&nbsp; </b></td>
                            <td colspan="3"><input name="postalcode" id="postalcode" type="text" onKeyUp="javascript:this.value=this.value.toUpperCase();" size="25" value="<?=$row['mPostalcode']?>" /></td>
                          </tr>
                          <tr>
                            <td align="right"><b>���Ѿ�� :&nbsp;</b></td>
                            <td colspan="3"><input name="telephone" type="text" id="telephone" onKeyUp="javascript:this.value=this.value.toUpperCase();" size="25" value="<?=$row['mTelephone']?>" /></td>
                          </tr>
                          <tr>
                            <td align="right"><b>����� :&nbsp; </b></td>
                            <td colspan="3"><input name="email" id="email" type="text" size="25" value="<?=$row['mEmail']?>" /></td>
                          </tr>
                          <tr>
                            <td align="right">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="right">&nbsp;</td>
                            <td colspan="3">&nbsp;
                              <input name="flag" type="hidden" id="flag" value="Editmember" />
                              <input name="Submit" type="submit" value="�����Ҫԡ" />&nbsp;&nbsp;
                              <input name="Submit2" type="reset" value="¡��ԡ" /></td>
                          </tr>
                          
                          <tr>
                            <td colspan="4" align="center">&nbsp;</td>
          </tr>
                        </table>

</form>


<p align="center"><font color="#B4B4B4">--------------------------------------------------------------------------------------------------------------------------------</font></p>
</div>
</div>



<div class="rjobright"><? include "include-right-banner.php"; ?></div>

</div>
</div>

<!--FOOTER-->
<div class="footer"><br /><? include "include-footer.php"; ?></div>

</center>
</body>
</html>
