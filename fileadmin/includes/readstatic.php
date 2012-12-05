<?php
/*	reading statically cached files in favor to normal content...	*/
$static_dir = "typo3temp/tx_ncstaticfilecache/";
$domain = $_SERVER['SERVER_NAME'];
$port = $_SERVER['SERVER_PORT'];
$root_dir = $_SERVER['DOCUMENT_ROOT'];
$filename = $_SERVER['REQUEST_URI'];
$subdir = "gotasubdir/";

//die("is it working?");

//set together the filename to check for
if($port != "80" || $port != "443") {
	$file = $root_dir.$subdir.$static_dir.$domain.":".$port.$filename."index.html";
} else {
	$file = $root_dir.$subdir.$static_dir.$domain.$filename."index.html";
}

//reads in filename, check if exists returns file content
function readStaticFile($filename){
	if(file_exists($filename)){
		if(mime_content_type($filename) == "text/html"){
			$output = file_get_contents($filename);
			return $output;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

//call the function and return the output
if(readStaticFile($file) != false){
	echo readStaticFile($file);
	die();
}
?>
