#needed for our image userfunc stuff...
includeLibs.imgArray = fileadmin/includes/imgArray.php

#shit on typo3 handling, we make our teasers ourselfes
#includeLibs.TeaserArray = fileadmin/includes/teasers.php

#baseurl in typo3 has been broke for the longest time, so fuck it
#includeLibs.baseArray = fileadmin/includes/baseURL.php

#adding the headerelements via our own script, makes stuff alot clearer
includeLibs.baseArray = fileadmin/includes/replaceHeaderData.php

#a better js menu than the orig t3 one...
#includeLibs.imgArray = fileadmin/includes/ajaxMenu.php

page.meta{
    keywords.field = keywords
    keywords.ifEmpty ( 
         typo3, backend
    )
    description.field = description
    description.ifEmpty ( 
         Neverslair Blog is the personal site of Oliver Leitner
    )
    author.field = author
    author.ifEmpty (
    	Oliver Leitner
    )
    robots = INDEX,FOLLOW
}

#base page configuration
page.config {
  doctype = html5
  htmlTag_setParams = lang="en" dir="ltr"
  doctypeSwitch = 0
  xmlprologue = none
  metaCharset = utf-8
  renderCharset = utf-8
  removeDefaultJS = all
  xhtml_cleaning = all
  noScaleUp = 1
  prefixLocalAnchors = none
  disablePrefixComment = 1
  sendCacheHeaders = 1
  cache_period = 2592000
}

#inner page configurations
config {
  #absRefPrefix = getenv : HTTP_REFERRER
  #additionalHeaders = Content-Type:text/html;charset=utf-8;lang=en
  locale_all = en_US.UTF-8
  language=en_US.UTF-8
  headerComment (
     ===============================
     Site design and TYPO3 integration by Oliver Leitner
     ===============================
  )
  #noPageTitle = 2
  spamProtectEmailAddresses = 2
  spamProtectEmailAddresses_atSubst = (at)
  simulateStaticDocuments = 0
  tx_cooluri_enable = 1
  redirectOldLinksToNew = 1 # if you want to redirect index.php?id=X to a new URI
  prefixLocalAnchors = none
  enableCHashCache = 1
  meaningfulTempFilePrefix = 100
  uniqueLinkVars = 1
  sendCacheHeaders = 1
}

config.baseURL = http://www.neverslair-blog.net/

config.noPageTitle = 2
page.headerData.5 = TEXT
page.headerData.5.field = subtitle // title
page.headerData.5.wrap = <title>neverslair-blog.net: &nbsp; |</title>

#headerdata for internet explorer stuff...
#	<meta content="true" name="MSSmartTagsPreventParsing"/>
page.headerData.15 = HTML
page.headerData.15.value (
<meta name="google-site-verification" content="nfwqvueK8z1c5QAflLw72xfBSBp9OQkugO1Wf9DD8O4" />
<meta name="viewport" content="width=device-width" />
)

#copyright setting
temp.copyright = TEXT
temp.copyright.data = date:U
temp.copyright.strftime =%Y
temp.copyright.wrap= <a href="?id=10" title="imprint and copyright">(c)&nbsp;|&nbsp;Oliver Leitner</a>
