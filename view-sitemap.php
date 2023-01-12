<?php
header('Content-Type:text/xml');
echo "<?xml version='1.0' encoding='UTF-8'?>"."\n";
echo "<sitemapindex xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>"."\n";
$SqlSelectPost = "SELECT sj.jDate_Create
                  FROM sb_job sj
                  WHERE ( sj.jStatus = '1' )
                  ORDER BY sj.jDate_Create DESC
                  LIMIT 0,1 ";
if (select_num($SqlSelectPost)>0) {
  foreach (select_tb($SqlSelectType) as $row) {
    echo "<sitemap>";
    echo "<loc>".$LinkWeb."search/?type=".$row['id_Type']."</loc>";
    echo "<lastmod>".con_xml($row['jDate_Create'])."</lastmod>";
    echo "</sitemap>";
  }
    
  echo "<sitemap>";
  echo "<loc>".$LinkWeb."sitemap-category.xml</loc>";
  echo "<lastmod>".date("Y-m-d")."T".date("H:i:s")."+07:00</lastmod>";
  echo "</sitemap>";

    
  echo "<sitemap>";
  echo "<loc>".$LinkWeb."sitemap-type.xml</loc>";
  echo "<lastmod>".date("Y-m-d")."T".date("H:i:s")."+07:00</lastmod>";
  echo "</sitemap>";
  
}
echo "</sitemapindex>";
?>
