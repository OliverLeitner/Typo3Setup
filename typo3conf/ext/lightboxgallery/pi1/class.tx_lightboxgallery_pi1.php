<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Lars Ebert <info@advitum.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */

require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'Gallery' for the 'gallery' extension.
 *
 * @author	Lars Ebert <info@advitum.de>
 * @package	TYPO3
 * @subpackage	tx_gallery
 */
class tx_lightboxgallery_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_lightboxgallery_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_lightboxgallery_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'lightboxgallery';	// The extension key.
	var $pi_checkCHash = true;
	
	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf) {
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
		$this->pi_initPIflexForm(); // Init and get the flexform data of the plugin
		
		//bugfix: by Oliver Leitner
		//t3lib_extMgm returns not always the basedir, so we use some base php functionality
		//$this->extDir = t3lib_extMgm::extRelPath('lightboxgallery');
		$webroot = dirname($_SERVER['PHP_SELF']);

		if(!$this->conf['thumbnailParams']) {
			$this->conf['thumbnailParams'] = 'w100-h100-c1.1';
		}
		if(!$this->conf['sizeupParams']) {
			$this->conf['sizeupParams'] = false;#'w900-h450';
		}
		
		if(!isset($this->conf['jQueryInclude'])) {
			$this->conf['jQueryInclude'] = true;
		}
		if(!$this->conf['imageSorting']) {
			$this->conf['imageSorting'] = 'alphabetical';
		}
		
		if($this->pi_getFFvalue($this->cObj->data['pi_flexform'], "cSorting", "sGallery") != 'standard') {
			$this->conf['imageSorting'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], "cSorting", "sGallery");
		}
		
		$array = explode('-', $this->conf['thumbnailParams']);
		
		$this->conf['thumbnailParams'] = '?';
		
		if(count($array) > 0)
		{
			foreach($array as $value)
			{
				switch(substr($value, 0, 1))
				{
					case 'c':
						$this->conf['thumbnailParams'] .= 'cropratio';
						$value = str_replace('.', ':', $value);
						break;
					case 'w':
						$this->conf['thumbnailParams'] .= 'width';
						break;
					case 'h':
						$this->conf['thumbnailParams'] .= 'height';
						break;
					default:
						$this->conf['thumbnailParams'] .= 'more[]';
						break;
				}
				
				//bugfix by Oliver Leitner, &amp; makes problems on some systems...
				$this->conf['thumbnailParams'] .= '=' . substr($value, 1) . '&';
			}
		}
		
		$this->conf['thumbnailParams'] .= 'image=';
		
		$array = explode('-', $this->conf['sizeupParams']);
		
		$this->conf['sizeupParams'] = '?';
		
		if(count($array) > 0)
		{
			foreach($array as $value)
			{
				switch(substr($value, 0, 1))
				{
					case 'c':
						$this->conf['sizeupParams'] .= 'cropratio';
						$value = str_replace('.', ':', $value);
						break;
					case 'w':
						$this->conf['sizeupParams'] .= 'width';
						break;
					case 'h':
						$this->conf['sizeupParams'] .= 'height';
						break;
					default:
						$this->conf['sizeupParams'] .= 'more[]';
						break;
				}
				
				//bugfix by Oliver Leitner, &amp; makes problems on some systems...
				$this->conf['sizeupParams'] .= '=' . substr($value, 1) . '&';
			}
		}
		
		$this->conf['sizeupParams'] .= 'image=';
		
		$thumbnailSlir = '';
		if($this->conf['thumbnailParams'] != false) {
			$thumbnailSlir = $webroot . 'typo3conf/ext/lightboxgallery/pi1/scripts/image.php' . $this->conf['thumbnailParams'];
		}
		$sizeupSlir = '';
		if($this->conf['sizeupParams'] != false) {
			$sizeupSlir = $webroot . 'typo3conf/ext/lightboxgallery/pi1/scripts/image.php' . $this->conf['sizeupParams'];
		}
		
		//bugfix by Oliver Leitner: this is all jquery
		if($this->conf['jQueryInclude'] == 1) {
			$GLOBALS['TSFE']->additionalHeaderData['tx_lightboxgallery_pi1_10'] = '<script type="text/javascript" src="' . $webroot . '/typo3conf/ext/lightboxgallery/pi1/js/jquery-1.7.min.js" /></script>';
			$GLOBALS['TSFE']->additionalHeaderData['tx_lightboxgallery_pi1_11'] = '<script type="text/javascript" src="' . $webroot . '/typo3conf/ext/lightboxgallery/pi1/js/jquery.easing-1.3.pack.js" /></script>';
			$GLOBALS['TSFE']->additionalHeaderData['tx_lightboxgallery_pi1_12'] = '<script type="text/javascript" src="' . $webroot . '/typo3conf/ext/lightboxgallery/pi1/js/jquery.mousewheel-3.0.6.pack.js" /></script>';
		}
		
		//bugfix by Oliver Leitner: what if we are already using fancybox for lets say normal image element?
		if($this->conf['loadFancybox'] == 1){
			$GLOBALS['TSFE']->additionalHeaderData['tx_lightboxgallery_pi1_1'] = '<link rel="stylesheet" type="text/css" href="' . $webroot . '/typo3conf/ext/lightboxgallery/pi1/css/jquery.fancybox.css" />';
			$GLOBALS['TSFE']->additionalHeaderData['tx_lightboxgallery_pi1_13'] = '<script type="text/javascript" src="' . $webroot . '/typo3conf/ext/lightboxgallery/pi1/js/jquery.fancybox.pack.js" /></script>';
		}

		//bugfix by Oliver Leitner: i like my javascript files in my own directory...
		if($this->conf['lightboxJS'] == 1){
			$GLOBALS['TSFE']->additionalHeaderData['tx_lightboxgallery_pi1_14'] = '<script type="text/javascript" src="' . $webroot . '/typo3conf/ext/lightboxgallery/pi1/js/tx_lightboxgallery_pi1.js"></script>';
		}
		
		$allowedExt = array("jpg", "png", "gif");
		
		$content = '
		<div class="lightboxgallery">';
		
		$this->folderPath = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], "cFolder", "sGallery");
		$images = array();

		if(is_dir($this->folderPath))
		{
			$dir = opendir($this->folderPath);
			
			while(($file = readdir($dir)) !== false)
			{
				if(!is_dir($this->folderPath . $file) && $file != '.' && $file != '..')
				{
					$parts = pathinfo($this->folderPath . $file);
					if(in_array(strtolower($parts['extension']), $allowedExt))
					{
						$images[] = $file;
					}
				}
			}
		}
		
		switch($this->conf['imageSorting']) {
			case 'natural':
				natsort($images);
				break;
			case 'naturalDesc':
				natsort($images);
				$images = array_reverse($images);
				break;
			case 'alphabetical':
				sort($images);
				break;
			case 'alphabeticalDesc':
				rsort($images);
				break;
			case 'date':
				usort($images, array($this, 'aSortDate'));
				break;
			case 'dateDesc':
				usort($images, array($this, 'arSortDate'));
				break;
		}
		
		foreach($images as $image) {
			$content .= '
			<a class="gallery_pic" href="' . htmlspecialchars($sizeupSlir.$webroot.$this->folderPath . $image) . '" title="'.$image.'" rel="prefetch">
			<img src="' . $thumbnailSlir.$webroot.$this->folderPath . $image . '" alt="' . $this->pi_getLL('enlarge') . '" title="' . $this->pi_getLL('enlarge') . '" />
			</a>
			';
			
			//Oliver Leitner: display special links for printing and downloading content
			if($this->conf['show_links'] == 1){
				$content .= '<span id="'.$image.'" style="display:none;"><a href="fileadmin/includes/download.php?file='.$webroot.'/'.$this->folderPath . $image.'" target="_blank" title="download full size image: '.$image.'">download</a> | image: '.$image.'</span>';
			}
		}
	
		$content .= '
		</div>';
	
		return $this->pi_wrapInBaseClass($content);
	}
	
	function aSortDate($image1, $image2) {
		$exif1 = exif_read_data($this->folderPath . $image1);
		$parts1 = explode(':', str_replace(' ', ':', $exif1['DateTime']));
		$time1 = mktime($parts1[3], $parts1[4], $parts1[5], $parts1[1], $parts1[2], $parts1[0]);
		
		$exif2 = exif_read_data($this->folderPath . $image2);
		$parts2 = explode(':', str_replace(' ', ':', $exif2['DateTime']));
		$time2 = mktime($parts2[3], $parts2[4], $parts2[5], $parts2[1], $parts2[2], $parts2[0]);
		
		return $time1-$time2;
	}
	
	function arSortDate($image1, $image2) {
		return -1 * $this->aSortDate($image1, $image2);
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/lightboxgallery/pi1/class.tx_lightboxgallery_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/lightboxgallery/pi1/class.tx_lightboxgallery_pi1.php']);
}

?>
