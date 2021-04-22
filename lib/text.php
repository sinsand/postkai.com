<?php
class text{
var $str ; 

function substring($start,$finish){
$this->str = substr($this->str,$start,$finish);
return $this->str ;
} 
function show(){
$this->$str = ereg_replace(" ","&nbsp;",$this->$str);
$this->$str = ereg_replace(chr(13),"<br>",$this->$str);
return $this->$str ; 
}
function showbr(){
$str = ereg_replace(chr(13),"<br>",$this->$str);
return $this->$str ; 
}

function cut($finish){
$this->str = strip_tags($this->str) ;
if (strlen($this->str) > $finish){
$this->str = $this->substring(0,$finish)."..." ; 
}
return $this->str ; 
}

function HilightText($search,$finish){
$this->str = strip_tags($this->str) ;
$length  =  strlen($this->str);
if ($length >$finish){
$this->str =$this->substring(0,$finish)."..." ;
}
return str_replace($search,'<font style="background-color:#E4FF93">'.$search.'</font>',$text);
}

}
?>