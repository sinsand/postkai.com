<?php

$LinkWeb = $httplink."://".$_SERVER['HTTP_HOST']."/";

/// postkai.com
$Host = "localhost";
$User = "postkaic_post";
$Pass = "PpAVZqhvVA22a6sSPaMu";
$DBname = "postkaic_post";



if (!empty($PathExplode[1])) {
    $UrlPage = $PathExplode[1];
}
if (!empty($PathExplode[2])) {
    $UrlId = $PathExplode[2];
}
if (!empty($PathExplode[3])) {
    $UrlIdSub = $PathExplode[3];
}
if (!empty($PathExplode[4])) {
    $UrlOther = $PathExplode[4];
}
if (!empty($PathExplode[5])) {
    $UrlOther2 = $PathExplode[5];
}
