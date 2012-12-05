<?php
	class user_imgArray {
		var $cObj;// The backReference to the mother cObj object set at call time
		
		/**
		* this function returns the javascript headerbanner slider into the page header...
		*/
		function returnJS($content,$conf){

			//$conf['path'] = dirname($_SERVER['PHP_SELF']).'/'.$conf['path'];
			//print_r($conf);
			
            $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
				'media', // SELECT ...
            	'pages', // FROM ...
            	'uid = '.$conf['pid'] .' AND deleted = 0' // WHERE...
            );
            
            $row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);

			$values = explode(",",$row[media]);
			
			$out = "<script type=\"text/javascript\">
			<!--//
			var interval = 14000;
			";
			
			$images = "";
			
			$imgPreload = "var imagePreload = new Image();\n";
			
			$iter = 0;
			
			foreach($values AS $key => $value){
				$images .= "'".$conf["path"].$value."',";
				$imgPreload .= "imagePreload[".$iter."] = new Image();\n";
				$imgPreload .= "imagePreload[".$iter."].src = '".$conf["path"].$value."';\n";
				$iter++;
			}
			
			$images = rtrim($images,",");
			
			$out .= $imgPreload."\n";
			$out .= "var images = [".$images."];";
			
			$out .= "
			var i = 1;
			setInterval(ChangeImages, interval);
			function ChangeImages() {
				if (i == images.length) { i = 0; }

				$(\"#headerbanner\").fadeOut('slow', function () {
					$(this).attr('src', images[i]); 
					i++;
				}).fadeToggle('slow');
			}
			//-->
			</script>
			<link href=\"https://plus.google.com/101264080802129898135\" rel=\"Author\" />";
			
			return $out;
		}
	}
?>
