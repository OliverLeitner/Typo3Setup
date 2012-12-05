<?php
	class user_Teasers {
		var $cObj;// The backReference to the mother cObj object set at call time
		
		/**
		* this function returns the javascript headerbanner slider into the page header...
		*/
		function returnTeaser($content,$conf){

            $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
				$conf['fields'], // SELECT ...
            	$conf['from'], // FROM ...
            	'uid = '.$conf['pid'] .'  AND hidden = 0 AND deleted = 0 '.$conf['params'] // WHERE...
            );
            
            $teaser_array = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);
            
            print_r($teaser_array);
            
			//$values = explode(",",$row[media]);
			
			/*$out = "<script>
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
			</script>";*/
			
			//return $out;
		}
	}
?>