<?php
// connect to the database
$db_host = "localhost" ;
$db_user = "postkaic_post" ;
$db_pass = "nbd5nZAPMv" ;
$db_name = "postkaic_post" ;
$max_links_per_file = 200;
$LinkWeb = "https://".$_SERVER['HTTP_HOST']."/";
////  for xml file
function con_xml($value){
  $hour = substr($value,12,2);
  $min = substr($value,15,2);
  $second = substr($value,18,2);
  $month = substr($value,6,2);
  $day = substr($value,8,);
  $year = substr($value,0,4);
  return date("Y-m-d\TH:i:s+00:00",mktime($hour,$min,$second,$month,$day,$year));
  //2009-12-27 00:10:34
}

$sql = "SELECT sj.jID,sj.jDate_Create
                  FROM sb_job sj
                  WHERE ( sj.jStatus = '1' )
                  ORDER BY sj.jDate_Create DESC";

generate_sitemap($db_host, $db_user, $db_pass, $db_name, $max_links_per_file);
?>






<?php
function generate_sitemap($db_host, $db_user, $db_pass, $db_name, $max_links_per_file) {
  // connect to the database
  $db = new mysqli($db_host, $db_user, $db_pass, $db_name);

  // check if connection was successful
  if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
  }

  // query the database to get all rows
  $sql = "SELECT sj.jID,sj.jDate_Create
                  FROM sb_job sj
                  WHERE ( sj.jStatus = '1' )
                  ORDER BY sj.jDate_Create DESC";
  $result = $db->query($sql);

  // create a counter for the number of links
  $link_count = 0;

  // start the XML sitemap
  $xml = new XMLWriter();
  $xml->openMemory();
  $xml->startDocument('1.0', 'UTF-8');
  $xml->startElement('urlset');
  $xml->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

  // loop through the rows and add links to the sitemap
  while ($row = $result->fetch_assoc()) {
    // create a new sitemap if maximum links exceeded
    if ($link_count % $max_links_per_file == 0 && $link_count > 0) {
      $xml->endElement();
      $xml->endDocument();
      $sitemap = $xml->outputMemory();
      $xml = new XMLWriter();
      $xml->openMemory();
      $xml->startDocument('1.0', 'UTF-8');
      $xml->startElement('sitemapindex');
      $xml->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
      $xml->startElement('sitemap');
      $xml->writeElement('loc', $LinkWeb.'sitemap-' . ($link_count / $max_links_per_file) . '.xml');
      $xml->writeElement('lastmod', con_xml($row['jDate_Create']));
      $xml->endElement();
    }

    // add the link to the XML sitemap
    $xml->startElement('url');
    $xml->writeElement('loc', $LinkWeb.'sitemap-' . ($link_count / $max_links_per_file) . '.xml');
    $xml->writeElement('lastmod', $row['jDate_Create']);
    $xml->endElement();

    // increment the link counter
    $link_count++;
  }

  // end the sitemap and sitemap index
  $xml->endElement();
  $xml->endDocument();
  $sitemap = $xml->outputMemory();
  $xml = new XMLWriter();
  $xml->openMemory();
  $xml->startDocument('1.0', 'UTF-8');
  $xml->startElement('sitemapindex');
  $xml->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
  $xml->startElement('sitemap');
  $xml->writeElement('loc', 'http://www.example.com/sitemap.xml');
  $xml->writeElement('lastmod', date('Y-m-d'));
  $xml->endElement();
  $xml->endElement();
  $index = $xml->outputMemory();

  // return the sitemap and sitemap index as an array
  return array('sitemap' => $sitemap, 'index' => $index);
}
?>