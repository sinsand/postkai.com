<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>��Ѥ���Ҫԡ</title>
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
<body>
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
<img src="<?=$page_link?>/images/member_register.jpg" alt="��Ѥ���Ҫԡ" title="��Ѥ���Ҫԡ" /><br />

<div class="alink">

&nbsp;&nbsp;&nbsp;&nbsp;<font color="#CC0000">**</font>&nbsp;&nbsp;��������ѡ�Դ㹡�á�͡��������������Ҫԡ�Ѻ�ҧ���&nbsp;�����Է�Ի���ª��&nbsp;����Ѻ��ҹ�ͧ�������öŧ��С�ȿ��&nbsp;����&nbsp;���&nbsp;������&nbsp;��ѧ�������Ѿ��Ѻ�ҧ��线�������ҧ�����������ӡѴ�ӹǹ���ŧ��С��&nbsp;��سҡ�͡�����Ŵ�ҹ��ҧ���ú�ء��ͧ
</p>
<form name="form1" method="post" action="<?=$page_link?>/member_function.php" onsubmit="return validForm();">
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td colspan="2" align="right" class="mtext1">&nbsp;</td>
    </tr>
          <tr>
            <td width="34%" align="right" class="mtext1"><b>������͡�Թ<font color="#CC0000">*</font> : </b></td>
            <td width="66%">
              <input name="user" type="text" class="box" id="user" size="25" />
            <font color="#CC0000">*��͡�����ŵ���� 6 �֧ 15 ����ѡ��</font></td>
    </tr>
          <tr>
            <td align="right" class="mtext1"><b>���ʼ�ҹ<font color="#CC0000">*</font> : </b></td>
            <td class="mtext1">
              <input name="password" type="password" class="box" id="password" size="25" /> 
              &nbsp;<font color="#CC0000">*��͡�����ŵ���� 6 �֧ 15 ����ѡ��</font></td>
          </tr>
          <tr>
            <td align="right" class="mtext1"><b>�׹�ѹ���ʼ�ҹ<font color="#CC0000">*</font> : </b></td>
            <td class="mtext1">
              <input name="cpassword" type="password" class="box" id="cpassword" size="25" /></td>
          </tr>
          
          <tr>
            <td align="right"><b>�ٻ�Ҿ&nbsp;:</b></td>
            <td>
            <img src="<?=$page_link?>/verify-images.php" alt="�����ٻ�Ҿ" title="�����ٻ�Ҿ" />
			
            </td>
           </tr>
          <tr>
            <td align="right" class="mtext1"><b>�����ٻ�Ҿ<font color="#CC0000">*</font> :</b></td>
            <td class="mtext1">
              <input name="capts" id="capts" type="text" size="25" onkeyup="javascript:this.value=this.value.toUpperCase();" class="box" />
              *��س���������ٻ�Ҿ</td>
          </tr>
          <tr>
            <td colspan="2" align="right">&nbsp;</td>
    </tr>
  </table>
        
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            <td colspan="4">&nbsp;</td>
                            </tr>
                          <tr>
                            <td width="35%" align="right"><b>�ӹ�˹��<font color="#CC0000">*</font> :&nbsp; </b></td>
                            <td width="65%" colspan="3">
                              <select name="title" id="title" class="box" onChange="if(document.getElementById('title').value==1){document.getElementById('titletxt').innerHTML='<input name=title type=text size=10 onkeyup=javascript:this.value=this.value.toUpperCase(); class=box>';}else{document.getElementById('titletxt').innerHTML='';}">
                                <option value="���">���</option>
                                <option value="�ҧ">�ҧ</option>
                                <option value="�ҧ���">�ҧ���</option>
                                <option value="1" >��� �</option>
                              </select>
                            &nbsp;&nbsp;<label id='titletxt'></label></td>
              </tr>
                          <tr>
                            <td align="right"><b>����<font color="#CC0000">*</font>  :&nbsp;</b></td>
                            <td colspan="3"> <input name="fname" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" size="25" class="box" /></td>
                          </tr>
                          <tr>
                            <td align="right"><b>������� :&nbsp; </b></td>
                            <td colspan="3"><input name="mname" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" size="25" class="box" />                            </td>
                          </tr>
                          <tr>
                            <td align="right"><b>���ʡ��<font color="#CC0000">*</font> :&nbsp; </b></td>
                            <td colspan="3"><input name="lname" type="text" onKeyUp="javascript:this.value=this.value.toUpperCase();" size="25" class="box" /></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top"><b>�������<font color="#CC0000">*</font>&nbsp;:&nbsp;</b></td>
                            <td colspan="3"><textarea name="address" cols="45" rows="10" onKeyUp="javascript:this.value=this.value.toUpperCase();" class="box"></textarea></td>
                          </tr>
                          <tr>
                            <td align="right"><b>������ɳ���<font color="#CC0000">*</font> :&nbsp; </b></td>
                            <td colspan="3"><input name="postalcode" type="text" onKeyUp="javascript:this.value=this.value.toUpperCase();" size="25" class="box" /></td>
                          </tr>
                          <tr>
                            <td align="right"><b>���Ѿ�� :&nbsp;</b></td>
                            <td colspan="3"><input name="telephone" type="text" id="telephone" onKeyUp="javascript:this.value=this.value.toUpperCase();" size="25" class="box" /></td>
                          </tr>
                          <tr>
                            <td align="right"><b>�����<font color="#CC0000">*</font> :&nbsp; </b></td>
                            <td colspan="3"><input name="email" type="text" size="25" class="box" /></td>
                          </tr>
                          <tr>
                            <td align="right">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="right">&nbsp;</td>
                            <td colspan="3">&nbsp;
                              <input name="flag" type="hidden" id="flag" value="Add" />
                              <input name="Submit" type="submit" value="��Ѥ���Ҫԡ" />&nbsp;&nbsp;
                              <input name="Submit2" type="reset" value="¡��ԡ" /></td>
                          </tr>
                          
                          <tr>
                            <td colspan="4" align="center">&nbsp;<font color="#CC0000">*</font>&nbsp;�������Ѥ���Ҫԡ�������º��������&nbsp;��ҹ����ö�������к���ѹ�դ�Ѻ</td>
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
