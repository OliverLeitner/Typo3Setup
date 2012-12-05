<?php
$newurl = "daniel-s/magic-bookmarks/";

$urls = array(
	"magicbookmarks",
	"magic",
	"portable%20bookmarks",
	"magic%20bookmarks",
	"bookmark%20manager"
);

$webroot = dirname($_SERVER['PHP_SELF']);
$servername = $_SERVER['SERVER_NAME'];
$serverport = $_SERVER['SERVER_PORT'];

$user = $_SERVER['REQUEST_URI'];

if(in_array($user, $urls)){
	$content = file_get_contents($servername.":".$serverport."/".$newurl);
	//echo $content;
}
echo $test;
?>