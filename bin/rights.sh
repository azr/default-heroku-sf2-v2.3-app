#!/bin/sh
# Script qui vide les caches et qui mets les droits 'bien'

if [ "$(uname)" == "Darwin" ]; then
GROUP="_www"
else
GROUP="www-data"
fi

#elif [ "$(expr substr $(uname -s) 1 5)" == "Linux" ]; then
    # Do something under Linux platform
#elif [ "$(expr substr $(uname -s) 1 14)" == "MINGW32_NT-6.1"]; then
    # Do something under Windows NT platform
#fi

sudo chown -R $USER:$GROUP app/cache app/logs web
sudo chgrp -R $GROUP src/*/*Bundle/Resources/translations/ app/Resources/translations/
sudo chmod -R g+w src/*/*Bundle/Resources/translations/ app/Resources/translations/
rm -rf src/MG/*Bundle/Resources/translations/FOS*
chmod -R g+wxr app/cache app/logs web
sudo setfacl -dR -m u:$GROUP:rwx -m u:$USER:rwx app/cache app/logs web/uploads
sudo chmod +a "${GROUP} allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs
sudo chmod +a "${USER} allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs
# la commande doit etre installee, mais elle l'est par defaut sur les ubuntus 11.x et superieurs
