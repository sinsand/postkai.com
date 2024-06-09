<?php

$LinkWeb = $httplink."://".$_SERVER['HTTP_HOST']."/postkai.com/";

/// localhost postkai
$Host = "localhost";
$User = "root";
$Pass = "";
$DBname = "chonjob_postkai";



if (!empty($PathExplode[2])) {
    $UrlPage = $PathExplode[2];
}
if (!empty($PathExplode[3])) {
    $UrlId = $PathExplode[3];
}
if (!empty($PathExplode[4])) {
    $UrlIdSub = $PathExplode[4];
}
if (!empty($PathExplode[5])) {
    $UrlOther = $PathExplode[5];
}
if (!empty($PathExplode[6])) {
    $UrlOther2 = $PathExplode[6];
}
