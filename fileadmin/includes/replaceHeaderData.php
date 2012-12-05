<?php
	class user_setHeader {
		var $cObj;// The backReference to the mother cObj object set at call time

		/**
		* this function returns the javascript headerbanner slider into the page header...
		*/
		function returnHeader($content,$conf){
			$site_url = $conf['site_url'];			
			$headercode = trim('
<link rel="shortcut icon" href="'.$site_url.'/fileadmin/images/cubes.ico" />
<link rel="icon" href="'.$site_url.'/fileadmin/images/cubes.ico" />
<link rel="pingback" href="'.$site_url.'/fileadmin/includes/pingback.php" />
<link rel="stylesheet" type="text/css" href="/fileadmin/styles/css.php" media="all" />
<script src="/fileadmin/scripts/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/fileadmin/scripts/fancybox/lib/jquery.mousewheel-3.0.6.pack.js" type="text/javascript"></script>
<script src="/fileadmin/scripts/fancybox/source/jquery.fancybox.pack.js?v=2.0.5" type="text/javascript"></script>
<script src="/fileadmin/scripts/fancybox/source/helpers/jquery.fancybox-buttons.js?v=2.0.5" type="text/javascript"></script>
<script src="/fileadmin/scripts/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=2.0.5" type="text/javascript"></script>
<script src="/fileadmin/scripts/js.php" type="text/javascript"></script>
<script type="text/javascript">
/* <![CDATA[ */
    (function() {
        var s = document.createElement(\'script\'), t = document.getElementsByTagName(\'script\')[0];
        s.type = \'text/javascript\';
        s.async = true;
        s.src = \'http://api.flattr.com/js/0.6/load.js?mode=auto\';
        t.parentNode.insertBefore(s, t);
    })();
/* ]]> */</script>
			');
			return $headercode;
		}
		
		function cleanupMeta($content,$conf){
			$new_generator = $conf['new_generator'];
			$content = str_replace(
				'<meta name="generator" content="TYPO3 4.5 CMS">',
				'<meta name="generator" content="'.$new_generator.'" />',
				$content
			);
				
			return $content;
		}
	}
?>
