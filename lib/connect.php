<?php

class mydb {
	var $dbhost ;
	var $dbuser;
	var $dbpassword;
	var $dbname ;
	var $linkID ;

	function mydb() {
		$this->dbhost = "localhost" ;
		$this->dbuser = "chonjob_postkai" ;
		$this->dbpassword = "5ad~6r8V" ;
		$this->dbname = "chonjob_postkai" ;

		$this->linkID = mysqli_connect($this->dbhost,$this->dbuser,$this->dbpassword,$this->dbname);
		if (mysqli_connect_errno()){
			echo "Database Connect Failed : " . mysqli_connect_error();
		}
		mysqli_set_charset($this->linkID,"utf8");


		return $this->linkID ;
	}

	function close(){

		mysqli_close($this->linkID) ;

	}

	function query($query) {
		$result = mysqli_query($this->linkID,$query);
		if($result){
			return $result;
		}else{
			return false;
		}
	}

	function numrows($result) {

		$result = mysqli_num_rows($result) ;

		return $result ;
	}

	function maxRank($field, $table){
		$sel = "select  max($field) as max from $table ";
		$m = mysqli_fetch_array($this->query($sel));
		return ($m['max']+1);
	}

	function ranking($fid,$fid_value,$fname, $table,$value,$flag,$con){
		if($flag == 'increase'){
			$con1 = "$fname > '$value' or $fname = '$value'";
		}
		if($flag == 'decrease'){
			$con1 = "$fname < '$value' or $fname = '$value'";
			$value = 0;
		}
		$sel  ="select * from $table where ($con1) and $fid != '$fid_value' ".$con." order by $fname asc";
		//echo $flag.":".$sel;
		//exit;
		$r = $this->query($sel);
		$num = $this->numrows($r);
		if($num > 0){
			while($R = mysqli_fetch_array($r)){
				$value++ ;
				$upd = "update $table set $fname = '$value' where $fid = '$R[0]'";
				$this->query($upd);
			}
		}
	}

}




//??????



//??????? ?????????????????
function checkloginadmin($user,$pass){
	//$db = new mydb;
	$select = "select * from admin  where  aUsername = '$user' and aPassword = '$pass'" ;
	$r = mysqli_query($select);
	$R = mysqli_fetch_array($r);
	$num = mysqli_num_rows($r);

	if($num >= 1 ){
		 $admin["aID"]= $R['aID'] ;
		 $admin["aName"] = $R['aName'] ;
		 $admin["aSurname"] = $R['aSurname'] ;
		 $admin["aAdmin"] = $R['aAdmin'] ;
		 return $admin ;
	}else{
		return false ;
	}

}
//เพิ่มบันทัดนี้ดู ถ้ามีค่ากลับมา ค่อยมาร์คไว้
function webtime($times){
	list($day,$time) = explode (" ",$times) ;
	list($h,$m,$s) = explode(":",$time) ;
	list ($year,$month,$days)=explode("-",$day) ;
	echo  "$days-$month-$year &nbsp;$h:$m" ;
	return $times ;
}

function webtimethai($times){
	list($day,$time) = explode (" ",$times) ;
	list($h,$m,$s) = explode(":",$time) ;
	list ($year,$month,$days)=explode("-",$day) ;
	$year = $year+543 ;
	echo  "$days-$month-$year &nbsp;$h:$m" ;
	return $times ;
}

function times($times){
	list($day,$time) = explode (" ",$times) ;
	list($h,$m,$s) = explode(":",$time) ;
	list ($year,$month,$days)=explode("-",$day) ;
	echo  "$days-$month-$year" ;
	return $times ;
}
function substring($str,$start,$finish){
	$str = substr($str,$start,$finish);
	return $str ;
}
function show($str){
	$str = ereg_replace(" ","&nbsp;",$str);
	$str = ereg_replace(chr(13),"<br>",$str);
	echo $str ;
	return $str ;
}
function showbr($str){
	$str = ereg_replace(chr(13),"<br>",$str);
	echo $str ;
	return $str ;
}
function refresh($link){
	echo		"<script language='javascript'> window.location.href = '".$link."'</script>";
	return $link ;
}
function page($offset,$limit,$totalrows,$msg,$colora,$colorb,$colorc){
// Begin Prev/Next Links
// Don't display PREV link if on first Ë¹éÒ
	if ($offset !=0) {
		$prevoffset=$offset-$limit;
		echo   "<a href='$PHP_SELF?offset=$prevoffset&limit=$limit".$msg."'><font color=\"$colorc\"\><b><<??Ѻ?</b></font></a>\n\n";
  }
    // Calculate total number of Ë¹éÒs in result
    $Numint = intval($totalrows/$limit);

    // $Ë¹éÒs now contains total number of Ë¹éÒs needed unless there is a remainder from division
    if ($totalrows%$limit) {
        // has remainder so add one Ë¹éÒ
        $Numint++;
    }

    // Now loop through the Ë¹éÒs to create numbered links
    // ex. 1 2 3 4 5 NEXT
    for ($i=1;$i<=$Numint;$i++) {
        // Check if on current Ë¹éÒ
        if (($offset/$limit) == ($i-1)) {
            // $i is equal to current Ë¹éÒ, so don't display a link
            echo "<font color=\"".$colora."\"><strong>$i</strong> </font>";
        }else{
            // $i is NOT the current Ë¹éÒ, so display a link to Ë¹éÒ $i
            $newoffset=$limit * ($i-1);
                  echo  "<a href='$PHP_SELF?offset=$newoffset&limit=$limit".$msg."' ".
                  "onMouseOver=\"window.status='˹?? $i'; return true\";><font color=\"".$colorb."\"><strong>$i</strong></font></a>\n\n";
        }
    }

    // Check to see if current Ë¹éÒ is last Ë¹éÒ
   if (!((($offset/$limit)+1)==$Numint) && $Numint!=1) {
        // Not on the last Ë¹éÒ yet, so display a NEXT Link
        $newoffset=$offset+$limit;
        echo   "<a href='$PHP_SELF?offset=$newoffset&limit=$limit".$msg."'\>
		  <font color=\"$colorc\"\><b>?Ѵ?>></b></font></a>\n";
    }

}
function deladmin($checkbox,$id,$table,$field){
$i=0;
while($i<count($checkbox))
{
$id = $checkbox[$i];
$query = "delete  from  $table  where $field = $id";
$result = mysqli_query($query) ;
$i++;
}
}
function uploadfile($file_name,$path,$temp,$file_old,$newname){
$newname = str_replace(" ", "_",$newname);
$newname = str_replace("'", "_",$newname);
$newname = str_replace('"', "_",$newname);
$newname = str_replace("%", "_",$newname);
$filename= date(ynjGis);
$pos = strrpos($file_name, ".");
$file_name=substring($file_name,$pos,strlen($file_name));
$pathfile= $path."Singburin_".$newname."_".$filename.$file_name;
@copy($temp,$pathfile);

$file["filename"]  = "Singburin_".$newname."_".$filename ;
$file["file_name"] = $file_name ;
return $file ;
}
 function checklogin($user,$pass){
	//$db = new mydb;
	 $select = "select * from member where  mUsername = '$user' and mPassword = '$pass' and mStatus = '1' " ;
	$r = mysqli_query($select);
	$R = mysqli_fetch_array($r);
	$num = mysqli_num_rows($r);

	if($num >= 1 ){
		 $member["mID"]= $R['mID'] ;
		 $member["mName"] = $R['mName'] ;
		return $member ;
	}else{
		return false ;
	}

}
 function checkloginmember($user,$pass){
	//$db = new mydb;
	 $select = "select * from member where  mUsername = '$user' and mPassword = '$pass' and mStatus = '1'" ;
	$r = mysqli_query($select);
	$R = mysqli_fetch_array($r);
	$num = mysqli_num_rows($r);

	if($num >= 1 ){
		 $admin["aID"]= $R['aID'] ;
		 $admin["aName"] = $R['aName'] ;
		$admin["aSurname"] = $R['aSurname'] ;
		$admin["aAdmin"] = $R['aAdmin'] ;
		return $member ;
	}else{
		return false ;
	}

}

function upload($lpicture_name,$path,$temp,$lpicture_old,$width,$resize=true,$newname){
$newname = str_replace(" ", "_",$newname);
$newname = str_replace("'", "_",$newname);
$newname = str_replace('"', "_",$newname);
$newname = str_replace("%", "_",$newname);

$lpicname= date(ynjGis);
$lpos = strrpos($lpicture_name, ".");
$lpicture_name=substring($lpicture_name,$lpos,strlen($lpicture_name));
$lpathpicture = $path."Singburin_".$newname."_".$lpicname.$lpicture_name;


if ($resize){

$size=@GetimageSize($temp);
$height=round($width*$size[1]/$size[0]);


$imageTransform = new imageTransform;
$imageTransform->resize($temp, $width,$height, $path."Singburin_".$newname."_".$lpicname.$lpicture_name);

//resize($temp,$lpicture_name,$width,$path,"NL_Development_".$newname."_".$lpicname.$lpicture_name) ;
}else{
 @copy($temp,$lpathpicture);
}
$Pic["picname"]  = "Singburin_".$newname."_".$lpicname ;
$Pic["picture_name"] = $lpicture_name ;
return $Pic ;
}

function uploads($lpicture_name,$path,$temp,$lpicture_old,$width,$resize=true,$newname){
$newname = str_replace(" ", "_",$newname);
$newname = str_replace("'", "_",$newname);
$newname = str_replace('"', "_",$newname);
$newname = str_replace("%", "_",$newname);

//$lpicname= date(ynjGis);
$lpos = strrpos($lpicture_name, ".");
$lpicture_name=substring($lpicture_name,$lpos,strlen($lpicture_name));
$lpathpicture = $path."Singburin_".$newname.$lpicname.$lpicture_name;


if ($resize){

$size=@GetimageSize($temp);
$height=round($width*$size[1]/$size[0]);


$imageTransform = new imageTransform;
$imageTransform->resize($temp, $width,$height, $path."Singburin_".$newname.$lpicname.$lpicture_name);

//resize($temp,$lpicture_name,$width,$path,"NL_Development_".$newname."_".$lpicname.$lpicture_name) ;
}else{
 @copy($temp,$lpathpicture);
}
$Pic["picname"]  = "Singburin_".$newname.$lpicname ;
$Pic["picture_name"] = $lpicture_name ;
return $Pic ;
}


function cut($string,$finish){
$string = strip_tags($string) ;
if (strlen($string) > $finish){
echo $string = substring($string,0,$finish)."..." ;
}else{
echo $string ;
}
return $string ;
}
function mincat() {
$selcat = "select min(cID) AS id from category" ;
$r = mysqli_query($selcat) ;
$R = mysqli_fetch_array($r) ;
$id = $R['id'] ;
return $id  ;
}
function check($name,$path,$width,$height,$tooltip){
	$checkpic =substring($name,-4,4) ;
	$flash = substring($name,0,-4) ;
	if ($checkpic ==".swf" ){
		echo "<script src='Scripts/AC_RunActiveContent.js' type='text/javascript'></script>
		<script language='' type='text/javascript'>
		AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','".$width."','height','".$height."','src','".$path."".$flash."','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','".$path."".$flash."' ); //end AC code
		</script>" ;
	}else{
		echo"<img src='".$path."".$name."' width='".$width."' align='absmiddle'" ;
		if ($tooltip !='' ){
			echo "alt='".$tooltip."'" ;
		}
		echo  "border='0'>"  ;
	}
}

function upload2($i,$lpicture_name,$path,$temp,$lpicture_old,$width){
	$lpicname= $i.date(ynjGis);
	$lpos = strrpos($lpicture_name, ".");
	$lpicture_name=substring($lpicture_name,$lpos,strlen($lpicture_name));
	$lpathpicture = $path.$lpicname.$lpicture_name;
	resize($temp,$lpicture_name,$width,$path,$lpicname.$lpicture_name) ;
	$Pic["picname"]  = $lpicname ;
	$Pic["picture_name"] = $lpicture_name ;
	return $Pic ;
}
function upload3($i,$name,$lpicture_name,$path,$temp,$lpicture_old){
	$lpicname= $i.date(ynjGis);
	$lpos = strrpos($lpicture_name, ".");
	$lpicture_name=substring($lpicture_name,$lpos,strlen($lpicture_name));
	$lpathpicture = $path.$lpicname.$lpicture_name;
	@copy($temp,$lpathpicture);
	$Pic["picname"]  = $lpicname ;
	$Pic["picture_name"] = $lpicture_name ;
	return $Pic ;
}
function pagefront($offset,$limit,$totalrows,$msg,$colora,$colorb){
// Begin Prev/Next Links
// Don't display PREV link if on first Ë¹éÒ
if ($offset !=0) {
$prevoffset=$offset-$limit;
echo   "<a href='$PHP_SELF?offset=$prevoffset&limit=$limit".$msg."'><< Back</a> ";

    }
    // Calculate total number of Ë¹éÒs in result
    $Numint = intval($totalrows/$limit);

    // $Ë¹éÒs now contains total number of Ë¹éÒs needed unless there is a remainder from division
    if ($totalrows%$limit) {
        // has remainder so add one Ë¹éÒ
        $Numint++;
    }

    // Now loop through the Ë¹éÒs to create numbered links
    // ex. 1 2 3 4 5 NEXT
    for ($i=1;$i<=$Numint;$i++) {
        // Check if on current Ë¹éÒ
        if (($offset/$limit) == ($i-1)) {
            // $i is equal to current Ë¹éÒ, so don't display a link
            echo "<font color=\"".$colora."\">$i </font>";
        }else{
            // $i is NOT the current Ë¹éÒ, so display a link to Ë¹éÒ $i
            $newoffset=$limit * ($i-1);
                  echo  "<a href='$PHP_SELF?offset=$newoffset&limit=$limit".$msg."' ".
                  " return true\";><font color=\"".$colorb."\">$i</font></a>\n\n";
        }
    }

    // Check to see if current Ë¹éÒ is last Ë¹éÒ
   if (!((($offset/$limit)+1)==$Numint) && $Numint!=1) {
        // Not on the last Ë¹éÒ yet, so display a NEXT Link
        $newoffset=$offset+$limit;

		  echo   " <a href='$PHP_SELF?offset=$newoffset&limit=$limit'>Next >></a>";
    }

}

$page_link = "https://www.postkai.com";

function pagehouse($offset,$limit,$totalrows,$msg,$colora,$colorb,$colorc){
// Begin Prev/Next Links
// Don't display PREV link if on first Ë¹éÒ
if ($offset !=0) {
$prevoffset=$offset-$limit;
echo   "<a href='$PHP_SELF?offset=$newoffset&limit=$limit".$msg."'><font color=\"$colorc\"\><b><<??Ѻ?&nbsp;|&nbsp;</b></font></a>\n\n";
    }
    // Calculate total number of Ë¹éÒs in result
    $Numint = intval($totalrows/$limit);

    // $Ë¹éÒs now contains total number of Ë¹éÒs needed unless there is a remainder from division
    if ($totalrows%$limit) {
        // has remainder so add one Ë¹éÒ
        $Numint++;
    }

    // Now loop through the Ë¹éÒs to create numbered links
    // ex. 1 2 3 4 5 NEXT
    for ($i=1;$i<=$Numint;$i++) {
        // Check if on current Ë¹éÒ
        if (($offset/$limit) == ($i-1)) {
            // $i is equal to current Ë¹éÒ, so don't display a link
            echo "<font color=\"".$colora."\"><strong>$i</strong> </font>";
        }else{
            // $i is NOT the current Ë¹éÒ, so display a link to Ë¹éÒ $i
            $newoffset=$limit * ($i-1);
                  echo  "<a href='$PHP_SELF?offset=$newoffset&limit=$limit".$msg."' ". "onMouseOver=\"window.status='˹?? $i'; return true\";><font color=\"".$colorb."\"><strong>$i</strong></font></a>\n\n";
        }
    }

    // Check to see if current Ë¹éÒ is last Ë¹éÒ
   if (!((($offset/$limit)+1)==$Numint) && $Numint!=1) {
        // Not on the last Ë¹éÒ yet, so display a NEXT Link
        $newoffset=$offset+$limit;
        echo   "<a href='$PHP_SELF?offset=$newoffset&limit=$limit".$msg."'\><font color=\"$colorc\"\><b>&nbsp;|&nbsp;?Ѵ?>></b></font></a>\n";
    }

}

function pagetype($offset,$limit,$totalrows,$msg,$colora,$colorb,$colorc){
// Begin Prev/Next Links
// Don't display PREV link if on first Ë¹éÒ
if ($offset !=0) {
$prevoffset=$offset-$limit;
echo   "<a href='&offset=$newoffset&limit=$limit".$msg."'><font color=\"$colorc\"\><b><<??Ѻ?&nbsp;|&nbsp;</b></font></a>\n\n";
    }
    // Calculate total number of Ë¹éÒs in result
    $Numint = intval($totalrows/$limit);

    // $Ë¹éÒs now contains total number of Ë¹éÒs needed unless there is a remainder from division
    if ($totalrows%$limit) {
        // has remainder so add one Ë¹éÒ
        $Numint++;
    }

    // Now loop through the Ë¹éÒs to create numbered links
    // ex. 1 2 3 4 5 NEXT
    for ($i=1;$i<=$Numint;$i++) {
        // Check if on current Ë¹éÒ
        if (($offset/$limit) == ($i-1)) {
            // $i is equal to current Ë¹éÒ, so don't display a link
            echo "<font color=\"".$colora."\"><strong>$i</strong> </font>";
        }else{
            // $i is NOT the current Ë¹éÒ, so display a link to Ë¹éÒ $i
            $newoffset=$limit * ($i-1);
                  echo  "<a href='&offset=$newoffset&limit=$limit".$msg."' ". "onMouseOver=\"window.status='˹?? $i'; return true\";><font color=\"".$colorb."\"><strong>$i</strong></font></a>\n\n";
        }
    }

    // Check to see if current Ë¹éÒ is last Ë¹éÒ
   if (!((($offset/$limit)+1)==$Numint) && $Numint!=1) {
        // Not on the last Ë¹éÒ yet, so display a NEXT Link
        $newoffset=$offset+$limit;
        echo   "<a href='&offset=$newoffset&limit=$limit".$msg."'\><font color=\"$colorc\"\><b>&nbsp;|&nbsp;?Ѵ?>></b></font></a>\n";
    }

}



function page_navigator($before_p,$plus_p,$total,$total_p,$chk_page){
	global $urlquery_str;
	$pPrev=$chk_page-1;
	$pPrev=($pPrev>=0)?$pPrev:0;
	$pNext=$chk_page+1;
	$pNext=($pNext>=$total_p)?$total_p-1:$pNext;
	$lt_page=$total_p-4;
	if($chk_page>0){
		echo "<a  href='&s_page=$pPrev&urlquery_str=".$urlquery_str."' class='naviPN' title='??Ѻ?'>??Ѻ?</a>";
	}
	if($total_p>=11){
		if($chk_page>=4){
			echo "<a $nClass href='&s_page=0&urlquery_str=".$urlquery_str."' title='1'>1</a><a class='SpaceC' title='...'>. . .</a>";
		}
		if($chk_page<4){
			for($i=0;$i<$total_p;$i++){
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				if($i<=4){
				echo "<a $nClass href='&s_page=$i&urlquery_str=".$urlquery_str."' title='".intval($i+1)."'>".intval($i+1)."</a> ";
				}
				if($i==$total_p-1 ){
				echo "<a class='SpaceC' title='...'>. . .</a><a $nClass href='&s_page=$i&urlquery_str=".$urlquery_str."' title='".intval($i+1)."'>".intval($i+1)."</a> ";
				}
			}
		}
		if($chk_page>=4 && $chk_page<$lt_page){
			$st_page=$chk_page-3;
			for($i=1;$i<=5;$i++){
				$nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";
				echo "<a $nClass href='&s_page=".intval($st_page+$i)."' title='".intval($st_page+$i+1)."'>".intval($st_page+$i+1)."</a> ";
			}
			for($i=0;$i<$total_p;$i++){
				if($i==$total_p-1 ){
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				echo "<a class='SpaceC' title='...'>. . .</a><a $nClass href='&s_page=$i&urlquery_str=".$urlquery_str."' title='".intval($i+1)."'>".intval($i+1)."</a> ";
				}
			}
		}
		if($chk_page>=$lt_page){
			for($i=0;$i<=4;$i++){
				$nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";
				echo "<a $nClass href='&s_page=".intval($lt_page+$i-1)."' title='".intval($lt_page+$i)."'>".intval($lt_page+$i)."</a> ";
			}
		}
	}else{
		for($i=0;$i<$total_p;$i++){
			$nClass=($chk_page==$i)?"class='selectPage'":"";
			echo "<a href='&s_page=$i&urlquery_str=".$urlquery_str."' $nClass  title='".intval($i+1)."'>".intval($i+1)."</a> ";
		}
	}
	if($chk_page<$total_p-1){
		echo "<a href='&s_page=$pNext&urlquery_str=".$urlquery_str."'  class='naviPN' title='?Ѵ?'>?Ѵ?</a>";
	}
}


function page_navigatorsearch($before_p,$plus_p,$total,$total_p,$chk_page,$run){
	global $urlquery_str;
	$pPrev=$chk_page-1;
	$pPrev=($pPrev>=0)?$pPrev:0;
	$pNext=$chk_page+1;
	$pNext=($pNext>=$total_p)?$total_p-1:$pNext;
	$lt_page=$total_p-4;
	if($chk_page>0){
		echo "<a  href='?s_page=$pPrev&urlquery_str=".$urlquery_str."".$run."' class='naviPN' title='??Ѻ?'>??Ѻ?</a>";
	}
	if($total_p>=11){
		if($chk_page>=4){
			echo "<a $nClass href='?s_page=0&urlquery_str=".$urlquery_str."".$run."' title='1'>1</a><a class='SpaceC' title='...'>. . .</a>";
		}
		if($chk_page<4){
			for($i=0;$i<$total_p;$i++){
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				if($i<=4){
				echo "<a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."".$run."' title='".intval($i+1)."'>".intval($i+1)."</a> ";
				}
				if($i==$total_p-1 ){
				echo "<a class='SpaceC' title='...'>. . .</a><a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."".$run."' title='".intval($i+1)."'>".intval($i+1)."</a> ";
				}
			}
		}
		if($chk_page>=4 && $chk_page<$lt_page){
			$st_page=$chk_page-3;
			for($i=1;$i<=5;$i++){
				$nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";
				echo "<a $nClass href='?s_page=".intval($st_page+$i)."".$run."' title='".intval($st_page+$i+1)."'>".intval($st_page+$i+1)."</a> ";
			}
			for($i=0;$i<$total_p;$i++){
				if($i==$total_p-1 ){
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				echo "<a class='SpaceC' title='...'>. . .</a><a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."".$run."' title='".intval($i+1)."'>".intval($i+1)."</a> ";
				}
			}
		}
		if($chk_page>=$lt_page){
			for($i=0;$i<=4;$i++){
				$nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";
				echo "<a $nClass href='?s_page=".intval($lt_page+$i-1)."".$run."' title='".intval($lt_page+$i)."'>".intval($lt_page+$i)."</a> ";
			}
		}
	}else{
		for($i=0;$i<$total_p;$i++){
			$nClass=($chk_page==$i)?"class='selectPage'":"";
			echo "<a href='?s_page=$i&urlquery_str=".$urlquery_str."".$run."' $nClass  title='".intval($i+1)."'>".intval($i+1)."</a> ";
		}
	}
	if($chk_page<$total_p-1){
		echo "<a href='?s_page=$pNext&urlquery_str=".$urlquery_str."".$run."'  class='naviPN' title='?Ѵ?'>?Ѵ?</a>";
	}
}



function page_navigatorboard($before_p,$plus_p,$total,$total_p,$chk_page,$run){
	global $urlquery_str;
	$pPrev=$chk_page-1;
	$pPrev=($pPrev>=0)?$pPrev:0;
	$pNext=$chk_page+1;
	$pNext=($pNext>=$total_p)?$total_p-1:$pNext;
	$lt_page=$total_p-4;
	if($chk_page>0){
		echo "<a  href='&s_page=$pPrev&urlquery_str=".$urlquery_str."&".$run."' class='naviPN' title='??Ѻ?'>??Ѻ?</a>";
	}
	if($total_p>=11){
		if($chk_page>=4){
			echo "<a $nClass href='&s_page=0&urlquery_str=".$urlquery_str."&".$run."' title='1'>1</a><a class='SpaceC' title='...'>. . .</a>";
		}
		if($chk_page<4){
			for($i=0;$i<$total_p;$i++){
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				if($i<=4){
				echo "<a $nClass href='&s_page=$i&urlquery_str=".$urlquery_str."&".$run."' title='".intval($i+1)."'>".intval($i+1)."</a> ";
				}
				if($i==$total_p-1 ){
				echo "<a class='SpaceC' title='...'>. . .</a><a $nClass href='&s_page=$i&urlquery_str=".$urlquery_str."&".$run."' title='".intval($i+1)."'>".intval($i+1)."</a> ";
				}
			}
		}
		if($chk_page>=4 && $chk_page<$lt_page){
			$st_page=$chk_page-3;
			for($i=1;$i<=5;$i++){
				$nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";
				echo "<a $nClass href='&s_page=".intval($st_page+$i)."&".$run."' title='".intval($st_page+$i+1)."'>".intval($st_page+$i+1)."</a> ";
			}
			for($i=0;$i<$total_p;$i++){
				if($i==$total_p-1 ){
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				echo "<a class='SpaceC' title='...'>. . .</a><a $nClass href='&s_page=$i&urlquery_str=".$urlquery_str."&".$run."' title='".intval($i+1)."'>".intval($i+1)."</a> ";
				}
			}
		}
		if($chk_page>=$lt_page){
			for($i=0;$i<=4;$i++){
				$nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";
				echo "<a $nClass href='&s_page=".intval($lt_page+$i-1)."&".$run."' title='".intval($lt_page+$i)."'>".intval($lt_page+$i)."</a> ";
			}
		}
	}else{
		for($i=0;$i<$total_p;$i++){
			$nClass=($chk_page==$i)?"class='selectPage'":"";
			echo "<a href='&s_page=$i&urlquery_str=".$urlquery_str."&".$run."' $nClass  title='".intval($i+1)."'>".intval($i+1)."</a> ";
		}
	}
	if($chk_page<$total_p-1){
		echo "<a href='&s_page=$pNext&urlquery_str=".$urlquery_str."&".$run."'  class='naviPN' title='?Ѵ?'>?Ѵ?</a>";
	}
}

 ?>
