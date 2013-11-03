#!/bin/sh

# set -x
set -e

APP=$1

if [ "$APP" == "" ]; then
	echo "Dumping erb from default app"
else
	echo "Dumping erb from $APP"
	APP="-a $APP"
fi


for line in $(heroku config -s $APP)
do
	export $line
done

erb app/config/parameters_prod.yml.erb > app/config/parameters.yml

echo done