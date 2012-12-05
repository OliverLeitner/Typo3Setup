<?php
/*	secure download script	*/
require_once("pclzip/pclzip.lib.php");

$file = ltrim($_GET['file'],"/");

//some security: allowed file types
$file_ext_list = explode(",","png,gif,jpg,mp4,flv,m4v,zip,rar,tar.gz,gz,7z,JPG");

$docroot = $_SERVER['DOCUMENT_ROOT'];
$filesize_max = 1024;

//putting together the filepath...
$file = $docroot.'/'.$file;

if(file_exists($file) == TRUE){
	//get the file ext
	$file_split_by_point = explode(".",$file);
	$file_ext = end($file_split_by_point);

	//security check for file type and ext...
	if(in_array($file_ext,$file_ext_list)){
		//get the filename
		$file_split_by_slash = explode("/",$file);
		$file_name = end($file_split_by_slash);
		
		//get file type
		//function not supported on the server, old php?
		//$content_type = mime_content_type($file);

		//write the file to the browser
		if(filesize($file) < $filesize_max){
			header('Content-disposition: attachment; filename='.$file_name);
			header('Content-type: image/jpg');
			readfile($file);
		} else {
				
			//create zip file
			$filepath = dirname($file);
			$archive = new PclZip($file_name.'.zip');
			if ($archive->create($file,PCLZIP_OPT_REMOVE_PATH,$filepath) == 0) {
				die('Error : '.$archive->errorInfo(true));
			}
  			
			//and sending the zipfile to the browser
			header('Content-disposition: attachment; filename='.$file_name.".zip");
			header('Content-type: archive/zip');
			readfile($archive->zipname);
			
			//after everything finished we delete the zipfile...
			unlink($archive->zipname);
		}
	} else {
		echo "you are not allowed to download this file ".$file;
	}
} else {
	echo "no such file on the server ".$file;
}
?>
