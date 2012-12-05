<?php
/*	generating a google compatible sitemap xml file and outputting it... */
require("/home/never/public_html/typo3conf/localconf.php");

//we write out static files for our sitemapping...
$google_sitemap = "/home/never/public_html/fileadmin/sitemaps/sitemap.xml";
$yahoo_sitemap = "/home/never/public_html/fileadmin/sitemaps/sitemap.txt";

//some xml headers
$headercode = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

//and the corresponding footer...
$footercode = '</urlset>';

//test env or sub, set this...
$additional_dir = "/";

$servername = "www.neverslair-blog.net";
$serverport = "80";

//grabbing the template
$template = file_get_contents("/home/youruser/public_html/fileadmin/templates/custom/sitemap.tmpl");

//sql stuff...
$sql_select = "SELECT link_cache.url,SYS_LASTCHANGED FROM link_cache JOIN pages ON uid=id WHERE (pages.hidden=0 AND pages.deleted=0 AND pages.nav_hide=0)";

$link = mysql_connect("localhost", "mysql_user", "mysql_pass");
if (!$link) {
	die('Could not connect: ' . mysql_error());
}

mysql_select_db($typo_db, $link);

$res = mysql_query($sql_select);

//closing the sql connection
mysql_close($link);

//writing out the logic...
$joined_google = "";
$joined_yahoo = "";
while($result = mysql_fetch_assoc($res)){
	$output = str_replace("###SITE###","http://".$servername.$additional_dir.$result['url'],$template);
	$output = str_replace("###DATE###",gmdate("Y-m-d", $result['SYS_LASTCHANGED']) ."T". gmdate("H:m:s", $result['SYS_LASTCHANGED'])."+01:00",$output);
	$joined_google .= $output."\n";
	$joined_yahoo .= "http://".$servername.":".$serverport.$additional_dir.$result['url']."\n";
}

//xml output
$google = $headercode.$joined_google.$footercode;

$fh = fopen($google_sitemap,"w");
fwrite($fh,$google);
fclose($fh);

$fh = fopen($yahoo_sitemap,"w");
fwrite($fh,$joined_yahoo);
fclose($fh);
?>
