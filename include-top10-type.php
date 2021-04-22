<div class="top20weblist"><strong>���͡������&nbsp;&nbsp;&nbsp;:&nbsp;</strong>
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
<?php
$sql = "SELECT * FROM sb_job where jType = '1' ORDER BY jDate_Create DESC limit 0,10";
foreach (select_tb($sql) as $row) {
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);

	if($row['jaType'] == "1"){
		$subtype = "����";
	}
	if($row['jaType'] == "2"){
		$subtype = "���";
	}
	if($row['jaType'] == "3"){
		$subtype = "�������";
	}

	if($row['jType'] == "1"){
		$cat_type = "��ҹ-��ҹ�Ѵ���-��ҹ������-��ҹ����ͧ";
	}
	if($row['jType'] == "2"){
		$cat_type = "�͹��-�͹���������-�Ҥ�êش";
	}
	if($row['jType'] == "3"){
		$cat_type = "�֡-�Ҥ�þҹԪ��-�ç�ҹ-⡴ѧ";
	}
	if($row['jType'] == "4"){
		$cat_type = "����Թ�����-����Թ�Ѵ���-����Թ";
	}
	if($row['jType'] == "5"){
		$cat_type = "�Ҥ������-��ͧ����-��ҹ����";
	}
	if($row['jType'] == "6"){
		$cat_type = "�ػ��쵡��觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-�������";
	}
	if($row['jType'] == "7"){
		$cat_type = "ö¹��-ö����ͧ";
	}
	if($row['jType'] == "8"){
		$cat_type = "ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ";
	}
	?>

<div class="imgleft">
<?php
if($row['jPic1'] != ""){
	echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
	echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?php echo $page_link;?>/<?php echo $cat_type;?>/<?php echo $titleall;?>/1/1/<?php echo $row['jType'];?>/<?php echo $row['jaType'];?>/<?php echo $row['jID'];?>" target="_blank" title="<?php echo $row['jTitle'];?>">
                <?php
		  	echo "<b><font size='2'>";
			$position=100; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jTitle'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
			echo "</font></b>";
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?php echo $subtype;?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>�������&nbsp;:&nbsp;<?php echo $row['jRead'];?>&nbsp;�����</strong></font>
<br />
<?php
			$position=150; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jDetail'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div>

<br />&nbsp;<br />
<?php
}
?>
</div>

<div id="showtop10allwebCondo" style="display:none;">
<?php
$sql = "SELECT * FROM sb_job where jType = '2' ORDER BY jDate_Create DESC limit 0,10";
foreach (select_tb($sql) as $row) {
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);

	if($row['jaType'] == "1"){
		$subtype = "����";
	}
	if($row['jaType'] == "2"){
		$subtype = "���";
	}
	if($row['jaType'] == "3"){
		$subtype = "�������";
	}

	if($row['jType'] == "1"){
		$cat_type = "��ҹ-��ҹ�Ѵ���-��ҹ������-��ҹ����ͧ";
	}
	if($row['jType'] == "2"){
		$cat_type = "�͹��-�͹���������-�Ҥ�êش";
	}
	if($row['jType'] == "3"){
		$cat_type = "�֡-�Ҥ�þҹԪ��-�ç�ҹ-⡴ѧ";
	}
	if($row['jType'] == "4"){
		$cat_type = "����Թ�����-����Թ�Ѵ���-����Թ";
	}
	if($row['jType'] == "5"){
		$cat_type = "�Ҥ������-��ͧ����-��ҹ����";
	}
	if($row['jType'] == "6"){
		$cat_type = "�ػ��쵡��觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-�������";
	}
	if($row['jType'] == "7"){
		$cat_type = "ö¹��-ö����ͧ";
	}
	if($row['jType'] == "8"){
		$cat_type = "ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ";
	}
?>
<div class="imgleft">
<?php
if($row['jPic1'] != ""){
	echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
	echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?php echo $page_link;?>/<?php echo $cat_type;?>/<?php echo $titleall;?>/1/1/<?php echo $row['jType'];?>/<?php echo $row['jaType'];?>/<?php echo $row['jID'];?>" target="_blank" title="<?php echo $row['jTitle'];?>">
                <?php
		  	echo "<b><font size='2'>";
			$position=100; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jTitle'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
			echo "</font></b>";
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?php echo $subtype;?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>�������&nbsp;:&nbsp;<?php echo $row['jRead'];?>&nbsp;�����</strong></font>
<br />
<?php
			$position=150; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jDetail'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div>
<br />&nbsp;<br />
<?php
}
?>
</div>

<div id="showtop10allwebBuilding" style="display:none;">
<?php
$sql = "SELECT * FROM sb_job where jType = '3' ORDER BY jDate_Create DESC limit 0,10";
foreach (select_tb($sql) as $row) {
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);

	if($row['jaType'] == "1"){
		$subtype = "����";
	}
	if($row['jaType'] == "2"){
		$subtype = "���";
	}
	if($row['jaType'] == "3"){
		$subtype = "�������";
	}

	if($row['jType'] == "1"){
		$cat_type = "��ҹ-��ҹ�Ѵ���-��ҹ������-��ҹ����ͧ";
	}
	if($row['jType'] == "2"){
		$cat_type = "�͹��-�͹���������-�Ҥ�êش";
	}
	if($row['jType'] == "3"){
		$cat_type = "�֡-�Ҥ�þҹԪ��-�ç�ҹ-⡴ѧ";
	}
	if($row['jType'] == "4"){
		$cat_type = "����Թ�����-����Թ�Ѵ���-����Թ";
	}
	if($row['jType'] == "5"){
		$cat_type = "�Ҥ������-��ͧ����-��ҹ����";
	}
	if($row['jType'] == "6"){
		$cat_type = "�ػ��쵡��觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-�������";
	}
	if($row['jType'] == "7"){
		$cat_type = "ö¹��-ö����ͧ";
	}
	if($row['jType'] == "8"){
		$cat_type = "ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ";
	}
?>
<div class="imgleft">
<?php
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?php echo $page_link;?>/<?php echo $cat_type;?>/<?php echo $titleall;?>/1/1/<?php echo $row['jType'];?>/<?php echo $row['jaType'];?>/<?php echo $row['jID'];?>" target="_blank" title="<?php echo $row['jTitle'];?>">
                <?php
		  	echo "<b><font size='2'>";
			$position=100; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jTitle'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
			echo "</font></b>";
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?php echo $subtype;?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>�������&nbsp;:&nbsp;<?php echo $row['jRead'];?>&nbsp;�����</strong></font>
<br />
<?php
			$position=150; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jDetail'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div><br />&nbsp;<br />
<?php
}
?>
</div>

<div id="showtop10allwebLand" style="display:none;">
<?php
$sql = "SELECT * FROM sb_job where jType = '4' ORDER BY jDate_Create DESC limit 0,10";
foreach (select_tb($sql) as $row) {
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);

	if($row['jaType'] == "1"){
		$subtype = "����";
	}
	if($row['jaType'] == "2"){
		$subtype = "���";
	}
	if($row['jaType'] == "3"){
		$subtype = "�������";
	}

	if($row['jType'] == "1"){
		$cat_type = "��ҹ-��ҹ�Ѵ���-��ҹ������-��ҹ����ͧ";
	}
	if($row['jType'] == "2"){
		$cat_type = "�͹��-�͹���������-�Ҥ�êش";
	}
	if($row['jType'] == "3"){
		$cat_type = "�֡-�Ҥ�þҹԪ��-�ç�ҹ-⡴ѧ";
	}
	if($row['jType'] == "4"){
		$cat_type = "����Թ�����-����Թ�Ѵ���-����Թ";
	}
	if($row['jType'] == "5"){
		$cat_type = "�Ҥ������-��ͧ����-��ҹ����";
	}
	if($row['jType'] == "6"){
		$cat_type = "�ػ��쵡��觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-�������";
	}
	if($row['jType'] == "7"){
		$cat_type = "ö¹��-ö����ͧ";
	}
	if($row['jType'] == "8"){
		$cat_type = "ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ";
	}
?>
<div class="imgleft">
<?php
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?php echo $page_link;?>/<?php echo $cat_type;?>/<?php echo $titleall;?>/1/1/<?php echo $row['jType'];?>/<?php echo $row['jaType'];?>/<?php echo $row['jID'];?>" target="_blank" title="<?php echo $row['jTitle'];?>">
                <?php
		  	echo "<b><font size='2'>";
			$position=100; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jTitle'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
			echo "</font></b>";
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?php echo $subtype;?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>�������&nbsp;:&nbsp;<?php echo $row['jRead'];?>&nbsp;�����</strong></font>
<br />
<?php
			$position=150; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jDetail'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div><br />&nbsp;<br />
<?php
}
?>
</div>

<div id="showtop10allwebRent" style="display:none;">
<?php
$sql = "SELECT * FROM sb_job where jType = '5' ORDER BY jDate_Create DESC limit 0,10";
foreach (select_tb($sql) as $row) {
	// code...
}
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);

	if($row['jaType'] == "1"){
		$subtype = "����";
	}
	if($row['jaType'] == "2"){
		$subtype = "���";
	}
	if($row['jaType'] == "3"){
		$subtype = "�������";
	}

	if($row['jType'] == "1"){
		$cat_type = "��ҹ-��ҹ�Ѵ���-��ҹ������-��ҹ����ͧ";
	}
	if($row['jType'] == "2"){
		$cat_type = "�͹��-�͹���������-�Ҥ�êش";
	}
	if($row['jType'] == "3"){
		$cat_type = "�֡-�Ҥ�þҹԪ��-�ç�ҹ-⡴ѧ";
	}
	if($row['jType'] == "4"){
		$cat_type = "����Թ�����-����Թ�Ѵ���-����Թ";
	}
	if($row['jType'] == "5"){
		$cat_type = "�Ҥ������-��ͧ����-��ҹ����";
	}
	if($row['jType'] == "6"){
		$cat_type = "�ػ��쵡��觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-�������";
	}
	if($row['jType'] == "7"){
		$cat_type = "ö¹��-ö����ͧ";
	}
	if($row['jType'] == "8"){
		$cat_type = "ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ";
	}
?>
<div class="imgleft">
<?php
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?php echo $page_link;?>/<?php echo $cat_type;?>/<?php echo $titleall;?>/1/1/<?php echo $row['jType'];?>/<?php echo $row['jaType'];?>/<?php echo $row['jID'];?>" target="_blank" title="<?php echo $row['jTitle'];?>">
                <?php
		  	echo "<b><font size='2'>";
			$position=100; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jTitle'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
			echo "</font></b>";
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?php echo $subtype;?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>�������&nbsp;:&nbsp;<?php echo $row['jRead'];?>&nbsp;�����</strong></font>
<br />
<?php
			$position=150; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jDetail'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div><br />&nbsp;<br />
<?php
}
?>
</div>

<div id="showtop10allwebFurniture" style="display:none;">
<?php
$sql = "SELECT * FROM sb_job where jType = '6' ORDER BY jDate_Create DESC limit 0,10";
foreach (select_tb($sql) as $row) {
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);

	if($row['jaType'] == "1"){
		$subtype = "����";
	}
	if($row['jaType'] == "2"){
		$subtype = "���";
	}
	if($row['jaType'] == "3"){
		$subtype = "�������";
	}

	if($row['jType'] == "1"){
		$cat_type = "��ҹ-��ҹ�Ѵ���-��ҹ������-��ҹ����ͧ";
	}
	if($row['jType'] == "2"){
		$cat_type = "�͹��-�͹���������-�Ҥ�êش";
	}
	if($row['jType'] == "3"){
		$cat_type = "�֡-�Ҥ�þҹԪ��-�ç�ҹ-⡴ѧ";
	}
	if($row['jType'] == "4"){
		$cat_type = "����Թ�����-����Թ�Ѵ���-����Թ";
	}
	if($row['jType'] == "5"){
		$cat_type = "�Ҥ������-��ͧ����-��ҹ����";
	}
	if($row['jType'] == "6"){
		$cat_type = "�ػ��쵡��觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-�������";
	}
	if($row['jType'] == "7"){
		$cat_type = "ö¹��-ö����ͧ";
	}
	if($row['jType'] == "8"){
		$cat_type = "ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ";
	}
?>
<div class="imgleft">
<?php
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?php echo $page_link;?>/<?php echo $cat_type;?>/<?php echo $titleall;?>/1/1/<?php echo $row['jType'];?>/<?php echo $row['jaType'];?>/<?php echo $row['jID'];?>" target="_blank" title="<?php echo $row['jTitle'];?>">
                <?php
		  	echo "<b><font size='2'>";
			$position=100; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jTitle'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
			echo "</font></b>";
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?php echo $subtype;?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>�������&nbsp;:&nbsp;<?php echo $row['jRead'];?>&nbsp;�����</strong></font>
<br />
<?php
			$position=150; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jDetail'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div><br /><br />
<?php
}
?>
</div>

<div id="showtop10allwebCar" style="display:none;">
<?php
$sql = "SELECT * FROM sb_job where jType = '7' ORDER BY jDate_Create DESC limit 0,10";
foreach (select_tb($sql) as $row) {
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);

	if($row['jaType'] == "1"){
		$subtype = "����";
	}
	if($row['jaType'] == "2"){
		$subtype = "���";
	}
	if($row['jaType'] == "3"){
		$subtype = "�������";
	}

	if($row['jType'] == "1"){
		$cat_type = "��ҹ-��ҹ�Ѵ���-��ҹ������-��ҹ����ͧ";
	}
	if($row['jType'] == "2"){
		$cat_type = "�͹��-�͹���������-�Ҥ�êش";
	}
	if($row['jType'] == "3"){
		$cat_type = "�֡-�Ҥ�þҹԪ��-�ç�ҹ-⡴ѧ";
	}
	if($row['jType'] == "4"){
		$cat_type = "����Թ�����-����Թ�Ѵ���-����Թ";
	}
	if($row['jType'] == "5"){
		$cat_type = "�Ҥ������-��ͧ����-��ҹ����";
	}
	if($row['jType'] == "6"){
		$cat_type = "�ػ��쵡��觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-�������";
	}
	if($row['jType'] == "7"){
		$cat_type = "ö¹��-ö����ͧ";
	}
	if($row['jType'] == "8"){
		$cat_type = "ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ";
	}
?>
<div class="imgleft">
<?php
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?php echo $page_link;?>/<?php echo $cat_type;?>/<?php echo $titleall;?>/1/1/<?php echo $row['jType'];?>/<?php echo $row['jaType'];?>/<?php echo $row['jID'];?>" target="_blank" title="<?php echo $row['jTitle'];?>">
                <?php
		  	echo "<b><font size='2'>";
			$position=100; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jTitle'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
			echo "</font></b>";
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?php echo $subtype;?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>�������&nbsp;:&nbsp;<?php echo $row['jRead'];?>&nbsp;�����</strong></font>
<br />
<?php
			$position=150; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jDetail'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div><br /><br />
<?php
}
?>
</div>

<div id="showtop10allwebOthers" style="display:none;">
<?php
$sql = "SELECT * FROM sb_job where jType = '8' ORDER BY jDate_Create DESC limit 0,10";
foreach (select_tb($sql) as $row) {
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);

	if($row['jaType'] == "1"){
		$subtype = "����";
	}
	if($row['jaType'] == "2"){
		$subtype = "���";
	}
	if($row['jaType'] == "3"){
		$subtype = "�������";
	}

	if($row['jType'] == "1"){
		$cat_type = "��ҹ-��ҹ�Ѵ���-��ҹ������-��ҹ����ͧ";
	}
	if($row['jType'] == "2"){
		$cat_type = "�͹��-�͹���������-�Ҥ�êش";
	}
	if($row['jType'] == "3"){
		$cat_type = "�֡-�Ҥ�þҹԪ��-�ç�ҹ-⡴ѧ";
	}
	if($row['jType'] == "4"){
		$cat_type = "����Թ�����-����Թ�Ѵ���-����Թ";
	}
	if($row['jType'] == "5"){
		$cat_type = "�Ҥ������-��ͧ����-��ҹ����";
	}
	if($row['jType'] == "6"){
		$cat_type = "�ػ��쵡��觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-�������";
	}
	if($row['jType'] == "7"){
		$cat_type = "ö¹��-ö����ͧ";
	}
	if($row['jType'] == "8"){
		$cat_type = "ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ";
	}
?>
<div class="imgleft">
<?php
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?php echo $page_link;?>/<?php echo $cat_type;?>/<?php echo $titleall;?>/1/1/<?php echo $row['jType'];?>/<?php echo $row['jaType'];?>/<?php echo $row['jID'];?>" target="_blank" title="<?php echo $row['jTitle'];?>">
                <?php
		  	echo "<b><font size='2'>";
			$position=100; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jTitle'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
			echo "</font></b>";
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?php echo $subtype;?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>�������&nbsp;:&nbsp;<?php echo $row['jRead'];?>&nbsp;�����</strong></font>
<br />
<?php
			$position=150; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jDetail'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div><br /><br />
<?php
}
?>
</div>

<div id="showtop10allwebhidden" align="center" style="display:none;">
<font color="#CC6600" size="5"><strong>���͡��������ѧ�������Ѿ��</strong></font>
</div>

<p class="alignrights"><a href="<?php echo $page_link;?>/property-search.php" title="��ѧ�������Ѿ���������"><strong>��ѧ�������Ѿ���������</strong></a></p>

</div><br />
<img src="<?php echo $page_link;?>/images/20ID2.jpg" title="��ѧ�������Ѿ��������� 20 �ѹ�Ѻ����ش" alt="��ѧ�������Ѿ��������� 20 �ѹ�Ѻ����ش" /><br /><br />
<div class="top20weblist">
<div>


<?php
$sql = "SELECT * FROM sb_job where jStatus = '1' ORDER BY jDate_Create DESC limit 0,20";
foreach (select_tb($sql) as $row) {
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);

	if($row['jaType'] == "1"){
		$subtype = "����";
	}
	if($row['jaType'] == "2"){
		$subtype = "���";
	}
	if($row['jaType'] == "3"){
		$subtype = "�������";
	}

	if($row['jType'] == "1"){
		$cat_type = "��ҹ-��ҹ�Ѵ���-��ҹ������-��ҹ����ͧ";
	}
	if($row['jType'] == "2"){
		$cat_type = "�͹��-�͹���������-�Ҥ�êش";
	}
	if($row['jType'] == "3"){
		$cat_type = "�֡-�Ҥ�þҹԪ��-�ç�ҹ-⡴ѧ";
	}
	if($row['jType'] == "4"){
		$cat_type = "����Թ�����-����Թ�Ѵ���-����Թ";
	}
	if($row['jType'] == "5"){
		$cat_type = "�Ҥ������-��ͧ����-��ҹ����";
	}
	if($row['jType'] == "6"){
		$cat_type = "�ػ��쵡��觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-�������";
	}
	if($row['jType'] == "7"){
		$cat_type = "ö¹��-ö����ͧ";
	}
	if($row['jType'] == "8"){
		$cat_type = "ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ";
	}
	?>

<div class="imgleft">
<?php
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?php echo $page_link;?>/<?php echo $cat_type;?>/<?php echo $titleall;?>/1/1/<?php echo $row['jType'];?>/<?php echo $row['jaType'];?>/<?php echo $row['jID'];?>" target="_blank" title="<?php echo $row['jTitle'];?>">
                <?php
		  	echo "<b><font size='2'>";
			$position=100; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jTitle'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
			echo "</font></b>";
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?php echo $subtype;?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>�������&nbsp;:&nbsp;<?php echo $row['jRead'];?>&nbsp;�����</strong></font>
<br />
<?php
			$position=150; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$row['jDetail'];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div>

<br />&nbsp;<br />
<?php
}
?>
</div>

</div>
