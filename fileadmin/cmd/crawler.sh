#run the typo3 indexed search crawler...
#!/bin/bash

#key is set on start->listview->crawler config, its the name of the task
KEY="simple-indexing"
DIR="/home/youruser/public_html"

#first we queue it for the procedure...
/usr/bin/php $DIR/typo3/cli_dispatch.phpsh crawler_im 1 -d 99 -conf $KEY -o queue

#then we wait a few seconds for the db to relax...
sleep 20

#then we start the actual processing
/usr/bin/php $DIR/typo3/cli_dispatch.phpsh crawler 58 -conf=$KEY

exit 0
