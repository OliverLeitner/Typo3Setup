#every content element not built in to t3 has its config here...

#first all the blog typoscripts to overwrite internal configurations...
#be aware: need to rename plugin from pi1 to pi2 (active copy...)

#css styled content
<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/typoscript/tx_cssstyledcontent/setup.txt">

#contact form
<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/typoscript/sp_bettercontact/main.txt">

#guestbook
<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/typoscript/ve_guestbook/setup.txt">

#lightbox gallery
<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/typoscript/lightboxgallery/setup.txt">

#indexed search
<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/typoscript/indexed_search/setup.txt">

#captcha system
<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/typoscript/sr_freecap/setup.txt">

#add social bookmarks to my website
<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/typoscript/social_bookmarks.ts">

#add open graph stuff to header
<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/typoscript/opengraphics.ts">