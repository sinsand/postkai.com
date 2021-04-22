<img src="<?=$page_link?>/images/support.jpg" title="ผู้สนับสนุนโฆษณาตำแหน่งนี้" alt="ผู้สนับสนุนโฆษณาตำแหน่งนี้" /><br /><br />
	<? 
	$sqld = "SELECT * FROM banner where bPosition = 'D' and bStatus = '1' ORDER BY bDate_Create asc limit 0,6";
	$resultd = $db->query($sqld);
	$totalrowsd = mysql_num_rows($resultd);
	if($totalrowsd > 0){
	$d = 200 ;
	while($RWd = mysql_fetch_array($resultd)){
	$bID[$d] = $RWd['bID'];
	$bTitle[$d] = $RWd['bTitle'];
	$bDetail[$d] = $RWd['bDetail'];
	$bURL[$d] = $RWd['bURL'];
	$bPic2[$d] = $RWd['bPic2'];
	$bPic4[$d] = $RWd['bPic4'];
	$bPic5[$d] = $RWd['bPic5'];
	 $d++;}} 
	 ?>
     <? if($bPic2[201] != ""){ ?><a href="<? echo $bURL[201]; ?> " title="<? echo $bTitle[201]; ?>" target="_blank"><? } ?><img src="<?=$page_link?>/picture_banner/banner-center/<? echo $bPic2[201]; ?>" width="125" border="0" alt="<? echo $bDetail[201]; ?>" title="<? echo $bDetail[201]; ?>" class="boarderimg" /><? if($bPic2[201] != ""){ ?></a><? } ?><br /><br />
     <? if($bPic2[200] != ""){ ?><a href="<? echo $bURL[200]; ?> " title="<? echo $bTitle[200]; ?>" target="_blank"><? } ?><img src="<?=$page_link?>/picture_banner/banner-center/<? echo $bPic2[200]; ?>" border="0" width="125" height="125" alt="<? echo $bDetail[200]; ?>" title="<? echo $bDetail[200]; ?>" class="boarderimg" /><? if($bPic2[200] != ""){ ?></a><? } ?><br /><br />
     <? if($bPic2[202] != "" ){ ?><a href="<? echo $bURL[202]; ?> " title="<? echo $bTitle[202]; ?>" target="_blank"><? } ?><img src="<?=$page_link?>/picture_banner/banner-center/<? echo $bPic2[202]; ?>" border="0" alt="<? echo $bDetail[202]; ?>" title="<? echo $bDetail[202]; ?>" class="boarderimg" /><? if($bPic2[202] != ""){ ?></a><? } ?><br /><br />
     <? if($bPic2[203] != "" ){ ?><a href="<? echo $bURL[203]; ?> " title="<? echo $bTitle[203]; ?>" target="_blank"><? } ?><img src="<?=$page_link?>/picture_banner/banner-center/<? echo $bPic2[203]; ?>" border="0" alt="<? echo $bDetail[203]; ?>" title="<? echo $bDetail[203]; ?>" class="boarderimg" /><? if($bPic2[203] != ""){ ?></a><? } ?><br /><br />
     <? if($bPic2[204] != ""){ ?><a href="<? echo $bURL[204]; ?> " title="<? echo $bTitle[204]; ?>" target="_blank"><? } ?><img src="<?=$page_link?>/picture_banner/banner-center/<? echo $bPic2[204]; ?>" border="0" alt="<? echo $bDetail[204]; ?>" title="<? echo $bDetail[204]; ?>" class="boarderimg" /><? if($bPic2[204] != ""){ ?></a><? } ?><br /><br />
     <? if($bPic2[205] != ""){ ?><a href="<? echo $bURL[205]; ?> " title="<? echo $bTitle[205]; ?>" target="_blank"><? } ?><img src="<?=$page_link?>/picture_banner/banner-center/<? echo $bPic2[205]; ?>" border="0" alt="<? echo $bDetail[205]; ?>" title="<? echo $bDetail[205]; ?>" class="boarderimg" /><? if($bPic2[205] != ""){ ?></a><? } ?><br />
	 <p align="center"><font color="#B4B4B4">---------------------------------------------</font></p>
<br />
<center><script type="text/javascript"><!--
google_ad_client = "pub-2101138700314615";
/* 200x90, ถูกสร้างขึ้นแล้ว 7/9/10 */
google_ad_slot = "7903745120";
google_ad_width = 200;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
<br />
<img src="<?=$page_link?>/images/network.jpg" title="แลกลิ้งค์เพื่อนบ้าน" alt="แลกลิ้งค์เพื่อนบ้าน" /><br /><br />
	<?
$sqlw = "SELECT * FROM web_link where wStatus = '1' ORDER BY RAND() limit 0,10";
$resultw = $db->query($sqlw);
while ($roww = mysql_fetch_array($resultw))
{	
if($roww['wPic'] != "")
{
echo "<a href='$roww[wURL]' title='$roww[wDetail]'  target='_blank'><img src='".$page_link."/administrator/weblink/$roww[wPic]' alt='$roww[wDetail]' title='$roww[wDetail]' class='boarderimg' /></a>";
}
?>
<br />&nbsp;<br />
<?
}
?>&nbsp;<br />
<a href="<?=$page_link?>/แลกลิ้งค์เพื่อนบ้าน/link-network>">เพิ่มลิ้งค์คลิก</a>
	 <p align="center"><font color="#B4B4B4">---------------------------------------------</font></p>