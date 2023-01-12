<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">All Post</span>
        <span class="info-box-number">
          <?php
            $SqlSelect = "SELECT jID
                          FROM sb_job ;";
            echo number_format(select_num($SqlSelect));
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
            $SqlSelect = "SELECT jID
                          FROM sb_job
                          WHERE DATE_FORMAT(jDate_Create,'%m-%Y') = '".date('m-Y')."' AND '".date('m-Y')."' ;";
            echo number_format(select_num($SqlSelect));
          ?>
        </span>
      </div>
    </div>
  </div>
  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>
  <!-- /.col -->
</div>




<div class="row">

  <div class="col-lg-6">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">รายงานประเภท</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <canvas id="Chart-type" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">รายงานประกาศ</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <div class="chart">
          <canvas id="Chart-post" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">หมวดหมู่ 10 ลำดับ นิยมมากสุด</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <div class="chart">
          <canvas id="Chart-cate" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title">รายงานการแจ้ง</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <canvas id="Chart-notify" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>
    </div>
  </div>


</div>



<?php

//// ประกาศทั้งหมด
$label_pAll = "";
$data_pAll = "";
$SqlPostAll = "SELECT COUNT(jID) AS cid,DATE_FORMAT(jDate_Create,'%Y-%m') ,MONTHNAME(jDate_Create) AS MonthName,YEAR(jDate_Create) AS year
               FROM sb_job
               GROUP BY DATE_FORMAT(jDate_Create,'%Y-%m')
               ORDER BY jDate_Create ASC;";
if (select_num($SqlPostAll)>0) { $i=0;
  foreach (select_tb($SqlPostAll) as $row) {
    if ($i==0) {
      $label_pAll = "'".$row['MonthName']."-".$row['year']."'";
      $data_pAll  = "'".$row['cid']."'";
    }else {
      $label_pAll .= ",'".$row['MonthName']."-".$row['year']."'";
      $data_pAll  .= ",".$row['cid'];
    } $i++;
  }
}


////// ประเภท
$label_ptype = "";
$data_ptype = "";
$color_ptype = "";
$SqlPostAll = "SELECT COUNT(j.jaType) AS cid,t.name_Type
               FROM sb_job j
               INNER JOIN p_type t ON (j.jaType = t.id_Type)
               GROUP BY t.id_Type,t.name_Type
               ORDER BY j.jDate_Create ASC;";
if (select_num($SqlPostAll)>0) { $i=0;
  foreach (select_tb($SqlPostAll) as $row) {
    if ($i==0) {
      $label_ptype = "'".$row['name_Type']."'";
      $data_ptype  = "'".$row['cid']."'";
      $color_ptype = "'".$color[$i]."'";
    }else {
      $label_ptype .= ",'".$row['name_Type']."'";
      $data_ptype  .= ",".$row['cid'];
      $color_ptype .= ",'".$color[$i]."'";
    } $i++;
  }
}



//// หมวดหมู่ 10 ลำดับ
$label_pcate = "";
$data_pcate = "";
$color_pcate = "";
$SqlPostAll = "SELECT COUNT(j.jID) AS cid,c.name_category
               FROM sb_job j
               INNER JOIN p_category c ON (j.jType = c.id_category)
               GROUP BY j.jType
               ORDER BY cid DESC
               LIMIT 0,10;";
if (select_num($SqlPostAll)>0) { $i=0;
  foreach (select_tb($SqlPostAll) as $row) {
    if ($i==0) {
      $label_pcate = "'".$row['name_category']."'";
      $data_pcate  = "'".$row['cid']."'";
      $color_pcate = "'".$color[$i]."'";
    }else {
      $label_pcate .= ",'".$row['name_category']."'";
      $data_pcate  .= ",".$row['cid'];
      $color_pcate .= ",'".$color[$i]."'";
    } $i++;
  }
}



//// แจ้งทั้งหมด
$label_pnoti = "";
$data_pnoti = "";
$color_pnoti = "";
$SqlPostAll = "SELECT COUNT(n.nid) AS cid,DATE_FORMAT(n.ncreatedate,'%Y-%m') ,MONTHNAME(n.ncreatedate) AS MonthName,YEAR(n.ncreatedate) AS year,t.tname
               FROM n_notify n
               INNER JOIN n_type t ON (n.tid = t.tid)
               GROUP BY DATE_FORMAT(n.ncreatedate,'%Y-%m'),t.tname
               ORDER BY n.ncreatedate ASC;";
if (select_num($SqlPostAll)>0) { $i=0;
  foreach (select_tb($SqlPostAll) as $row) {
    if ($i==0) {
      $label_pnoti = "'".$row['tname']."-".$row['MonthName']."-".$row['year']."'";
      $data_pnoti  = "'".$row['cid']."'";
      $color_pnoti = "'".$color[$i]."'";
    }else {
      $label_pnoti .= ",'".$row['tname']."-".$row['MonthName']."-".$row['year']."'";
      $data_pnoti  .= ",".$row['cid'];
      $color_pnoti .= ",'".$color[$i]."'";
    } $i++;
  }
}



?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script>

  ///// post all
  const post_all = document.getElementById('Chart-post').getContext('2d');
  const myPost = new Chart(post_all, {
      type: 'line',
      data: {
          labels: [<?php echo $label_pAll;?>],
          datasets: [{
            label: 'ประกาศ',
            data: [<?php echo $data_pAll;?>],
            fill: false,
            borderColor: 'rgb(40, 167, 69)',
            tension: 0.1
          }]
      }/*,
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }*/
  });

  ///// post type
  const post_type = document.getElementById('Chart-type').getContext('2d');
  const myType = new Chart(post_type, {
      type: 'pie',
      data: {
        labels: [<?php echo $label_ptype;?>],
        datasets: [{
          label: 'รายงานประเภท',
          data: [<?php echo $data_ptype;?>],
          backgroundColor: [<?php echo $color_ptype;?>],
          hoverOffset: 4
        }]
      }
  });

  ///// post categorie
  const post_cate = document.getElementById('Chart-cate').getContext('2d');
  const myCate = new Chart(post_cate, {
      type: 'pie',
      data: {
        labels: [<?php echo $label_pcate;?>],
        datasets: [{
          label: 'หมวดหมู่',
          data: [<?php echo $data_pcate;?>],
          backgroundColor: [<?php echo $color_pcate;?>],
          hoverOffset: 4
        }]
      }
  });

  ///// post notify
  const post_noti = document.getElementById('Chart-notify').getContext('2d');
  const myNoti = new Chart(post_noti, {
      type: 'bar',
      data: {
          labels: [<?php echo $label_pnoti;?>],
          datasets: [{
            label: 'การแจ้ง',
            data: [<?php echo $data_pnoti;?>],
            fill: false,
            backgroundColor: [<?php echo $color_pnoti;?>],
            tension: 0.1
          }]
      }/*,
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }*/
  });

</script>
