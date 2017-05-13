apt-get update -y
apt-get install wget -y
wget https://getcomposer.org/composer.phar
php composer.phar global require "fxp/composer-asset-plugin"
php composer.phar install --ansi --profile --prefer-source -o -vvv
php console/yii app/setup
npm install
npm run build