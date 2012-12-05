#creating us a menu
temp.topmenu_1 = HMENU
temp.topmenu_1 {
	1 = TMENU
	1 {
		wrap = <nav><ul id="topmenu_upper">|</ul></nav>
		noBlur = 1
		NO = 1
		NO {
			wrapItemAndSub = <li>|</li>
			wrapItemAndSub.insertData = 1
			stdWrap.htmlSpecialChars = 1
			ATagTitle.field = title
		}
		ACT <.NO
		ACT {
			wrapItemAndSub = <li id="nav1act">|</li>
			wrapItemAndSub.insertData = 1
		}
	}
}

temp.topmenu_2 = HMENU
#temp.topmenu_2.value >
temp.topmenu_2 {
	entryLevel = 1
	1 = TMENU
	1 {
		#wrap = <ul id="submenu">|</ul>
		NO.allWrap = <li>|</li>
		NO.wrapItemAndSub = |
		NO.stdWrap.htmlSpecialChars = 1
                NO.ATagParams = title="{field:title}"
                NO.allStdWrap.insertData = 1
		ACT = 1
		ACT.wrapItemAndSub = |
		ACT.allWrap = <li id="nav2act">|</li>
		ACT.stdWrap.htmlSpecialChars = 1
                ACT.ATagParams = title="{field:title}"
                ACT.allStdWrap.insertData = 1
	}
}

temp.footermenu_oliver = HMENU
temp.footermenu_oliver {
	excludeUidList = 6,9
	1 = TMENU
	1 {
		wrap = <nav><ul>|</ul></nav>
		NO.allWrap = <li>|</li>
		NO.stdWrap.htmlSpecialChars = 1
                NO.ATagParams = title="{field:title}"
                NO.allStdWrap.insertData = 1
		ACT = 1
		ACT.allWrap = <li>|</li>
		ACT.stdWrap.htmlSpecialChars = 1
                ACT.ATagParams = title="{field:title}"
                ACT.allStdWrap.insertData = 1
	}
}

temp.footermenu_daniel = HMENU
temp.footermenu_daniel {
	entryLevel = 1
	special = directory
	special.value = 6
	special.range = 0 | -1
	1 = TMENU
	1 {
		wrap = <nav><ul>|</ul></nav>
		NO.allWrap = <li>|</li>
		NO.stdWrap.htmlSpecialChars = 1
		NO.ATagParams = title="{field:title}"
		NO.allStdWrap.insertData = 1
		ACT = 1
		ACT.allWrap = <li>|</li>
		ACT.stdWrap.htmlSpecialChars = 1
		NO.ATagParams = title="{field:title}"
		NO.allStdWrap.insertData = 1
	}
}

temp.footermenu_contact = HMENU
temp.footermenu_contact {
	entryLevel = 1
	special = directory
	special.value = 9
	special.range = 0 | -1
	1 = TMENU
	1 {
		wrap = <nav><ul>|</ul></nav>
		NO.allWrap = <li>|</li>
		NO.stdWrap.htmlSpecialChars = 1
		NO.ATagParams = title="{field:title}"
		NO.allStdWrap.insertData = 1
		ACT = 1
		ACT.allWrap = <li>|</li>
		ACT.stdWrap.htmlSpecialChars = 1
		ACT.ATagParams = title="{field:title}"
		ACT.allStdWrap.insertData = 1
	}
}
