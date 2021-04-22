<?php 
class datetime{
var $times ; 

function webtime(){
list($day,$time) = explode (" ",$this->times) ;
list($h,$m,$s) = explode(":",$time) ;
list ($year,$month,$days)=explode("-",$day) ;
$this->times="$days-$month-$year &nbsp;$h:$m" ;
return $this->times ; 
}

function timess(){
list($day,$time) = explode (" ",$this->times) ;
list($h,$m,$s) = explode(":",$time) ;
list ($year,$month,$days)=explode("-",$day) ;
$this->times="$days-$month-$year" ;
return $this->times ; 
}
}
?>