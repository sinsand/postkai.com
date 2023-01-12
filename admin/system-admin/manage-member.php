<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#viewmember" data-toggle="tab">View Member</a></li>
          <li class="nav-item"><a class="nav-link" href="#newmember" data-toggle="tab">New Member</a></li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="viewmember">
            <div class="table-responsive">
              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>ลำดับ</th>
                    <th>รหัสสมาชิก</th>
                    <th>เบอร์ติดต่อ</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>วันที่ลง</th>
                    <th class="text-center">จัดการ</th>
                  </tr>
                  <tbody>
                  <?php
                    $SqlSelect = "SELECT *
                                  FROM n_member
                                  ORDER BY mcreatedate ASC";
                    if (select_num($SqlSelect)>0) { $i=1;
                      foreach (select_tb($SqlSelect) as $row) {
                        ?>
                          <tr>
                            <td><?php echo ($i++);?></td>
                            <td><?php echo $row['mid'];?></td>
                            <td><?php echo $row['mphone'];?></td>
                            <td><?php echo $row['mfullname'];?></td>
                            <td><?php echo day_format_month_thai($row['mcreatedate']);?></td>
                            <td class="text-center">
                              <div class="btn-group btn-xs">
                                <button id="<?php echo $row['mid'];?>" data-toggle="modal" class="btn btn-sm btn-default modal-view" data-target="#modal-view"><i class="fa fa-search"></i></button>
                                <button id="<?php echo $row['mid'];?>" data-toggle="modal" class="btn btn-sm btn-default modal-edit" data-target="#modal-edit"><i class="fa fa-edit"></i></button>
                                <button id="<?php echo $row['mid'];?>" data-toggle="modal" class="btn btn-sm btn-default modal-trash" data-target="#modal-trash"><i class="fa fa-trash"></i></button>
                              </div>
                            </td>
                          </tr>
                        <?php
                      }
                    }else {
                      ?>
                      <tr>
                        <td colspan="6" class="text-center">ไม่มีข้อมูล</td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </thead>
              </table>
            </div>
          </div>
          <div class="tab-pane" id="newmember">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
