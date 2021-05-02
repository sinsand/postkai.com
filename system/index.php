<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index,follow" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php
      if (empty($UrlPage)) {
        ?>
        <title>โพสขาย ลงประกาศฟรี - postkai.com</title>
        <meta name="keywords" content="ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี,ลงขายฟรี" />
        <meta name="description" content="เว็บไซต์ยอดนิยมให้บริการออนไลน์ ลงประกาศขายบ้านฟรี ลงประกาศขาย ซื้อ ให้เช่า ประกาศและบริการต่างๆ ฟรีไม่มีข้อผูกมัดแค่ทำตามเงื่อนไข" />
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
              <title><?php echo $rowpost['jTitle'];?> - postkai.com</title>
              <meta name="keywords" content="ลงประกาศฟรี,ลงขายออนไลน์" />
              <meta name="description" content="<?php echo $rowpost['jDetail'];?>" />
              <meta property="og:title" content="<?php echo $rowpost['jTitle'];?>"/>
              <meta property="og:description" content="<?php echo $rowpost['jDetail'];?>"/>
              <meta property="og:url" content="<?php echo $LinkPath;?>"/>
              <meta property="og:site_name" content="- postkai.com ลงประกาศฟรี เว็บไซต์ยอดนิยมให้บริการออนไลน์"/>
              <meta property="og:locale" content="th_TH"/>
              <meta property="og:type" content="website"/>
              <!--<meta property="fb:admins" content="102845294863081" />-->
              <?php
              if (!empty($row['jPic1']) || $row['jPic1']!="") {
                ?><meta property="og:image" content="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $rowpost['jPic1'];?>"/><?php
                ?><meta property="og:image:secure_url" content="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $rowpost['jPic1'];?>"/><?php
              }else {
                ?><img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12" alt="" /><?php
              }
            }
          }
        }
      }
      if ($UrlPage=="search") {
        if (!empty($_GET['type']) && empty($_GET['province']) && empty($_GET['category']) && empty($_GET['keywords'])) {
          ////// type
          $SqlSelectsearch = "SELECT name_Type
                              FROM p_type
                              WHERE ( id_Type = '".$_GET['type']."' ) ;";
          if (select_num($SqlSelectsearch)>0) {
            foreach (select_tb($SqlSelectsearch) as $rowtype) {
              ?>
              <title>หมวดหมู่ <?php echo $rowtype['name_Type'];?> ลงประกาศฟรี - postkai.com</title>
              <meta name="keywords" content="<?php echo $rowtype['name_Type'];?>,ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
              <meta name="description" content="<?php echo $rowtype['name_Type'];?> เว็บไซต์ยอดนิยมให้บริการออนไลน์ ลงประกาศขายบ้านฟรี ลงประกาศขาย ซื้อ ให้เช่า ประกาศและบริการต่างๆ ฟรีไม่มีข้อผูกมัดแค่ทำตามเงื่อนไข" />
              <?php
            }
          }
        }else if (empty($_GET['type']) && !empty($_GET['province']) && empty($_GET['category']) && empty($_GET['keywords'])) {
          ////// province
          $SqlSelectsearch = "SELECT PROVINCE_NAME
                              FROM p_province
                              WHERE ( PROVINCE_ID = '".$_GET['province']."' );";
          if (select_num($SqlSelectsearch)>0) {
            foreach (select_tb($SqlSelectsearch) as $rowtype) {
              ?>
              <title>ประกาศจังหวัด<?php echo $rowtype['name_Type'];?> ลงประกาศฟรี - postkai.com</title>
              <meta name="keywords" content="จังหวัด<?php echo $rowtype['name_Type'];?>,ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
              <meta name="description" content="จังหวัด<?php echo $rowtype['name_Type'];?> เว็บไซต์ยอดนิยมให้บริการออนไลน์ ลงประกาศขายบ้านฟรี ลงประกาศขาย ซื้อ ให้เช่า ประกาศและบริการต่างๆ ฟรีไม่มีข้อผูกมัดแค่ทำตามเงื่อนไข" />
              <?php
            }
          }
        }else if (!empty($_GET['type']) && !empty($_GET['province']) && !empty($_GET['category']) && !empty($_GET['keywords'])) {
          ////// search all
          $SqlSelectsearch = "SELECT sj.*,pt.name_Type,p.PROVINCE_NAME
                              FROM sb_job sj
                              INNER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                              INNER JOIN p_province p  ON (sj.jProvince = p.PROVINCE_NAME)
                              WHERE (
                                      ( sj.jStatus = '1' ) AND
                                      ( sj.jTitle LIKE '%".$_GET['keywords']."%' ) AND
                                      ( p.id_category = '".$_GET['category']."' ) AND
                                      ( p.PROVINCE_ID = '".$_GET['province']."' ) AND
                                      ( pt.id_Type = '".$_GET['type']."' )
                                    )
                              ORDER BY sj.jDate_Create DESC
                              LIMIT 0,1;";
          if (select_num($SqlSelectsearch)>0) {
            foreach (select_tb($SqlSelectsearch) as $rowtype) {
              ?>
              <title>ค้นหา <?php echo $rowtype['jTitle'];?> ลงประกาศฟรี - postkai.com</title>
              <meta name="keywords" content="ค้นหา <?php echo $rowtype['jTitle'];?>,ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
              <meta name="description" content="ค้นหา <?php echo $rowtype['jDetail'];?>" />
              <?php
            }
          }
        }
      }
      if ($UrlPage=="policy") {
        ?>
        <title>นโยบายการให้บริการ ลงประกาศฟรี - postkai.com</title>
        <meta name="keywords" content="นโยบาย,นโยบายการให้บริการลงประกาศ,ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
        <meta name="description" content="ห้ามโพสประกาศขายสิ่งผิดกฏหมายทุกชนิด การพนัน, เว็บลามก, ยาผิดกฏหมายทุกชนิด, บริการทางเพศ ฯลฯ หากพบเห็นจะลบประกาศทันที ห้ามโพสข้อความหรือสิ่งใดที่เป็นการดูหมิ่นสถาบันพระมหากษัตริย์โดยเด็ดขาด" />
        <?php
      }
      if ($UrlPage=="term-and-condition") {
        ?>
        <title>กฏ กติกา ระเบียบข้อบังคับ ลงประกาศฟรี - postkai.com</title>
        <meta name="keywords" content="ระเบียบข้อบังคับ,ข้อบังคับลงประกาศ,ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
        <meta name="description" content="ห้ามโพสข้อความหรือสิ่งใดที่เป็นการดูหมิ่นสถาบันพระมหากษัตริย์ โดยเด็ดขาด เว็บไซต์ www.postkai.com เป็นเว็บไซต์ให้บริการประกาศโฆษณาฟรี หรือ ประชาสัมพันธ์เว็บไซต์เพื่อการค้าขายบนอินเตอร์เน็ต (อี-คอมเมิร์ซ) เท่านั้นเว็บไซต์" />
        <?php
      }
      if ($UrlPage=="login") {
        ?>
        <title>เข้าสู่ระบบ ลงประกาศฟรี  - postkai.com</title>
        <meta name="keywords" content="เข้าสู่ระบบ,เข้าสู่ระบบลงประกาศ,ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
        <meta name="description" content="เข้าสู่ระบบ เว็บไซต์ยอดนิยมให้บริการออนไลน์ ลงประกาศขายบ้านฟรี ลงประกาศขาย ซื้อ ให้เช่า ประกาศและบริการต่างๆ ฟรีไม่มีข้อผูกมัดแค่ทำตามเงื่อนไข" />
        <?php
      }
      if ($UrlPage=="register") {
        ?>
        <title>สมัครสมาชิก ลงประกาศฟรี ไม่มีค่าบริการ - postkai.com</title>
        <meta name="keywords" content="สมัครสมาชิก,สมัครลงประกาศ,ลงประกาศฟรี,ลงขายออนไลน์,โพสขายของฟรี" />
        <meta name="description" content="สมัครสมาชิก เว็บไซต์ยอดนิยมให้บริการออนไลน์ ลงประกาศขายบ้านฟรี ลงประกาศขาย ซื้อ ให้เช่า ประกาศและบริการต่างๆ ฟรีไม่มีข้อผูกมัดแค่ทำตามเงื่อนไข" />
        <?php
      }
    ?>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $LinkWeb;?>css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit|Sarabun">
    <link rel="stylesheet" href="<?php echo $LinkWeb;?>plugins/summernote/summernote.css">
  </head>
  <body>
    <!-- Logo and ads -->
    <div class="container">
      <div class="row" style="margin:20px 0;">
        <div class="col-sm-2" style="padding:0px;">
          <a href="" class="col-xs-12" style="padding:0px;">
            <img src="<?php echo $LinkWeb;?>images/system/Logo-postkai.com.png" class="col-sm-12 hidden-xs" alt="Logo">
            <!--<img src="http://placehold.it/300/300" class="col-sm-12 hidden-xs" alt="Logo">-->
          </a>
        </div>
        <div class="col-sm-10" style="padding:0px;">

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
              <li <?php echo empty($UrlPage)?" class='active' ":"";?>><a href="<?php echo $LinkWeb;?>">หน้าหลัก</a></li>
              <li <?php echo $UrlPage=="search"?" class='active' ":"";?>><a href="<?php echo $LinkWeb;?>search">ค้นหาประกาศ</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">หมวดหมู่ <span class="caret"></span></a>
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
              <li <?php echo $UrlPage=="post-new"?" class='active' ":"";?>><a href="<?php echo $LinkWeb;?>post-new">ลงประกาศฟรี</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li <?php echo $UrlPage=="login"?" class='active' ":"";?>><a href="<?php echo $LinkWeb;?>login">เข้าสู่ระบบ</a></li>
              <li <?php echo $UrlPage=="register"?" class='active' ":"";?>><a href="<?php echo $LinkWeb;?>register">สมัครสมาชิก</a></li>
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

                case 'login'            : include("view-login.php"); break;
                case 'register'         : include("view-register.php"); break;


                case 'policy'           : include("view-policy.php"); break;
                case 'sitemap'          : include("view-sitemap.php"); break;
                case 'term-and-condition'  : include("view-term-and-condition.php"); break;


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
                  <h2 class="main-head-cate t-search f-k">ค้นหาประกาศ</h2>
                  <div class="col-xs-12 p-0">
                    <form action="<?php echo $LinkWeb;?>search/" method="get">
                      <div class="form-group">
                        <label for="email">ข้อความค้นหา</label>
                        <input type="search" class="form-control" placeholder="ข้อความค้นหา" name="keywords" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <select class="form-control" name="province">
                          <option value="">ทุกจังหวัด</option>
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
                          <option value="">ทุกหมวดหมู่</option>
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
                          <option value="">ทุกประเภท</option>
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
                      <p class="text-center"><a href="<?php echo $LinkWeb;?>search">ค้นหาแบบละเอียด</a></p>
                      <button type="submit" class="btn btn-success mb-10" style="width:100%;">ค้นหา</button>
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
                <h2 class="main-head-cate t-type f-k mb-0">ประเภท</h2>
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
                <h2 class="main-head-cate t-province f-k mb-0">ประกาศตามจังหวัด</h2>
              </div>
              <div class="col-xs-12 p-0">
                <ul class="list-group">
                  <?php
                    $SqlSelect = "SELECT p.PROVINCE_ID,p.PROVINCE_NAME,COUNT(sj.jProvince) as cjProvince
                                  FROM sb_job sj
                                  INNER JOIN p_province p ON (sj.jProvince = p.PROVINCE_NAME)
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
          <h5 class="text-uppercase">Postkai</h5>
          <p>
            ลงประกาศฟรี เว็บไซต์ยอดนิยมให้บริการออนไลน์ ลงประกาศขายบ้านฟรี ลงประกาศขาย ซื้อ ให้เช่า ประกาศและบริการต่างๆ ฟรีไม่มีข้อผูกมัดแค่ทำตามเงื่อนไข
          </p>
        </div>
        <div class="col-sm-3 col-xs-12">
          <h5 class="text-uppercase">Menu</h5>
          <p style="padding-left:25px;">
            <a href="<?php echo $LinkWeb;?>" class="col-xs-12 text-link-footer">หน้าหลัก</a>
            <a href="<?php echo $LinkWeb;?>policy" class="col-xs-12 text-link-footer">นโยบายการให้บริการ</a>
            <a href="<?php echo $LinkWeb;?>term-and-condition" class="col-xs-12 text-link-footer">ระเบียบข้อบังคับ</a>
            <a href="<?php echo $LinkWeb;?>sitemap.xml" class="col-xs-12 text-link-footer">sitemap</a>
          </p>
        </div>
        <div class="col-sm-3 col-xs-12">
          <h5 class="text-uppercase">Contact us</h5>
          <p style="padding-left:25px;">
            Email : contact@postkai.com
          </p>
        </div>
      </div>
      <div class="col-xs-12 text-center" style="background-color: rgba(0, 0, 0, 0.2);padding:15px 0;">
        © 2009-2021 <a class="" style="color:#fff;" href="https://www.postkai.com/">www.postkai.com</a>
      </div>
    </div>
    <!-- Footer -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    -->
    <script type="text/javascript" src="<?php echo $LinkWeb;?>js/bootstrap-filestyle.min.js"> </script>
    <script type="text/javascript"  src="<?php echo $LinkWeb;?>plugins/summernote/summernote.js"></script>
    <script type="text/javascript" >
      $('.summernote').summernote({
          height: 400,   //set editable area's height
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

  </body>
</html>
