<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index,follow" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php 
      if ($post_domain=="postkai.com" || $post_domain=="www.postkai.com") {
        ?>
          <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-57x57.png">
          <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-60x60.png">
          <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-72x72.png">
          <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-76x76.png">
          <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-114x114.png">
          <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-120x120.png">
          <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-144x144.png">
          <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-152x152.png">
          <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $LinkWeb;?>images/system/logo/apple-icon-180x180.png">
          <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $LinkWeb;?>images/system/logo/android-icon-192x192.png">
          <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $LinkWeb;?>images/system/logo/favicon-32x32.png">
          <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $LinkWeb;?>images/system/logo/favicon-96x96.png">
          <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $LinkWeb;?>images/system/logo/favicon-16x16.png">
          <link rel="manifest" href="<?php echo $LinkWeb;?>images/system/logo/manifest.json">
          <meta name="msapplication-TileColor" content="#ffffff">
          <meta name="msapplication-TileImage" content="<?php echo $LinkWeb;?>images/system/logo/ms-icon-144x144.png">
          <meta name="theme-color" content="#ffffff">
        <?php 
      }elseif ($post_domain=="meekai.com" || $post_domain=="www.meekai.com") {
        ?>
          <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $LinkWeb;?>images/system/logo/meekai.com/fav_icon/apple-touch-icon.png">
          <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $LinkWeb;?>images/system/logo/meekai.com/fav_icon/favicon-32x32.png">
          <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $LinkWeb;?>images/system/logo/meekai.com/fav_icon/favicon-16x16.png">
          <link rel="manifest" href="<?php echo $LinkWeb;?>images/system/logo/meekai.com/fav_icon/site.webmanifest">
          <link rel="mask-icon" href="<?php echo $LinkWeb;?>images/system/logo/meekai.com/fav_icon/safari-pinned-tab.svg" color="#5bbad5">
          <meta name="msapplication-TileColor" content="#da532c">
          <meta name="theme-color" content="#ffffff">
        <?php 
      }
    ?>
	  <link href="https://cdn.lazywasabi.net/fonts/Anuphan/Anuphan.css?woff2" rel="stylesheet" />
    <?php
      if (empty($UrlPage)) {
        ?>
        <title>โพสขายฟรี ลงประกาศฟรี ลงขายออนไลน์ ลงขายฟรี - <?php echo $post_domain ;?></title>
        <meta name="keywords" content="ลงประกาศฟรี,ลงขายออนไลน์,โพสขายฟรี,ลงขายฟรี" />
        <meta name="description" content="เว็บไซต์ยอดนิยมให้บริการออนไลน์ โพสขายลงประกาศขายบ้านฟรี ลงประกาศขาย ซื้อ ให้เช่า ประกาศและบริการต่างๆ ฟรีไม่มีข้อผูกมัดแค่ทำตามเงื่อนไข" />
        <?php
      }
      if ($UrlPage=="post") {
        if (!empty($UrlId)) {
          $SqlSelectPost = "SELECT *
                            FROM sb_job
                            WHERE ( jID = '".$UrlId."' )";
          if (select_num($SqlSelectPost)>0) {
            foreach (select_tb($SqlSelectPost) as $rowpost) {
              ?>
              <title><?php echo $rowpost['jTitle'];?> - <?php echo $post_domain ;?></title>
              <meta name="keywords" content="ลงประกาศฟรี,ลงขายออนไลน์" />
              <meta name="description" content="<?php echo $rowpost['jDetail'];?>" />
              <meta property="og:title" content="<?php echo $rowpost['jTitle'];?>"/>
              <meta property="og:description" content="<?php echo $rowpost['jDetail'];?>"/>
              <meta property="og:url" content="<?php echo $LinkPath;?>"/>
              <meta property="og:site_name" content="- <?php echo $post_domain ;?> ลงประกาศฟรี เว็บไซต์ยอดนิยมให้บริการออนไลน์"/>
              <meta property="og:locale" content="th_TH"/>
              <meta property="og:type" content="website"/>
              <!--<meta property="fb:admins" content="102845294863081" />-->
              <?php
              if (!empty($rowpost['jPic1']) || $rowpost['jPic1']!="") {
                ?><meta property="og:image" content="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $rowpost['jPic1'];?>"/><?php
                ?><meta property="og:image:secure_url" content="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $rowpost['jPic1'];?>"/><?php
              }else {
                ?><meta property="og:image:secure_url" content="<?php echo $LinkWeb;?>"/><?php
              }
            }
          }
        }
      }
      if ($UrlPage=="post-all") {
        $P_Per_Page = 50;
        $P_Page = $_GET['page'];
        if(!$P_Page){
          $P_Page = 1;
        }
        $P_Prev_Page = $P_Page-1;
        $P_Next_Page = $P_Page+1;
        $SqlSelectPostAll = "SELECT sj.*,pt.name_Type,p.PROVINCE_NAME,pc.name_category
                            FROM sb_job sj
                            INNER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                            INNER JOIN p_category pc ON (sj.jType = pc.id_category)
                            INNER JOIN p_province p  ON (sj.jProvince = p.PROVINCE_ID)
                            WHERE (
                                    ( sj.jStatus = '1' )
                                  )
                            ORDER BY sj.jDate_Create DESC ";
        $P_Page_Start = (($P_Per_Page*$P_Page)-$P_Per_Page);
        if(select_num($SqlSelectPostAll)<=$P_Per_Page){
          $P_Num_Pages =1;
        }
        else if((select_num($SqlSelectPostAll) % $P_Per_Page)==0){
          $P_Num_Pages =(select_num($SqlSelectPostAll)/$P_Per_Page) ;
        }else{
          $P_Num_Pages =(select_num($SqlSelectPostAll)/$P_Per_Page)+1;
          $P_Num_Pages = (int)$P_Num_Pages;
        }
        $id_run = $Page_Start+1;
        $SqlSelectPostAll .= " LIMIT $P_Page_Start,1; ";
        if (select_num($SqlSelectPostAll)>0) {
          foreach (select_tb($SqlSelectPostAll) as $rowtype) {
            ?>
            <title><?php echo $rowtype['jTitle'];?> ลงประกาศฟรี - <?php echo $post_domain;?></title>
            <meta name="keywords" content="ค้นหา <?php echo $rowtype['jTitle'];?>,ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
            <meta name="description" content="ค้นหา <?php echo $rowtype['jDetail'];?>" />
            <?php
          }
        }
      }
      if ($UrlPage=="search") {
        if (!empty($_GET['keywords'])) {
          ////// search all
          $SqlSelectsearch = "SELECT sj.*,pt.name_Type,p.PROVINCE_NAME,pc.name_category
                              FROM sb_job sj
                              INNER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                              INNER JOIN p_category pc ON (sj.jType = pc.id_category)
                              INNER JOIN p_province p  ON (sj.jProvince = p.PROVINCE_ID)
                              WHERE (
                                      ( sj.jStatus = '1' ) AND
                                      ( sj.jTitle LIKE '%".$_GET['keywords']."%' ) AND
                                      ( pc.id_category = '".$_GET['category']."' ) AND
                                      ( p.PROVINCE_ID = '".$_GET['province']."' ) AND
                                      ( pt.id_Type = '".$_GET['type']."' )
                                    )
                              ORDER BY sj.jDate_Create DESC
                              LIMIT 0,1;";
          if (select_num($SqlSelectsearch)>0) {
            foreach (select_tb($SqlSelectsearch) as $rowtype) {
              ?>
              <title>ค้นหา <?php echo $rowtype['jTitle'];?> ลงประกาศฟรี - <?php echo $post_domain;?></title>
              <meta name="keywords" content="ค้นหา <?php echo $rowtype['jTitle'];?>,ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
              <meta name="description" content="ค้นหา <?php echo $rowtype['jDetail'];?>" />
              <?php
            }
          }
        }else{
          if (!empty($_GET['province']) &&  empty($_GET['type']) && empty($_GET['category'])) {
            ////// province
            $SqlSelectsearch = "SELECT PROVINCE_NAME
                                FROM p_province
                                WHERE ( PROVINCE_ID = '".$_GET['province']."' );";
            if (select_num($SqlSelectsearch)>0) {
              foreach (select_tb($SqlSelectsearch) as $rowtype) {
                ?>
                <title>ประกาศจังหวัด<?php echo $rowtype['PROVINCE_NAME'];?> ลงประกาศฟรี - <?php echo $post_domain;?></title>
                <meta name="keywords" content="จังหวัด<?php echo $rowtype['PROVINCE_NAME'];?>,ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
                <meta name="description" content="จังหวัด<?php echo $rowtype['PROVINCE_NAME'];?> เว็บไซต์ยอดนิยมให้บริการออนไลน์ ลงประกาศขายบ้านฟรี ลงประกาศขาย ซื้อ ให้เช่า ประกาศและบริการต่างๆ ฟรีไม่มีข้อผูกมัดแค่ทำตามเงื่อนไข" />
                <?php
              }
            }
          }else if (empty($_GET['province']) &&  !empty($_GET['type']) && empty($_GET['category'])) {
            ////// type
            $SqlSelectsearch = "SELECT name_Type
                                FROM p_type
                                WHERE ( id_Type = '".$_GET['type']."' ) ;";
            if (select_num($SqlSelectsearch)>0) {
              foreach (select_tb($SqlSelectsearch) as $rowtype) {
                ?>
                <title>หมวดหมู่ <?php echo $rowtype['name_Type'];?> ลงประกาศฟรี - <?php echo $post_domain;?></title>
                <meta name="keywords" content="<?php echo $rowtype['name_Type'];?>,ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
                <meta name="description" content="<?php echo $rowtype['name_Type'];?> เว็บไซต์ยอดนิยมให้บริการออนไลน์ ลงประกาศขายบ้านฟรี ลงประกาศขาย ซื้อ ให้เช่า ประกาศและบริการต่างๆ ฟรีไม่มีข้อผูกมัดแค่ทำตามเงื่อนไข" />
                <?php
              }
            }
          }elseif (empty($_GET['province']) &&  empty($_GET['type']) && !empty($_GET['category'])) {
            ////// category
            $SqlSelectsearch = "SELECT sj.*,pc.name_category
                                FROM sb_job sj
                                INNER JOIN p_category pc ON (sj.jType = pc.id_category)
                                WHERE (
                                        ( sj.jStatus = '1' ) AND
                                        ( pc.id_category = '".$_GET['category']."' )
                                      )
                                ORDER BY sj.jDate_Create DESC
                                LIMIT 0,1;";
            if (select_num($SqlSelectsearch)>0) {
              foreach (select_tb($SqlSelectsearch) as $rowtype) {
                ?>
                <title>ค้นหา <?php echo $rowtype['jTitle'];?> ลงประกาศฟรี - <?php echo $post_domain;?></title>
                <meta name="keywords" content="ค้นหา <?php echo $rowtype['jTitle'];?>,ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
                <meta name="description" content="ค้นหา <?php echo $rowtype['jDetail'];?>" />
                <?php
              }
            }
          }else {
            ?>
            <title>ค้นหาประกาศฟรี - <?php echo $post_domain;?></title>
            <meta name="keywords" content="ค้นหาประกาศฟรี ,ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
            <meta name="description" content="ค้นหาลงประกาศฟรี ประกาศขาย ประกาศบริการ ทั่วประเทศ ใช้งานฟรีไม่จำกัด เข้าชมประกาศได้ฟรีตลอด 24ชม." />
            <?php
          }
        }
      }
      if ($UrlPage=="policy") {
        ?>
        <title>นโยบายการให้บริการ ลงประกาศฟรี - <?php echo $post_domain;?></title>
        <meta name="keywords" content="นโยบาย,นโยบายการให้บริการลงประกาศ,ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
        <meta name="description" content="ห้ามโพสประกาศขายสิ่งผิดกฏหมายทุกชนิด การพนัน, เว็บลามก, ยาผิดกฏหมายทุกชนิด, บริการทางเพศ ฯลฯ หากพบเห็นจะลบประกาศทันที ห้ามโพสข้อความหรือสิ่งใดที่เป็นการดูหมิ่นสถาบันพระมหากษัตริย์โดยเด็ดขาด" />
        <?php
      }
      if ($UrlPage=="term-and-condition") {
        ?>
        <title>กฏ กติกา ระเบียบข้อบังคับ ลงประกาศฟรี - <?php echo $post_domain;?></title>
        <meta name="keywords" content="ระเบียบข้อบังคับ,ข้อบังคับลงประกาศ,ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
        <meta name="description" content="ห้ามโพสข้อความหรือสิ่งใดที่เป็นการดูหมิ่นสถาบันพระมหากษัตริย์ โดยเด็ดขาด เว็บไซต์ <?php echo $post_domain;?> เป็นเว็บไซต์ให้บริการประกาศโฆษณาฟรี หรือ ประชาสัมพันธ์เว็บไซต์เพื่อการค้าขายบนอินเตอร์เน็ต (อี-คอมเมิร์ซ) เท่านั้นเว็บไซต์" />
        <?php
      }
      if ($UrlPage=="login") {
        ?>
        <title>เข้าสู่ระบบ ลงประกาศฟรี  - <?php echo $post_domain;?></title>
        <meta name="keywords" content="เข้าสู่ระบบ,เข้าสู่ระบบลงประกาศ,ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
        <meta name="description" content="เข้าสู่ระบบ เว็บไซต์ยอดนิยมให้บริการออนไลน์ ลงประกาศขายบ้านฟรี ลงประกาศขาย ซื้อ ให้เช่า ประกาศและบริการต่างๆ ฟรีไม่มีข้อผูกมัดแค่ทำตามเงื่อนไข" />
        <?php
      }
      if ($UrlPage=="register") {
        ?>
        <title>สมัครสมาชิก ลงประกาศฟรี ไม่มีค่าบริการ - <?php echo $post_domain;?></title>
        <meta name="keywords" content="สมัครสมาชิก,สมัครลงประกาศ,ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
        <meta name="description" content="สมัครสมาชิก เว็บไซต์ยอดนิยมให้บริการออนไลน์ ลงประกาศขายบ้านฟรี ลงประกาศขาย ซื้อ ให้เช่า ประกาศและบริการต่างๆ ฟรีไม่มีข้อผูกมัดแค่ทำตามเงื่อนไข" />
        <?php
      }
      if ($UrlPage=="post-new") {
        ?>
        <title>ลงประกาศฟรี ไม่มีค่าบริการ - <?php echo $post_domain;?></title>
        <meta name="keywords" content="ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
        <meta name="description" content="ลงประกาศฟรี เว็บไซต์ยอดนิยมให้บริการออนไลน์ ลงประกาศขายบ้านฟรี ลงประกาศขาย ซื้อ ให้เช่า ประกาศและบริการต่างๆ ฟรีไม่มีข้อผูกมัดแค่ทำตามเงื่อนไข" />
        <?php
      }
    ?>
    <?php 
      if ($post_domain=="postkai.com" || $post_domain=="www.postkai.com") {
        ?>
          <meta name="ahrefs-site-verification" content="ef41621adceccd652e8ace8ababb7c711563215a3e240731bd817ed91dec76e9">
          <!-- Global site tag (gtag.js) - Google Analytics -->
          <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163704899-7"></script>
          <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-163704899-7');
          </script>
        <?php 
      }elseif ($post_domain=="meekai.com" || $post_domain=="www.meekai.com") {
        ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-HD8LNTE4GV"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-HD8LNTE4GV');
        </script>
        <?php 
      }

      ?>
    <!-- Ads Adsense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6703509271619714" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="<?php echo $LinkWeb;?>css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit|Sarabun">
    <link rel="stylesheet" href="<?php echo $LinkWeb;?>plugins/summernote/summernote.css">
    <link rel="stylesheet" href="<?php echo $LinkWeb;?>plugins/photoswipe-4.1.3/dist/photoswipe.css">
    <link rel="stylesheet" href="<?php echo $LinkWeb;?>plugins/photoswipe-4.1.3/dist/default-skin/default-skin.css">
    <!-- Ads involasia -->
    <script type="text/javascript" src="https://xhr.invl.co/magic/577796/auto.js"></script>
    <link rel="stylesheet" href="<?php echo $LinkWeb;?>css/font-awesome-animation.min.css">
    
    
    
  </head>
  <body data-spy="scroll">
    <!-- Logo and ads -->
    <div class="container">
      <div class="row" style="margin:20px 0;">
        <div class="col-sm-2" style="padding:0px;">
          <a href="<?php echo $LinkWeb;?>" class="col-xs-12 p-0">
          <?php 
            if ($post_domain=="www.postkai.com" || $post_domain=="postkai.com") {
              ?><img src="<?php echo $LinkWeb;?>images/system/Logo-postkai.png" style="width:120px;height:auto;" class="col-sm-12 hidden-xs" alt="Logo"><?php
            }elseif ($post_domain=="www.meekai.com" || $post_domain=="meekai.com") {
              ?><img src="<?php echo $LinkWeb;?>images/system/logo-meekai.png" style="width:120px;height:auto;" class="col-sm-12 hidden-xs" alt="Logo"><?php
            }
          ?>
          </a>
        </div>
        <div class="col-sm-10 p-0 text-left">
          <a href="https://bit.ly/3gwUthO" target="_blank">
			  <img src="<?php echo $LinkWeb;?>images/data_ban/robo2.gif" style="width:100%;height:auto;" border="0" />
		  </a>
          <!--<a href="<?php echo $LinkWeb;?>">
            <img src="<?php echo $LinkWeb;?>images/system/ads-banner-top.jpg" class="col-xs-12 p-0" alt="ads Banner" />
          </a>-->
        </div>
      </div>
    </div>
    <!-- Logo and ads -->

    <div class="container">
      <!-- Menu-->
      <nav class="navbar navbar-default navbar-inverse navbar-new">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand hidden-sm hidden-md hidden-lg" href="<?php echo $LinkWeb;?>">โพสขายฟรี</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li <?php echo empty($UrlPage)?" class='active' ":"";?>><a href="<?php echo $LinkWeb;?>"><?php echo $translations["home"];?></a></li>
              <li <?php echo $UrlPage=="search"?" class='active' ":"";?>><a href="<?php echo $LinkWeb;?>search"><?php echo $translations["search"];?></a></li>
			  <li <?php echo $UrlPage=="post-all"?" class='active' ":"";?>><a href="<?php echo $LinkWeb;?>post-all"><?php echo $translations["post-all"];?></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $translations["type-search"];?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <?php
                    $SqlSelect = "SELECT *
                                  FROM p_type
                                  ORDER BY name_Type ASC ;";
                    if (select_num($SqlSelect)>0) {
                      foreach (select_tb($SqlSelect) as $row) {
                        ?><li><a href="<?php echo $LinkWeb;?>search/?type=<?php echo $row['id_Type'];?>"><?php echo $row['name_Type'];?></a></li><?php
                      }
                    }
                  ?>
                </ul>
              </li>
              <li <?php echo $UrlPage=="post-new"?" class='active' ":"";?>><a href="<?php echo $LinkWeb;?>post-new" class="blink_me"><?php echo $translations["post-new"];?></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <?php
              if (empty($_COOKIE["uid"])) {
                ?>
                <li <?php echo $UrlPage=="login"?" class='active' ":"";?>><a href="<?php echo $LinkWeb;?>login"><?php echo $translations["login-submit"];?></a></li>
                <li <?php echo $UrlPage=="register"?" class='active' ":"";?>><a href="<?php echo $LinkWeb;?>register"><?php echo $translations["register-header"];?></a></li>
                <?php
              }else {
                ?>
                <li <?php echo $UrlPage=="member"?" class='active' ":"";?>><a href="<?php echo $LinkWeb;?>member"><?php echo $translations["login-profile"];?></a></li>
                <li><a href="<?php echo $LinkWeb;?>logout"><?php echo $translations["login-logout"];?></a></li>
                <?php
              }
              ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
      <!-- Menu-->

      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9">
          <?php
              switch (trim($UrlPage)) {
                case 'home'             : include("main-dashboard.php"); break;
                case 'search'           : include("view-search.php"); break;
                case 'province'         : include("view-province.php"); break;
                case 'post'             : include("view-post-detail.php"); break;
                case 'post-all'         : include("view-post-all.php"); break;
                case 'post-new'         : include("view-post-new.php"); break;
                case 'post-edit'        : include("view-post-edit.php"); break;

                case 'login'            : include("view-login.php"); break;
                case 'view-verification': include("view-verification.php"); break;
                case 'register'         : include("view-register.php"); break;
                case 'forgot'           : include("view-forgot.php"); break;

                case 'member'           : include("view-member.php"); break;
                case 'preview'           : include("view-preview.php"); break;
                case 'cron-file'           : include("cron-file.php"); break;


                case 'policy'           : include("view-policy.php"); break;
                case 'sitemap'          : include("view-sitemap.php"); break;
                case 'term-and-condition'  : include("view-term-and-condition.php"); break;

                case 'logout'           : setcookie("uid", null, time()-86400,'/');
                                          setcookie("mid", null, time()-86400,'/');
                                          unset($_COOKIE["mid"]);
                                          unset($_COOKIE["uid"]);

                                          session_unset();
                                          session_destroy();
                                          header("Location:".$LinkWeb);break;

                default                 : include("main-dashboard.php"); break;
              }
          ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3">
          <?php
            if ($UrlPage!='search') {
              ?>
              <div class="row">
                <div class="col-xs-12">
                  <h2 class="main-head-cate t-search f-k"><?php echo $translations["search"];?></h2>
                  <div class="col-xs-12 p-0">
                    <form action="<?php echo $LinkWeb;?>search/" method="get">
                      <div class="form-group">
                        <label for="email"><?php echo $translations["message-search"];?></label>
                        <input type="search" class="form-control" placeholder="ข้อความค้นหา" name="keywords" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <select class="form-control" name="province">
                          <option value=""><?php echo $translations["all-province"];?></option>
                          <?php
                            $SqlSelect = "SELECT *
                                          FROM p_province
                                          ORDER BY PROVINCE_NAME ASC ";
                            if (select_num($SqlSelect)>0) {
                              foreach (select_tb($SqlSelect) as $row) {
                                ?><option value="<?php echo $row['PROVINCE_ID'];?>"<?php echo $_GET['province']==$row['PROVINCE_ID']?"selected":"";?>><?php echo $row['PROVINCE_NAME'];?></option><?php
                              }
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <select class="form-control" name="category">
                          <option value=""><?php echo $translations["all-category"];?></option>
                          <?php
                            $SqlSelect = "SELECT *
                                          FROM p_category
                                          ORDER BY name_category ASC ";
                            if (select_num($SqlSelect)>0) {
                              foreach (select_tb($SqlSelect) as $row) {
                                ?><option value="<?php echo $row['id_category'];?>" <?php echo $_GET['category']==$row['id_category']?"selected":"";?>><?php echo $row['name_category'];?></option><?php
                              }
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <select class="form-control" name="type">
                          <option value=""><?php echo $translations["all-type"];?></option>
                          <?php
                            $SqlSelect = "SELECT *
                                          FROM p_type
                                          ORDER BY name_Type ASC ";
                            if (select_num($SqlSelect)>0) {
                              foreach (select_tb($SqlSelect) as $row) {
                                ?><option value="<?php echo $row['id_Type'];?>" <?php echo $_GET['type']==$row['id_Type']?"selected":"";?>><?php echo $row['name_Type'];?></option><?php
                              }
                            }
                          ?>
                        </select>
                      </div>
                      <p class="text-center"><a href="<?php echo $LinkWeb;?>search"><?php echo $translations["page-search"];?></a></p>
                      <button type="submit" class="btn btn-success mb-10" style="width:100%;"><?php echo $translations["button-search"];?></button>
                    </form>
                  </div>
                </div>
              </div>
              <?php
            }
          ?>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-12">
              <div class="col-xs-12 p-0">
                <h2 class="main-head-cate t-type f-k mb-0"><?php echo $translations["type-search"];?></h2>
              </div>
              <div class="col-xs-12 p-0">
              <ul class="list-group">
                <?php
                  $SqlSelect = "SELECT pt.id_Type,pt.name_Type,COUNT(sj.jaType) as cjaType
                                FROM sb_job sj
                                INNER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                                GROUP BY pt.name_Type
                                ORDER BY pt.name_Type ASC";
                  foreach (select_tb($SqlSelect) as $row) {
                    ?>
                      <a href="<?php echo $LinkWeb;?>search/?type=<?php echo $row['id_Type'];?>" class="list-group-item"><?php echo $row['name_Type'];?> (<?php echo $row['cjaType'];?>)</a>
                    <?php
                  }
                ?>
              </ul>
            </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-12">
              <div class="col-xs-12 p-0">
                <h2 class="main-head-cate t-province f-k mb-0"><?php echo $translations["from-province"];?></h2>
              </div>
              <div class="col-xs-12 p-0">
                <ul class="list-group">
                  <?php
                    $SqlSelect = "SELECT p.PROVINCE_ID,p.PROVINCE_NAME,COUNT(sj.jProvince) as cjProvince
                                  FROM sb_job sj
                                  INNER JOIN p_province p ON (sj.jProvince = p.PROVINCE_ID)
                                  GROUP BY p.PROVINCE_ID,p.PROVINCE_NAME
                                  ORDER BY p.PROVINCE_ID,p.PROVINCE_NAME ASC";
                    foreach (select_tb($SqlSelect) as $row) {
                      ?>
                      <a href="<?php echo $LinkWeb;?>search/?province=<?php echo $row['PROVINCE_ID'];?>" class="list-group-item"><?php echo $row['PROVINCE_NAME'];?> (<?php echo $row['cjProvince'];?>)</a>
                      <?php
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="row mr-0 ml-0" style="background-color:#45637d;color:#fff;margin-top:30px;">
      <div class="container" style="padding:20px 15px;">
        <div class="col-sm-6 col-xs-12">
          <h5 class="text-uppercase"><?php echo ucfirst(str_replace("www.", "", $post_domain));?></h5>
          <p>
            ลงประกาศฟรี เว็บไซต์ยอดนิยมให้บริการออนไลน์ ลงประกาศขายบ้านฟรี ลงประกาศขาย ซื้อ ให้เช่า ประกาศและบริการต่างๆ ฟรีไม่มีข้อผูกมัดแค่ทำตามเงื่อนไข
          </p>
          <script id="dbd-init" src="https://www.trustmarkthai.com/callbackData/initialize.js?t=1466a-25-5-23d8cf4b464a33664c21893775a3bed724533607"></script>
          <div id="Certificate-banners" style="background: #fff;display: inline-table;border-radius: 10px;"></div>
        </div>
        <div class="col-sm-3 col-xs-12">
          <h5 class="text-uppercase"><?php echo $translations["footer-menu"];?></h5>
          <p style="padding-left:25px;">
            <a href="<?php echo $LinkWeb;?>" class="col-xs-12 text-link-footer"><?php echo $translations["home"];?></a>
            <a href="<?php echo $LinkWeb;?>policy" class="col-xs-12 text-link-footer"><?php echo $translations["policy"];?></a>
            <a href="<?php echo $LinkWeb;?>term-and-condition" class="col-xs-12 text-link-footer"><?php echo $translations["term-and-condition"];?></a>
          </p>
        </div>
        <div class="col-sm-3 col-xs-12">
          <h5 class="text-uppercase"><?php echo $translations["footer-contact"];?></h5>
          <p style="padding-left:25px;">Email : contact@<?php echo str_replace("www.", "", $post_domain);?></p>
          <p style="padding-left:25px;">LINE ID : <a href="https://line.me/ti/p/0xn6zip09D" rel="nofollow" style="color:#fff;text-decoration: none;">seen_nuakaew</a></p>
          <p style="padding-left:25px;"><a rel="nofollow" style="color:#fff;text-decoration: none;" href="https://line.me/ti/p/0xn6zip09D"><?php echo $translations["footer-ads"];?></a></p>
        </div>
      </div>
      <div class="col-xs-12 text-center" style="background-color: rgba(0, 0, 0, 0.2);padding:15px 0;">
      <?php echo $translations["copyright"];?> © 2552-2565 - <a href="https://<?php echo $post_domain;?>/" class="" style="color:#fff;"><?php echo str_replace("www.", "", $post_domain);?></a>
      </div>
    </div>
    <!-- Footer -->


    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!--<script src="<?php echo $LinkWeb;?>plugins/jquery.lazy.ajax.js"></script>-->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.plugins.min.js"></script>
    <script>
      $(function($) {
          $("img.lazy").Lazy();
      });
    </script>

    <!-- Accept Cookie -->
    <?php
    if (empty($_COOKIE[$CookieAccept])) {
      ?>
      <div class="accept-cookie-notice">
        <div class="">
          <div class="row">
            <div class="col-sm-12 col-lg-9">
              <p class="jsx">
                <strong class="jsx">เว็บไซต์นี้ใช้คุกกี้</strong>
                เราใช้คุกกี้เพื่อนำเสนอคอนเทนต์และโฆษณาที่ท่านอาจสนใจเพื่อให้ท่านได้รับประสบการณ์ที่ดีบนบริการของเรา หากท่านใช้บริการเว็บไซต์ของเราต่อไปโดยไม่ได้ปรับการตั้งค่าใดๆ เราเข้าใจว่าท่านยินยอมที่จะรับคุกกี้บนเว็บไซต์ของเรา
                <a href="<?php echo $LinkWeb;?>term-and-condition" target="_blank" class="jsx-link">คลิกเพื่อดูข้อเพิ่มเติมเกี่ยวกับระเบียบข้อบังคับ</a>
              </p>
            </div>
            <div class="buttonWrapper col-12 col-sm-12 col-lg-3 text-center">
              <button type="button" class="jsx button btn-accept-cookie">ยอมรับ</button>
              <a href="<?php echo $LinkWeb;?>policy" type="button" target="_blank" class="jsx button btn-others">เพิ่มเติม</a>
            </div>
          </div>
        </div>
      </div>
      <style>
        .accept-cookie-notice{
          background-color: rgb(14 14 14 / 88%);
          position: fixed;
          bottom: 50px;
          width: 50%;
          left: 25%;
          color: #cbcbcb;
          z-index: 9999;
          font-size: 15px;
          border-radius: 20px;
          padding: 25px;
          line-height: 25px;
        }
        .accept-cookie-notice .button{
          display: inline-block;
          border: 1px solid #cbcbcb;
          border-radius: 20px;
          background: transparent;
          color: #cbcbcb;
          height: 30px;
          min-width: 100px;
          padding: 0 15px;
          margin: 2px 5px;
          cursor: pointer;
          font-weight: bold;
          line-height: 28px;
          -webkit-appearance: none;
        }
        .accept-cookie-notice a.jsx-link{
          color:#fff;
          text-decoration: underline;
        }
        .accept-cookie-notice a.jsx-link:hover{
          text-decoration: none;
        }
        .accept-cookie-notice .button{
          width:100%;
        }
        .accept-cookie-notice .button.btn-accept-cookie{
          background: #fff;
          color:#222;
          margin-bottom: 20px;
          padding: 10px;
          height: 50px;
        }
        .accept-cookie-notice .button.btn-others:hover{
          background: #fff;
          color:#222;
        }
        .accept-cookie-notice .button.btn-accept-cookie:hover{
          background: #dedede;
          color:#222;
        }
      </style>
      <script>
        $(document).ready(function() {
          $(".btn-accept-cookie").click(function(e) {
            $.post("<?php echo $LinkWeb;?>query/query-system.php",
            {
              linkpath : "<?php echo $LinkPath;?>",
              post :"accept-cookie-notice"
            },
            function(d){
              $(".accept-cookie-notice").attr("style","display:none;");
            });
          });
        });
      </script>
      <?php
      }
    ?>
    <!-- Accept Cookie -->



    <script type="text/javascript"  src="<?php echo $LinkWeb;?>plugins/photoswipe-4.1.3/dist/photoswipe-ui-default.js"></script>
    <script type="text/javascript"  src="<?php echo $LinkWeb;?>plugins/photoswipe-4.1.3/dist/photoswipe.js"></script>
    <div id="gallery" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
            <button class="pswp__button pswp__button--share" title="Share"></button>
            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip">
            </div>
          </div>
          <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
          <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
          <div class="pswp__caption">
            <div class="pswp__caption__center">
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      (function() {

        var initPhotoSwipeFromDOM = function(gallerySelector) {

          var parseThumbnailElements = function(el) {
              var thumbElements = el.childNodes,
                  numNodes = thumbElements.length,
                  items = [],
                  el,
                  childElements,
                  thumbnailEl,
                  size,
                  item;

              for(var i = 0; i < numNodes; i++) {
                  el = thumbElements[i];

                  // include only element nodes
                  if(el.nodeType !== 1) {
                    continue;
                  }

                  childElements = el.children;

                  size = el.getAttribute('data-size').split('x');

                  // create slide object
                  item = {
                src: el.getAttribute('href'),
                w: parseInt(size[0], 10),
                h: parseInt(size[1], 10),
                author: el.getAttribute('data-author')
                  };

                  item.el = el; // save link to element for getThumbBoundsFn

                  if(childElements.length > 0) {
                    item.msrc = childElements[0].getAttribute('src'); // thumbnail url
                    if(childElements.length > 1) {
                        item.title = childElements[1].innerHTML; // caption (contents of figure)
                    }
                  }


              var mediumSrc = el.getAttribute('data-med');
                    if(mediumSrc) {
                      size = el.getAttribute('data-med-size').split('x');
                      // "medium-sized" image
                      item.m = {
                          src: mediumSrc,
                          w: parseInt(size[0], 10),
                          h: parseInt(size[1], 10)
                      };
                    }
                    // original image
                    item.o = {
                      src: item.src,
                      w: item.w,
                      h: item.h
                    };

                  items.push(item);
              }

              return items;
          };

          // find nearest parent element
          var closest = function closest(el, fn) {
              return el && ( fn(el) ? el : closest(el.parentNode, fn) );
          };

          var onThumbnailsClick = function(e) {
              e = e || window.event;
              e.preventDefault ? e.preventDefault() : e.returnValue = false;

              var eTarget = e.target || e.srcElement;

              var clickedListItem = closest(eTarget, function(el) {
                  return el.tagName === 'A';
              });

              if(!clickedListItem) {
                  return;
              }

              var clickedGallery = clickedListItem.parentNode;

              var childNodes = clickedListItem.parentNode.childNodes,
                  numChildNodes = childNodes.length,
                  nodeIndex = 0,
                  index;

              for (var i = 0; i < numChildNodes; i++) {
                  if(childNodes[i].nodeType !== 1) {
                      continue;
                  }

                  if(childNodes[i] === clickedListItem) {
                      index = nodeIndex;
                      break;
                  }
                  nodeIndex++;
              }

              if(index >= 0) {
                  openPhotoSwipe( index, clickedGallery );
              }
              return false;
          };

          var photoswipeParseHash = function() {
            var hash = window.location.hash.substring(1),
              params = {};

              if(hash.length < 5) { // pid=1
                  return params;
              }

              var vars = hash.split('&');
              for (var i = 0; i < vars.length; i++) {
                  if(!vars[i]) {
                      continue;
                  }
                  var pair = vars[i].split('=');
                  if(pair.length < 2) {
                      continue;
                  }
                  params[pair[0]] = pair[1];
              }

              if(params.gid) {
                params.gid = parseInt(params.gid, 10);
              }

              return params;
          };

          var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
              var pswpElement = document.querySelectorAll('.pswp')[0],
                  gallery,
                  options,
                  items;

            items = parseThumbnailElements(galleryElement);

              // define options (if needed)
              options = {

                  galleryUID: galleryElement.getAttribute('data-pswp-uid'),

                  getThumbBoundsFn: function(index) {
                      // See Options->getThumbBoundsFn section of docs for more info
                      var thumbnail = items[index].el.children[0],
                          pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                          rect = thumbnail.getBoundingClientRect();

                      return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
                  },

                  addCaptionHTMLFn: function(item, captionEl, isFake) {
                if(!item.title) {
                  captionEl.children[0].innerText = '';
                  return false;
                }
                captionEl.children[0].innerHTML = item.title +  '<br/><small>Photo: ' + item.author + '</small>';
                return true;
                  }

              };


              if(fromURL) {
                if(options.galleryPIDs) {
                  // parse real index when custom PIDs are used
                  // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                  for(var j = 0; j < items.length; j++) {
                    if(items[j].pid == index) {
                      options.index = j;
                      break;
                    }
                  }
                } else {
                  options.index = parseInt(index, 10) - 1;
                }
              } else {
                options.index = parseInt(index, 10);
              }

              // exit if index not found
              if( isNaN(options.index) ) {
                return;
              }



            var radios = document.getElementsByName('gallery-style');
            for (var i = 0, length = radios.length; i < length; i++) {
                if (radios[i].checked) {
                    if(radios[i].id == 'radio-all-controls') {

                    } else if(radios[i].id == 'radio-minimal-black') {
                      options.mainClass = 'pswp--minimal--dark';
                      options.barsSize = {top:0,bottom:0};
                  options.captionEl = false;
                  options.fullscreenEl = false;
                  options.shareEl = false;
                  options.bgOpacity = 0.85;
                  options.tapToClose = true;
                  options.tapToToggleControls = false;
                    }
                    break;
                }
            }

              if(disableAnimation) {
                  options.showAnimationDuration = 0;
              }

              // Pass data to PhotoSwipe and initialize it
              gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);

              // see: http://photoswipe.com/documentation/responsive-images.html
            var realViewportWidth,
                useLargeImages = false,
                firstResize = true,
                imageSrcWillChange;

            gallery.listen('beforeResize', function() {

              var dpiRatio = window.devicePixelRatio ? window.devicePixelRatio : 1;
              dpiRatio = Math.min(dpiRatio, 2.5);
                realViewportWidth = gallery.viewportSize.x * dpiRatio;


                if(realViewportWidth >= 1200 || (!gallery.likelyTouchDevice && realViewportWidth > 800) || screen.width > 1200 ) {
                  if(!useLargeImages) {
                    useLargeImages = true;
                      imageSrcWillChange = true;
                  }

                } else {
                  if(useLargeImages) {
                    useLargeImages = false;
                      imageSrcWillChange = true;
                  }
                }

                if(imageSrcWillChange && !firstResize) {
                    gallery.invalidateCurrItems();
                }

                if(firstResize) {
                    firstResize = false;
                }

                imageSrcWillChange = false;

            });

            gallery.listen('gettingData', function(index, item) {
                if( useLargeImages ) {
                    item.src = item.o.src;
                    item.w = item.o.w;
                    item.h = item.o.h;
                } else {
                    item.src = item.m.src;
                    item.w = item.m.w;
                    item.h = item.m.h;
                }
            });

              gallery.init();
          };

          // select all gallery elements
          var galleryElements = document.querySelectorAll( gallerySelector );
          for(var i = 0, l = galleryElements.length; i < l; i++) {
            galleryElements[i].setAttribute('data-pswp-uid', i+1);
            galleryElements[i].onclick = onThumbnailsClick;
          }

          // Parse URL and open gallery if it contains #&pid=3&gid=1
          var hashData = photoswipeParseHash();
          if(hashData.pid && hashData.gid) {
            openPhotoSwipe( hashData.pid,  galleryElements[ hashData.gid - 1 ], true, true );
          }
        };

        initPhotoSwipeFromDOM('.demo-gallery');

      })();
    </script>
    <script type="text/javascript" src="<?php echo $LinkWeb;?>js/bootstrap-filestyle.min.js"> </script>
    <script type="text/javascript"  src="<?php echo $LinkWeb;?>plugins/summernote/summernote.js"></script>
    <script type="text/javascript" >
      $('.summernote').summernote({
          height: 400,   //set editable area's height
          codemirror: { // codemirror options
              theme: 'monokai'
          }
      });
      $('.summernote-comment').summernote({
          height: 150,   //set editable area's height
          codemirror: { // codemirror options
              theme: 'monokai'
          }
      });
      /*
      $("input:file").filestyle({
        classIcon: "icon-plus",
        buttonText: "Upload Photo",
        buttonName: "btn-primary"
      });
      */
      // List Menu Category & Sub Category
      $(function(){


          /*// เมื่อเปลี่ยนค่าของ select id เท่ากับ list1
           $("select#cate_id").change(function(){
               // ส่งค่า ตัวแปร list1 มีค่าเท่ากับค่าที่เลือก ส่งแบบ get ไปที่ไฟล์ data_for_list2.php
               $.get("data_for_list2.php",{
                   cate_id:$(this).val()
               },function(data){ // คืนค่ากลับมา
                      $("select#sub_cate_id").html(data);  // นำค่าที่ได้ไปใส่ใน select id เท่ากับ list2
                      $("select#sub_cate_id").trigger("change"); // อัพเดท list2 เพื่อให้ list2 ทำงานสำหรับรีเซ็ตค่า
               });
          });
          */

      });
      function refreshCaptcha(){
        var img = document.images['captchaimg'];
        img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
      }
    </script>
  	<script>
    	$(document).ready(function() {

    		$(".post_click_tel_hide").click(function(e) {
    			$(".post_click_tel_hide").attr("style","display:none;");
    			$(".post_click_tel_show").attr("style","display:block;");
    		});
    	});
    </script>
  	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
  	<script>
  		$(document).ready(function() {
  			$('.grid').masonry({
  			  // options
  			  itemSelector: '.grid-item'
  			});
  		});
  	 </script>
  	<style>
  		.grid-item { width: 100%; }

  		@media screen and (min-width: 768px) {
  		  /* 5 columns for larger screens */
  		  .grid-item { width: 33.333%; }
  		}
  	</style>
    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
          apiKey: "AIzaSyDxvrbQGcRSFb68yaaRPaDLd6hEd9YuvDY",
          authDomain: "postkai-otp.firebaseapp.com",
          projectId: "postkai-otp",
          storageBucket: "postkai-otp.appspot.com",
          messagingSenderId: "111722777636",
          appId: "1:111722777636:web:8a346a840fdfe6608cdcb1",
          measurementId: "G-2D0R244E6K"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
    </script>
    <script src="<?php echo $LinkWeb;?>js/firebase.js" type="text/javascript"></script>
    <script type="text/javascript">
      var specialKeys = new Array();
       specialKeys.push(8); //Backspace
       function IsNumeric(e) {
           var keyCode = e.which ? e.which : e.keyCode
           var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
           document.getElementById("error").style.display = ret ? "none" : "inline";
           return ret;
       }
    </script>
  </body>
</html>
