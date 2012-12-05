<?php
	class user_baseURL {
		var $cObj;// The backReference to the mother cObj object set at call time
		
		/**
		* this function returns the javascript headerbanner slider into the page header...
		*/
		function returnURL($content,$conf){
			print $_SERVER['SERVER_NAME']."\n";
			//return $_ENV["HOSTNAME"]."\n";
			//return "hello world";
		}
	}
?>