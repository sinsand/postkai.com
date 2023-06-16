<?php



$data = file_get_contents("https://data.dottourismdb.com/api/v1/map/type/1/province"); 
//print_r($data);
$tourism = json_decode($data,true);

?>
<table border='1'>
    <tr>
        <th>รหัสจังหวัด</th>
        <th>จังหวัด</th>
        <th>รหัสสถานที่</th>
        <th>ชื่อสถานที่</th>
        <th>ชื่อหัวข้อ</th>
        <th>รายละเอียด</th>
        <th>ที่อยู่</th>
        <th>latitude</th>
        <th>longtitude</th>
    </tr>
<?php 
foreach($tourism['provinces'] as $values) {

    $usrl = "https://data.dottourismdb.com/api/v1/map/local/".$values['id']."/type/1";
    $datain = file_get_contents($usrl); 
    //print_r($data);
    $tourismin = json_decode($datain,true);

    foreach($tourismin['tourist'] as $valuesin) {

        ?>
            <tr>
                <td><?php echo $values['id']; ?></td>
                <td><?php echo $values['name']; ?></td>
                <td><?php echo $valuesin['id']; ?></td>
                <td><?php echo $valuesin['name']; ?></td>
                <?php
                    $usrl_info = "https://data.dottourismdb.com/api/v1/map/info/".$valuesin['id'];
                    $data_info = file_get_contents($usrl_info); 
                    $tourism_info = json_decode($data_info,true);
                ?>
                <td><?php echo $tourism_info['tourist']['tourist_name'];?></td>
                <td><?php echo $tourism_info['tourist']['tourist_history'];?></td>
                <td>
                    <?php echo $tourism_info['tourist']['subdistrict']['district_name']!=''?"ตำบล".$tourism_info['tourist']['subdistrict']['district_name']:"";?>  
                    <?php echo $tourism_info['tourist']['amphur']['amphur_name']!=''?"อำเภอ".$tourism_info['tourist']['amphur']['amphur_name']:"";?> 
                    <?php echo $tourism_info['tourist']['province']['province_name']!=''?"จังหวัด".$tourism_info['tourist']['province']['province_name']:"";?>
                </td>
                <td><?php echo $tourism_info['tourist']['latitude']; ?></td>
                <td><?php echo $tourism_info['tourist']['longtitude']; ?></td>
                <td>
                    <?php $i = 0;
                        foreach($tourism_info['images'] as $valuesimg) {
                            if ($i==0) {
                                echo "https://data.dottourismdb.com/storage/tourist/".$valuesimg['image'];
                            }else {
                                echo ",https://data.dottourismdb.com/storage/tourist/".$valuesimg['image'];
                            }
                            $i++;
                        }
                    ?>
                </td>
            </tr>
        <?php
    }
        
 }
 ?>
 </table>
 <?php
 
?>

