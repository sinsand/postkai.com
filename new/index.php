<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $siteTitle; ?> - postkai.com</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $LinkWeb; ?>/new/css/style-sheet.css">








</head>

<body>
    <div class="row m-0">
        <div class="col p-0 bg-dark">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark" aria-label="Offcanvas navbar large">

                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo $LinkWeb; ?>">Postkai</a>
                        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Menu</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                    <li class="nav-item me-2">
                                        <a class="nav-link <?php echo empty($UrlPage) ? "active" : ""; ?>" aria-current="page" href="<?php echo $LinkWeb; ?>"><?php echo $translations["home"]; ?></a>
                                    </li>
                                    <li class="nav-item me-2">
                                        <a class="nav-link <?php echo $UrlPage == "post-new" ? "active" : ""; ?>" href="<?php echo $LinkWeb; ?>post-new"><?php echo $translations["post-new"]; ?></a>
                                    </li>
                                    <li class="nav-item me-2">
                                        <a class="nav-link <?php echo $UrlPage == "post-all" ? "active" : ""; ?>" href="<?php echo $LinkWeb; ?>post-all"><?php echo $translations["post-all"]; ?></a>
                                    </li>
                                    <li class="nav-item me-2 dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo $translations["type-search"]; ?>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <?php
                                            $SqlSelect = "SELECT *
                                              FROM p_type
                                              ORDER BY name_Type ASC ;";
                                            if (select_num($SqlSelect) > 0) {
                                                foreach (select_tb($SqlSelect) as $row) {
                                            ?>
                                                    <li><a class="dropdown-item" href="<?php echo $LinkWeb; ?>search/?type=<?php echo $row['id_Type']; ?>"><?php echo $row['name_Type']; ?></a></li>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                                <form class="d-flex mt-3 mt-lg-0" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="<?php echo $translations["message-search"]; ?>">
                                        <button class="btn btn-secondary" type="button"><?php echo $translations["button-search"]; ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="col-12 p-0">

            <?php
            switch (trim($UrlPage)) {
                case 'home':
                    include("view-dashboard.php");
                    break;
                case 'search':
                    include("view-search.php");
                    break;
                case 'province':
                    include("view-province.php");
                    break;
                case 'post':
                    include("view-post-detail.php");
                    break;
                case 'post-all':
                    include("view-post-all.php");
                    break;
                case 'post-new':
                    include("view-post-new.php");
                    break;
                case 'post-edit':
                    include("view-post-edit.php");
                    break;

                case 'login':
                    include("view-login.php");
                    break;
                case 'view-verification':
                    include("view-verification.php");
                    break;
                case 'register':
                    include("view-register.php");
                    break;
                case 'forgot':
                    include("view-forgot.php");
                    break;

                case 'member':
                    include("view-member.php");
                    break;
                case 'preview':
                    include("view-preview.php");
                    break;
                case 'cron-file':
                    include("cron-file.php");
                    break;


                case 'policy':
                    include("view-policy.php");
                    break;
                case 'sitemap':
                    include("view-sitemap.php");
                    break;
                case 'term-and-condition':
                    include("view-term-and-condition.php");
                    break;

                case 'logout':
                    setcookie("uid", null, time() - 86400, '/');
                    setcookie("mid", null, time() - 86400, '/');
                    unset($_COOKIE["mid"]);
                    unset($_COOKIE["uid"]);

                    session_unset();
                    session_destroy();
                    header("Location:" . $LinkWeb);
                    break;

                default:
                    include("view-dashboard.php");
                    break;
            }
            ?>


        </div>
    </div>



    <!-- Footer -->
    <div class="row m-0 mt-0 text-white bg-secondary" style="background-color:#45637d;">
        <div class="col-12 p-0">
            <div class="container p-0">
                <div class="row m-0 mb-5">
                    <div class="col-sm-12 col-md-6 col-12 pt-5">
                        <h5 class="text-uppercase"><?php echo ucfirst(str_replace("www.", "", $post_domain)); ?></h5>
                        <p>
                            ลงประกาศฟรี เว็บไซต์ยอดนิยมให้บริการออนไลน์ ลงประกาศขายบ้านฟรี ลงประกาศขาย ซื้อ ให้เช่า ประกาศและบริการต่างๆ ฟรีไม่มีข้อผูกมัดแค่ทำตามเงื่อนไข
                        </p>
                        <script id="dbd-init" src="https://www.trustmarkthai.com/callbackData/initialize.js?t=1466a-25-5-23d8cf4b464a33664c21893775a3bed724533607"></script>
                        <div id="Certificate-banners" style="background: #fff;display: inline-table;border-radius: 10px;"></div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-12 pt-5">
                        <h5 class="text-uppercase"><?php echo $translations["footer-menu"]; ?></h5>
                        <p class="pl-3 row m-0">
                            <a href="<?php echo $LinkWeb; ?>" class="col-12 text-link-footer mt-2 text-white"><?php echo $translations["home"]; ?></a>
                            <a href="<?php echo $LinkWeb; ?>policy" class="col-12 text-link-footer mt-2 text-white"><?php echo $translations["policy"]; ?></a>
                            <a href="<?php echo $LinkWeb; ?>term-and-condition" class="col-12 text-link-footer mt-2 text-white"><?php echo $translations["term-and-condition"]; ?></a>
                        </p>
                    </div>
                    <div class="col-sm-6 col-md-3 col-12 pt-5">
                        <h5 class="text-uppercase"><?php echo $translations["footer-contact"]; ?></h5>
                        <p style="padding-left:25px;">Email : contact@<?php echo str_replace("www.", "", $post_domain); ?></p>
                        <p style="padding-left:25px;">LINE ID : <a href="https://line.me/ti/p/0xn6zip09D" rel="nofollow" style="color:#fff;text-decoration: none;">seen_nuakaew</a></p>
                        <p style="padding-left:25px;"><a rel="nofollow" style="color:#fff;text-decoration: none;" href="https://line.me/ti/p/0xn6zip09D"><?php echo $translations["footer-ads"]; ?></a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 pt-2 pb-2 p-0 text-center" style="background-color: rgba(0, 0, 0, 0.2);">
            <?php echo $translations["copyright"]; ?> © 2567 - <a href="<?php echo $LinkWeb; ?>" class="" style="color:#fff;"><?php echo str_replace("www.", "", $LinkWeb); ?></a>
        </div>
    </div>
    <!-- Footer -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script>
        $("img.lazyload").lazyload();
    </script>



</body>

</html>