&nbsp;<p><strong><font size="4">��з�������&nbsp;
<?
$sql = "SELECT * FROM webboard where wID != '0'";
$result = $db->query($sql);
echo $num = mysql_num_rows($result);
?>&nbsp;
��з��
&nbsp;&nbsp;&nbsp;<a href="<?=$page_link?>/webboard/�������Ǣ������" title="�������Ǣ������"><img src="<?=$page_link?>/images/new-topic.png" border="0" alt="�������Ǣ������" title="�������Ǣ������" /></a></font></strong>
</p>
<h3><font color="#FF0000"><u>++&nbsp;��С��!&nbsp;&nbsp;��纺�����ѧ�������Ѿ������ö��ҹ�����ǵ����Ѵ����繵�令�Ѻ.&nbsp;++</u></font></h3>
&nbsp;
<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard"><img src="<?=$page_link?>/images/board-home.png" alt="��ҹ ��ǹ������� ��ҹ�Ѵ��� ��ҹ����� ��ҹ����ͧ" title="��ҹ ��ǹ������� ��ҹ�Ѵ��� ��ҹ����� ��ҹ����ͧ" /></div>
<div class="textwebboard"><strong><a href="<?=$page_link?>/webboard/��ҹ-��ǹ�������-��ҹ�Ѵ���-��ҹ�����-��ҹ����ͧ/1" title="��ҹ ��ǹ������� ��ҹ�Ѵ��� ��ҹ����� ��ҹ����ͧ"><font size="4">House</font></a></strong><br /><strong>��ҹ ,��ǹ������� ,��ҹ�Ѵ��� ,��ҹ����� ,��ҹ����ͧ</strong><br />
�����ٴ��� �觻ѹ����ͧ��������Ҩ��繡�����ҧ��ҹ ������͡���ͺ�ҹ ��ҹ����� ��ҹ�Ѵ��� ��ǹ������� �繵�
</div>
</div>

<div class="rightwebboard">
<strong>��з����Ǵ��������&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '1'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;��з��</strong><br />
��з������ش��:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '1' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
�ѹ���:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>

<br />

<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard"><img src="<?=$page_link?>/images/board-condo.png" alt="�͹� �͹������� �Ҥ�êش" title="�͹� �͹������� �Ҥ�êش" /></div>
<div class="textwebboard"><strong><a href="<?=$page_link?>/webboard/�͹�-�͹�������-�Ҥ�êش-�ŵ/2" title="�͹� �͹������� �Ҥ�êش"><font size="4">Condo</font></a></strong><br /><strong>�͹� ,�͹������� ,�Ҥ�êش ,;�����鹷�</strong><br />
�����ٴ��� �觻ѹ����ͧ��������Ҩ��繡�����ҧ�͹� ������͡���ͤ͹� ;�����鹷� �͹������� �繵�
</div>
</div>
<div class="rightwebboard">
<strong>��з����Ǵ��������&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '2'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;��з��</strong><br />
��з������ش��:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '2' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
�ѹ���:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>

<br />

<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard"><img src="<?=$page_link?>/images/board-building.png" alt="�֡ �Ҥ�þҹԪ�� �ç�ҹ ⡴ѧ" title="�֡ �Ҥ�þҹԪ�� �ç�ҹ ⡴ѧ" /></div>
<div class="textwebboard"><strong><a href="<?=$page_link?>/webboard/�֡-�Ҥ�þҹԪ��-��ҹ���-�ç�ҹ-⡴ѧ/3" title="�֡ �Ҥ�þҹԪ�� �ç�ҹ ⡴ѧ"><font size="4">Building</font></a></strong><br /><strong>�֡ ,�Ҥ�þҹԪ�� ,�ç�ҹ ,⡴ѧ ,�ӹѡ�ҹ</strong><br />
�����ٴ��� �觻ѹ����ͧ��������Ҩ��繡�����ҧ�֡ ������͡���͵֡ �Ҥ�þҹԪ�� �ӹѡ�ҹ �ç�ҹ �繵�
</div>
</div>
<div class="rightwebboard">
<strong>��з����Ǵ��������&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '3'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;��з��</strong><br />
��з������ش��:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '3' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
�ѹ���:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>

<br />

<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard"><img src="<?=$page_link?>/images/board-land.png" alt="���Թ���� ���Թ�Ѵ��� ���Թ" title="���Թ���� ���Թ�Ѵ��� ���Թ" /></div>
<div class="textwebboard"><strong><a href="<?=$page_link?>/webboard/���Թ����-���Թ�Ѵ���-���Թ����Ѻ����ɵ�/4" title="���Թ���� ���Թ�Ѵ��� ���Թ"><font size="4">Land</font></a></strong><br /><strong>���Թ���� ,���Թ�Ѵ��� ,���Թ</strong><br />
�����ٴ��� �觻ѹ����ͧ��������Ҩ��繡�����͡���ͷ��Թ�繵�
</div>
</div>
<div class="rightwebboard">
<strong>��з����Ǵ��������&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '4'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;��з��</strong><br />
��з������ش��:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '4' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
�ѹ���:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>


<br />

<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard"><img src="<?=$page_link?>/images/board-rent.png" alt="�Ҥ����� ��ͧ��� ��ҹ���" title="�Ҥ����� ��ͧ��� ��ҹ���" /></div>
<div class="textwebboard"><strong><a href="<?=$page_link?>/webboard/�Ҥ�����-��ͧ���-��ҹ���-�;ѡ/5" title="�Ҥ����� ��ͧ��� ��ҹ���"><font size="4">Rent</font></a></strong><br /><strong>�Ҥ����� ,��ͧ��� ,�֡��� ,��ͧ�ѡ ,������ ,��ͧ��ҧ������</strong><br />
�����ٴ��� �觻ѹ����ͧ��������Ҩ��繡�������ͧ�ѡ ��ͧ��ҧ������ �Ҥ����� �֡��� �繵�
</div>
</div>
<div class="rightwebboard">
<strong>��з����Ǵ��������&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '5'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;��з��</strong><br />
��з������ش��:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '5' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
�ѹ���:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>

<br />

<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard"><img src="<?=$page_link?>/images/board-furniture.png" alt="�ػ��쵡�觺�ҹ �ػ�ó��ӹѡ�ҹ ���� ������" title="�ػ��쵡�觺�ҹ �ػ�ó��ӹѡ�ҹ ���� ������" /></div>
<div class="textwebboard"><strong><a href="<?=$page_link?>/webboard/�ػ��쵡�觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-��ҹ����-������/6" title="�ػ��쵡�觺�ҹ �ػ�ó��ӹѡ�ҹ ���� ������"><font size="4">Furniture</font></a></strong><br /><strong>�ػ��쵡�觺�ҹ ,�ػ�ó��ӹѡ�ҹ ,���� ,������ ,���������</strong><br />
�����ٴ��� �觻ѹ����ͧ��������Ҩ����ػ��쵡�觺�ҹ �ػ�ó��ӹѡ�ҹ ������ ��������� �繵�
</div>
</div>
<div class="rightwebboard">
<strong>��з����Ǵ��������&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '6'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;��з��</strong><br />
��з������ش��:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '6' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
�ѹ���:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>

<br />

<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard"><img src="<?=$page_link?>/images/board-car.png" alt="ö¹�� ö����ͧ ö�ѡ��ҹ¹��" title="ö¹�� ö����ͧ ö�ѡ��ҹ¹��" /></div>
<div class="textwebboard"><strong><a href="<?=$page_link?>/webboard/ö¹��-ö����ͧ-ö�ѡ��ҹ¹��/7" title="ö¹�� ö����ͧ ö�ѡ��ҹ¹��"><font size="4">Car</font></a></strong><br /><strong>ö¹�� ,ö����ͧ ,ö¹������ͧ ,ö���� ,ö��÷ء</strong><br />
�����ٴ��� �觻ѹ����ͧ��������Ҩ���ö¹�� ö¹������ͧ ö���� ö��÷ء �繵�
</div>
</div>
<div class="rightwebboard">
<strong>��з����Ǵ��������&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '7'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;��з��</strong><br />
��з������ش��:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '7' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
�ѹ���:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>

<br />

<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard"><img src="<?=$page_link?>/images/board-others.png" alt="ö�Ѻ��ҧ �غ�֡ ���Ͷ͹��ҹ" title="ö�Ѻ��ҧ �غ�֡ ���Ͷ͹��ҹ" /></div>
<div class="textwebboard"><strong><a href="<?=$page_link?>/webboard/ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ-���ѡ/8" title="ö�Ѻ��ҧ �غ�֡ ���Ͷ͹��ҹ"><font size="4">Others</font></a></strong><br /><strong>ö�Ѻ��ҧ ,�غ�֡ ,���Ͷ͹��ҹ ,�����ӹѡ�ҹ ������ �</strong><br />
�����ٴ��� �觻ѹ����ͧ��������Ҩ���ö�Ѻ��ҧ ���Ͷ͹��ҹ �غ�֡ �����ӹѡ�ҹ �繵�
</div>
</div>
<div class="rightwebboard">
<strong>��з����Ǵ��������&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '8'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;��з��</strong><br />
��з������ش��:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '8' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
�ѹ���:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>

&nbsp;<p><strong><font size="4">��з�� 30 �ѹ�Ѻ����ش</font></strong>
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

<img src="<?=$page_link?>/images/list-webboard.png" alt="<?=$fetchall['wTitle']?>" title="<?=$fetchall['wTitle']?>" />&nbsp;&nbsp;<b><a href="<?=$page_link?>/board/<?=$titleb?>/<?=$fetchall['wID']?>/<?=$fetchall['wType']?>" title="<?=$fetchall['wTitle']?>" target="_blank"><u><?=$fetchall['wTitle']?></u></a></b>&nbsp;&nbsp;<font size="1"><b>��:</b>&nbsp;<?=$fetchm['mUsername']?>&nbsp;&nbsp;<b>�ѹ���:</b>&nbsp;<?=$fetchall['wDate_Create']?></font><font color="#FF0099">&nbsp;��ҹ:&nbsp;<strong><?=$fetchall['wRead']?></strong>&nbsp;,�ͺ:&nbsp;<strong><?=$numre?></strong></font><br />
<?
}
?>
<br />
</div>
</p>
<p align="center"><font color="#CCCCCC">---------------------------------------------------------------------------------------------------------------</font></p>