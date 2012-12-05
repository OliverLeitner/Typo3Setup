<?php
	class user_ajaxMenu {
		var $cObj;// The backReference to the mother cObj object set at call time
		
		/**
		* this function returns the javascript headerbanner slider into the page header...
		*/
		function menuToHeader($content,$conf){
		
		        //testsettings...
		        $conf['fields'] = 'uid,pid,title';
		        $conf['from'] = 'pages';
		        $conf['params'] = 'AND pid IN(2,5,6,7,8,9) AND doktype=1';
		        $conf['menuname'] = 'neverslair';

            $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
				      $conf['fields'], // SELECT ...
            	$conf['from'], // FROM ...
              'hidden = 0 AND deleted = 0 '.$conf['params'], // WHERE...
              '', // GROUP BY...
              'pid,uid', // ORDER BY...
              '' // LIMIT
            );
            
            $menu_array = Array();
            while($menu_row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
              $menu_array[] = $menu_row;
            }
            
            //some prevalues to get the last element in the array...
            $num_pages = count($menu_array);
            
            if($_GET['debug'] == '1'){
              print_r($menu_array);
            }
            
            $headerCode = '<script type="JavaScript">';
            $headerCode .= 'var myJSONObject = {"'.$conf['menuname'].'": [';
            
            //and the actual array work...
            foreach($menu_array AS $key => $subpages){
                $headerCode .= '{"uid": "'.$subpages['uid'].'", "pid": "'.$subpages['pid'].'", "title": "'.$subpages['title'].'"}';
                
                //everything but the last entry gets a semicolon...
                if($key != ($num_pages - 1)) {
                  $headerCode .= ',';
                }           
            }
            
            $headerCode .= ']};';
            $headerCode .= '</script>';
            
            return trim($headerCode);
		}
	}
?>