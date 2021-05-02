<sitemapindex xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/siteindex.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<sitemap>
<?php
header('Content-Type:text/xml');
echo "<?xml version='1.0' encoding='UTF-8'?>"."\n";
echo "<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>"."\n";
$SqlSelectPost = "SELECT *
                  FROM sb_job sj
                  WHERE ( sj.jStatus = '1' )
                  ORDER BY sj.jDate_Create ASC";

if (select_num($SqlSelectPost)>0) {
  echo "<url>
          <loc>".$LinkWeb."</loc>
          <lastmod>2021-04-27T20:18:04+00:00</lastmod>
          <changefreq>daily</changefreq>
        </url>";
  echo "<url>
          <loc>".$LinkWeb."search</loc>
          <lastmod>2021-04-27T20:18:04+00:00</lastmod>
          <changefreq>daily</changefreq>
        </url>";
  echo "<url>
          <loc>".$LinkWeb."register</loc>
          <lastmod>2021-04-27T20:18:04+00:00</lastmod>
          <changefreq>daily</changefreq>
        </url>";
  echo "<url>
          <loc>".$LinkWeb."login</loc>
          <lastmod>2021-04-27T20:18:04+00:00</lastmod>
          <changefreq>daily</changefreq>
        </url>";
  echo "<url>
          <loc>".$LinkWeb."post-new</loc>
          <lastmod>2021-04-27T20:18:04+00:00</lastmod>
          <changefreq>daily</changefreq>
        </url>";
  echo "<url>
          <loc>".$LinkWeb."policy</loc>
          <lastmod>2021-04-27T20:18:04+00:00</lastmod>
          <changefreq>daily</changefreq>
        </url>";
  echo "<url>
          <loc>".$LinkWeb."term-and-condition</loc>
          <lastmod>2021-04-27T20:18:04+00:00</lastmod>
          <changefreq>daily</changefreq>
        </url>";
  /*echo "<url>
          <loc>".$LinkWeb."</loc>
          <lastmod>2021-04-27T20:18:04+00:00</lastmod>
          <changefreq>daily</changefreq>
        </url>";*/

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
</sitemap>
</sitemapindex>
