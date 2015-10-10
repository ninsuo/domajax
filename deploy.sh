#!/bin/bash
if [ "$(id -u)" = "0" ]; then
   echo "This script must NOT be run as root" 1>&2
   exit 1
fi

SOURCE=domajax
TARGET=/your/web/directory/

sudo ls > /dev/null

(cd $SOURCE && git reset --hard && git pull)

(cd $SOUrCE && composer update)

sudo rsync --partial --recursive --verbose --progress --delete --links ${SOURCE}/* $TARGET

sudo rm -rf ${TARGET}/app/cache/*

sudo chown -R www-data:www-data $TARGET

sudo cp ${TARGET}/web/css/bootstrap.css /tmp

# Ugly hack because it looks like bootstrap now generates other classes
(cd $TARGET && sudo -u www-data php app/console assetic:dump)
sudo mv /tmp/bootstrap.css ${TARGET}/web/css

(cd $TARGET && sudo -u www-data php app/console assets:install web --symlink)
