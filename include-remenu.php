<img src="<?php echo $page_link;?>/images/asungha_re.jpg" alt="��ѧ�������Ѿ����й�" title="��ѧ�������Ѿ����й�" /><br /><br />
	<?php
	$sqlj = "SELECT * FROM sb_job where jStatus = '1' and jPic1 != '' ORDER BY jRead DESC limit 0,4";
	$totalrowsj = select_num($sqlj);
	$d = 0;
	foreach (select_tb($sqlj) as $RWj) {
		$jID[$d] = $RWj['jID'];
		$jTitle[$d] = $RWj['jTitle'];
		$jaType[$d] = $RWj['jaType'];
		$jType[$d] = $RWj['jType'];
		$jRead[$d] = $RWj['jRead'];
		$jPic1[$d] = $RWj['jPic1'];

		$titleall[$d] = str_replace(' ','-', $jTitle[$d]);
		$titleall[$d] = str_replace('#','-', $titleall[$d]);
		$titleall[$d] = str_replace('%','-', $titleall[$d]);

	if($jaType[$d] == "1"){
		$jaTypes[$d] = "����";
	}
	if($jaType[$d] == "2"){
		$jaTypes[$d] = "���";
	}
	if($jaType[$d] == "3"){
		$jaTypes[$d] = "�������";
	}

	if($jType[$d] == "1"){
		$jTypes[$d] = "��ҹ-��ҹ�Ѵ���-��ҹ������-��ҹ����ͧ";
	}
	if($jType[$d] == "2"){
		$jTypes[$d] = "�͹��-�͹���������-�Ҥ�êش";
	}
	if($jType[$d] == "3"){
		$jTypes[$d] = "�֡-�Ҥ�þҹԪ��-�ç�ҹ-⡴ѧ";
	}
	if($jType[$d] == "4"){
		$jTypes[$d] = "����Թ�����-����Թ�Ѵ���-����Թ";
	}
	if($jType[$d] == "5"){
		$jTypes[$d] = "�Ҥ������-��ͧ����-��ҹ����";
	}
	if($jType[$d] == "6"){
		$jTypes[$d] = "�ػ��쵡��觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-�������";
	}
	if($jType[$d] == "7"){
		$jTypes[$d] = "ö¹��-ö����ͧ";
	}
	if($jType[$d] == "8"){
		$jTypes[$d] = "ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ";
	}

	 $d++;}
	 ?>
<li>
<?php if($jPic1[0] != ""){ ?><img src="<?php echo $page_link;?>/picture_job_1/<?php echo $jPic1[0];?>" width="120" height="90" alt="<?php echo $jTitle[0];?>" title="<?php echo $jTitle[0];?>" class="boarderimg" /><?php } ?><br />
<a href="<?php echo $page_link;?>/<?php echo $jTypes[0];?>/<?php echo $titleall[0];?>/1/1/<?php echo $jType[0];?>/<?php echo $jaType[0];?>/<?php echo $jID[0];?>" target="_blank" title="<?php echo $jTitle[0];?>">
			<?php
		  	echo "<b><font size='2'>";
			$position=50; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$jTitle[0];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
			echo "</font></b>";
			?>
</a><br />������ <font color="#009900"><strong><?php echo $jRead[0];?></strong></font> �����
</li>
<li>
<?php if($jPic1[1] != ""){ ?><img src="<?php echo $page_link;?>/picture_job_1/<?php echo $jPic1[1];?>" width="120" height="90" alt="<?php echo $jTitle[1];?>" title="<?php echo $jTitle[1];?>" class="boarderimg" /><?php } ?><br />
<a href="<?php echo $page_link;?>/<?php echo $jTypes[1];?>/<?php echo $titleall[1];?>/1/1/<?php echo $jType[1];?>/<?php echo $jaType[1];?>/<?php echo $jID[1];?>" target="_blank" title="<?php echo $jTitle[1];?>">
			<?php
		  	echo "<b><font size='2'>";
			$position=50; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$jTitle[1];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
			echo "</font></b>";
			?>
</a><br />������ <font color="#009900"><strong><?php echo $jRead[1]?></strong></font> �����
</li>
<li>
<img src="<?php echo $page_link;?>/images/ads2.jpg" width="120" height="90" alt="�Դ�����ɳҵ��˹觹�颹Ҵ 120 x 90" title="�Դ�����ɳҵ��˹觹�颹Ҵ 120 x 90" /><br />
<a href="<?php echo $page_link;?>/�Դ������/contactus" title="�Դ�����ɳҵ��˹觹�颹Ҵ  120 x 90"><b><font size="2">�Դ�����ɳҵ��˹觹�颹Ҵ  120 x 90</font></b></a><br />
</li>
<li>
<img src="<?php echo $page_link;?>/images/ads2.jpg" width="120" height="90" alt="�Դ�����ɳҵ��˹觹�颹Ҵ 120 x 90" title="�Դ�����ɳҵ��˹觹�颹Ҵ 120 x 90" /><br />
<a href="<?php echo $page_link;?>/�Դ������/contactus" title="�Դ�����ɳҵ��˹觹�颹Ҵ 120 x 90"><b><font size="2">�Դ�����ɳҵ��˹觹�颹Ҵ 120 x 90</font></b></a><br />
</li>
