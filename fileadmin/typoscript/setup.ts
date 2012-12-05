#loading the base template
temp.mainTemplate = TEMPLATE
temp.mainTemplate {
  template = FILE
  template.file = fileadmin/templates/index.html
  workOnSubpart = DOCUMENT_BODY
}

# filling our output into the template
page = PAGE
page.typeNum = 0
page.10 < temp.mainTemplate
page.10.subparts.CONTENT < temp.middleRow
page.10.subparts.SHARE_THIS < lib.sociallinks
page.10.subparts.RIGHT_CONTENT < temp.rightRow
page.10.subparts.TOPMENU_1 < temp.topmenu_1
page.10.subparts.TOPMENU_2 < temp.topmenu_2
page.10.subparts.FOOTERMENU_OLIVER < temp.footermenu_oliver
page.10.subparts.FOOTERMENU_DANIEL < temp.footermenu_daniel
page.10.subparts.FOOTERMENU_CONTACT < temp.footermenu_contact
page.10.marks.COPYRIGHT < temp.copyright

#scripted specials...
page.headerData.60 < temp.headerimages
page.headerData.60.insertData = 1

page.headerData.50 < temp.headerData
page.headerData.50.insertData = 1

#page.headerData.40 < temp.ajaxMenu
#page.headerData.40.insertData = 1
