<? session_start();

$text = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
$rand = substr(str_shuffle($text),0,5);

$_SESSION['verify_value'] = $rand;
$im = imagecreatefromjpeg("images/bg-verify.jpg");
$textcolor = imagecolorallocate($im,0,0,0);
imagestring($im,5,14,5,$rand,$textcolor);
header('content-type: image/jpeg');
imagejpeg($im);
imagedestroy($im);
?>