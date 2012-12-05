<?php
  include('jsmin.php');
  //echo JSMin::minify(include('jquery-1.8.3.min.js'));
  //echo JSMin::minify(include('fancybox/lib/jquery.mousewheel-3.0.6.pack.js'));
  //echo JSMin::minify(include('fancybox/source/jquery.fancybox.pack.js'));
  //echo JSMin::minify(include('fancybox/source/helpers/jquery.fancybox-buttons.js'));
  //echo JSMin::minify(include('fancybox/source/helpers/jquery.fancybox-thumbs.js'));
  echo JSMin::minify(include('custom.js'));
  echo JSMin::minify(include('../../typo3conf/ext/sr_freecap/pi2/freeCap.js'));
?>
