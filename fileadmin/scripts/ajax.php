<?php
  include('../../typo3conf/localconf.php');
  /* basic ajax functions collection for my t3 framework... */
  include('../../typo3/sysext/cms/tslib/class.tslib_pibase.php');
  class ajaxFunctions extends tslib_pibase {
      function requestSubMenu($startpid,$curr_page){
	$conf['fields'] = 'uid,pid,title';
	$conf['from'] = 'pages';
	$conf['params'] = 'AND pid = '.$startpid;
	$conf['menuname'] = 'neverslair';
        $query = 'SELECT SQL_CACHE '.$conf['fields'].' FROM '.$conf['from'].' WHERE hidden = 0 AND deleted = 0 '.$conf['params'];
        mysql_connect($GLOBALS['typo_db_host'], $GLOBALS['typo_db_username'], $GLOBALS['typo_db_password']);
        mysql_select_db($GLOBALS['typo_db']);
        $res = mysql_query($query);
        $menu_array = Array();
        while($menu_row = mysql_fetch_assoc($res)){
         $menu_array[] = $menu_row;
        }
        mysql_close();
        //very barebone, we just give back the menu...
        return $menu_array;
      }
  }
  //grabbing the id via get param to give out our result...
  $id = intval($_GET['id']);
  $curr_page = intval($_GET['page']);
  $menu = new ajaxFunctions();
  $submenu = $menu->requestSubMenu($id,$curr_page);
  $showme = '';
  foreach($submenu AS $key => $value){
    if($value['uid'] != $curr_page){
      $showme .= '<li><a href="?id='.$value['uid'].'" onfocus="blurLink(this);">'.$value['title'].'</a></li>';
    } else {
      $showme .= '<li id="nav2act"><a href="?id='.$value['uid'].'" onfocus="blurLink(this);">'.$value['title'].'</a></li>';
    }
  }
  if($id != '' && $curr_page != ''){
    echo $showme;
  }
?>
