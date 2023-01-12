<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane">
            <div class="table-responsive">
              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>ลำดับ</th>
                    <th>อีเมลผู้แจ้ง</th>
                    <th>เบอร์ติดต่อ</th>
                    <th>ประเภทการแจ้ง</th>
                    <th>หมายเหตุ</th>
                    <th>การแสดงประกาศ</th>
                    <th>สถานะประกาศ</th>
                    <th>วันที่แจ้ง</th>
                    <th class="text-center">จัดการ</th>
                  </tr>
                  <tbody>
                  <?php
                    $SqlSelect = "SELECT n.*,t.tname,j.jDate_Create,j.jPostDay,j.jStatus
                                  FROM n_notify n
                                  INNER JOIN n_type t ON (n.tid = t.tid)
                                  INNER JOIN sb_job j ON (n.JID = j.JID)
                                  ORDER BY n.ncreatedate DESC";
                    if (select_num($SqlSelect)>0) { $i=1;
                      foreach (select_tb($SqlSelect) as $row) {
                        ?>
                          <tr>
                            <td><?php echo $row['nid'];?></td>
                            <td><?php echo $row['nemail'];?></td>
                            <td><?php echo $row['nphone'];?></td>
                            <td><?php echo $row['tname'];?></td>
                            <td><?php echo $row['ncomment'];?></td>
                            <td class="text-center">
                              <?php
                              //echo check_status_show_post($row['jDate_Create'],$row['jPostDay']);
                                if (div_date(check_status_show_post($row['jDate_Create'],$row['jPostDay']),date("Y-m-d"))>0) {
                                  ?><i class="fa-2x fas fa-toggle-on" style="color:#037817;"></i><?php
                                }else {
                                  ?><i class="fa-2x fas fa-toggle-off" style="color:#f00;"></i><?php
                                }
                              ?>
                            </td>
                            <td class="text-center">
                              <?php
                              //echo check_status_show_post($row['jDate_Create'],$row['jPostDay']);
                                if ($row['jStatus']==1) {
                                  ?><i class="fa-2x fas fa-toggle-on" style="color:#037817;"></i><?php
                                }else {
                                  ?><i class="fa-2x fas fa-toggle-off" style="color:#f00;"></i><?php
                                }
                              ?>
                            </td>
                            <td><?php echo day_format_month_thai($row['ncreatedate']);?></td>
                            <td class="text-center">
                              <div class="btn-group btn-xs">
                                <a href="<?php echo $LinkWeb."preview/".$row['jID'];?>" class="btn btn-sm btn-default modal-view" target="_blank"><i class="fas fa-external-link-alt"></i></a>
                                <?php
                                  $val= "";$class="";
                                    if ($row['jStatus']==1) {
                                      $val = "<i class='far fa-eye'></i>";
                                    }else {
                                      $class = "disabled";
                                      $val = "<i class='far fa-eye-slash'></i>";
                                    }
                                ?>
                                <button id="<?php echo $row['jID'];?>" data-toggle="modal" class="btn btn-sm btn-default modal-trash <?php echo $class;?>" <?php echo $class;?> data-target="#modal-trash">
                                  <?php echo $val; ?>
                                </button>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!--  close Post -->
<script type="text/javascript" >
  $(document).ready(function(e) {
      $(".modal-trash").click(function(e) {
          $(".btn_close_post").attr('id',$(this).attr('id'));
      });
      $(".btn_close_post").click(function(e) {
        $.post("<?php echo $LinkWeb;?>query/admin-system.php",
        {
          post_id : $(this).attr("id"),
          linkpath : "<?php echo $LinkPath;?>",
          post      : "ClosePost"
        },function(d){
          $("#show_log_member").html(d);
        });
      });
  });
</script>
<div class="modal fade" id="modal-trash"  aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header"  style="color: white;background-color: #f00;">
        <h4 class="modal-title"><i class="far fa-eye-slash" style=" color: #FFF"></i> ปิดประกาศ</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" color: #FFF">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group" style="text-align: center; margin: 0;">
          <div class="control-label" id="show_log_member" style="padding:25px 0;">ยืนยัน ปิดประกาศออก</div>
        </div>
      </div>
      <div class="modal-footer justify-content-between text-center">
        <button type="button" style="width:45%" class=" btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="button" style="width:45%" class=" btn btn-danger btn_close_post" id="">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<!-- close Post -->
