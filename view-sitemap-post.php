<?php
header('Content-Type:text/xml');
echo "<?xml version='1.0' encoding='UTF-8'?>"."\n";
echo "<urlset xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:image='http://www.google.com/schemas/sitemap-image/1.1' xsi:schemaLocation='http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd' xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>"."\n";
$SqlSelectPost = "SELECT *
                  FROM sb_job sj
                  WHERE ( sj.jStatus = '1' )
                  ORDER BY sj.jDate_Create DESC";
if (select_num($SqlSelectPost)>0) {
    foreach (select_tb($SqlSelectPost) as $row) {
    echo "<url>"."\n";
    echo "<loc>".$LinkWeb."post/".$row['jID']."</loc>"."\n";
    echo "<lastmod>".con_xml($row['jDate_Create'])."</lastmod>"."\n";
    echo "<changefreq>daily</changefreq>"."\n";
    echo "</url>"."\n";
  }
}
echo "</urlset>";
?>
