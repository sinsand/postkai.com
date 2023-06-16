<?php

function calculateDats($startDate){
    $today = date("Y-m-d"); // วันที่ปัจจุบัน
    $diff = date_diff(date_create($startDate), date_create($today)); // คำนวณวันที่ต่างกัน
    return $diff->format('%a'); // คืนค่าจำนวนวันที่คำนวณได้
}


$imagew1 = 0;
$imagew2 = 0;
$imagew3 = 0;
$imagew4 = 0;
$imagew5 = 0;

$imagew = "";

$popup_records = 0;

$SqlSelectPost = "SELECT jID,jPic1,jPic2,jPic3,jPic4,jPic5,jDate_Create,jPostDay,CURDATE()
                  FROM sb_job
                  WHERE ( ( jStatus = '1'  AND jPostDay !='0') OR jStatus = '2' ) 
                  ORDER BY RAND() 
                  LIMIT 0,200;";
if (select_num($SqlSelectPost)>0) {
    foreach (select_tb($SqlSelectPost) as $row) {
        $calculate = calculateDats($row["jDate_Create"]); 
        if($row["jPostDay"] < $calculate && $row["jPostDay"]>0){
            if(!empty($row["jPic1"])){
                $image1 = "images/post/picture_job_1/".$row["jPic1"];
                if(file_exists($image1)){
                    unlink($image1);
                    $imagew1 = $imagew1 + 1;
                    $imagew .= ",jPic1 = '' ";
                }
            }
            if(!empty($row["jPic2"])){
                $image2 = "images/post/picture_job_2/".$row["jPic2"];
                if(file_exists($image2)){
                    unlink($image2);
                    $imagew2 = $imagew2 + 1;
                    $imagew .= ",jPic2 = '' ";
                }
            }
            if(!empty($row["jPic3"])){
                $image3 = "images/post/picture_job_3/".$row["jPic3"];
                if(file_exists($image3)){
                    unlink($image3);
                    $imagew3 = $imagew3 + 1;
                    $imagew .= ",jPic3 = '' ";
                }
            }
            if(!empty($row["jPic4"])){
                $image4 = "images/post/picture_job_4/".$row["jPic4"];
                if(file_exists($image4)){
                    unlink($image4);
                    $imagew4 = $imagew4 + 1;
                    $imagew .= ",jPic4 = '' ";
                }
            }
            if(!empty($row["jPic5"])){
                $image5 = "images/post/picture_job_5/".$row["jPic5"];
                if(file_exists($image5)){
                    unlink($image5);
                    $imagew5 = $imagew5 + 1;
                    $imagew .= ",jPic5 = '' ";
                }
            }
            $SqlUpdate = "UPDATE sb_job 
                            SET 
                                jStatus = '0' 
                                ".$imagew." 
                            WHERE ( jID = '".$row['jID']."')";
            if (update_tb($SqlUpdate)==true){
                $popup_records = $popup_records + 1;
            }
        }
    }
  	$mes =  "เวลาปัจจุบัน : <b style='color:#f00;'>".day_format_month_thai(date("Y-m-d H:i:s"))."</b><br>
    		เปลี่ยนข้อมูลทั้งหมด <b>".$popup_records."</b> รายการ<br>
    		รูปภาพที่ 1 จำนวน <b>".$imagew1."</b> รูป<br>
            รูปภาพที่ 2 จำนวน <b>".$imagew2."</b> รูป<br>
            รูปภาพที่ 3 จำนวน <b>".$imagew3."</b> รูป<br>
            รูปภาพที่ 4 จำนวน <b>".$imagew4."</b> รูป<br>
            รูปภาพที่ 5 จำนวน <b>".$imagew5."</b> รูป<br>
            ระบบจะทำการรัน ทุกๆ <b><label id='timer'>20</label></b> วินาที";
  	echo fSuccess(2,$mes,$linkpath,20);
}
?>
<script>
  var count = 22;
  var timer = setInterval(function() {
    count--;
    document.getElementById("timer").innerHTML = count;
    if (count === 0) {
      clearInterval(timer);
    }
  }, 1000);
</script>