/* custom scripting for neverslair */

/*	add the copyright year dynamically	*/
function writeYear(date){
	document.write(date.getFullYear());
}
	
$(document).ready(function() {
	
	//rounded corner stuff...
	//$('div#header').corner("cc:#000");
	//$('div#body').corner("cc:#fff");

	//just our basic lightbox
	$("a.standard_image_click").fancybox();
	
	//and some base rules for the lightbox
	$("a.lightbox").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600,
		'speedOut'		:	200,
		'overlayShow'	:	false
	});
	
	//lightboxgallery fancybox loader...
	$("a.gallery_pic").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600,
		'speedOut'		:	200,
		'overlayShow'	:	true,
		'afterLoad'		:	function() {
			this.title	=	'<div class="myTitle">'+$(this.element).next('span').html()+'</div>';
		}
	});
	
	//show and hide functionality for typo3 content elements...
	/*$("div.bodytext").show();
			
	$("div#standard-text h2").click(function(){
		$(this).next('div.bodytext').slideToggle();
		$(this).next('table.contenttable').slideToggle();
		$(this).next('div.csc-textpic').slideToggle();
		$(this).next('table.csc-uploads').slideToggle();
		$(this).next('ul.csc-menu').slideToggle();
		$(this).next('dl.csc-menu').slideToggle();
		$(this).next('div.csc-sitemap').slideToggle();
	});*/
});

//i want all subpages of the current one to be displayed in div...
/*function getSubMenu(id,curr_page){
  $.get('fileadmin/scripts/ajax.php',  { id: id, page: curr_page }, function(data){
       var replacepart = document.getElementById('submenu');
       //replacepart.innerHTML = '';
       if(data != ''){
         replacepart.innerHTML = '';
         replacepart.innerHTML = data;
       }
  });
}*/