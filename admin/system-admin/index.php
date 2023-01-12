<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>i-System Management</title>
  <meta name="default" content="<?php echo $LinkAdmin;?>" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

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
  <meta name="msapplication-TileImage" content="<?php echo $LinkWeb;?>images/new-logo/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <link href="https://cdn.lazywasabi.net/fonts/Anuphan/Anuphan.css?woff2" rel="stylesheet" />

  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
  <link rel="stylesheet" href="<?php echo $LinkWeb;?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo $LinkWeb;?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?php echo $LinkWeb;?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $LinkWeb;?>plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo $LinkWeb;?>plugins/adminLTE/css/adminlte.css">
  <link rel="stylesheet" href="<?php echo $LinkWeb;?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?php echo $LinkWeb;?>plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo $LinkWeb;?>plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo $LinkWeb;?>css/font-awesome-animation.min.css">
  <link rel="stylesheet" href="<?php echo $LinkWeb;?>css/sheet.css">
  <!--<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css">-->





  <!-- jQuery -->
  <script type="text/javascript" src="<?php echo $LinkWeb;?>plugins/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo $LinkWeb;?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>  $.widget.bridge('uibutton', $.ui.button)</script>
  <script type="text/javascript" src="<?php echo $LinkWeb;?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="<?php echo $LinkWeb;?>plugins/sparklines/sparkline.js"></script>
  <script type="text/javascript" src="<?php echo $LinkWeb;?>plugins/jqvmap/jquery.vmap.min.js"></script>
  <script type="text/javascript" src="<?php echo $LinkWeb;?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script type="text/javascript" src="<?php echo $LinkWeb;?>plugins/jquery-knob/jquery.knob.min.js"></script>
  <script type="text/javascript" src="<?php echo $LinkWeb;?>plugins/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo $LinkWeb;?>plugins/daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="<?php echo $LinkWeb;?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script type="text/javascript" src="<?php echo $LinkWeb;?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script type="text/javascript" src="<?php echo $LinkWeb;?>plugins/adminLTE/js/adminlte.js"></script>






</head>

  <body class=" <?php  if(!empty($_COOKIE["AID"])){  echo "hold-transition sidebar-mini layout-fixed"; } ?>">
  <?php if(!empty($_COOKIE["AID"]) ){ ?>
    <div class="wrapper">

      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </nav>


      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo $LinkAdmin;?>" class="brand-link">
          <img src="<?php echo $LinkWeb;?>images/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Management</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="<?php echo $LinkWeb;?>images/avatar.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="<?php echo $LinkAdmin;?>profile" class="d-block">Admin</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-header">MENU</li>
              <li class="nav-item">
                <a href="<?php echo $LinkWeb;?>" class="nav-link" style="color:#f00;" target="_blank">
                  <i class="nav-icon fas fa-external-link-alt"></i> <p>Go to Mainpage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $LinkAdmin;?>dashboard" class="nav-link <?php echo $UrlId=="dashboard"||$UrlId==""?"active":"";?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i> <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $LinkAdmin;?>view-post" class="nav-link <?php echo $UrlId=="view-post"?"active":"";?>">
                  <i class="nav-icon fas fa-comment"></i> <p>View Post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $LinkAdmin;?>view-report" class="nav-link <?php echo $UrlId=="view-report"?"active":"";?>">
                  <i class="nav-icon fas fa-exclamation-circle" style="color:#ffa75f;"></i> <p>View Report</p>
                </a>
              </li>

              <li class="nav-header">Manage Ads</li>
              <li class="nav-item">
                <a href="<?php echo $LinkAdmin;?>ads-sponsor" class="nav-link <?php echo $UrlId=="ads-sponsor"?"active":"";?>">
                  <i class="nav-icon fas fa-photo-video"></i> <p>Ads Sponsor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $LinkAdmin;?>ads-slider" class="nav-link <?php echo $UrlId=="ads-slider"?"active":"";?>">
                  <i class="nav-icon fas fa-image"></i> <p>Ads Slider</p>
                </a>
              </li>




              <li class="nav-header">System</li>
              <li class="nav-item has-treeview <?php echo $UrlId=="manage-member"?"menu-open":"";?>">
                <a href="#" class="nav-link <?php echo$UrlId=="manage-member"?"active":"";?>">
                  <i class="nav-icon fas fa-cogs"></i><p>Manage <i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo $LinkAdmin;?>manage-member" class="nav-link <?php echo $UrlId=="manage-member"?"active":"";?>">
                      <i class="nav-icon far fa-circle"></i> <p>Member</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!--<li class="nav-item has-treeview <?php echo $UrlId=="view-report"||$UrlId=="view-report-stock"?"menu-open":"";?>">
                <a href="#" class="nav-link <?php echo $UrlId=="view-report"||$UrlId=="view-report-stock"?"active":"";?>">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>Report Chart <i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo $LinkAdmin;?>view-report" class="nav-link <?php echo $UrlId=="view-report"?"active":"";?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Report All</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo $LinkAdmin;?>view-report-stock" class="nav-link <?php echo $UrlId=="view-report-stock"?"active":"";?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Report Stock</p>
                    </a>
                  </li>
                </ul>
              </li>-->
              <li class="nav-item">
                <a style="cursor: pointer;" class="nav-link modal-signout" data-toggle="modal" data-target="#modal-signout">
                  <i class="nav-icon fas fa-lock"></i> <p>Sign Out</p>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </aside>




      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                  <?php
                    echo $UrlId!=""?ucwords(str_replace("-"," ",$UrlId)):"Dashboard";
                  ?>
                </h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <?php
                    $PathEx = $PathExplode;
                    for ($i=2; $i < count($PathEx); $i++) {
                      if ($PathEx[$i]!="") {
                        ////// แสดงต่อเมื่อ ไม่ใช่หน้า Dashboard
                        $var = "";
                        $varlast = "";
                        if ($i==2 && $PathEx[2]!="dashboard") {
                          $var = "dashboard";
                          $varlast = "dashboard";
                          ?>
                          <li class="breadcrumb-item"><a href="<?php echo $LinkWeb.$var;?>"><?php echo ucwords(str_replace("-"," ",$varlast));?></a></li>
                          <?php
                        }
                        ////// แสดงค่าปกติ
                        $var = "";
                        $varlast = "";
                        for ($a=1; $a <= ($i); $a++) {
                          if ($a==1) {
                            $var .= $PathEx[$a];
                            $varlast = $PathEx[$a];
                          }else {
                            $var .= "/".$PathEx[$a];
                            $varlast = $PathEx[$a];
                          }
                        }
                        ?>
                        <li class="breadcrumb-item <?php echo end($PathEx)==$PathEx[$i]?"active":"";?>"><?php echo end($PathEx)==$PathEx[$i]?ucwords(str_replace("-"," ",$varlast)):"<a href=".$LinkWeb.$var.">".ucwords(str_replace("-"," ",$varlast))."</a>";?></li>
                        <?php
                      }
                    }
                  ?>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <section class="content">
          <?php
            switch (trim($UrlId)) {

              /// All
              case 'dashboard'             :   include("view-dashboard.php");  			break;
              case 'profile'            	 :   include("view-profile.php");  			break;
              case 'view-post'             :   include("view-all-post.php"); 	 	  break;
              case 'view-report'           :   include("view-report.php"); 	 	  break;

              //// Manage ads
              case 'ads-slider'                :   include("view-banner.php"); 	      break;
              case 'ads-sponsor'            :   include("view-ads-banner.php"); 	   break;

              /// Manange
              case 'manage-member'       :   include("manage-member.php"); 	 	break;

              case 'signout'               :    setcookie("AID", null, time()-86400,'/');
                                                unset($_COOKIE["AID"]);

                                                session_unset();
                                                session_destroy();
                                                header("Location:".$LinkAdmin);break;


              default                    	 :  include("view-dashboard.php"); 			break;
            }
          ?>
        </section>
      </div>


      <footer class="main-footer hidden-xs">
        <strong><a href="<?php echo $LinkWeb;?>">postkai.com</a> Management &copy; 2022</strong>
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0.0
        </div>
      </footer>


      <div class="control-sidebar-bg"></div>
    </div>

    <!-- SignOut   -->
    <div class="modal fade" id="modal-signout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body confirm-popup">
            <form>
              <div class="form-group">
                <div class="text-center" id="show_logout" style="padding:25px 0;">Are you Logout ?</div>
              </div>
            </form>
          </div>
          <div class="modal-footer" style="background-color: white; text-align: center;">
            <button type="button" style="width: 48%;float:left;margin: 0px;" class="btn btn-default" data-dismiss="modal" id="">Cancel</button>
            <a type="button" style="width: 48%;float:right;" class="btn btn-danger" href="<?php echo $LinkWeb;?>signout">SignOut</a>
          </div>
        </div>
      </div>
    </div>
    <!-- end  SignOut  -->




  <?php } ?>
  </body>
</html>
