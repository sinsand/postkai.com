<form action="http://www.google.co.th/cse" id="cse-search-box" target="_blank">
  <div>
    <input type="hidden" name="cx" value="partner-pub-2101138700314615:qwbfsg-qwdf" />
    <input type="hidden" name="ie" value="windows-874" />
    <input type="text" name="q" size="20" />
    <input type="submit" name="sa" value="&#x0e04;&#x0e49;&#x0e19;&#x0e2b;&#x0e32;" />
  </div>
</form>
<script type="text/javascript" src="http://www.google.co.th/cse/brand?form=cse-search-box&amp;lang=th"></script><br />
<img src="<?=$page_link?>/images/cat.jpg" alt="ประเภทอสังหาริมทรัพย์" title="ประเภทอสังหาริมทรัพย์" /><br /><br />
&nbsp;<strong><a href="<?=$page_link?>/บ้าน-ทาวน์เฮ้าส์-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง/house" title="บ้าน ทาวน์เฮ้าส์ บ้านจัดสรร บ้านเดี่ยว บ้านมือสอง">House</a></strong>&nbsp;-&nbsp;บ้าน ,ทาวน์เฮ้าส์ ,บ้านจัดสรร ,บ้านเดี่ยว ,บ้านมือสอง&nbsp;
(<?
	$sqlhouse = "SELECT * FROM sb_job where jType = '1' ";
	$resulthouse = $db->query($sqlhouse);
	echo $totalrowshouse = mysql_num_rows($resulthouse);
?>)
<br />
&nbsp;<font color="#CCCCCC">------------------------------------------------------</font><br />
&nbsp;<strong><a href="<?=$page_link?>/คอนโด-คอนโดมีเนียม-อาคารชุด-แฟลต/condo" title="คอนโด คอนโดมีเนียม อาคารชุด">Condo</a></strong>&nbsp;-&nbsp;คอนโด ,คอนโดมีเนียม ,อาคารชุด <br />อพาร์ทเม้นท์&nbsp;
(<?
	$sqlhouse = "SELECT * FROM sb_job where jType = '2' ";
	$resulthouse = $db->query($sqlhouse);
	echo $totalrowshouse = mysql_num_rows($resulthouse);
?>)
<br />
&nbsp;<font color="#CCCCCC">------------------------------------------------------</font><br />
&nbsp;<strong><a href="<?=$page_link?>/ตึก-อาคารพานิชย์-ร้านค้า-โรงงาน-โกดัง/building" title="ตึก อาคารพานิชย์ โรงงาน โกดัง">Building</a></strong>&nbsp;-&nbsp;ตึก ,อาคารพานิชย์ ,โรงงาน <br />โกดัง ,สำนักงาน&nbsp;
(<?
	$sqlhouse = "SELECT * FROM sb_job where jType = '3' ";
	$resulthouse = $db->query($sqlhouse);
	echo $totalrowshouse = mysql_num_rows($resulthouse);
?>)
<br />
&nbsp;<font color="#CCCCCC">------------------------------------------------------</font><br />
&nbsp;<strong><a href="<?=$page_link?>/ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดินสำหรับการเกษตร/land" title="ที่ดินเปล่า ที่ดินจัดสรร ที่ดิน">Land</a></strong>&nbsp;-&nbsp;ที่ดินเปล่า ,ที่ดินจัดสรร ,ที่ดิน&nbsp;
(<?
	$sqlhouse = "SELECT * FROM sb_job where jType = '4' ";
	$resulthouse = $db->query($sqlhouse);
	echo $totalrowshouse = mysql_num_rows($resulthouse);
?>)
<br />
&nbsp;<font color="#CCCCCC">------------------------------------------------------</font><br />
&nbsp;<strong><a href="<?=$page_link?>/อาคารเช่า-ห้องเช่า-บ้านเช่า-หอพัก/rent" title="อาคารเช่า ห้องเช่า บ้านเช่า">Rent</a></strong>&nbsp;-&nbsp;อาคารเช่า ,ห้องเช่า ,ตึกเช่า ,ห้องพัก<br />ให้เช่า ,ห้องว่างให้เช่า&nbsp;
(<?
	$sqlhouse = "SELECT * FROM sb_job where jType = '5' ";
	$resulthouse = $db->query($sqlhouse);
	echo $totalrowshouse = mysql_num_rows($resulthouse);
?>)
<br />
&nbsp;<font color="#CCCCCC">------------------------------------------------------</font><br />
&nbsp;<strong><a href="<?=$page_link?>/อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ร้านซ่อม-ซ่อมแซม/furniture" title="อุปกร์ตกแต่งบ้าน อุปกรณ์สำนักงาน แอร์ ซ่อมแซม">Furniture</a></strong>&nbsp;-&nbsp;อุปกร์ตกแต่งบ้าน ,อุปกรณ์สำนักงาน ,แอร์ ,ซ่อมแซม ,เฟอร์นิเจอร์&nbsp;
(<?
	$sqlhouse = "SELECT * FROM sb_job where jType = '6' ";
	$resulthouse = $db->query($sqlhouse);
	echo $totalrowshouse = mysql_num_rows($resulthouse);
?>)
<br />
&nbsp;<font color="#CCCCCC">------------------------------------------------------</font><br />
&nbsp;<strong><a href="<?=$page_link?>/รถยนต์-รถมือสอง-รถจักรยานยนต์/car" title="รถยนต์ รถมือสอง รถจักรยานยนต์">Car</a></strong>&nbsp;-&nbsp;รถยนต์ ,รถมือสอง ,รถยนต์มือสอง <br />รถใหม่ ,รถบรรทุก&nbsp;
(<?
	$sqlhouse = "SELECT * FROM sb_job where jType = '7' ";
	$resulthouse = $db->query($sqlhouse);
	echo $totalrowshouse = mysql_num_rows($resulthouse);
?>)
<br />
&nbsp;<font color="#CCCCCC">------------------------------------------------------</font><br />
&nbsp;<strong><a href="<?=$page_link?>/รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน-ที่พัก/others" title="รถรับจ้าง ทุบตึก รื้อถอนบ้าน">Others</a></strong>&nbsp;-&nbsp;รถรับจ้าง ,ทุบตึก ,รื้อถอนบ้าน <br />ย้ายสำนักงาน และอื่น ๆ&nbsp
(<?
	$sqlhouse = "SELECT * FROM sb_job where jType = '8' ";
	$resulthouse = $db->query($sqlhouse);
	echo $totalrowshouse = mysql_num_rows($resulthouse);
?>)
<br />
&nbsp;<font color="#CCCCCC">------------------------------------------------------</font>

