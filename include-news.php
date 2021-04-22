<img src="<?=$page_link?>/images/news.jpg" title="ข่าวประชาสัมพันธ์" alt="ข่าวประชาสัมพันธ์" /><br /><br />
		<?
		$sqlnew = "SELECT * FROM news where nStatus = '1' order by nDate_Create desc limit 0,4";
		$resultnew = $db->query($sqlnew);
		$totalrowsnew = mysql_num_rows($resultnew);
		if($totalrowsnew > 0)
		{

		  $color = "#FFFFFF";
		  while($Rs = mysql_fetch_array($resultnew))
		  { 
		  if ($color == "#FFFFFF")
			{
				$color = "#F9F9F9";
			}
			else
			{
				$color = "#FFFFFF";
			}
			$nTitle = str_replace(' ','-', $Rs['nTitle']);
			$nTitle = str_replace('#','-', $nTitle);
			$nTitle = str_replace('%','-', $nTitle);
 		 ?>
        <img src="<?=$page_link?>/images/news.gif" align="<? echo $Rs['nTitle']; ?>" border="0" title="<? echo $Rs['nTitle']; ?>" />&nbsp;&nbsp;<a href="<?=$page_link?>/ข่าวอสังหาริมทรัพย์/<?=$nTitle?>/<?=$Rs['nID']?>" title="<?=$Rs['nTitle']?>" target="_blank"><?
			if(strlen(strip_tags($Rs['nTitle']))<75)
			{
				echo $detail = $Rs['nTitle'];
			}
			else
			{
				echo $detail = substr(strip_tags($nTitle),0,75)."...";
			} 
			?></a>&nbsp;&nbsp;</font><br /><font size="1" color="#000000"><em>( วันที่ :
        <?
		  list($day,$time) = explode (" ",$Rs['nDate_Create']) ;
		  list($h,$m,$s) = explode(":",$time) ;
		  list ($year,$month,$days)=explode("-",$day) ;
	      echo "$days-$month-$year" ;
	?> )
    </em></font><br /><br />
        <?
        }
		}
		?>
  <br />