<?php
if ($UrlIdSub=="edit") {

  ///// update
  if (isset($_POST['SubmitUpdateAds'])) {
    $FileData="";
    $whre2 = "";
    if ($_FILES["ePhoto"]["name"]!="") {
      $fp = fopen($_FILES["ePhoto"]["tmp_name"],"r");
      $ReadBinary = fread($fp,filesize($_FILES["ePhoto"]["tmp_name"]));
      fclose($fp);
      $FileData = addslashes($ReadBinary);
      $whre2 = " ,bphoto = '".$FileData."'  ";
    }

    $where = " ";
    if ($_POST['eType']=='0') {
      //// script
      $where = " ,bscript = '".htmlspecialchars($_POST['eScript'], ENT_QUOTES)."' ";
    }else {
      //// link image
      $where = " ,blink = '".htmlspecialchars($_POST['eLink'], ENT_QUOTES)."' ".$whre2;
    }

    $SqlUpdate = "UPDATE n_banner
                    SET  bname = '".$_POST['eName']."',
                         bstr = '".$_POST['eStr']."',
                         bend = '".$_POST['eEnd']."'
                         $where
                  WHERE ( bid = '".$UrlOther."' )";
    if (update_tb($SqlUpdate)==true) {
      echo fSuccess(2,"เปลี่ยนแปลง Ads Banner สำเร็จ",$LinkPath,2);
    }else {
      echo fError(2,"เปลี่ยนแปลง Ads Banner ไม่สำเร็จ",$SqlUpdate);
    }
  }


  $SqlSelect = "SELECT *
                FROM n_banner
                WHERE ( bid = '".$UrlOther."' ) ";
  if (select_num($SqlSelect)>0) { $i=1;
    foreach (select_tb($SqlSelect) as $row) {
      ?>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active">
                  <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                      <form class="" action="<?php echo $LinkPath;?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="name_ads_banner">ชื่อ Ads</label>
                          <input type="text" class="form-control" id="name_ads_banner" value="<?php echo $row['bname'];?>" name="eName" aria-describedby="name_ads" placeholder="กรอกชื่อ Ads" required autocomplete="off">
                          <small id="name_ads" class="form-text text-muted">กรอกข้อมูลชื่อ Ads นั้นๆ</small>
                        </div>
                        <div class="form-group">
                          <label for="">รูป</label>
                          <input type="file" class="form-control" aria-describedby="photo_ads" name="ePhoto">
                          <small id="photo_ads" class="form-text text-muted">แนะนำ 300x250px</small>
                          <small id="photo_ads" class="form-text text-muted">มีหรือไม่มีก็ได้ กรณีใส่ Script</small>
                          <img src="<?php echo $LinkWeb;?>query/view-image.php?bview=<?php echo $row['bid'];?>" style="width:150px;height:auto;" />
                        </div>
                        <div class="form-group">
                          <label for="">ลิ้งค์สำหรับรูป</label>
                          <input type="text" class="form-control" aria-describedby="link_ads" name="eLink" value="<?php echo $row['blink'];?>" placeholder="https://" autocomplete="off">
                          <small id="link_ads" class="form-text text-muted">ใส่ https:// ด้วย</small>
                        </div>
                        <div class="form-group">
                          <label for="">ข้อความหรือสคริป</label>
                          <textarea name="eScript" class="form-control summernote" placeholder="ใส่ข้อความหรือ Script"><?php echo htmlspecialchars_decode($row['']);?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="">ประเภท</label>
                          <select class="form-control" name="eType" required>
                            <option value="0" <?php echo !empty($row['bscript'])?"selected":"";?>>สคริป</option>
                            <option value="1" <?php echo empty($row['bscript'])?"selected":"";?>>รูป & ลิ้งค์</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">วันที่เริ่ม</label>
                          <input class="form-control select_date" type="text" name="eStr" placeholder="วันที่เริ่ม" required value="<?php echo $row['bstr'];?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label for="">วันสิ้นสุด</label>
                          <input class="form-control select_date" type="text" name="eEnd" placeholder="วันที่สิ้นสุด" required value="<?php echo $row['bend'];?>" autocomplete="off">
                        </div>
                        <div class="form-group" style="margin-left: 20px;">
                          <input type="checkbox" class="form-check-input" id="confirmCheck" required>
                          <label class="form-check-label" for="confirmCheck">Confirm</label>
                        </div>
                        <div class="form-group text-right">
                          <button type="submit" class="btn btn-primary" name="SubmitUpdateAds">บันทึก Ads</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
  }
}else {

  /// Add Banner
  if (isset($_POST['SubmitAds'])) {
    $valuecolumn = "";
    $valueinsert = "";


    if ($_POST['aType']=='0') {//// สคริป
      $valuecolumn = ",bscript";
      $valueinsert = ",'".htmlspecialchars($_POST['bscript'], ENT_QUOTES)."'";
    }else if ($_POST['aType']=='1') {////>รูป & ลิ้งค์
      //*** Read file BINARY ***'
  		$fp = fopen($_FILES["aPhoto"]["tmp_name"],"r");
  		$ReadBinary = fread($fp,filesize($_FILES["aPhoto"]["tmp_name"]));
  		fclose($fp);
  		$FileData = addslashes($ReadBinary);
      $valuecolumn = ",bphoto,blink";
      $valueinsert = ",'".$FileData."','".$_POST['aLink']."'";
    }


    $SqlInsert = "INSERT INTO n_banner
                    (bid,bname,bstr,bend,bcreatedate".$valuecolumn.")
                    VALUES(0,
                      '".$_POST['aName']."',
                      '".$_POST['aStr']."',
                      '".$_POST['aEnd']."',
                      now()
                      ".$valueinsert."
                    )";
    if (insert_tb($SqlInsert)==true) {
      echo fSuccess(1,"เพิ่ม Ads Banner สำเร็จ",$LinkPath,2);
    }else {
      echo fError(1,"เพิ่ม Ads Banner ไม่สำเร็จ",$SqlInsert);
    }
  }

  ?>
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-primary elevation-1"><i class="far fa-images"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">All Ads</span>
          <span class="info-box-number">
            <?php
              $SqlSelect = "SELECT bid
                            FROM n_banner;";
              echo number_format(select_num($SqlSelect));
            ?>
          </span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-success elevation-1"><i class="far fa-image"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Active Ads</span>
          <span class="info-box-number">
            <?php
              $SqlSelect = "SELECT bid
                            FROM n_banner
                            WHERE (
                              DATE_FORMAT(bstr,'%Y-%m-%d') <= '".date('Y-m-d')."' AND
                              DATE_FORMAT(bend,'%Y-%m-%d') >= '".date('Y-m-d')."'
                            );";
              echo number_format(select_num($SqlSelect));
            ?>
          </span>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#viewads_show" data-toggle="tab">View Ads Banner</a></li>
            <li class="nav-item"><a class="nav-link" href="#newads_show" data-toggle="tab">New Ads</a></li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="viewads_show">
              <div class="table-responsive">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>ลำดับ</th>
                      <th>ชื่อแบนเนอร์</th>
                      <th>รูป</th>
                      <th>วันที่เริ่ม-สิ้นสุด</th>
                      <th>วันที่ลง</th>
                      <th class="text-center">จัดการ</th>
                    </tr>
                    <tbody>
                    <?php
                      $SqlSelect = "SELECT *
                                    FROM n_banner
                                    ORDER BY bcreatedate DESC";
                      if (select_num($SqlSelect)>0) { $i=1;
                        foreach (select_tb($SqlSelect) as $row) {
                          ?>
                            <tr>
                              <td><?php echo ($i++);?></td>
                              <td><?php echo $row['bname'];?></td>
                              <td><img src="<?php echo $LinkWeb;?>query/view-image.php?bview=<?php echo $row['bid'];?>" style="width:40px; height:auto;" /></td>
                              <td><?php echo day_format_month_thai($row['bstr'])." - ".day_format_month_thai($row['bend']);?></td>
                              <td><?php echo day_format_month_thai($row['bcreatedate']);?></td>
                              <td class="text-center">
                                <div class="btn-group btn-xs">
                                  <a href="<?php echo $LinkWebadmin.$UrlId."/edit/".$row['bid'];?>"  class="btn btn-sm btn-default modal-edit"><i class="fa fa-edit"></i></a>
                                  <button id="<?php echo $row['bid'];?>" data-toggle="modal" class="btn btn-sm btn-default modal-trash-delete" data-target="#modal-trash-delete"><i class="fa fa-trash"></i></button>
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
            <div class="tab-pane" id="newads_show">
              <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                  <form class="" action="<?php echo $LinkPath;?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="name_ads_banner">ชื่อ Ads</label>
                      <input type="text" class="form-control" id="name_ads_banner" name="aName" aria-describedby="name_ads" placeholder="กรอกชื่อ Ads" required autocomplete="off">
                      <small id="name_ads" class="form-text text-muted">กรอกข้อมูลชื่อ Ads นั้นๆ</small>
                    </div>
                    <div class="form-group">
                      <label for="">รูป</label>
                      <input type="file" class="form-control" aria-describedby="photo_ads" name="aPhoto">
                      <small id="photo_ads" class="form-text text-muted">แนะนำ 300x250px</small>
                      <small id="photo_ads" class="form-text text-muted">มีหรือไม่มีก็ได้ กรณีใส่ Script</small>
                    </div>
                    <div class="form-group">
                      <label for="">ลิ้งค์สำหรับรูป</label>
                      <input type="text" class="form-control" aria-describedby="link_ads" name="aLink" placeholder="https://" autocomplete="off">
                      <small id="link_ads" class="form-text text-muted">ใส่ https:// ด้วย</small>
                    </div>
                    <div class="form-group">
                      <label for="">ข้อความหรือสคริป</label>
                      <textarea name="aScript" class="form-control summernote" placeholder="ใส่ข้อความหรือ Script"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">ประเภท</label>
                      <select class="form-control" name="aType" required>
                        <option value="0">สคริป</option>
                        <option value="1">รูป & ลิ้งค์</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">วันที่เริ่ม</label>
                      <input class="form-control select_date" type="text" name="aStr" placeholder="วันที่เริ่ม" required value="<?php echo date("Y-m-d");?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label for="">วันสิ้นสุด</label>
                      <input class="form-control select_date" type="text" name="aEnd" placeholder="วันที่สิ้นสุด" required value="<?php echo date("Y-m-d");?>" autocomplete="off">
                    </div>
                    <div class="form-group" style="margin-left: 20px;">
                      <input type="checkbox" class="form-check-input" id="confirmCheck" required>
                      <label class="form-check-label" for="confirmCheck">Confirm</label>
                    </div>
                    <div class="form-group text-right">
                      <button type="submit" class="btn btn-primary" name="SubmitAds">เพิ่ม Ads</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>








  <?php
// code...
}

?>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="<?php echo $LinkWeb;?>plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
<script type="text/javascript" src="<?php echo $LinkWeb;?>plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
  $(function () {
      //Date picker
      $('.select_date').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      });
  })
</script>

<script type="text/javascript" src="<?php echo $LinkWeb;?>plugins/summernote/summernote-bs4.min.js"></script>
<script type="text/javascript" >
  $('.summernote').summernote({
      height: 300,   //set editable area's height
      codemirror: { // codemirror options
          theme: 'monokai'
      }
  });
</script>


<!--  Delete ads banner -->
<script type="text/javascript" >
  $(document).ready(function(e) {
      $(".modal-trash-delete").click(function(e) {
          $(".btn_delete_adsbanner").attr('id',$(this).attr('id'));
      });
      $(".btn_delete_adsbanner").click(function(e) {
        $.post("<?php echo $LinkWeb;?>query/admin-system.php",
        {
          ads_id : $(this).attr("id"),
          linkpath : "<?php echo $LinkPath;?>",
          post      : "DeleteAdsBanner"
        },function(d){
          $("#show_log_member").html(d);
        });
      });
  });
</script>
<div class="modal fade" id="modal-trash-delete"  aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header"  style="color: white;background-color: #f00;">
        <h4 class="modal-title"><span class="glyphicon glyphicon-trash" style=" color: #FFF"></span> ลบ</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" color: #FFF">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group" style="text-align: center; margin: 0;">
          <div class="control-label" id="show_log_member" style="padding:25px 0;">ยืนยัน การลบข้อมูล</div>
        </div>
      </div>
      <div class="modal-footer justify-content-between text-center">
        <button type="button" style="width:45%" class=" btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="button" style="width:45%" class=" btn btn-danger btn_delete_adsbanner" id="">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<!-- Delete ads banner -->
