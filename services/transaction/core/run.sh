#!/bin/sh

####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################

today=`date +"%Y-%m-%d %T"`
php completeTransaction.php && echo "$today: Script executed " >> /var/www/html/log.txt
