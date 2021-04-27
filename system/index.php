<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>โพสขายฟรี - Postkai.com</title>
    <meta name="robots" content="index,follow" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



    <meta name="Keywords" content="" />
    <meta name="Description" content="" />





    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $LinkWeb;?>css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit|Sarabun">
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
              <li class="active"><a href="<?php echo $LinkWeb;?>">หน้าหลัก</a></li>
              <li><a href="<?php echo $LinkWeb;?>search">ค้นหาประกาศ</a></li>
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
              <li><a href="<?php echo $LinkWeb;?>post-new">ลงประกาศฟรี</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo $LinkWeb;?>">เข้าสู่ระบบ</a></li>
              <li><a href="<?php echo $LinkWeb;?>">สมัครสมาชิก</a></li>
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
                case 'post-new'         : include("view-post-vew.php"); break;

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
                <h2 class="main-head-cate t-type f-k">หมวดหมู่</h2>
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
                <h2 class="main-head-cate t-province f-k">ประกาศตามจังหวัด</h2>
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
        <div class="col-lg-6 col-md-12">
          <h5 class="text-uppercase">Postkai</h5>
          <p>
            ลงประกาศฟรี เว็บไซต์ยอดนิยมให้บริการออนไลน์ ลงประกาศขายบ้านฟรี ลงประกาศขาย ซื้อ ให้เช่า ประกาศและบริการต่างๆ ฟรีไม่มีข้อผูกมัดแค่ทำตามเงื่อนไข
          </p>
        </div>
        <div class="col-lg-3 col-md-12">
          <h5 class="text-uppercase">Menu</h5>
          <p style="padding-left:25px;">
            <a href="<?php echo $LinkWeb;?>" class="col-xs-12 text-link-footer">หน้าหลัก</a>
            <a href="<?php echo $LinkWeb;?>policy" class="col-xs-12 text-link-footer">นโยบายการให้บริการ</a>
            <a href="<?php echo $LinkWeb;?>term-and-condition" class="col-xs-12 text-link-footer">ระเบียบข้อบังคับ</a>
            <a href="<?php echo $LinkWeb;?>sitemap" class="col-xs-12 text-link-footer">sitemap</a>
          </p>
        </div>
        <div class="col-lg-3 col-md-12">
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
  </body>
</html>