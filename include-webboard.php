&nbsp;<p><strong><font size="4">กระทู้ทั้งหมด&nbsp;
<?
$sql = "SELECT * FROM webboard where wID != '0'";
$result = $db->query($sql);
echo $num = mysql_num_rows($result);
?>&nbsp;
กระทู้
&nbsp;&nbsp;&nbsp;<a href="<?=$page_link?>/webboard/เริ่มหัวข้อใหม่" title="เริ่มหัวข้อใหม่"><img src="<?=$page_link?>/images/new-topic.png" border="0" alt="เริ่มหัวข้อใหม่" title="เริ่มหัวข้อใหม่" /></a></font></strong>
</p>
<h3><font color="#FF0000"><u>++&nbsp;ประกาศ!&nbsp;&nbsp;เว็บบอร์ดอสังหาริมทรัพย์สามารถใช้งานได้แล้วตั้งแต่บัดนี้เป็นต้นไปครับ.&nbsp;++</u></font></h3>
&nbsp;
<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard"><img src="<?=$page_link?>/images/board-home.png" alt="บ้าน ทาวน์เฮ้าส์ บ้านจัดสรร บ้านเดี่ยว บ้านมือสอง" title="บ้าน ทาวน์เฮ้าส์ บ้านจัดสรร บ้านเดี่ยว บ้านมือสอง" /></div>
<div class="textwebboard"><strong><a href="<?=$page_link?>/webboard/บ้าน-ทาวน์เฮ้าส์-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง/1" title="บ้าน ทาวน์เฮ้าส์ บ้านจัดสรร บ้านเดี่ยว บ้านมือสอง"><font size="4">House</font></a></strong><br /><strong>บ้าน ,ทาวน์เฮ้าส์ ,บ้านจัดสรร ,บ้านเดี่ยว ,บ้านมือสอง</strong><br />
ร่วมพูดคุย แบ่งปันเรื่องราวไม่ว่าจะเป็นการสร้างบ้าน การเลือกซื้อบ้าน บ้านเดี่ยว บ้านจัดสรร ทาวน์เฮ้าส์ เป็นต้น
</div>
</div>

<div class="rightwebboard">
<strong>กระทู้หมวดนี้ทั้งหมด&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '1'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;กระทู้</strong><br />
กระทู้ล่าสุดโดย:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '1' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
วันที่:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>

<br />

<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard"><img src="<?=$page_link?>/images/board-condo.png" alt="คอนโด คอนโดมีเนียม อาคารชุด" title="คอนโด คอนโดมีเนียม อาคารชุด" /></div>
<div class="textwebboard"><strong><a href="<?=$page_link?>/webboard/คอนโด-คอนโดมีเนียม-อาคารชุด-แฟลต/2" title="คอนโด คอนโดมีเนียม อาคารชุด"><font size="4">Condo</font></a></strong><br /><strong>คอนโด ,คอนโดมีเนียม ,อาคารชุด ,อพาร์ทเม้นท์</strong><br />
ร่วมพูดคุย แบ่งปันเรื่องราวไม่ว่าจะเป็นการสร้างคอนโด การเลือกซื้อคอนโด อพาร์ทเม้นท์ คอนโดมีเนียม เป็นต้น
</div>
</div>
<div class="rightwebboard">
<strong>กระทู้หมวดนี้ทั้งหมด&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '2'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;กระทู้</strong><br />
กระทู้ล่าสุดโดย:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '2' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
วันที่:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>

<br />

<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard"><img src="<?=$page_link?>/images/board-building.png" alt="ตึก อาคารพานิชย์ โรงงาน โกดัง" title="ตึก อาคารพานิชย์ โรงงาน โกดัง" /></div>
<div class="textwebboard"><strong><a href="<?=$page_link?>/webboard/ตึก-อาคารพานิชย์-ร้านค้า-โรงงาน-โกดัง/3" title="ตึก อาคารพานิชย์ โรงงาน โกดัง"><font size="4">Building</font></a></strong><br /><strong>ตึก ,อาคารพานิชย์ ,โรงงาน ,โกดัง ,สำนักงาน</strong><br />
ร่วมพูดคุย แบ่งปันเรื่องราวไม่ว่าจะเป็นการสร้างตึก การเลือกซื้อตึก อาคารพานิชย์ สำนักงาน โรงงาน เป็นต้น
</div>
</div>
<div class="rightwebboard">
<strong>กระทู้หมวดนี้ทั้งหมด&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '3'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;กระทู้</strong><br />
กระทู้ล่าสุดโดย:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '3' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
วันที่:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>

<br />

<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard"><img src="<?=$page_link?>/images/board-land.png" alt="ที่ดินเปล่า ที่ดินจัดสรร ที่ดิน" title="ที่ดินเปล่า ที่ดินจัดสรร ที่ดิน" /></div>
<div class="textwebboard"><strong><a href="<?=$page_link?>/webboard/ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดินสำหรับการเกษตร/4" title="ที่ดินเปล่า ที่ดินจัดสรร ที่ดิน"><font size="4">Land</font></a></strong><br /><strong>ที่ดินเปล่า ,ที่ดินจัดสรร ,ที่ดิน</strong><br />
ร่วมพูดคุย แบ่งปันเรื่องราวไม่ว่าจะเป็นการเลือกซื้อที่ดินเป็นต้น
</div>
</div>
<div class="rightwebboard">
<strong>กระทู้หมวดนี้ทั้งหมด&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '4'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;กระทู้</strong><br />
กระทู้ล่าสุดโดย:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '4' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
วันที่:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>


<br />

<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard"><img src="<?=$page_link?>/images/board-rent.png" alt="อาคารเช่า ห้องเช่า บ้านเช่า" title="อาคารเช่า ห้องเช่า บ้านเช่า" /></div>
<div class="textwebboard"><strong><a href="<?=$page_link?>/webboard/อาคารเช่า-ห้องเช่า-บ้านเช่า-หอพัก/5" title="อาคารเช่า ห้องเช่า บ้านเช่า"><font size="4">Rent</font></a></strong><br /><strong>อาคารเช่า ,ห้องเช่า ,ตึกเช่า ,ห้องพัก ,ให้เช่า ,ห้องว่างให้เช่า</strong><br />
ร่วมพูดคุย แบ่งปันเรื่องราวไม่ว่าจะเป็นการเช่าห้องพัก ห้องว่างให้เช่า อาคารเช่า ตึกเช่า เป็นต้น
</div>
</div>
<div class="rightwebboard">
<strong>กระทู้หมวดนี้ทั้งหมด&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '5'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;กระทู้</strong><br />
กระทู้ล่าสุดโดย:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '5' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
วันที่:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>

<br />

<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard"><img src="<?=$page_link?>/images/board-furniture.png" alt="อุปกร์ตกแต่งบ้าน อุปกรณ์สำนักงาน แอร์ ซ่อมแซม" title="อุปกร์ตกแต่งบ้าน อุปกรณ์สำนักงาน แอร์ ซ่อมแซม" /></div>
<div class="textwebboard"><strong><a href="<?=$page_link?>/webboard/อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ร้านซ่อม-ซ่อมแซม/6" title="อุปกร์ตกแต่งบ้าน อุปกรณ์สำนักงาน แอร์ ซ่อมแซม"><font size="4">Furniture</font></a></strong><br /><strong>อุปกร์ตกแต่งบ้าน ,อุปกรณ์สำนักงาน ,แอร์ ,ซ่อมแซม ,เฟอร์นิเจอร์</strong><br />
ร่วมพูดคุย แบ่งปันเรื่องราวไม่ว่าจะเป็นอุปกร์ตกแต่งบ้าน อุปกรณ์สำนักงาน ซ่อมแซม เฟอร์นิเจอร์ เป็นต้น
</div>
</div>
<div class="rightwebboard">
<strong>กระทู้หมวดนี้ทั้งหมด&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '6'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;กระทู้</strong><br />
กระทู้ล่าสุดโดย:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '6' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
วันที่:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>

<br />

<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard"><img src="<?=$page_link?>/images/board-car.png" alt="รถยนต์ รถมือสอง รถจักรยานยนต์" title="รถยนต์ รถมือสอง รถจักรยานยนต์" /></div>
<div class="textwebboard"><strong><a href="<?=$page_link?>/webboard/รถยนต์-รถมือสอง-รถจักรยานยนต์/7" title="รถยนต์ รถมือสอง รถจักรยานยนต์"><font size="4">Car</font></a></strong><br /><strong>รถยนต์ ,รถมือสอง ,รถยนต์มือสอง ,รถใหม่ ,รถบรรทุก</strong><br />
ร่วมพูดคุย แบ่งปันเรื่องราวไม่ว่าจะเป็นรถยนต์ รถยนต์มือสอง รถใหม่ รถบรรทุก เป็นต้น
</div>
</div>
<div class="rightwebboard">
<strong>กระทู้หมวดนี้ทั้งหมด&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '7'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;กระทู้</strong><br />
กระทู้ล่าสุดโดย:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '7' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
วันที่:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>

<br />

<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard"><img src="<?=$page_link?>/images/board-others.png" alt="รถรับจ้าง ทุบตึก รื้อถอนบ้าน" title="รถรับจ้าง ทุบตึก รื้อถอนบ้าน" /></div>
<div class="textwebboard"><strong><a href="<?=$page_link?>/webboard/รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน-ที่พัก/8" title="รถรับจ้าง ทุบตึก รื้อถอนบ้าน"><font size="4">Others</font></a></strong><br /><strong>รถรับจ้าง ,ทุบตึก ,รื้อถอนบ้าน ,ย้ายสำนักงาน และอื่น ๆ</strong><br />
ร่วมพูดคุย แบ่งปันเรื่องราวไม่ว่าจะเป็นรถรับจ้าง รื้อถอนบ้าน ทุบตึก ย้ายสำนักงาน เป็นต้น
</div>
</div>
<div class="rightwebboard">
<strong>กระทู้หมวดนี้ทั้งหมด&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '8'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;กระทู้</strong><br />
กระทู้ล่าสุดโดย:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '8' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
วันที่:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>

&nbsp;<p><strong><font size="4">กระทู้ 30 อันดับล่าสุด</font></strong>
<div class="webboardlistall">
<br />
<?
$sqlall = "SELECT * FROM webboard where wStatus = '1' order by wDate_Create desc limit 0,30";
$resultall = $db->query($sqlall);
while($fetchall = mysql_fetch_array($resultall)){

$sqlre = "SELECT * FROM rejob where wID = '".$fetchall['wID']."'";
$resultre = $db->query($sqlre);
$numre= mysql_num_rows($resultre);

$titleb = str_replace(' ','-', $fetchall['wTitle']);
$titleb = str_replace('#','-', $titleb);
$titleb = str_replace('%','-', $titleb);

$sqlm = "SELECT * FROM member where mID = '".$fetchall['mID']."' ";
$resultm = $db->query($sqlm);
$fetchm = mysql_fetch_array($resultm);
?>

<img src="<?=$page_link?>/images/list-webboard.png" alt="<?=$fetchall['wTitle']?>" title="<?=$fetchall['wTitle']?>" />&nbsp;&nbsp;<b><a href="<?=$page_link?>/board/<?=$titleb?>/<?=$fetchall['wID']?>/<?=$fetchall['wType']?>" title="<?=$fetchall['wTitle']?>" target="_blank"><u><?=$fetchall['wTitle']?></u></a></b>&nbsp;&nbsp;<font size="1"><b>โดย:</b>&nbsp;<?=$fetchm['mUsername']?>&nbsp;&nbsp;<b>วันที่:</b>&nbsp;<?=$fetchall['wDate_Create']?></font><font color="#FF0099">&nbsp;อ่าน:&nbsp;<strong><?=$fetchall['wRead']?></strong>&nbsp;,ตอบ:&nbsp;<strong><?=$numre?></strong></font><br />
<?
}
?>
<br />
</div>
</p>
<p align="center"><font color="#CCCCCC">---------------------------------------------------------------------------------------------------------------</font></p>