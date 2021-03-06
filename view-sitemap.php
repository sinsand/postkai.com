<?php
header('Content-Type:text/xml');
echo "<?xml version='1.0' encoding='UTF-8'?>"."\n";
echo "<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>"."\n";
$SqlSelectPost = "SELECT *
                  FROM sb_job sj
                  WHERE ( sj.jStatus = '1' )
                  ORDER BY sj.jDate_Create ASC";
$SqlSelectType = "SELECT * FROM p_type ORDER BY name_Type ASC";
$SqlSelectCate = "SELECT * FROM p_category ORDER BY name_category ASC";

if (select_num($SqlSelectPost)>0) {
  echo "<url>
          <loc>".$LinkWeb."</loc>
          <lastmod>2021-04-27T20:18:04+07:00</lastmod>
          <changefreq>never</changefreq>
        </url>";
  echo "<url>
          <loc>".$LinkWeb."search</loc>
          <lastmod>2021-04-27T20:18:04+07:00</lastmod>
          <changefreq>never</changefreq>
        </url>";
  echo "<url>
          <loc>".$LinkWeb."register</loc>
          <lastmod>2021-04-27T20:18:04+07:00</lastmod>
          <changefreq>never</changefreq>
        </url>";
  echo "<url>
          <loc>".$LinkWeb."login</loc>
          <lastmod>2021-04-27T20:18:04+07:00</lastmod>
          <changefreq>never</changefreq>
        </url>";
  echo "<url>
          <loc>".$LinkWeb."post-new</loc>
          <lastmod>2021-04-27T20:18:04+07:00</lastmod>
          <changefreq>never</changefreq>
        </url>";
  echo "<url>
          <loc>".$LinkWeb."policy</loc>
          <lastmod>2021-04-27T20:18:04+07:00</lastmod>
          <changefreq>never</changefreq>
        </url>";
  echo "<url>
          <loc>".$LinkWeb."term-and-condition</loc>
          <lastmod>2021-04-27T20:18:04+07:00</lastmod>
          <changefreq>never</changefreq>
        </url>";
  /*echo "<url>
          <loc>".$LinkWeb."</loc>
          <lastmod>2021-04-27T20:18:04+00:00</lastmod>
          <changefreq>daily</changefreq>
        </url>";*/
    foreach (select_tb($SqlSelectType) as $row) {
      echo "<url>";
      echo "<loc>".$LinkWeb."search/?type=".$row['id_Type']."</loc>";
      echo "<lastmod>".date("Y-m-d")."T".date("H:i:s")."+07:00</lastmod>";
      echo "<changefreq>daily</changefreq>";
      echo "</url>";
    }
    foreach (select_tb($SqlSelectCate) as $row) {
      echo "<url>";
      echo "<loc>".$LinkWeb."search/?category=".$row['name_category']."</loc>";
      echo "<lastmod>".date("Y-m-d")."T".date("H:i:s")."+07:00</lastmod>";
      echo "<changefreq>always</changefreq>";
      echo "</url>";
    }
    foreach (select_tb($SqlSelectPost) as $row) {
    echo "<url>";
    echo "<loc>".$LinkWeb."post/".$row['jID']."</loc>";
    echo "<lastmod>".con_xml($row['jDate_Create'])."</lastmod>";
    echo "<changefreq>daily</changefreq>";
    echo "</url>";
  }
}
echo "</urlset>";
?>
