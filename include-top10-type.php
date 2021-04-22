<div class="top20weblist"><strong>เลือกประเภท&nbsp;&nbsp;&nbsp;:&nbsp;</strong>
<input name="typeall" id="house10" type="radio" value="1" checked="checked" onclick="hidden()" /><strong>House</strong>&nbsp;&nbsp;
<input name="typeall" id="condo10" type="radio" value="2" onclick="hidden()" /><strong>Condo</strong>&nbsp;&nbsp;
<input name="typeall" id="building10" type="radio" value="3" onclick="hidden()" /><strong>Building</strong>&nbsp;&nbsp;
<input name="typeall" id="land10" type="radio" value="4" onclick="hidden()" /><strong>Land</strong>&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="typeall" id="rent10" type="radio" value="5" onclick="hidden()" /><strong>Rent</strong>&nbsp;&nbsp;
<input name="typeall" id="furniture10" type="radio" value="6" onclick="hidden()" /><strong>Furniture</strong>&nbsp;&nbsp;
<input name="typeall" id="car10" type="radio" value="7" onclick="hidden()" /><strong>Car</strong>&nbsp;&nbsp;
<input name="typeall" id="others10" type="radio" value="8" onclick="hidden()" /><strong>Others</strong>&nbsp;&nbsp;
<input name="typeall" id="hidden" type="radio" value="9" onclick="hidden()" /><strong><font color="#CC6600">Hidden&nbsp;All</font></strong>&nbsp;&nbsp;<br /><br />

<br />
<div id="showtop10allwebHouse" style="display:none;">
<?
$sql = "SELECT * FROM sb_job where jType = '1' ORDER BY jDate_Create DESC limit 0,10";
$result = $db->query($sql);
while ($row = mysql_fetch_array($result))
{
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);
	
	if($row['jaType'] == "1")
	{
		$subtype = "ซื้อ";
	}
	if($row['jaType'] == "2")
	{
		$subtype = "ขาย";
	}
	if($row['jaType'] == "3")
	{
		$subtype = "ให้เช่า";
	}
	
	if($row['jType'] == "1")
	{
		$cat_type = "บ้าน-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง";
	}
	if($row['jType'] == "2")
	{
		$cat_type = "คอนโด-คอนโดมีเนียม-อาคารชุด";
	}
	if($row['jType'] == "3")
	{
		$cat_type = "ตึก-อาคารพานิชย์-โรงงาน-โกดัง";
	}
	if($row['jType'] == "4")
	{
		$cat_type = "ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดิน";
	}
	if($row['jType'] == "5")
	{
		$cat_type = "อาคารเช่า-ห้องเช่า-บ้านเช่า";
	}
	if($row['jType'] == "6")
	{
		$cat_type = "อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ซ่อมแซม";
	}
	if($row['jType'] == "7")
	{
		$cat_type = "รถยนต์-รถมือสอง";
	}
	if($row['jType'] == "8")
	{
		$cat_type = "รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน";
	}
	?>

<div class="imgleft">    
<?	
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?=$page_link?>/<?=$cat_type?>/<?=$titleall?>/1/1/<?=$row['jType']?>/<?=$row['jaType']?>/<?=$row['jID']?>" target="_blank" title="<?=$row['jTitle']?>">
                <? 
		  	echo "<b><font size='2'>"; 
			$position=100; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jTitle']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}	
			echo "</font></b>";		
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?=$subtype?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>ดูแ้ล้ว&nbsp;:&nbsp;<?=$row['jRead']?>&nbsp;ครั้ง</strong></font>
<br />
<?
			$position=150; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jDetail']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div>

<br />&nbsp;<br />
<?
}
?>
</div>

<div id="showtop10allwebCondo" style="display:none;">
<?
$sql = "SELECT * FROM sb_job where jType = '2' ORDER BY jDate_Create DESC limit 0,10";
$result = $db->query($sql);
while ($row = mysql_fetch_array($result))
{
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);
	
	if($row['jaType'] == "1")
	{
		$subtype = "ซื้อ";
	}
	if($row['jaType'] == "2")
	{
		$subtype = "ขาย";
	}
	if($row['jaType'] == "3")
	{
		$subtype = "ให้เช่า";
	}
	
	if($row['jType'] == "1")
	{
		$cat_type = "บ้าน-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง";
	}
	if($row['jType'] == "2")
	{
		$cat_type = "คอนโด-คอนโดมีเนียม-อาคารชุด";
	}
	if($row['jType'] == "3")
	{
		$cat_type = "ตึก-อาคารพานิชย์-โรงงาน-โกดัง";
	}
	if($row['jType'] == "4")
	{
		$cat_type = "ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดิน";
	}
	if($row['jType'] == "5")
	{
		$cat_type = "อาคารเช่า-ห้องเช่า-บ้านเช่า";
	}
	if($row['jType'] == "6")
	{
		$cat_type = "อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ซ่อมแซม";
	}
	if($row['jType'] == "7")
	{
		$cat_type = "รถยนต์-รถมือสอง";
	}
	if($row['jType'] == "8")
	{
		$cat_type = "รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน";
	}
?>
<div class="imgleft">    
<?	
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?=$page_link?>/<?=$cat_type?>/<?=$titleall?>/1/1/<?=$row['jType']?>/<?=$row['jaType']?>/<?=$row['jID']?>" target="_blank" title="<?=$row['jTitle']?>">
                <? 
		  	echo "<b><font size='2'>"; 
			$position=100; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jTitle']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}	
			echo "</font></b>";		
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?=$subtype?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>ดูแ้ล้ว&nbsp;:&nbsp;<?=$row['jRead']?>&nbsp;ครั้ง</strong></font>
<br />
<?
			$position=150; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jDetail']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div>
<br />&nbsp;<br />
<?
}
?>
</div>

<div id="showtop10allwebBuilding" style="display:none;">
<?
$sql = "SELECT * FROM sb_job where jType = '3' ORDER BY jDate_Create DESC limit 0,10";
$result = $db->query($sql);
while ($row = mysql_fetch_array($result))
{
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);
	
	if($row['jaType'] == "1")
	{
		$subtype = "ซื้อ";
	}
	if($row['jaType'] == "2")
	{
		$subtype = "ขาย";
	}
	if($row['jaType'] == "3")
	{
		$subtype = "ให้เช่า";
	}
	
	if($row['jType'] == "1")
	{
		$cat_type = "บ้าน-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง";
	}
	if($row['jType'] == "2")
	{
		$cat_type = "คอนโด-คอนโดมีเนียม-อาคารชุด";
	}
	if($row['jType'] == "3")
	{
		$cat_type = "ตึก-อาคารพานิชย์-โรงงาน-โกดัง";
	}
	if($row['jType'] == "4")
	{
		$cat_type = "ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดิน";
	}
	if($row['jType'] == "5")
	{
		$cat_type = "อาคารเช่า-ห้องเช่า-บ้านเช่า";
	}
	if($row['jType'] == "6")
	{
		$cat_type = "อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ซ่อมแซม";
	}
	if($row['jType'] == "7")
	{
		$cat_type = "รถยนต์-รถมือสอง";
	}
	if($row['jType'] == "8")
	{
		$cat_type = "รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน";
	}
?>
<div class="imgleft">    
<?	
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?=$page_link?>/<?=$cat_type?>/<?=$titleall?>/1/1/<?=$row['jType']?>/<?=$row['jaType']?>/<?=$row['jID']?>" target="_blank" title="<?=$row['jTitle']?>">
                <? 
		  	echo "<b><font size='2'>"; 
			$position=100; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jTitle']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}	
			echo "</font></b>";		
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?=$subtype?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>ดูแ้ล้ว&nbsp;:&nbsp;<?=$row['jRead']?>&nbsp;ครั้ง</strong></font>
<br />
<?
			$position=150; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jDetail']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div><br />&nbsp;<br />
<?
}
?>
</div>

<div id="showtop10allwebLand" style="display:none;">
<?
$sql = "SELECT * FROM sb_job where jType = '4' ORDER BY jDate_Create DESC limit 0,10";
$result = $db->query($sql);
while ($row = mysql_fetch_array($result))
{
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);
	
	if($row['jaType'] == "1")
	{
		$subtype = "ซื้อ";
	}
	if($row['jaType'] == "2")
	{
		$subtype = "ขาย";
	}
	if($row['jaType'] == "3")
	{
		$subtype = "ให้เช่า";
	}
	
	if($row['jType'] == "1")
	{
		$cat_type = "บ้าน-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง";
	}
	if($row['jType'] == "2")
	{
		$cat_type = "คอนโด-คอนโดมีเนียม-อาคารชุด";
	}
	if($row['jType'] == "3")
	{
		$cat_type = "ตึก-อาคารพานิชย์-โรงงาน-โกดัง";
	}
	if($row['jType'] == "4")
	{
		$cat_type = "ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดิน";
	}
	if($row['jType'] == "5")
	{
		$cat_type = "อาคารเช่า-ห้องเช่า-บ้านเช่า";
	}
	if($row['jType'] == "6")
	{
		$cat_type = "อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ซ่อมแซม";
	}
	if($row['jType'] == "7")
	{
		$cat_type = "รถยนต์-รถมือสอง";
	}
	if($row['jType'] == "8")
	{
		$cat_type = "รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน";
	}
?>
<div class="imgleft">    
<?	
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?=$page_link?>/<?=$cat_type?>/<?=$titleall?>/1/1/<?=$row['jType']?>/<?=$row['jaType']?>/<?=$row['jID']?>" target="_blank" title="<?=$row['jTitle']?>">
                <? 
		  	echo "<b><font size='2'>"; 
			$position=100; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jTitle']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}	
			echo "</font></b>";		
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?=$subtype?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>ดูแ้ล้ว&nbsp;:&nbsp;<?=$row['jRead']?>&nbsp;ครั้ง</strong></font>
<br />
<?
			$position=150; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jDetail']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div><br />&nbsp;<br />
<?
}
?>
</div>

<div id="showtop10allwebRent" style="display:none;">
<?
$sql = "SELECT * FROM sb_job where jType = '5' ORDER BY jDate_Create DESC limit 0,10";
$result = $db->query($sql);
while ($row = mysql_fetch_array($result))
{
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);
	
	if($row['jaType'] == "1")
	{
		$subtype = "ซื้อ";
	}
	if($row['jaType'] == "2")
	{
		$subtype = "ขาย";
	}
	if($row['jaType'] == "3")
	{
		$subtype = "ให้เช่า";
	}
	
	if($row['jType'] == "1")
	{
		$cat_type = "บ้าน-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง";
	}
	if($row['jType'] == "2")
	{
		$cat_type = "คอนโด-คอนโดมีเนียม-อาคารชุด";
	}
	if($row['jType'] == "3")
	{
		$cat_type = "ตึก-อาคารพานิชย์-โรงงาน-โกดัง";
	}
	if($row['jType'] == "4")
	{
		$cat_type = "ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดิน";
	}
	if($row['jType'] == "5")
	{
		$cat_type = "อาคารเช่า-ห้องเช่า-บ้านเช่า";
	}
	if($row['jType'] == "6")
	{
		$cat_type = "อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ซ่อมแซม";
	}
	if($row['jType'] == "7")
	{
		$cat_type = "รถยนต์-รถมือสอง";
	}
	if($row['jType'] == "8")
	{
		$cat_type = "รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน";
	}
?>
<div class="imgleft">    
<?	
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?=$page_link?>/<?=$cat_type?>/<?=$titleall?>/1/1/<?=$row['jType']?>/<?=$row['jaType']?>/<?=$row['jID']?>" target="_blank" title="<?=$row['jTitle']?>">
                <? 
		  	echo "<b><font size='2'>"; 
			$position=100; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jTitle']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}	
			echo "</font></b>";		
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?=$subtype?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>ดูแ้ล้ว&nbsp;:&nbsp;<?=$row['jRead']?>&nbsp;ครั้ง</strong></font>
<br />
<?
			$position=150; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jDetail']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div><br />&nbsp;<br />
<?
}
?>
</div>

<div id="showtop10allwebFurniture" style="display:none;">
<?
$sql = "SELECT * FROM sb_job where jType = '6' ORDER BY jDate_Create DESC limit 0,10";
$result = $db->query($sql);
while ($row = mysql_fetch_array($result))
{
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);
	
	if($row['jaType'] == "1")
	{
		$subtype = "ซื้อ";
	}
	if($row['jaType'] == "2")
	{
		$subtype = "ขาย";
	}
	if($row['jaType'] == "3")
	{
		$subtype = "ให้เช่า";
	}
	
	if($row['jType'] == "1")
	{
		$cat_type = "บ้าน-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง";
	}
	if($row['jType'] == "2")
	{
		$cat_type = "คอนโด-คอนโดมีเนียม-อาคารชุด";
	}
	if($row['jType'] == "3")
	{
		$cat_type = "ตึก-อาคารพานิชย์-โรงงาน-โกดัง";
	}
	if($row['jType'] == "4")
	{
		$cat_type = "ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดิน";
	}
	if($row['jType'] == "5")
	{
		$cat_type = "อาคารเช่า-ห้องเช่า-บ้านเช่า";
	}
	if($row['jType'] == "6")
	{
		$cat_type = "อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ซ่อมแซม";
	}
	if($row['jType'] == "7")
	{
		$cat_type = "รถยนต์-รถมือสอง";
	}
	if($row['jType'] == "8")
	{
		$cat_type = "รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน";
	}
?>
<div class="imgleft">    
<?	
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?=$page_link?>/<?=$cat_type?>/<?=$titleall?>/1/1/<?=$row['jType']?>/<?=$row['jaType']?>/<?=$row['jID']?>" target="_blank" title="<?=$row['jTitle']?>">
                <? 
		  	echo "<b><font size='2'>"; 
			$position=100; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jTitle']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}	
			echo "</font></b>";		
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?=$subtype?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>ดูแ้ล้ว&nbsp;:&nbsp;<?=$row['jRead']?>&nbsp;ครั้ง</strong></font>
<br />
<?
			$position=150; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jDetail']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div><br /><br />
<?
}
?>
</div>

<div id="showtop10allwebCar" style="display:none;">
<?
$sql = "SELECT * FROM sb_job where jType = '7' ORDER BY jDate_Create DESC limit 0,10";
$result = $db->query($sql);
while ($row = mysql_fetch_array($result))
{
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);
	
	if($row['jaType'] == "1")
	{
		$subtype = "ซื้อ";
	}
	if($row['jaType'] == "2")
	{
		$subtype = "ขาย";
	}
	if($row['jaType'] == "3")
	{
		$subtype = "ให้เช่า";
	}
	
	if($row['jType'] == "1")
	{
		$cat_type = "บ้าน-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง";
	}
	if($row['jType'] == "2")
	{
		$cat_type = "คอนโด-คอนโดมีเนียม-อาคารชุด";
	}
	if($row['jType'] == "3")
	{
		$cat_type = "ตึก-อาคารพานิชย์-โรงงาน-โกดัง";
	}
	if($row['jType'] == "4")
	{
		$cat_type = "ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดิน";
	}
	if($row['jType'] == "5")
	{
		$cat_type = "อาคารเช่า-ห้องเช่า-บ้านเช่า";
	}
	if($row['jType'] == "6")
	{
		$cat_type = "อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ซ่อมแซม";
	}
	if($row['jType'] == "7")
	{
		$cat_type = "รถยนต์-รถมือสอง";
	}
	if($row['jType'] == "8")
	{
		$cat_type = "รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน";
	}
?>
<div class="imgleft">    
<?	
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?=$page_link?>/<?=$cat_type?>/<?=$titleall?>/1/1/<?=$row['jType']?>/<?=$row['jaType']?>/<?=$row['jID']?>" target="_blank" title="<?=$row['jTitle']?>">
                <? 
		  	echo "<b><font size='2'>"; 
			$position=100; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jTitle']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}	
			echo "</font></b>";		
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?=$subtype?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>ดูแ้ล้ว&nbsp;:&nbsp;<?=$row['jRead']?>&nbsp;ครั้ง</strong></font>
<br />
<?
			$position=150; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jDetail']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div><br /><br />
<?
}
?>
</div>

<div id="showtop10allwebOthers" style="display:none;">
<?
$sql = "SELECT * FROM sb_job where jType = '8' ORDER BY jDate_Create DESC limit 0,10";
$result = $db->query($sql);
while ($row = mysql_fetch_array($result))
{
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);
	
	if($row['jaType'] == "1")
	{
		$subtype = "ซื้อ";
	}
	if($row['jaType'] == "2")
	{
		$subtype = "ขาย";
	}
	if($row['jaType'] == "3")
	{
		$subtype = "ให้เช่า";
	}
	
	if($row['jType'] == "1")
	{
		$cat_type = "บ้าน-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง";
	}
	if($row['jType'] == "2")
	{
		$cat_type = "คอนโด-คอนโดมีเนียม-อาคารชุด";
	}
	if($row['jType'] == "3")
	{
		$cat_type = "ตึก-อาคารพานิชย์-โรงงาน-โกดัง";
	}
	if($row['jType'] == "4")
	{
		$cat_type = "ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดิน";
	}
	if($row['jType'] == "5")
	{
		$cat_type = "อาคารเช่า-ห้องเช่า-บ้านเช่า";
	}
	if($row['jType'] == "6")
	{
		$cat_type = "อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ซ่อมแซม";
	}
	if($row['jType'] == "7")
	{
		$cat_type = "รถยนต์-รถมือสอง";
	}
	if($row['jType'] == "8")
	{
		$cat_type = "รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน";
	}
?>
<div class="imgleft">    
<?	
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?=$page_link?>/<?=$cat_type?>/<?=$titleall?>/1/1/<?=$row['jType']?>/<?=$row['jaType']?>/<?=$row['jID']?>" target="_blank" title="<?=$row['jTitle']?>">
                <? 
		  	echo "<b><font size='2'>"; 
			$position=100; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jTitle']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}	
			echo "</font></b>";		
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?=$subtype?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>ดูแ้ล้ว&nbsp;:&nbsp;<?=$row['jRead']?>&nbsp;ครั้ง</strong></font>
<br />
<?
			$position=150; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jDetail']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div><br /><br />
<?
}
?>
</div>

<div id="showtop10allwebhidden" align="center" style="display:none;">
<font color="#CC6600" size="5"><strong>เลือกประเภทอสังหาริมทรัพย์</strong></font>
</div>

<p class="alignrights"><a href="<?=$page_link?>/property-search.php" title="อสังหาริมทรัพย์ทั้งหมด"><strong>อสังหาริมทรัพย์ทั้งหมด</strong></a></p> 

</div><br />
<img src="<?=$page_link?>/images/20ID2.jpg" title="อสังหาริมทรัพย์ทั้งหมด 20 อันดับล่าสุด" alt="อสังหาริมทรัพย์ทั้งหมด 20 อันดับล่าสุด" /><br /><br />
<div class="top20weblist">
<div>


<?
$sql = "SELECT * FROM sb_job where jStatus = '1' ORDER BY jDate_Create DESC limit 0,20";
$result = $db->query($sql);
while ($row = mysql_fetch_array($result))
{
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);
	
	if($row['jaType'] == "1")
	{
		$subtype = "ซื้อ";
	}
	if($row['jaType'] == "2")
	{
		$subtype = "ขาย";
	}
	if($row['jaType'] == "3")
	{
		$subtype = "ให้เช่า";
	}
	
	if($row['jType'] == "1")
	{
		$cat_type = "บ้าน-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง";
	}
	if($row['jType'] == "2")
	{
		$cat_type = "คอนโด-คอนโดมีเนียม-อาคารชุด";
	}
	if($row['jType'] == "3")
	{
		$cat_type = "ตึก-อาคารพานิชย์-โรงงาน-โกดัง";
	}
	if($row['jType'] == "4")
	{
		$cat_type = "ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดิน";
	}
	if($row['jType'] == "5")
	{
		$cat_type = "อาคารเช่า-ห้องเช่า-บ้านเช่า";
	}
	if($row['jType'] == "6")
	{
		$cat_type = "อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ซ่อมแซม";
	}
	if($row['jType'] == "7")
	{
		$cat_type = "รถยนต์-รถมือสอง";
	}
	if($row['jType'] == "8")
	{
		$cat_type = "รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน";
	}
	?>

<div class="imgleft">    
<?	
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?=$page_link?>/<?=$cat_type?>/<?=$titleall?>/1/1/<?=$row['jType']?>/<?=$row['jaType']?>/<?=$row['jID']?>" target="_blank" title="<?=$row['jTitle']?>">
                <? 
		  	echo "<b><font size='2'>"; 
			$position=100; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jTitle']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}	
			echo "</font></b>";		
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?=$subtype?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>ดูแ้ล้ว&nbsp;:&nbsp;<?=$row['jRead']?>&nbsp;ครั้ง</strong></font>
<br />
<?
			$position=150; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jDetail']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div>

<br />&nbsp;<br />
<?
}
?>
</div>

</div>

