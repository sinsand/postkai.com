<?php
class images{

var $lpicture_name;
var $path;
var $temp;
var $width;

function substring($str,$start,$finish){
	$str = substr($str,$start,$finish);
	return $str ;
}



function uploadfile($lpicture_name='',$path='',$temp=''){


if($lpicture_name!=""){$this->lpicture_name=$lpicture_name;}
if($path!=""){$this->path=$path; }
if($lpicture_name!=""){$this->temp=$temp;}

$filename= date(ynjGis);
$pos = strrpos($this->lpicture_name, ".");
$this->lpicture_name=$this->substring($this->lpicture_name,$pos,strlen($this->lpicture_name));

$pathfile= $this->path.$filename.$this->lpicture_name;
@copy($this->temp,$pathfile);  

$file["filename"]  = $filename ; 
$file["file_name"] = $this->lpicture_name ; 

return $file ; 
}


function check($status ,$height){
	
	if ($this->lpicture_name == '')
	{
	if($status == "2"){
	echo "<img src='../images/whatsNew/pic_big.jpg' width='".$this->width."'>" ; 
	}else{
	echo "<img src='images/whatsNew/pic_big.jpg' width='".$this->width."' >" ; 
	}
	}else{
	$checkpic =$this->substring($this->lpicture_name,-4,4) ;
	$flash = $this->lpicture_name ; 
	if ($checkpic ==".swf" ){ echo "<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' 	codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0' width='".$this->width."'  height='".$height."'>
<param name='movie' value='".$this->path."".$flash."'>
<param name=quality value=high>
<embed src='".$this->path."".$flash."' quality=high pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash' width='".$this->width."' height='".$height."'></embed> 
</object>";  }else{ 
	echo"<img src='".$this->path."".$this->lpicture_name."' width='".$this->width."' alt=''  border='0'>"  ; 
	}
	}
}

function upload(){
		
		$size = @GetimageSize($this->temp);
		$lpicname= date(ynjGis);
		$lpos = strrpos($this->lpicture_name, ".");
		$this->lpicture_name=$this->substring($this->lpicture_name,$lpos,strlen($this->lpicture_name));
		$lpathpicture = $this->path.$lpicname.$this->lpicture_name;

		if ($size[0] != $this->width)
		{
			if ($this->lpicture_name !=".swf"){ 
			$this->resize($lpicname.$this->lpicture_name) ; 
			}else{
				@copy($this->temp,$lpathpicture);  
			}
		}
		else
		{
			@copy($this->temp,$lpathpicture);  
		}
			$Pic["picname"]  = $lpicname ; 
			$Pic["picture_name"] = $this->lpicture_name ; 

return $Pic ; 
}


function resize($newpic)
{
	$images = $this->temp;
	$size=@GetimageSize($images);
	$height=round($this->width*$size[1]/$size[0]);
	$type = substr($this->lpicture_name,-4) ;
	
	if ($type == ".gif" or $type == ".GIF")
	{
		$images_orig = @ImageCreateFromGIF($images);
	}
	else if ($type == ".jpg" or $type == ".JPG")
	{
		$images_orig = @ImageCreateFromJPEG($images);
	}
	else if ($type == "jpeg" or $type == "JPEG")
	{
		$images_orig = @ImageCreateFromJPEG($images);
	}
	else if ($type == ".png" or $type == ".PNG")
	{
		$images_orig = @ImageCreateFromPNG($images);
	}
	
	$photoX = @ImagesX($images_orig);
	$photoY = @ImagesY($images_orig);
	$images_fin = @ImageCreateTrueColor($this->width,$height);
	
	if ($type == ".gif" or $type == ".GIF" || $type == ".png" or $type == ".PNG")
	{
		$trnprt_indx = imagecolortransparent($images_orig);
		
		// If we have a specific transparent color.
		if ($trnprt_indx >= 0)
		{
			// Get the original image's transparent color's RGB values.
			$trnprt_color = imagecolorsforindex($images_orig, $trnprt_indx);
			
			// Allocate the same color in the new image resource.
			$trnprt_indx = imagecolorallocate($images_fin, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
			
			// Completely fill the background of the new image with allocated color.
			imagefill($images_fin, 0, 0, $trnprt_indx);
			
			// Set the background color for new image to transparent.
			imagecolortransparent($images_fin, $trnprt_indx);
		} 
		// Always make a transparent background color for PNGs that don't have one allocated already.
		elseif ($type == ".png" or $type == ".PNG")
		{
			// Turn off transparency blending (temporarily).
			imagealphablending($images_fin, false);
			
			// Create a new transparent color for image.
			$color = imagecolorallocatealpha($images_fin, 0, 0, 0, 127);
			
			// Completely fill the background of the new image with allocated color.
			imagefill($images_fin, 0, 0, $color);
			
			// Restore transparency blending.
			imagesavealpha($images_fin, true);
		}
	}
	
	if ($trnprt_indx >= 0)
	{
		@ImageCopyResized($images_fin, $images_orig, 0, 0, 0, 0, $this->width, $height, $photoX, $photoY);
	}
	else
	{
		@ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $this->width, $height, $photoX, $photoY);
	}
	
	if ($type == ".gif" or $type == ".GIF")
	{
		@ImageGIF($images_fin,$this->path.$newpic,100); 
	}
	else if ($type == ".jpg" or $type == ".JPG")
	{
		@ImageJPEG($images_fin,$this->path.$newpic,100);
	}
	else if ($type == "jpeg" or $type == "JPEG")
	{
		@ImageJPEG($images_fin,$this->path.$newpic,100);
	}
	else if ($type == ".png" or $type == ".PNG")
	{
		@ImagePNG($images_fin,$this->path.$newpic,100);
	}
	
	@ImageDestroy($images_orig);
	@ImageDestroy($images_fin);
}


function upload2($i,$lpicture_name,$path,$temp,$width){
$lpicname= $i.date(ynjGis);
$lpos = strrpos($lpicture_name, ".");
$lpicture_name=$this->substring($lpicture_name,$lpos,strlen($lpicture_name));
$lpathpicture = $path.$lpicname.$lpicture_name;
resize($temp,$lpicture_name,$width,$path,$lpicname.$lpicture_name) ; 
$Pic["picname"]  = $lpicname ; 
$Pic["picture_name"] = $lpicture_name ; 
return $Pic ; 
}
function upload3($i,$name,$lpicture_name,$path,$temp){
$lpicname= $i.date(ynjGis);
$lpos = strrpos($lpicture_name, ".");
$lpicture_name=$this->substring($lpicture_name,$lpos,strlen($lpicture_name));
$lpathpicture = $path.$lpicname.$lpicture_name;
@copy($temp,$lpathpicture);  
$Pic["picname"]  = $lpicname ; 
$Pic["picture_name"] = $lpicture_name ; 
return $Pic ; 
}
}
/*function upload($tmp="")

if($tmp==""){$tmp=$this->temp;}*/
?>