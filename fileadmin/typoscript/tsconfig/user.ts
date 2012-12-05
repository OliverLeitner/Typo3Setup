#remove content from other pages plugin
page.TCEFORM.pages.content_from_pid.disabled = 1

###disable hidden field in page view
page.TCEFORM.pages.hidden.disabled = 1

###no direct upload from content elements
setup.override.edit_docModuleUpload = 0

###show the page view on startup
setup.override.startModule = web_layout

###show preview pics
setup.override.thumbnailsByDefault = 1

### Doctype field disabled
page.TCEFORM.tt_content.CType.disabled = 1

### alias field disabled...
# i actually need it.
page.TCEFORM.pages.alias.disabled = 1

# user options
options {
        clearCache {
                pages = 1
                all = 1
        }

        saveDocNew = 1

        # don't clear clipboard
        saveClipboard = 1

        # Reduces the amount of clipboards from 4 to X:
        clipboardNumberPads = 2

        shortcutFrame = 1

        # Enable upload field
        uploadFieldsInTopOfEB = 1

        # Enable folder create
        createFoldersInEB = 1

        ## Set the default spelling ability of the check speller for all users
        ## options: ultra, fast, normal, bad-spellers
        HTMLAreaPspellMode = normal

        ## Enable the personal dictionary feature of the check speller by default for all users
        enablePersonalDicts = 1

        # show pageID in page tree title
        pageTree.showPageIdWithTitle = 0

        # show navigation title in page tree if any
        pageTree.showNavTitle = 1

        # options.contextMenu.pageTree.disableItems = history,edit_access,move_wizard,new_wizard,db_list,tx_impexp_clickmenu,info,perms, versioning

        options.RTEkeyList = *
        # options.RTEkeyList = formatblock, bold, italic, orderedlist, unorderedlist, outdent, indent, link, unlink, blockstylelabel, blockstyle, textstylelabel, textstyle
}
