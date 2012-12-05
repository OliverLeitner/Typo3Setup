<<<<<<< HEAD
==============================================================
	Basic Typo3 Setup Framework Version 0.1
==============================================================

This is a basic root for setting up a typo3 website.

typo3 is an open source gpl'd content management system from http://typo3.org

while it lags really good blogging features (sorry @ wordpress fans, we are not there yet)
it is very stable, and very common in europe for company websites.

This is the base for my own website http://www.neverslair-blog.net, built with easy of use in mind
feel free to use it for your own websites, change it, and let me
know what you make out of it.

you can reach me via my website:
http://www.neverslair-blog.net

A base information on the structure:

fileadmin/botresponse/bot-response.php	<--- landing file for all evil web crawler bots
code from: http://www.spanishseo.org/block-spam-bots-scrapers

fileadmin/cmd/crawler.sh	<--- typo3 indexed_search crawler script for the crontab
fileadmin/cmd/sitemap.sh	<--- creates a sitemap.txt and sitemap.xml for google and yahoo

fileadmin/includes/ajaxMenu.php	<--- a basic ajaxy mouseover menu for typo3
fileadmin/includes/baseURL.php	<--- dynamic baseUrl reader
fileadmin/includes/download.php	<--- download a file and zip it on the fly thanks to pclzip library
fileadmin/includes/imgArray.php	<--- add an image array to your website header for javascript stuff...

fileadmin/includes/pingor.php	<--- a very simple pingback script i found on the interwebs
code from: http://blog.kapsobor.de/articles/pingor/

fileadmin/includes/readstatic.php	<--- companion for nc_staticfilecache for speed optimisation
fileadmin/includes/replaceHeaderData.php	<--- add your own files to typo3 header via pure php
fileadmin/includes/rewrite.php	<--- some fun with rewriting urls
fileadmin/includes/sitemap.php	<--- sitemap files generator script
fileadmin/includes/teasers.php	<--- a simple teasers script, who needs an extension for that anyways?

fileadmin/includes/pclzip	<--- the pclzip zip library, so we dont need to have ziplib installed serverside
code from: http://www.phpconcept.net/pclzip/

fileadmin/scripts/ajax.php	<--- some base ajax fun
fileadmin/scripts/custom.js	<--- some custom javascript routines
fileadmin/scripts/js.php	<--- combine all javascript files and compress em for better site speeds

fileadmin/scripts/jsmin.php	<--- javascript minifying without the need of java or weird client programs
code from: https://github.com/rgrove/jsmin-php/

fileadmin/scripts/index.php	<--- grab all js files in this dir and minify them

fileadmin/styles/captcha.css	<--- image captcha base css
fileadmin/styles/contact_form.css	<--- sp_bettercontact form styles
fileadmin/styles/content_placement.css	<--- what appears on the website where...
fileadmin/styles/donations.css	<--- flattr and paypal looks
fileadmin/styles/foot_menu.css	<--- footer menu
fileadmin/styles/guestbook.css	<--- for the comment system
fileadmin/styles/header.css	<--- some header stylings
fileadmin/styles/lightbox.css	<--- image lightbox styles
fileadmin/styles/news.css	<--- t3blog styles
fileadmin/styles/search.css	<--- indexed_search styles
fileadmin/styles/sidebar_right.css	<--- sidebar on the right side
fileadmin/styles/social_bookmarks.css	<--- google plus, facebook, twitter, ...
fileadmin/styles/top_menu.css	<--- the menu on the top of the website
fileadmin/styles/tt_content.css	<--- content styling like font size, font weight, ...
fileadmin/styles/style.css	<--- the core style file, body, header styles, ...
fileadmin/styles/css.php	<--- combine all the above and compress it as much as possible for better loading times

fileadmin/templates/custom/sitemap.tmpl	<--- basic sitemap.xml structure template
fileadmin/templates/indexed_search/indexed_search.tmpl	<--- indexed_search html template
fileadmin/templates/sp_bettercontact/form.html	<--- the contact form template
fileadmin/templates/sp_bettercontact/email.html	<--- the email layout for the contact form
fileadmin/templates/ve_guestbook/guestbook.tmpl <--- the commentary system template
fileadmin/templates/index.html  <--- the base typo3 html template file

fileadmin/typoscript/indexed_search/setup.txt	<--- indexed_search typoscript configuration
fileadmin/typoscript/lightboxgallery/setup.txt	<--- lightboxgallery typoscript configuration
fileadmin/typoscript/sp_bettercontact/browsers.txt	<--- contact form browser definitions
fileadmin/typoscript/sp_bettercontact/systems.txt	<--- contact form system definitions
fileadmin/typoscript/sp_bettercontact/main.txt	<--- contact form main settings
fileadmin/typoscript/sr_freecap/constants.txt	<--- captcha system base settings
fileadmin/typoscript/sr_freecap/setup.txt	<--- captcha system custom configurations
fileadmin/typoscript/tsconfig/pageconfig.txt	<--- typo3 tsconfig for pages
fileadmin/typoscript/tsconfig/user.ts	<--- typo3 tsconfig for users
fileadmin/typoscript/tx_cssstyledcontent/setup.txt	<--- base content element typoscript
fileadmin/typoscript/ve_guestbook/constants.txt	<--- commentary system typoscript constants
fileadmin/typoscript/ve_guestbook/setup.txt	<--- commentary system typoscript setup
fileadmin/typoscript/cleanup.ts	<--- base website cleanup and removing some anoying typo3 standards
fileadmin/typoscript/constants.ts	<--- the template constants
fileadmin/typoscript/contents.ts	<--- content element typoscript
fileadmin/typoscript/menus.ts	<--- all website menus
fileadmin/typoscript/opengraphics.ts	<--- http://ogp.me/
fileadmin/typoscript/page.ts	<--- base website page typoscript
fileadmin/typoscript/plugins.ts	<--- include plugins into typo3
fileadmin/typoscript/setup.ts	<--- base website setup typoscript
fileadmin/typoscript/social_bookmarks.ts	<--- social bookmarking icons "share this!"

typo3conf/localconf.php	<--- global configuration file, cleaned up and ready to use
typo3conf/ext/lightboxgallery/pi1/class.tx_lightboxgallery_pi1.php	<--- lightboxgallery frontend output with some hacks
typo3conf/ext/lightboxgallery/ext_emconf.php	<--- the plugin registration script with version set to 99.99 so we wont get upgraded over our
customisation
extension from: http://typo3.org/extensions/repository/view/lightboxgallery/

greetings
Oliver
=======
==============================================================
	Basic Typo3 Setup Framework Version 0.1
==============================================================

This is a basic root for setting up a typo3 website.

typo3 is an open source gpl'd content management system from http://typo3.org

while it lags really good blogging features (sorry @ wordpress fans, we are not there yet)
it is very stable, and very common in europe for company websites.

This is the base for my own website http://www.neverslair-blog.net, built with easy of use in mind
feel free to use it for your own websites, change it, and let me
know what you make out of it.

you can reach me via my website:
http://www.neverslair-blog.net

A base information on the structure:

fileadmin/botresponse/bot-response.php	<--- landing file for all evil web crawler bots
code from: http://www.spanishseo.org/block-spam-bots-scrapers

fileadmin/cmd/crawler.sh	<--- typo3 indexed_search crawler script for the crontab
fileadmin/cmd/sitemap.sh	<--- creates a sitemap.txt and sitemap.xml for google and yahoo

fileadmin/includes/ajaxMenu.php	<--- a basic ajaxy mouseover menu for typo3
fileadmin/includes/baseURL.php	<--- dynamic baseUrl reader
fileadmin/includes/download.php	<--- download a file and zip it on the fly thanks to pclzip library
fileadmin/includes/imgArray.php	<--- add an image array to your website header for javascript stuff...

fileadmin/includes/pingor.php	<--- a very simple pingback script i found on the interwebs
code from: http://blog.kapsobor.de/articles/pingor/

fileadmin/includes/readstatic.php	<--- companion for nc_staticfilecache for speed optimisation
fileadmin/includes/replaceHeaderData.php	<--- add your own files to typo3 header via pure php
fileadmin/includes/rewrite.php	<--- some fun with rewriting urls
fileadmin/includes/sitemap.php	<--- sitemap files generator script
fileadmin/includes/teasers.php	<--- a simple teasers script, who needs an extension for that anyways?

fileadmin/includes/pclzip	<--- the pclzip zip library, so we dont need to have ziplib installed serverside
code from: http://www.phpconcept.net/pclzip/

fileadmin/scripts/ajax.php	<--- some base ajax fun
fileadmin/scripts/custom.js	<--- some custom javascript routines
fileadmin/scripts/js.php	<--- combine all javascript files and compress em for better site speeds

fileadmin/scripts/jsmin.php	<--- javascript minifying without the need of java or weird client programs
code from: https://github.com/rgrove/jsmin-php/

fileadmin/scripts/index.php	<--- grab all js files in this dir and minify them

fileadmin/styles/captcha.css	<--- image captcha base css
fileadmin/styles/contact_form.css	<--- sp_bettercontact form styles
fileadmin/styles/content_placement.css	<--- what appears on the website where...
fileadmin/styles/donations.css	<--- flattr and paypal looks
fileadmin/styles/foot_menu.css	<--- footer menu
fileadmin/styles/guestbook.css	<--- for the comment system
fileadmin/styles/header.css	<--- some header stylings
fileadmin/styles/lightbox.css	<--- image lightbox styles
fileadmin/styles/news.css	<--- t3blog styles
fileadmin/styles/search.css	<--- indexed_search styles
fileadmin/styles/sidebar_right.css	<--- sidebar on the right side
fileadmin/styles/social_bookmarks.css	<--- google plus, facebook, twitter, ...
fileadmin/styles/top_menu.css	<--- the menu on the top of the website
fileadmin/styles/tt_content.css	<--- content styling like font size, font weight, ...
fileadmin/styles/style.css	<--- the core style file, body, header styles, ...
fileadmin/styles/css.php	<--- combine all the above and compress it as much as possible for better loading times

fileadmin/templates/custom/sitemap.tmpl	<--- basic sitemap.xml structure template
fileadmin/templates/indexed_search/indexed_search.tmpl	<--- indexed_search html template
fileadmin/templates/sp_bettercontact/form.html	<--- the contact form template
fileadmin/templates/sp_bettercontact/email.html	<--- the email layout for the contact form
fileadmin/templates/ve_guestbook/guestbook.tmpl <--- the commentary system template
fileadmin/templates/index.html  <--- the base typo3 html template file

fileadmin/typoscript/indexed_search/setup.txt	<--- indexed_search typoscript configuration
fileadmin/typoscript/lightboxgallery/setup.txt	<--- lightboxgallery typoscript configuration
fileadmin/typoscript/sp_bettercontact/browsers.txt	<--- contact form browser definitions
fileadmin/typoscript/sp_bettercontact/systems.txt	<--- contact form system definitions
fileadmin/typoscript/sp_bettercontact/main.txt	<--- contact form main settings
fileadmin/typoscript/sr_freecap/constants.txt	<--- captcha system base settings
fileadmin/typoscript/sr_freecap/setup.txt	<--- captcha system custom configurations
fileadmin/typoscript/tsconfig/pageconfig.txt	<--- typo3 tsconfig for pages
fileadmin/typoscript/tsconfig/user.ts	<--- typo3 tsconfig for users
fileadmin/typoscript/tx_cssstyledcontent/setup.txt	<--- base content element typoscript
fileadmin/typoscript/ve_guestbook/constants.txt	<--- commentary system typoscript constants
fileadmin/typoscript/ve_guestbook/setup.txt	<--- commentary system typoscript setup
fileadmin/typoscript/cleanup.ts	<--- base website cleanup and removing some anoying typo3 standards
fileadmin/typoscript/constants.ts	<--- the template constants
fileadmin/typoscript/contents.ts	<--- content element typoscript
fileadmin/typoscript/menus.ts	<--- all website menus
fileadmin/typoscript/opengraphics.ts	<--- http://ogp.me/
fileadmin/typoscript/page.ts	<--- base website page typoscript
fileadmin/typoscript/plugins.ts	<--- include plugins into typo3
fileadmin/typoscript/setup.ts	<--- base website setup typoscript
fileadmin/typoscript/social_bookmarks.ts	<--- social bookmarking icons "share this!"

typo3conf/localconf.php	<--- global configuration file, cleaned up and ready to use
typo3conf/ext/lightboxgallery/pi1/class.tx_lightboxgallery_pi1.php	<--- lightboxgallery frontend output with some hacks
typo3conf/ext/lightboxgallery/ext_emconf.php	<--- the plugin registration script with version set to 99.99 so we wont get upgraded over our customisation
extension from: http://typo3.org/extensions/repository/view/lightboxgallery/

greetings
Oliver
>>>>>>> 83567a90663b5ccd534e6ee2b7253a4db106634b
