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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" integrity="sha512-KbfxGgOkkFXdpDCVkrlTYYNXbF2TwlCecJjq1gK5B+BYwVk7DGbpYi4d4+Vulz9h+1wgzJMWqnyHQ+RDAlp8Dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />






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
                                        <a class="nav-link animate__animated animate__flash animate__infinite <?php echo $UrlPage == "post-new" ? "active" : ""; ?>" href="<?php echo $LinkWeb; ?>post-new" style="color:#f9f000;"><?php echo $translations["post-new"]; ?></a>
                                    </li>
                                    <li class="nav-item me-2">
                                        <a class="nav-link <?php echo $UrlPage == "post-all" ? "active" : ""; ?>" href="<?php echo $LinkWeb; ?>post-all"><?php echo $translations["post-all"]; ?></a>
                                    </li>
                                    <li class="nav-item me-2 dropdown" style="z-index:1021;">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo $translations["type-search"]; ?>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <?php
                                            $SqlSelect = "SELECT *
                                              FROM p_type
                                              ORDER BY name_Type ASC ;";
                                            if (select_num($SqlSelect) > 0) {
                                                foreach (select_tb($SqlSelect) as $row) {
                                            ?>
                                                    <li>
                                                        <a class="dropdown-item" href="<?php echo $LinkWeb; ?>search/?type=<?php echo $row['id_Type']; ?>"><?php echo $row['name_Type']; ?></a>
                                                    </li>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <!-- </ul>
                                <form class="d-flex mt-3 mt-lg-0 d-none" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="<?php echo $translations["message-search"]; ?>">
                                        <button class="btn btn-secondary" type="button"><?php echo $translations["button-search"]; ?></button>
                                    </div>
                                </form>
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-0"> -->
                                    <li class="nav-item me-2 dropdown" style="z-index:1021;">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-solid fa-globe"></i> <span class="caret"></span></a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="<?php echo ch_lang($LinkPath); ?>?lang=us"><span class="fi fi-us"></span> English</a></li>
                                            <li><a class="dropdown-item" href="<?php echo ch_lang($LinkPath); ?>?lang=th"><span class="fi fi-th"></span> ภาษาไทย</a></li>
                                        </ul>
                                    </li>
                                    <?php
                                    if (empty($_COOKIE["uid"])) {
                                    ?>
                                        <li class="nav-item me-2">
                                            <a class="nav-link <?php echo $UrlPage == "login" ? "active" : ""; ?>" href="<?php echo $LinkWeb; ?>login"><?php echo $translations["login-submit"]; ?></a>
                                        </li>
                                        <li class="nav-item me-2">
                                            <a class="nav-link <?php echo $UrlPage == "register" ? "active" : ""; ?>" href="<?php echo $LinkWeb; ?>register"><?php echo $translations["register-header"]; ?></a>
                                        </li>
                                    <?php
                                    } else {
                                    ?>
                                        <li class="nav-item me-2">
                                            <a class="nav-link <?php echo $UrlPage == "member" ? "active" : ""; ?>" href="<?php echo $LinkWeb; ?>member"><?php echo $translations["login-profile"]; ?></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $LinkWeb; ?>logout"><?php echo $translations["login-logout"]; ?></a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="col-12 p-0 bg_box_l">
            <div class="container">

                <?php
                //echo "UrlPage: ".$UrlPage."<br>";
                //echo "UrlId: ".$UrlId."<br>";
                ?>

                <div class="row m-0 mt-4 mb-4">
                    <div class="col-lg-12 col-xl-9">
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
                    <div class="col-lg-12 col-xl-3">

                        <div class="sticky-top sticky-bottom top-0 bottom-0">
                            <div class="row m-0">
                                <div class="col-12 pt-5">
                                    <div class="card p-2">
                                        <h2 class="mb-2 mt-2 text-center"><?php echo $translations["search"]; ?></h2>
                                        <div class="col-12 p-0">
                                            <form action="<?php echo $LinkWeb; ?>search/" method="get">
                                                <div class="mb-3">
                                                    <label><?php echo $translations["message-search"]; ?></label>
                                                    <input type="search" class="form-control" placeholder="ข้อความค้นหา" name="keywords" value="<?php echo !empty($_GET['keywords']) ? $_GET['keywords'] : "" ?>" autocomplete="off" required>
                                                </div>
                                                <div class="mb-3">
                                                    <select class="form-select" name="province">
                                                        <option value=""><?php echo $translations["all-province"]; ?></option>
                                                        <?php
                                                        $SqlSelect = "SELECT *
                                                                        FROM p_province
                                                                        ORDER BY PROVINCE_NAME ASC ";
                                                        if (select_num($SqlSelect) > 0) {
                                                            foreach (select_tb($SqlSelect) as $row) {
                                                        ?>
                                                                <option value="<?php echo $row['PROVINCE_ID']; ?>" <?php echo $_GET['province'] == $row['PROVINCE_ID'] ? "selected" : ""; ?>><?php echo $row['PROVINCE_NAME']; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <select class="form-select" name="category">
                                                        <option value=""><?php echo $translations["all-category"]; ?></option>
                                                        <?php
                                                        $SqlSelect = "SELECT *
                                                                        FROM p_category
                                                                        ORDER BY name_category ASC ";
                                                        if (select_num($SqlSelect) > 0) {
                                                            foreach (select_tb($SqlSelect) as $row) {
                                                        ?>
                                                                <option value="<?php echo $row['id_category']; ?>" <?php echo $_GET['category'] == $row['id_category'] ? "selected" : ""; ?>><?php echo $row['name_category']; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <select class="form-select" name="type">
                                                        <option value=""><?php echo $translations["all-type"]; ?></option>
                                                        <?php
                                                        $SqlSelect = "SELECT *
                                                                        FROM p_type
                                                                        ORDER BY name_Type ASC ";
                                                        if (select_num($SqlSelect) > 0) {
                                                            foreach (select_tb($SqlSelect) as $row) {
                                                        ?>
                                                                <option value="<?php echo $row['id_Type']; ?>" <?php echo $_GET['type'] == $row['id_Type'] ? "selected" : ""; ?>><?php echo $row['name_Type']; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <p class="text-center d-none">
                                                    <a href="<?php echo $LinkWeb; ?>search"><?php echo $translations["page-search"]; ?></a>
                                                </p>
                                                <button type="submit" class="btn btn-success mb-10" style="width:100%;"><?php echo $translations["button-search"]; ?></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <div class="row m-0 mt-0 text-white bg-secondary " style="background-color:#45637d;">
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
                        <p style="padding-left:25px;">Email : nuakaew.a@gmail.com</p>
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



    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js" integrity="sha512-kZv5Zq4Cj/9aTpjyYFrt7CmyTUlvBday8NGjD9MxJyOY/f2UfRYluKsFzek26XWQaiAp7SZ0ekE7ooL9IYMM2A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 400,

            });
        });
    </script>





    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script>
        $("img.lazyload").lazyload();
    </script>
    <script src="https://www.google.com/recaptcha/api.js?key=6LcK9v4pAAAAALh_WlZV5JYCqLFQToygb_lqfxju"></script>
    <script>
        function onSubmit(event) {
            var response = grecaptcha.getResponse();
            if (!response) {
                $(".show-alert").html('กรุณายืนยัน reCAPTCHA');
                event.preventDefault();
                return false;
            }
            return true;
        }
    </script>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.4.4/photoswipe.min.css" integrity="sha512-LFWtdAXHQuwUGH9cImO9blA3a3GfQNkpF2uRlhaOpSbDevNyK1rmAjs13mtpjvWyi+flP7zYWboqY+8Mkd42xA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module">
        // Include Lightbox 
        import PhotoSwipeLightbox from 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.4.4/photoswipe-lightbox.esm.min.js';

        const lightbox = new PhotoSwipeLightbox({
            // may select multiple "galleries"
            gallery: '#gallery--getting-started',

            // Elements within gallery (slides)
            children: 'a',

            // setup PhotoSwipe Core dynamic import
            pswpModule: () => import('https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.4.4/photoswipe.esm.min.js')
        });
        lightbox.init();
    </script>
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
    <script>
        window.onload = function() {
            render();
        };

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }

        ///// on page register
        function phoneAuth() {
            var _number = document.getElementById('pPhoneNumber').value;
            var _code_number = document.getElementById('pCodeNumber').options[document.getElementById('pCodeNumber').selectedIndex].getAttribute("code");
            var _totalnumber = '+' + _code_number + parseInt(_number);
            console.log(_totalnumber);

            if (_number.length > 0) {
                //it takes two parameter first one is number and second one is recaptcha
                firebase.auth().signInWithPhoneNumber(_totalnumber, window.recaptchaVerifier).then(function(confirmationResult) {
                    //s is in lowercase
                    window.confirmationResult = confirmationResult;
                    coderesult = confirmationResult;
                    console.log(coderesult);
                    //alert("Message sent");
                    //window.location="http://localhost/postkai.com/view-verification";
                    //$("#register-view-show").modal();
                    $("#register-view-show").modal({
                        backdrop: "static"
                    });
                }).catch(function(error) {
                    document.getElementById("alertShowError").innerHTML = error.message;
                    //alert(error.message);
                });
            } else {
                document.getElementById("alertShowError").innerHTML = "<?php echo $translations['forgot-submit-confirm-verify-error'];?>";
            }
        }

        function codeverify() {
            var code = document.getElementById('verificationCode').value;
            coderesult.confirm(code).then(function(result) {
                //alert("Successfully registered");
                var user = result.user;
                console.log(user.uid);
                var _fullname = document.getElementById('pFullname').value;
                var _phonenumber = document.getElementById('pPhoneNumber').value;
                var _password = document.getElementById('pPassword').value;
                var _code_number = document.getElementById('pCodeNumber').options[document.getElementById('pCodeNumber').selectedIndex].getAttribute("code");
                $.ajax({
                    type: "POST", //type of method
                    url: "<?php echo $LinkWeb;?>query/query-system.php", //your page
                    data: {
                        _fullname: _fullname,
                        _codephone: _code_number,
                        _phone: _phonenumber,
                        _password: _password,
                        uid: user.uid,
                        post: 'insert_member'
                    }, // passing the values
                    success: function(res) {
                        console.log(res);
                        document.getElementById("alertShowcompleted").innerHTML = res;
                        //window.location = "http://localhost/postkai.com/login";
                    }
                });
            }).catch(function(error) {
                //alert(error.message);
            });
        }
        ///// end on page register


        function getuser() {
            firebase.auth().onAuthStateChanged((user) => {
                if (user) {
                    // User is signed in, see docs for a list of available properties
                    // https://firebase.google.com/docs/reference/js/firebase.User
                    var uid = user.uid;
                    // ...
                } else {
                    // User is signed out
                    // ...
                }
            });
        }

        ///////// on forgot
        function phoneAuth_forgot() {

            var _link = document.getElementById('linkweb').value;
            var _number = document.getElementById('pPhoneNumber').value;
            var _code_number = document.getElementById('pCodeNumber').options[document.getElementById('pCodeNumber').selectedIndex].getAttribute("code");
            var _totalnumber = '+' + _code_number + parseInt(_number);
            console.log(_totalnumber);

            $.post("<?php echo $LinkWeb;?>query/query-system.php", {
                    _codephone: _code_number,
                    _phone: _number,
                    _linkweb: _link,
                    post: 'check_member'
                },
                function(res) {
                    var i = res.split("|||");
                    var _first = i[0];
                    var _end = i[1];
                    if (_first == '1') {
                        console.log(_end);
                        document.getElementById("show_log_member").innerHTML = _end;
                        if (_number.length > 0) {
                            //it takes two parameter first one is number and second one is recaptcha
                            firebase.auth().signInWithPhoneNumber(_totalnumber, window.recaptchaVerifier).then(function(confirmationResult) {
                                //s is in lowercase
                                window.confirmationResult = confirmationResult;
                                coderesult = confirmationResult;
                                console.log(coderesult);

                            }).catch(function(error) {
                                document.getElementById("show_log_member").innerHTML = error.message;
                                //alert(error.message);
                            });
                        } else {
                            document.getElementById("show_log_member").innerHTML = "<?php echo $translations['forgot-submit-confirm-verify-error'];?>";
                        }

                    } else {
                        console.log(_end);
                        document.getElementById("show_log_member").innerHTML = _end;
                    }

                });

        }

        function codeverify_forgot() {

            var code = document.getElementById('verificationCode').value;
            var _code_number = document.getElementById('pCodeNumber').options[document.getElementById('pCodeNumber').selectedIndex].getAttribute("code");
            var _phonenumber = document.getElementById('pPhoneNumber').value;

            coderesult.confirm(code).then(function(result) {
                //alert("Successfully registered");
                var user = result.user;

                document.getElementById('show_log_member').innerHTML = "<div style='color:#48a868;'><?php echo $translations['forgot-submit-confirm-verify'];?></div>";
                document.getElementById('PostConfirm').innerHTML = "<?php echo $translations['forgot-submit-confirm-verify-waiting'];?>....<i class='fa-solid fa-spinner'></i>";
                document.getElementById('puid').value = user.uid;
                console.log(user.uid);
                setTimeout(function() {
                    document.getElementById("FormForgotMember").submit();
                }, 2000);
            }).catch(function(error) {
                console.log(error.message);
            });

        }
        ///////// end on forgot
    </script>
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