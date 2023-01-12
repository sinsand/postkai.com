<?php





$SqlSelect = "SELECT sj.*,pt.name_Type,p.PROVINCE_NAME,pc.name_category
              FROM sb_job sj
              LEFT OUTER JOIN p_type pt ON (sj.jaType = pt.id_Type)
              LEFT OUTER JOIN p_category pc ON (sj.jType = pc.id_category)
              LEFT OUTER JOIN p_province p  ON (sj.jProvince = p.PROVINCE_ID)

              ORDER BY sj.jDate_Create DESC ";

$Per_Page = 50;   // Per Page
$Page = $UrlIdSub;
if(!$UrlIdSub){
  $Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if(select_num($SqlSelect)<=$Per_Page){
  $Num_Pages =1;
}
else if((select_num($SqlSelect) % $Per_Page)==0){
  $Num_Pages =(select_num($SqlSelect)/$Per_Page) ;
}else{
  $Num_Pages =(select_num($SqlSelect)/$Per_Page)+1;
  $Num_Pages = (int)$Num_Pages;
}
$id_run = $Page_Start+1;

$SqlSelect .= " LIMIT $Page_Start , $Per_Page; ";


?>
<div class="row">

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">All Post</span>
        <span class="info-box-number">
          <?php
            $SqlSelectAll = "SELECT jID
                          FROM sb_job ;";
            echo number_format(select_num($SqlSelectAll));
          ?>
        </span>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Post This Month</span>
        <span class="info-box-number">
          <?php
            $SqlSelectThis = "SELECT jID
                          FROM sb_job
                          WHERE DATE_FORMAT(jDate_Create,'%m-%Y') = '".date('m-Y')."' AND '".date('m-Y')."' ;";
            echo number_format(select_num($SqlSelectThis));
          ?>
        </span>
      </div>
    </div>
  </div>


  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane">
            <div class="col-xs-12 p-0">
              <nav aria-label="Page navigation ">
                <ul class="pagination btn-md">
                 <?php
                    if($Prev_Page){
                      ?><li class="page-item"><a class="page-link" href="<?php echo $LinkWebadmin.$UrlId;?>/<?php echo $Prev_Page;?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li><?php
                    }
                    for($i=1; $i<=$Num_Pages; $i++){
                      $Page1 = $Page-3;
                      $Page2 = $Page+3;
                      if($i != $Page && $i >= $Page1 && $i <= $Page2){
                        ?><li class="page-item"><a class="page-link" href="<?php echo $LinkWebadmin.$UrlId;?>/<?php echo $i;?>"><?php echo $i;?></a></li><?php
                      }else if($i==$Page){
                        ?><li class="page-item  active"><a class="page-link" href="#"><?php echo $i;?></a></li><?php
                      }
                    }
                    if($Page!=$Num_Pages){
                      ?><li class="page-item"><a class="page-link" href="<?php echo $LinkWebadmin.$UrlId;?>/<?php echo $Next_Page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li><?php
                    }
                ?>
                </ul>
              </nav>
            </div>
            <div class="table-responsive col-xs-12">
              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>ลำดับ</th>
                    <th>รูป</th>
                    <th>หัวข้อโพส</th>
                    <th>ประเภท</th>
                    <th>กลุ่ม</th>
                    <th>วันที่โพส</th>
                    <th class="text-center">จัดการ</th>
                  </tr>
                  <tbody>
                  <?php

                    if (select_num($SqlSelect)>0) { $i=1;
                      foreach (select_tb($SqlSelect) as $row) {
                        ?>
                          <tr>
                            <td><?php echo $row['jID'];?></td>
                            <td>
                              <?php
                              if (!empty($row['jPic1'])) {
                                ?><img src="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $row['jPic1'];?>" style="width:50px;height:auto;" /><?php
                              }else {
                                ?><img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" style="width:50px;height:auto;" /><?php
                              }
                              ?>
                            </td>
                            <td><div  class="alink-post"><a href="<?php echo $LinkWeb."post/".$row['jID'];?>" target="_blank" title="<?php echo $row['jTitle'];?>"><?php echo $row['jTitle'];?></a></div></td>
                            <td><?php echo $row['name_Type'];?></td>
                            <td><?php echo $row['name_category'];?></td>
                            <td><?php echo day_format_month_thai($row['jDate_Create']);?></td>
                            <td class="text-center">
                              <div class="btn-group btn-xs">
                                <a href="<?php echo $LinkWeb."post/".$row['jID'];?>" class="btn btn-sm btn-default modal-view" target="_blank"><i class="fa fa-search"></i></a>
                                <button id="<?php echo $row['jID'];?>" data-toggle="modal" class="btn btn-sm btn-default modal-trash" data-target="#modal-trash"><i class="fa fa-trash"></i></button>
                              </div>
                            </td>
                          </tr>
                        <?php
                      }
                    }else {
                      ?>
                      <tr>
                        <td colspan="7" class="text-center">ไม่มีข้อมูล</td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </thead>
              </table>
            </div>
            <div class="col-xs-12 p-0">
              <nav aria-label="Page navigation ">
                <ul class="pagination btn-md">
                 <?php
                    if($Prev_Page){
                      ?><li class="page-item"><a class="page-link" href="<?php echo $LinkWebadmin.$UrlId;?>/<?php echo $Prev_Page;?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li><?php
                    }
                    for($i=1; $i<=$Num_Pages; $i++){
                      $Page1 = $Page-3;
                      $Page2 = $Page+3;
                      if($i != $Page && $i >= $Page1 && $i <= $Page2){
                        ?><li class="page-item"><a class="page-link" href="<?php echo $LinkWebadmin.$UrlId;?>/<?php echo $i;?>"><?php echo $i;?></a></li><?php
                      }else if($i==$Page){
                        ?><li class="page-item  active"><a class="page-link" href="#"><?php echo $i;?></a></li><?php
                      }
                    }
                    if($Page!=$Num_Pages){
                      ?><li class="page-item"><a class="page-link" href="<?php echo $LinkWebadmin.$UrlId;?>/<?php echo $Next_Page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li><?php
                    }
                ?>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
