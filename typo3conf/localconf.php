<?php
//find out if we got static files and use em in case...
if ($_SERVER['HTTP_HOST']) {
    include_once("/fileadmin/includes/readstatic.php");
}

## INSTALL SCRIPT EDIT POINT TOKEN - all lines after this points may be changed by the install script!

//core settings
$TYPO3_CONF_VARS['SYS']['encryptionKey'] = 'yourtypo3encryptionkey';
$TYPO3_CONF_VARS['SYS']['compat_version'] = '4.5';
$typo_db_username = 'mysql_user';
$typo_db_password = 'mysql_password';
$typo_db_host = 'localhost';
$typo_db = 'mysql_database';
$TYPO3_CONF_VARS['SYS']['sitename'] = 'Neverslair';
$TYPO3_CONF_VARS['BE']['installToolPassword'] = 'youinstalltoolpasswordhash';
$typo_db_extTableDef_script = 'extTables.php';

//extended core settings
$TYPO3_CONF_VARS['INSTALL']['wizardDone']['tx_coreupdates_installsysexts'] = '1';
$TYPO3_CONF_VARS['INSTALL']['wizardDone']['tx_coreupdates_installnewsysexts'] = '1';
$TYPO3_CONF_VARS['BE']['versionNumberInFilename'] = '0';
$TYPO3_CONF_VARS['SYS']['doNotCheckReferer'] = '1';
$TYPO3_CONF_VARS['SYS']['USdateFormat'] = '1';
$TYPO3_CONF_VARS['SYS']['curlUse'] = '1';
$TYPO3_CONF_VARS['BE']['fileCreateMask'] = '0777';
$TYPO3_CONF_VARS['BE']['folderCreateMask'] = '0777';
$TYPO3_CONF_VARS['BE']['adminOnly'] = '0';
$TYPO3_CONF_VARS['BE']['disable_exec_function'] = '1';
$TYPO3_CONF_VARS['FE']['tidy'] = '0';
//$TYPO3_CONF_VARS['FE']['tidy_path'] = 'tidy -i --doctype html --quiet true --tidy-mark true -wrap 0 --output-html true -raw -utf8';
$TYPO3_CONF_VARS['EXT']['noEdit'] = '1';

//utf-8 stuff...
$TYPO3_CONF_VARS['SYS']['UTF8filesystem'] = '1';
$TYPO3_CONF_VARS['SYS']['setDBinit'] = 'SET NAMES utf8; AND SET SESSION character_set_server=utf8; AND SET SESSION query_cache_type=1;\' . LF . \'';
$TYPO3_CONF_VARS['SYS']['t3lib_cs_convMethod'] = 'mbstring';
$TYPO3_CONF_VARS['SYS']['t3lib_cs_utils'] = 'mbstring';
$TYPO3_CONF_VARS['BE']['forceCharset'] = 'utf-8';

//image manipulation
$TYPO3_CONF_VARS['GFX']['im_version_5'] = 'im6';
$TYPO3_CONF_VARS['GFX']['im_combine_filename'] = 'combine';
$TYPO3_CONF_VARS['GFX']['png_truecolor'] = '1';
$TYPO3_CONF_VARS['SYS']['t3lib_cs_convMethod'] = 'iconv';

//speed tuning
$TYPO3_CONF_VARS['SYS']['useCachingFramework'] = '1';
$TYPO3_CONF_VARS['FE']['disableNoCacheParameter'] = '1';

//debug settings
$TYPO3_CONF_VARS['SYS']['devIPmask'] = '127.0.0.1,::1,192.168.2.2';
$TYPO3_CONF_VARS['SYS']['sqlDebug'] = '0';
$TYPO3_CONF_VARS['SYS']['enable_DLOG'] = '0';
$TYPO3_CONF_VARS['SYS']['enable_errorDLOG'] = '0';
$TYPO3_CONF_VARS['SYS']['enable_exceptionDLOG'] = '0';
$TYPO3_CONF_VARS['BE']['debug'] = '0';
$TYPO3_CONF_VARS['FE']['debug'] = '0';

//extension settings
//enable extensions in front and backend
$TYPO3_CONF_VARS['EXT']['extList'] = 
'css_styled_content,perm,filelist,tstemplate,tstemplate_info,lowlevel,beuser,setup,rtehtmlarea,table,cooluri,t3skin,ve_guestbook,sp_bettercontact,belog,info,sr_freecap,lightboxgallery,indexed_search,crawler,mh_httpbl,nc_staticfilecache,install';
$TYPO3_CONF_VARS['EXT']['extList_FE'] = 
'css_styled_content,rtehtmlarea,table,cooluri,t3skin,ve_guestbook,sp_bettercontact,sr_freecap,lightboxgallery,indexed_search,crawler,mh_httpbl,nc_staticfilecache,install';

//extensions configuration option defaults
$TYPO3_CONF_VARS['EXT']['extConf']['css_styled_content'] = 'a:2:{s:15:"setPageTSconfig";s:1:"1";s:19:"removePositionTypes";s:1:"1";}';
$TYPO3_CONF_VARS['EXT']['extConf']['sp_bettercontact'] = 'a:1:{s:11:"enableDBTab";s:1:"1";}';
$TYPO3_CONF_VARS['EXT']['extConf']['cooluri'] = 'a:3:{s:6:"LANGID";s:1:"L";s:7:"XMLPATH";s:25:"typo3conf/cooluriconf.xml";s:11:"MULTIDOMAIN";s:1:"0";}';	// Modified or inserted by TYPO3 Extension Manager.
$TYPO3_CONF_VARS['EXT']['extConf']['rtehtmlarea'] = 'a:13:{s:21:"noSpellCheckLanguages";s:23:"ja,km,ko,lo,th,zh,b5,gb";s:15:"AspellDirectory";s:15:"/usr/bin/aspell";s:17:"defaultDictionary";s:2:"en";s:14:"dictionaryList";s:2:"en";s:20:"defaultConfiguration";s:95:"Demo (Show-off configuration. Includes pre-configured styles. Not for production environments.)";s:12:"enableImages";s:1:"0";s:20:"enableInlineElements";s:1:"0";s:19:"allowStyleAttribute";s:1:"0";s:24:"enableAccessibilityIcons";s:1:"0";s:16:"enableDAMBrowser";s:1:"0";s:16:"forceCommandMode";s:1:"0";s:15:"enableDebugMode";s:1:"0";s:23:"enableCompressedScripts";s:1:"1";}';
$TYPO3_CONF_VARS['EXT']['extConf']['indexed_search'] = 'a:17:{s:8:"pdftools";s:9:"/usr/bin/";s:8:"pdf_mode";s:2:"20";s:5:"unzip";s:9:"/usr/bin/";s:6:"catdoc";s:9:"/usr/bin/";s:6:"xlhtml";s:9:"/usr/bin/";s:7:"ppthtml";s:9:"/usr/bin/";s:5:"unrtf";s:9:"/usr/bin/";s:9:"debugMode";s:1:"0";s:18:"fullTextDataLength";s:1:"0";s:23:"disableFrontendIndexing";s:1:"1";s:6:"minAge";s:2:"24";s:6:"maxAge";s:1:"0";s:16:"maxExternalFiles";s:1:"5";s:26:"useCrawlerForExternalFiles";s:1:"1";s:11:"flagBitMask";s:3:"192";s:16:"ignoreExtensions";s:0:"";s:17:"indexExternalURLs";s:1:"0";}';	// Modified or inserted by TYPO3 Extension Manager.
$TYPO3_CONF_VARS['EXT']['extConf']['crawler'] = 'a:15:{s:9:"sleepTime";s:4:"1000";s:16:"sleepAfterFinish";s:2:"10";s:11:"countInARun";s:3:"100";s:14:"purgeQueueDays";s:2:"14";s:12:"processLimit";s:1:"1";s:17:"processMaxRunTime";s:3:"300";s:14:"maxCompileUrls";s:5:"10000";s:12:"processDebug";s:1:"0";s:16:"crawlHiddenPages";s:1:"0";s:7:"phpPath";s:12:"/usr/bin/php";s:14:"enableTimeslot";s:1:"1";s:11:"logFileName";s:0:"";s:9:"follow30x";s:1:"0";s:18:"makeDirectRequests";s:1:"0";s:16:"frontendBasePath";s:1:"/";}';	// Modified or inserted by TYPO3 Extension Manager.
$TYPO3_CONF_VARS['EXT']['extConf']['nc_staticfilecache'] = 'a:8:{s:23:"clearCacheForAllDomains";s:1:"1";s:22:"sendCacheControlHeader";s:1:"1";s:27:"enableStaticFileCompression";s:1:"1";s:23:"showGenerationSignature";s:1:"1";s:8:"strftime";s:36:"cached statically on: %d-%m-%y %H:%M";s:5:"debug";s:1:"0";s:11:"recreateURI";s:1:"1";s:26:"markDirtyInsteadOfDeletion";s:1:"0";}';
$TYPO3_CONF_VARS['EXT']['extConf']['mh_httpbl'] = 'a:6:{s:9:"accesskey";s:12:"cqmeolujahpi";s:4:"type";s:1:"2";s:5:"score";s:1:"0";s:7:"message";s:170:"<strong>You have been blocked.</strong><br />Your IP appears to be on the httpbl.org/projecthoneypot.org blacklist.<br /><br />###REQUEST_IP###<br /><br />###USER_TYPE###";s:9:"quicklink";s:0:"";s:5:"debug";s:1:"0";}';
// Updated by TYPO3 Extension Manager 04-12-12 13:08:15
?>
