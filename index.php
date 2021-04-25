<?php
  include ('lib/connect.php') ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>โพสขายฟรี - Postkai.com</title>
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<meta name="robots" content="index,follow" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="shortcut icon" type="image/x-icon" href="<?php echo $page_link;?>/favicon.ico" />
<link rel="stylesheet" type="text/css" href="<?php echo $page_link;?>/css/style.css"/>
<script type="text/javascript" src="<?php echo $page_link;?>/js/checkmember.js"></script>
<script type="text/javascript">
  function bookmark(title,url){
  	if(window.sidebar){ // ????Ѻ firefox
  		window.sidebar.addPanel(title, url, "");
  	}else if(window.opera & window.print){ // ????Ѻ opera
  		var elem = document.createElement('a');
  		elem.setAttribute('href',url);
  		elem.setAttribute('title',title);
  		elem.setAttribute('rel','sidebar');
  		elem.click();
  	}else if(document.all){// ????Ѻ ie
  		window.external.AddFavorite(url, title);
  	}
  }
</script>

</head>
<body>
  <center>
    <!--HEAD-->
    <div class="head">
      <div class="headlogo">
        <a href="<?php echo $page_link;?>" title="">
          <img src="<?=$page_link?>/images/head_sing.jpg" title="" alt="" border="0" />
        </a>
      </div>
      <div class="headmember">
        <!--menu top -->
        <?php
          if($_SESSION["mID"] == ""){
          	?>
            	<form action="<?php echo $page_link;?>/login_function.php"  method="post" name="formlogin" id="formlogin" onsubmit="return validFormlogin();">
                Username <input type="text" size="10" class="textbox_gray" name="user" />
                Password&nbsp;<input type="password" size="10" class="textbox_gray" name="pass" />
                &nbsp;<input name="flag" type="hidden" value="login" />
                <input name="submit" type="submit" value="Login" class="btn" />
                &nbsp;<a href="<?php echo $page_link?>/register" title="Register">Register</a>
                &nbsp;<a href="<?php echo $page_link?>/forgot-password" title="Forgot">Forgot</a>
              </form>
          	<?php
          }else{
          	$selectmember = "select * from member where  mID = '".$_SESSION["mID"]."'" ;
          	$rmember = $db->query($selectmember);
          	$Rmember = mysql_fetch_array($rmember);
          ?>
          �Թ�յ�͹�Ѻ&nbsp;
          	<font color="#FF0066" size="3">
          		<strong><?php echo $Rmember['mUsername'];?></strong>
          	</font>&nbsp;&nbsp;&nbsp;&raquo;<a href="<?php echo $page_link;?>/��������ѧ�������Ѿ��/<?php echo $Rmember['mID'];?>" title="��������ѧ�������Ѿ��">��������ѧ�������Ѿ��</a>&nbsp;&nbsp;&nbsp;&raquo;
          	<a href="<?php echo $page_link;?>/��������ǹ���/<?php echo $Rmember['mID'];?>" title="��������ǹ���">��������ǹ���</a>&nbsp;&nbsp;&nbsp;&raquo;<a href="<?php echo $page_link;?>/�͡�ҡ�к�/logout" title="�͡�ҡ�к�">�͡�ҡ�к�</a>
          <?php
          }
        ?>
        <!--menu top -->
      </div>
    </div>

    <!--MENU-->
    <div class="headmenu">
      <?php include "include-head-menu.php"; ?>
    </div>

    <!--MENUCAT-->
    <div class="headcat">
      <div class="menucat">
        <?php include "include-left-menu.php"; ?>
      </div>
      <div class="banner">
        <?php
          include "include-banner.php";
          include "include-remenu.php";
        ?>
      </div>
    </div>


    <!--CONTENT-->
    <div class="content">
      <div class="lnews">
        <?php
          include "include-news.php";
          include "include-rerandom.php";
        ?>
      </div>
      <div class="rjob">
        <div class="rjobleft">
          <img src="images/20ID.jpg" />
          <?php
            include "include-top10-type.php";
          ?>
          <p class="alignrights">
            <a href="<?php echo $page_link;?>/property-search.php" title="">
              <strong>??ѧ???????Ѿ???????</strong>
            </a>
          </p>
        </div>
        <div class="rjobright">
          <?php
            include "include-right-banner.php";
          ?>
        </div>
      </div>
    </div>

    <!--FOOTER-->
    <div class="footer">
    <?php
      include "include-footer.php";
    ?>
  </div>
  </center>
</body>
</html>
