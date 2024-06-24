<?php

    $SqlSelect = "SELECT sj.*,pt.name_Type,p.PROVINCE_NAME,pc.name_category
                  FROM sb_job sj
                  LEFT OUTER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                  LEFT OUTER JOIN p_category pc ON (sj.jType = pc.id_category)
                  LEFT OUTER JOIN p_province p  ON (sj.jProvince = p.PROVINCE_ID)
                  WHERE (
                          sj.jID = '".$UrlId."'  AND
                        )";
    if (select_num($SqlSelect)>0) {
      $mID = "";
      foreach (select_tb($SqlSelect) as $row) {
      ?>
      <h2 class="head-main-cate-new  f-k"><?php echo $translations["dpost-no"];?> : <?php echo $row['jID'];?></h2>
        <div class="col-xs-12">
        <h2 class="lh-15 f-k wb"><?php echo htmlspecialchars_decode($row['jTitle']);?></h2>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 pt-5">
              <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                <?php
                  if (!empty($row['jPic1']) || $row['jPic1']!="") {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/post/picture_job_1/".$row['jPic1']);
                    ?>
                      <a href="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $row['jPic1'];?>" data-med="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $row['jPic1'];?>" class="demo-gallery__img--main" data-size="<?php echo $width."x".$height;?>" data-med-size="<?php echo $width."x".$height;?>"  data-author="<?php echo $row['jTitle'];?>">
                        <img  class="col-xs-12 p-0 pb-2 lazy" 
                          data-src="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $row['jPic1'];?>" 
                          src="https://placehold.co/600x600?text=Waiting" alt="<?php echo $row['jTitle'];?>" style="width:100%;height:100%;" />
                        <figure  style="display:none;" class="text-center"><?php echo $row['jTitle'];?> 1</figure>
                      </a>
                    <?php
                  }else {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/system/no-image.jpeg");
                    ?>
                      <a href="<?php echo $LinkWeb;?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="demo-gallery__img--main"  data-size="<?php echo $width."x".$height;?>" data-med-size="<?php echo $width."x".$height;?>" data-author="รูปที่ 1">
                        <img class="col-xs-12 p-0 pb-2 lazy" 
                            data-src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" 
                            src="https://placehold.co/600x600?text=Waiting" alt="" />
                        <figure  style="display:none;" class="text-center"><?php echo $translations["pd_view_nopic"];?></figure>
                      </a>
                    <?php
                  }
                  /// pic2
                  if (!empty($row['jPic2']) || $row['jPic2']!="") {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/post/picture_job_2/".$row['jPic2']);
                    ?>
                      <a href="<?php echo $LinkWeb;?>images/post/picture_job_2/<?php echo $row['jPic2'];?>" data-med="<?php echo $LinkWeb;?>images/post/picture_job_2/<?php echo $row['jPic2'];?>"  data-size="<?php echo $width."x".$height;?>" data-med-size="<?php echo $width."x".$height;?>" data-author="<?php echo $row['jTitle'];?>" class="col-xs-6 col-sm-3 p-0 pb-2" >
                        <img class="col-xs-12 p-0 lazy" 
                            data-src="<?php echo $LinkWeb;?>images/post/picture_job_2/<?php echo $row['jPic2'];?>"
                            src="https://placehold.co/600x600?text=Waiting" alt="<?php echo $row['jTitle'];?>" style="width:100%;height:100%;"  />
                        <figure  style="display:none;" class="text-center"><?php echo $row['jTitle'];?> 2</figure>
                      </a>
                    <?php
                  }else {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/system/no-image.jpeg");
                    ?>
                      <a href="<?php echo $LinkWeb;?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="demo-gallery__img--main"  data-size="<?php echo $width."x".$height;?>" data-med-size="<?php echo $width."x".$height;?>" data-author="รูปที่ 2">
                        <img class="col-xs-12 p-0 pb-2 lazy" 
                            data-src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" 
                            src="https://placehold.co/600x600?text=Waiting" alt="" />
                        <figure  style="display:none;" class="text-center"><?php echo $translations["pd_view_nopic"];?></figure>
                      </a>
                    <?php
                  }
                  /// pic3
                  if (!empty($row['jPic3']) || $row['jPic3']!="") {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/post/picture_job_3/".$row['jPic3']);
                    ?>
                      <a href="<?php echo $LinkWeb;?>images/post/picture_job_3/<?php echo $row['jPic3'];?>" data-med="<?php echo $LinkWeb;?>images/post/picture_job_3/<?php echo $row['jPic3'];?>" data-size="<?php echo $width."x".$height;?>" data-med-size="<?php echo $width."x".$height;?>"  data-author="<?php echo $row['jTitle'];?>" class="col-xs-6 col-sm-3 p-0 pb-2" >
                        <img class="col-xs-12 p-0 pb-2 lazy" 
                            data-src="<?php echo $LinkWeb;?>images/post/picture_job_3/<?php echo $row['jPic3'];?>" 
                            src="https://placehold.co/600x600?text=Waiting" alt="<?php echo $row['jTitle'];?>" style="width:100%;height:100%;"  />
                        <figure  style="display:none;" class="text-center"><?php echo $row['jTitle'];?> 3</figure>
                      </a>
                    <?php
                  }else {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/system/no-image.jpeg");
                    ?>
                      <a href="<?php echo $LinkWeb;?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="demo-gallery__img--main"  data-size="<?php echo $width."x".$height;?>" data-med-size="<?php echo $width."x".$height;?>" data-author="รูปที่ 3">
                        <img class="col-xs-12 p-0 pb-2 lazy" 
                            data-src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" 
                            src="https://placehold.co/600x600?text=Waiting" alt="" />
                        <figure  style="display:none;" class="text-center"><?php echo $translations["pd_view_nopic"];?></figure>
                      </a>
                    <?php
                  }
                  /// pic4
                  if (!empty($row['jPic4']) || $row['jPic4']!="") {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/post/picture_job_4/".$row['jPic4']);
                    ?>
                      <a href="<?php echo $LinkWeb;?>images/post/picture_job_4/<?php echo $row['jPic4'];?>" data-med="<?php echo $LinkWeb;?>images/post/picture_job_4/<?php echo $row['jPic4'];?>"  data-med-size="<?php echo $width."x".$height;?>" data-size="<?php echo $width."x".$height;?>" data-author="<?php echo $row['jTitle'];?>" class="col-xs-6 col-sm-3 p-0 pb-2" >
                        <img  class="col-xs-12 p-0 lazy" 
                            data-src="<?php echo $LinkWeb;?>images/post/picture_job_4/<?php echo $row['jPic4'];?>" 
                            src="https://placehold.co/600x600?text=Waiting" alt="<?php echo $row['jTitle'];?>" style="width:100%;height:100%;"  />
                        <figure  style="display:none;" class="text-center"><?php echo $row['jTitle'];?> 4</figure>
                      </a>
                    <?php
                  }else {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/system/no-image.jpeg");
                    ?>
                      <a href="<?php echo $LinkWeb;?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="demo-gallery__img--main"  data-size="<?php echo $width."x".$height;?>" data-med-size="<?php echo $width."x".$height;?>" data-author="รูปที่ 4">
                        <img class="col-xs-12 p-0 pb-2 lazy" 
                            data-src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" 
                            src="https://placehold.co/600x600?text=Waiting" alt="" />
                        <figure  style="display:none;" class="text-center"><?php echo $translations["pd_view_nopic"];?></figure>
                      </a>
                    <?php
                  }
                  /// pic5
                  if (!empty($row['jPic5']) || $row['jPic5']!="") {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/post/picture_job_5/".$row['jPic5']);
                    ?>
                      <a href="<?php echo $LinkWeb;?>images/post/picture_job_5/<?php echo $row['jPic5'];?>" data-med="<?php echo $LinkWeb;?>images/post/picture_job_5/<?php echo $row['jPic5'];?>" class="col-xs-6 col-sm-3 p-0 pb-2" data-med-size="<?php echo $width."x".$height;?>"  data-size="<?php echo $width."x".$height;?>" data-author="รูปที่ 5">
                        <img class="col-xs-12 p-0 lazy" 
                            data-src="<?php echo $LinkWeb;?>images/post/picture_job_5/<?php echo $row['jPic5'];?>" 
                            src="https://placehold.co/600x600?text=Waiting" alt="<?php echo $row['jTitle'];?>" style="width:100%;height:100%;"  />
                        <figure  style="display:none;" class="text-center"><?php echo $row['jTitle'];?> 5</figure>
                      </a>
                    <?php
                  }else {
                    list($width, $height, $type, $attr) = getimagesize($LinkWeb."images/system/no-image.jpeg");
                    ?>
                      <a href="<?php echo $LinkWeb;?>images/system/no-image.jpeg" data-med="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="demo-gallery__img--main"  data-size="<?php echo $width."x".$height;?>" data-med-size="<?php echo $width."x".$height;?>" data-author="รูปที่ 5">
                        <img class="col-xs-12 p-0 pb-2 lazy" 
                            data-src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" 
                            src="https://placehold.co/600x600?text=Waiting" alt="" />
                        <figure  style="display:none;" class="text-center"><?php echo $translations["pd_view_nopic"];?></figure>
                      </a>
                    <?php
                  }
                  ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 pt-5">
              <div class="row m-0 p-0" style="background:#f7f7f7;">
                <table class="table fs-11">
                <tr class="fs-15">
                  <th style="width:40%"><?php echo $translations["dpost-type"];?></th>
                  <td class="wb"><?php echo $row['name_Type'];?></td>
                </tr>
                <tr class="fs-15">
                  <th><?php echo $translations["dpost-price"];?></th>
                  <td class="wb" style="color:#f00;">
                    <?php
                      $vaprice = floatval($row['jPrice']);
                      if(!empty($vaprice) && $vaprice>0) {
                        echo number_format($vaprice);
                      }else{
                        echo $translations["price-annouce"];
                      }
                    ?>
                  </td>
                </tr>
                <tr>
                  <th><?php echo $translations["dpost-province"];?></th>
                  <td class="wb"><?php echo $row['PROVINCE_NAME'];?></td>
                </tr>
                <tr>
                  <th><?php echo $translations["dpost-no"];?></th>
                  <td><?php echo $row['jID'];?></td>
                </tr>
                <tr>
                  <th><?php echo $translations["dpost-view"];?></th>
                  <td><?php echo number_format($row['jRead']);?></td>
                </tr>
                <tr>
                  <th><?php echo $translations["dpost-edit"];?></th>
                  <td><i class="fa fa-cog" aria-hidden="true"></i> <a href="<?php echo $LinkWeb.$UrlPage."/".$UrlId;?>/?confirm-edit=check"><?php echo $translations["dpost-edit-text"];?></a></td>
                </tr>
                <tr>
                  <th><?php echo $translations["dpost-delete"];?></th>
                  <td><i class="fa fa-trash" aria-hidden="true"></i> <a href="<?php echo $LinkWeb.$UrlPage."/".$UrlId;?>/?confirm-delete=check"><?php echo $translations["dpost-delete-text"];?></a></td>
                </tr>
                <tr>
                  <th><?php echo $translations["dpost-date"];?></th>
                  <td class="wb"><?php echo day_format_month_thai($row['jDate_Create']);?></td>
                </tr>
                <tr>
                  <th><?php echo $translations["dpost-name"];?></th>
                  <td class="wb"><?php echo $row['jc_Name'];?></td>
                </tr>
                <tr>
                  <th><?php echo $translations["dpost-address"];?></th>
                  <td class="wb"><?php echo $row['jc_Address'];?></td>
                </tr>
                <tr>
                  <th><?php echo $translations["dpost-email"];?></th>
                  <td class="wb"><?php echo $row['jc_Email'];?></td>
                </tr>
                <tr>
                  <th><?php echo $translations["dpost-phone"];?></th>
                  <td class="wb">
                    <div class="post_click_tel_hide" style="cursor: pointer;color:#004dff;"><?php echo $translations["dpost-phone-click"];?></div>
                    <div class="post_click_tel_show" style="display:none;"><?php echo $row['jc_Telephone'];?></div>
                  </td>
                </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 p-0">
              <h3 class="main-head-cate t-announce f-k"><?php echo $translations["dpost-detail"];?></h3>
              <div class="row m-0 wb">
                <div class="col-xs-12 " style="font-family: 'Anuphan', sans-serif;background: #f7f7f7;padding: 20px;">
                  <?php echo check_tags(htmlspecialchars_decode($row['jDesc']));?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php
      }
    }else {
      ?><div class="text-center f-k" style="margin:10% 0;font-size:2em;border:1px solid #e1e1e1;border-radius:5px;color: #888888;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ขออภัย!<br>ประกาศนี้ไม่มี หรือ ยกเลิกประกาศแล้ว</div><?php
    }

?>
