<div class="row mb-3 m-0">
  <div class="col-12 text-right pb-3 p-0">
    <a href="<?php echo $LinkWeb; ?>post-new" class="btn btn-sm btn-success">เพิ่มประกาศ <i class="fa fa-plus"></i></a>
  </div>
  <div class="col-12 text-right pb-3 p-0">
    <div class="table-responsive p-0">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#รหัสประกาศ</th>
            <th>#หัวข้อเรื่อง</th>
            <th>จัดการ</th>
          </tr>
        </thead>
        <tbody>

          <?php
          /* $SqlSelect = "SELECT *
                          FROM sb_job
                          WHERE ( mID = '" . base64url_decode($_COOKIE['mid']) . "' )"; */
          $SqlSelect = "SELECT *
                          FROM sb_job
                          WHERE ( mID = '2203505')";
          if (select_num($SqlSelect) > 0) {
            foreach (select_tb($SqlSelect) as $row) {
          ?>
              <tr>
                <td><?php echo $row['jID']; ?></td>
                <td class="text-truncate ">
                  <a href="<?php echo $LinkWeb . "post/" . $row['jID']; ?>" class="text-black text-decoration-none">
                    <?php echo substr(strip_tags($row['jTitle']),0,100); ?>
                  </a>
                </td>
                <td>
                  <div class="btn-group btn-group-sm">
                    <a href="<?php echo $LinkWeb . "post/" . $row['jID']; ?>/?confirm-edit=check" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fa fa-edit"></i></a>
                    <button id="<?php echo $row['jID']; ?>" data-bs-toggle="modal" class="btn btn-sm btn-outline-secondary modal-trash" data-bs-target="#modal-trash"><i class="fa fa-trash"></i></button>
                  </div>
                </td>
              </tr>
            <?php
            }
          } else {
            ?>
            <tr>
              <td colspan="3" class="text-center fs-4 p-4">
                ยังไม่มีโพส
              </td>
            </tr>
          <?php
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</div>