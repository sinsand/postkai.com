<?php
require("config/config.php");

if (isset($_GET['lang'])) {
  $selectedLang = $_GET['lang'];
  setcookie('lang', $selectedLang, time() + (86400 * 30), '/'); // Cookie expires in 30 days
} elseif (isset($_COOKIE['lang'])) {
  $selectedLang = $_COOKIE['lang'];
} else {
  $selectedLang = 'th'; // Thai
}

$lang = "language/".$selectedLang.".php";
require($lang);


if ($UrlPage!="") {
  if ($UrlPage=="sitemap.xml") {
    include("view-sitemap.php");
  }else if ($UrlPage=="sitemap-post.xml") {
    include("view-sitemap-post.php");
  }else if ($UrlPage=="sitemap-category.xml") {
    include("view-sitemap-category.php");
  }else if ($UrlPage=="sitemap-type.xml") {
    include("view-sitemap-type.php");
  }else if ($UrlPage=="outlink") {
    include("outlink.php");
  }else if ($UrlPage=="isys") {
    include("admin/index.php");
  }else {
    include("new/index.php");
  }
}else {
  include("new/index.php");
  //include("under.php");
}
?>
