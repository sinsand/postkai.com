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
    require("view-sitemap.php");
  }else if ($UrlPage=="sitemap-post.xml") {
    require("view-sitemap-post.php");
  }else if ($UrlPage=="sitemap-category.xml") {
    require("view-sitemap-category.php");
  }else if ($UrlPage=="sitemap-type.xml") {
    require("view-sitemap-type.php");
  }else if ($UrlPage=="outlink") {
    require("outlink.php");
  }else if ($UrlPage=="isys") {
    require("admin/index.php");
  }else {
    require("new/index.php");
  }
}else {
  require("new/index.php");
}
?>
