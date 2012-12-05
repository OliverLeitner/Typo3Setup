# removes the CLEAR.GIF
tt_content.textpic.20.spaceBelowAbove = 0
tt_content.image.20.spaceBelowAbove = 0
tt_content.header.stdWrap.space = 0|0
tt_content.stdWrap.space = 0|0
tt_content.stdWrap.spaceBefore = 0
tt_content.stdWrap.spaceAfter = 0
lib.stdheader.stdWrap.space = 0|0

#base content cleanup
lib.parseFunc_RTE.nonTypoTagStdWrap.encapsLines.addAttributes.P.class =
tt_content.stdWrap.dataWrap >

#remove all p tag shite
tt_content.text.20.parseFunc.nonTypoTagStdWrap.encapsLines.addAttributes {
	P.style=
	PRE.style=
}

#no wrapping of RTE lines
tt_content.text.20.parseFunc {
	nonTypoTagStdWrap.encapsLines.nonWrappedTag >
}

# cleanup of ul/ol 
tt_content.text.20.parseFunc.tags.typolist.default.wrap = <ul> | </ul> 
tt_content.text.20.parseFunc.tags.typolist.default.split.1.wrap = 
tt_content.text.20.parseFunc.tags.typolist.1.fontTag = <ol>  | </ol> 
tt_content.text.20.parseFunc.tags.typolist.1.split.1.wrap = 

#needed for content element styling... (jquery tricks)
tt_content.text.20.parseFunc.tags.typolist.wrap = <div class="bodytext">|</div>
tt_content.text.20.wrap = <div class="bodytext">|</div>

# limit size of all images
tt_content.image.20.maxW = 700
tt_content.textpic.20.maxW = 700
tt_content.image.20.maxWInText = 300
tt_content.textpic.20.maxWInText = 300

tt_content.textpic.20.rendering.dl.imgTagStdWrap.wrap = <dd>|</dd>
tt_content.image.20.rendering.dl.imgTagStdWrap.wrap = <dd>|</dd>

# clear.gif behind header will be removed
tt_content.text.20.parseFunc.tags.typohead.stdWrap.space = 0|0

#CSS to external files
config.inlineStyle2TempFile = 1
config.disablePrefixComment = 1

#Default Javascript into external files
config.removeDefaultJS = 1
config.removeDefaultJS = external

# remove 1px clear.gif over every image in imagetext
tt_content.textpic.20.noStretchAndMarginCells = 1

# remove 1px clear.gif above every image
tt_content.image.20.noStretchAndMarginCells = 1

tt_content.stdWrap.innerWrap.cObject >
tt_content.stdWrap.innerWrap2 >
tt_content.dataWrap >
tt_content.prepend >
tt_content.textpic.20.text.10.10.stdWrap.dataWrap >
tt_content.image.20.imageStdWrap.dataWrap >
tt_content.textpic.20.text.10.10.stdWrap.dataWrap >
tt_content.textpic.20.text.wrap >

# remove line breaks
styles.content.imgtext.caption.1.wrap = |
styles.content.imgtext.caption.1.spaceBefore = 0
styles.content.imgtext.caption.1.br = 0

tt_content.textpic.20.text.10.10.stdWrap.dataWrap = |

# every image gets his own subtitle
tt_content.image.20.captionSplit = 1
tt_content.image.20.caption >
tt_content.image.20.caption.wrap = <dd><p>|</p></dd>
tt_content.textpic.20.captionSplit = 1
tt_content.textpic.20.caption >
tt_content.textpic.20.caption.wrap = <dd><p>|</p></dd>

#standard header cleanup
lib.stdheader.stdWrap.dataWrap =
lib.stdheader.10.1.fontTag = <h2>|</h2>
lib.stdheader.10.2.fontTag = <h3>|</h3>
lib.stdheader.10.3.fontTag = <h4>|</h4>
lib.stdheader.10.4.fontTag = <h5>|</h5>
lib.stdheader.10.5.fontTag = <h6>|</h6>

# remove auto-spacings
styles.content.imgtext.colSpace = 0
styles.content.imgtext.rowSpace = 0
styles.content.imgtext.textMargin = 10

#and once again more cleanups
tt_content.stdWrap.dataWrap = |
#remove csc-header
lib.stdheader.stdWrap.dataWrap >
#remove header specialities
lib.stdheader.2.headerStyle >
lib.stdheader.3.headerClass >

lib.parseFunc_RTE.nonTypoTagStdWrap.encapsLines.encapsTagList = cite, div, p, pre, hr, h1, h2, h3, h4, h5, h6,table,tr,td

#allow classes within tables
lib.parseFunc_RTE.externalBlocks.table.stdWrap.HTMLparser.tags.table.fixAttrib.class.list >

#sitemap menu element needs some tag corrections
tt_content.menu.20.4.1.NO.linkWrap = <dd>|</dd>
tt_content.menu.20.4.1.allWrap = <dt>|</dt>