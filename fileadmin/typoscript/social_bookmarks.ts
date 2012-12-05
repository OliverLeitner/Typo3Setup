#| sociallinks |#

lib.sociallinks = COA
lib.sociallinks {
	wrap = <div class="shareBlock">Share This!<br />|</div>

	10 = TEXT
	10 {
		value = Facebook
		typolink.title = share on facebook
		typolink.ATagParams = class="facebookLink" target="_blank"
		typolink.parameter.cObject = COA
		typolink.parameter.cObject {
			10 = TEXT
			10.dataWrap = http://www.facebook.com/sharer.php?u={$baseURL}|
			10.typolink.parameter.data = TSFE:id
			10.typolink.returnLast = url
			10.typolink.addQueryString = 1
			10.typolink.addQueryString.exclude = id

			20 = TEXT
			20.data = page:title
			20.wrap = &t=|
			20.rawUrlEncode = 1
		}
	}

	20 = TEXT
	20 {
		value = Twitter
		typolink.title = Tweet it!
		typolink.ATagParams = class="twitterLink" target="_blank"
		typolink.parameter.cObject = COA
		typolink.parameter.cObject {
			10 = TEXT
			10.data = page:title
			10.noTrimWrap = |ließt%20grad:%20||
			10.dataWrap = http://twitter.com/home/?status=|
			10.rawUrlEncode = 1

			20 = TEXT
			20.dataWrap = %20-%20{$baseURL}|
			20.typolink.parameter.data = TSFE:id
			20.typolink.returnLast = url
			20.typolink.addQueryString = 1
			20.typolink.addQueryString.exclude = id
		}
	}

	30 = TEXT
	30 {
		value = Mister Wong
		typolink.title = Wong it!
		typolink.ATagParams = class="wongLink" target="_blank"
		typolink.parameter.cObject = COA
		typolink.parameter.cObject {
			10 = TEXT
			10.dataWrap = http://www.mister-wong.de/index.php?action=addurl&bm_url={$baseURL}|
			10.typolink.parameter.data = TSFE:id
			10.typolink.returnLast = url
			10.typolink.addQueryString = 1
			10.typolink.addQueryString.exclude = id

			20 = TEXT
			20.data = page:title
			20.wrap = &bm_description=|
			20.rawUrlEncode = 1
		}
	}
	
	40 = TEXT
	40 {
		value = Google Plus
		typolink.title = Google Plus it!
		typolink.ATagParams = class="gplusLink" target="_blank"
		typolink.parameter.cObject = COA
		typolink.parameter.cObject {
			10 = TEXT
			10.dataWrap = https://plus.google.com/share?url={$baseURL}|
			10.typolink.parameter.data = TSFE:id
			10.typolink.returnLast = url
			10.typolink.addQueryString = 1
			10.typolink.addQueryString.exclude = id

			20 = TEXT
			20.data = page:title
			20.wrap = &bm_description=|
			20.rawUrlEncode = 1
		}
	}
}