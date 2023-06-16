<?php
header('Content-Type:text/xml');
echo "<?xml version='1.0' encoding='UTF-8'?>"."\n";
echo "<urlset xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:image='http://www.google.com/schemas/sitemap-image/1.1' xsi:schemaLocation='http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd' xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>"."\n";
$SqlSelectType = "SELECT * FROM p_type ORDER BY name_Type DESC";
if (select_num($SqlSelectType)>0) {
  foreach (select_tb($SqlSelectType) as $row) {
    echo "<url>"."\n";
    echo "<loc>".$LinkWeb."search/?type=".$row['id_Type']."</loc>"."\n";
    echo "<lastmod>".date("Y-m-d")."T".date("H:i:s")."+07:00</lastmod>"."\n";
    echo "<changefreq>daily</changefreq>"."\n";
    echo "</url>"."\n";
  }
}
echo "</urlset>";
?>
