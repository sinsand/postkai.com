<?php


$data = file_get_contents("https://data.dottourismdb.com/api/v1/map/type/1/province"); 
//print_r($data);
$tourism = json_decode($data,true);
$vall = array();
foreach($tourism['provinces'] as $values) {

    $usrl = "https://data.dottourismdb.com/api/v1/map/local/".$values['id']."/type/1";
    $datain = file_get_contents($usrl); 
    //print_r($data);
    $tourismin = json_decode($datain,true);

    foreach($tourismin['tourist'] as $valuesin) {

                $vall['ID_Province'] = $values['id'];
                $vall['Name_Province'] = $values['name'];
                $vall['ID_touris'] = $valuesin['id'];

                $usrl_info = "https://data.dottourismdb.com/api/v1/map/info/".$valuesin['id'];
                $data_info = file_get_contents($usrl_info); 
                $tourism_info = json_decode($data_info,true);
      
                $vall['tour']['tourist_name'] = $tourism_info['tourist']['tourist_name'];
                $vall['tour']['tourist_description'] = $tourism_info['tourist']['tourist_history'];
                $vall['tour']['address'] = $tourism_info['tourist']['subdistrict']['district_name']!=''?"ตำบล".$tourism_info['tourist']['subdistrict']['district_name']:"";  
                $vall['tour']['address'] .= $tourism_info['tourist']['amphur']['amphur_name']!=''?"อำเภอ".$tourism_info['tourist']['amphur']['amphur_name']:"";
                $vall['tour']['address'] .= $tourism_info['tourist']['province']['province_name']!=''?"จังหวัด".$tourism_info['tourist']['province']['province_name']:"";
                $vall['tour']['latitude'] = $tourism_info['tourist']['latitude'];
                $vall['tour']['longtitude'] = $tourism_info['tourist']['longtitude'];
      			$i = 0;
                foreach($tourism_info['images'] as $valuesimg) {
                	if ($i==0) {
                		$vall['tour']['images'] =  "https://data.dottourismdb.com/storage/tourist/".$valuesimg['image'];
                	}else {
                		$vall['tour']['images'] .= " ,https://data.dottourismdb.com/storage/tourist/".$valuesimg['image'];
                	}
                	$i++;
                }
    }
        
 }
print_r($vall);
?>

