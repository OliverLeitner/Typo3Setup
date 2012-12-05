tt_content.image.20.1 {
  # remove the standard image link and build a new one
  imageLinkWrap >
  imageLinkWrap = 1
  imageLinkWrap {

    # Linkwrapping if link is set or if we activated zoom functionality
    enable.field = image_zoom
    enable.ifEmpty.typolink.parameter.field = image_link
    enable.ifEmpty.typolink.parameter.listNum.stdWrap.data = register : IMAGE_NUM_CURRENT
    enable.ifEmpty.typolink.returnLast = url
    enable.ifEmpty.typolink.parameter.listNum.splitChar = 10

    # New wrapping code
    typolink {
      target = {$styles.content.links.target}
      extTarget = {$styles.content.links.extTarget}

      # Link to the original picture
      # or to the rerendered one if maxh is reached
      parameter.cObject = IMG_RESOURCE
      parameter.cObject.file.import.data = TSFE:lastImageInfo|origFile

      # exception if the image isnt empty
      parameter.override.field = image_link
      parameter.override.listNum.stdWrap.data = register : IMAGE_NUM_CURRENT
      parameter.override.if.isTrue.field = image_link
      parameter.override.listNum.splitChar = 10

      # rel-Attribute for pagination
      ATagParams = rel="prefetch" title="{field:header}" class="lightbox"
      ATagParams.override = rel="prefetch" title="{field:header}" class="lightbox"
      ATagParams.insertData = 1
      ATagParams.if.isTrue.field = image_zoom
    }
  }
}

temp.right_content = CONTENT
temp.right_content {
    # table thats being read
  table = tt_content
    # wrap around the element
  wrap = |
    # the sql query
  select{
       # set the language field
    languageField = sys_language_uid
        # Limit to 10 entries
    max = 10
        # for performance reasons we set the fields
    selectFields = image,header
     
        # Where colpos sets where the content is located on the page
    where = colPos=0
  }
  renderObj = COA
  renderObj{
        # create an image object
    5 = IMAGE
    5{
            # only output object if not empty
      required = 1
      wrap = |
      file.import = uploads/pics/
      file.import.field = image
      file.width = 100
      file.height = 100
    }
        # output element header
    10 = TEXT  
    10{
      required = 1
      wrap = |
      field = header
    }
        # for debugging output all data
        #20=TEXT
        #20.data = debug:data
  }
}

#routing our output
temp.middleRow = CONTENT
temp.middleRow {
	table = tt_content
	select.orderBy = sorting
	select.where = colPos=0
	stdWrap.wrap = <div id="standard-text"><article>|</article></div>
}

#default
temp.rightRow = CONTENT
temp.rightRow {
	table = tt_content
	select.orderBy = sorting
	select.where = colPos=0
	select.pidInList = 26
	stdWrap.wrap = <div class="teaser">|</div>
}

#daniel default
[PIDinRootline=6]
temp.rightRow = CONTENT
temp.rightRow {
	table = tt_content
	select.orderBy = sorting
	select.where = colPos=0
	select.pidInList = 28
	#select.max = 10
	stdWrap.wrap = <div class="teaser">|</div>
}
[end]

#create the headerimage slideshow from media elements from page with pid
temp.headerimages = USER 
temp.headerimages {
  userFunc = user_imgArray->returnJS
  pid = 2
  path = http://www.neverslair-blog.net/uploads/media/
}

#and insert everything else our own way...
temp.headerData = USER
temp.headerData {
	userFunc = user_setHeader->returnHeader
	site_url = http://www.neverslair-blog.net
	insertData = 1
}

#adding the ajax menu stuff...
#temp.ajaxMenu = USER
#temp.ajaxMenu {
#	userFunc = user_ajaxMenu->menuToHeader
#}
