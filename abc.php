<?php 
date_default_timezone_set('Asia/Bangkok');

$mysqli = new mysqli("localhost","postkaic_post","nbd5nZAPMv","postkaic_post");
// Check connection
if ($mysqli -> connect_errno) {echo "Failed to connect to MySQL: " . $mysqli -> connect_error; exit();}
$sql = "SELECT NOW();";
$result = $mysqli -> query($sql);
$row = $result -> fetch_assoc();
echo "Show Time on Mysql Now :<br>".$row['NOW()'];
$result -> free_result();
$mysqli -> close();

echo "<br><br>Show Time Now : <br>".date("Y-m-d H:i:s")." (is real)";
?>
