apt-get update -y
apt-get install git -y
apt-get install wget -y
wget https://getcomposer.org/composer.phar
php composer.phar global require "fxp/composer-asset-plugin"
php composer.phar install --ansi --profile --prefer-source -o -vvv
php console/yii app/setup --interactive=0
php console/yii rbac-migrate --interactive=0
cd ~/
curl -sL https://deb.nodesource.com/setup_6.x -o nodesource_setup.sh
chmod +x ./nodesource_setup.sh
./nodesource_setup.sh
apt-get install nodejs -y
apt-get install build-essential libssl-dev -y
curl -sL https://raw.githubusercontent.com/creationix/nvm/v0.32.0/install.sh -o install_nvm.sh
chmod +x ./install_nvm.sh
./install_nvm.sh
source ~/.profile
#nvm ls-remote # list all node versions
nvm install 6.10.3
nvm use 6.10.3
nvm alias default 6.10.3
node -v
cd /app
npm install
npm run build