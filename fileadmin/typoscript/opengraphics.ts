#social networks informations
#opengraph is something that not only fb does...
#[useragent = facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)]

#everything that can be set statically...
page.headerData.25 = HTML
page.headerData.25.value (
	<meta property="og:locality" content="Salzburg"/>
	<meta property="og:country-name" content="Austria"/>
	<meta property="og:latitude" content="48.78502"/>
	<meta property="og:longitude" content="9.16254"/>
	<meta property="og:type" content="website"/>
	<meta property="og:site_name" content="Neverslair"/>
	<meta property="og:locale" content="en_US" />
	<meta property="fb:admins" content="123456789,234567891"/>
	<meta property="fb:page_id" content="200185198887" />
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
)

#building the og:description tag from tt_content
temp.OpenGraphDescription = COA
temp.OpenGraphDescription{
 10=CONTENT
 10.table= tt_content
 10.select {              
   selectFields = bodytext
 }
 10.renderObj =COA
 10.renderObj {
   10=TEXT
   10 {
     field =  bodytext     
     stripHtml=1
     crop = 300 | ... | 1        
   }
 }
 wrap = <meta property="og:description" content="|" />
}
page.headerData.55 < temp.OpenGraphDescription

#page title from pages
page.headerData.77 = TEXT
page.headerData.77.field = title
page.headerData.77.wrap = <meta property="og:title" content="|" />

#set a working og url
page.headerData.88 = TEXT
page.headerData.88.field = uid
page.headerData.88.wrap = <meta property="og:url" content="{TSFE:baseUrl}?id=|" />
page.headerData.88.insertData = 1

#a collection of images that we want on all subpages
page.headerData.99 = TEXT
page.headerData.99.value = uploads/pics/ollismile.png
page.headerData.99.wrap = <meta property="og:image" content="{TSFE:baseUrl}|" />
page.headerData.99.insertData = 1

page.headerData.111 = TEXT
page.headerData.111.value = fileadmin/images/typo3-logo.jpg
page.headerData.111.wrap = <meta property="og:image" content="{TSFE:baseUrl}|" />
page.headerData.111.insertData = 1

#and the other images from tt_content
page.headerData {
  848 = CONTENT
  848 {
    table = tt_content
    select {
      where = (CType = "image" OR CType = "textpic") AND colPos = 0 AND CHAR_LENGTH(image) > 0
    }
    renderObj = TEXT
    renderObj {
      field = image
      split {
        token = ,
        cObjNum = 1
        1.cObject = IMG_RESOURCE
        1.cObject {
          file {
            import = uploads/pics/
            import.current = 1
            width = 200m
            height = 200m
          }
          stdWrap.wrap = <meta property="og:image" content="{TSFE:baseUrl}|" />
          stdWrap.insertData = 1
        }
      }
    }
  }
  
  #or from pages mediafield
  849 < page.headerData.848.renderObj
  849.field = media
  849.if.isTrue.field = media
  849.split.1.cObject.file.import = uploads/media/
}
#[global]
