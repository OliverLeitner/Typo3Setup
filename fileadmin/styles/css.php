<?php
  $url = '';
  header('Content-type: text/css');
  ob_start("compress");
  function compress($buffer) {
    /* remove comments */
    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
    /* remove tabs, spaces, newlines, etc. */
    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
    return $buffer;
  }

  /* your css files */
  include('../scripts/fancybox/source/jquery.fancybox.css');
  include('../scripts/fancybox/source/helpers/jquery.fancybox-buttons.css');
  include('../scripts/fancybox/source/helpers/jquery.fancybox-thumbs.css');
  
  /*	core style holding the very basic page styles	*/
  include('../styles/style.css');
  
  /*	basic website layout	*/
  include('../styles/content_placement.css');
  
  /*	everything for defining the header banner...	*/
  include('../styles/header.css');
  
  /*	the menu at the bottom of the website	*/
  include('../styles/foot_menu.css');
  
  /*	the menu in the head of the website	*/
  include('../styles/top_menu.css');
  
  /*	we do have a sidebar on the right side	*/
  include('../styles/sidebar_right.css');
  
  /*	all content element styles which are not extension based	*/
  include('../styles/tt_content.css');
  
  /*	we got a content search functionality	*/
  include('../styles/search.css');
  
  /*	contact form styles	*/
  include('../styles/contact_form.css');
  
  /*	guestbook styles	*/
  include('../styles/guestbook.css');
  
  /*	captcha styles	*/
  include('../styles/captcha.css');
  
  /*	lightbox styles	*/
  include('../styles/lightbox.css');

  /*	share this! styles	*/
  include('../styles/social_bookmarks.css');
  
  /*	sidebar donations styles	*/
  include('../styles/donations.css');
  
  ob_end_flush();
?>
