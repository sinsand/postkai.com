<?php
include("config/config.php");

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
    include("system/index.php");
  }
}else {
  include("system/index.php");
  //include("under.php");
}
?>
