#!/bin/sh
PROJECT=leishdb
URL=www.leishdb.local
MAINDB=leishdb
PASTA="$PWD"

#TODO editar $db['default']['password'] do arquivo application/config/database.php

waiting(){
	clear
	echo ${1} " "
	sleep 1
	clear
	echo ${1} " ."
	sleep 1
	clear
	echo ${1} " .."
	sleep 1
	clear
	echo ${1} " ..."
	sleep 1
}

install(){
        waiting "Installing"

        echo "Please enter root user MySQL password!"
        read rootpasswd
        mysql -uroot -p${rootpasswd} -e "CREATE DATABASE ${MAINDB} /*\!40100 DEFAULT CHARACTER SET utf8 */;"
        mysql -uroot -p${rootpasswd} -e "GRANT ALL PRIVILEGES ON ${MAINDB}.* TO 'root'@'localhost';"
        mysql -uroot -p${rootpasswd} -e "FLUSH PRIVILEGES;"

        # Criação da estrutura do banco
        mysql -uroot -p${rootpasswd} leishdb < installation/LeishDB_Structure.sql

        echo ""

        if [ -f "/etc/apache2/sites-available/${PROJECT}.conf" ]; then
                sudo rm /etc/apache2/sites-available/${PROJECT}.conf
        fi
        touch /etc/apache2/sites-available/${PROJECT}.conf
        echo "###########################################" >> /etc/apache2/sites-available/${PROJECT}.conf
        echo "########## ${URL} ##############" >> /etc/apache2/sites-available/${PROJECT}.conf
        echo "###########################################" >> /etc/apache2/sites-available/${PROJECT}.conf
        echo "<VirtualHost *:80>" >> /etc/apache2/sites-available/${PROJECT}.conf
        echo "        ServerAdmin webmaster@localhost" >> /etc/apache2/sites-available/${PROJECT}.conf
        echo "        <Directory \"${PASTA}\">" >> /etc/apache2/sites-available/${PROJECT}.conf
        echo "                AllowOverride All" >> /etc/apache2/sites-available/${PROJECT}.conf
        echo "                php_value post_max_size 150M" >> /etc/apache2/sites-available/${PROJECT}.conf
        echo "                php_value upload_max_filesize 150M" >> /etc/apache2/sites-available/${PROJECT}.conf
        echo "        </Directory>" >> /etc/apache2/sites-available/${PROJECT}.conf
        echo "        DocumentRoot \"${PASTA}\"" >> /etc/apache2/sites-available/${PROJECT}.conf
        echo "        ServerAlias ${URL}" >> /etc/apache2/sites-available/${PROJECT}.conf
        echo "        ErrorLog \"${PASTA}/application/logs/error.log\"" >> /etc/apache2/sites-available/${PROJECT}.conf
        echo "        CustomLog \"${PASTA}/application/logs/access.log\" common" >> /etc/apache2/sites-available/${PROJECT}.conf
        echo "</VirtualHost>" >> /etc/apache2/sites-available/${PROJECT}.conf

        sudo echo "127.0.0.1	${URL}" >> /etc/hosts

        a2ensite ${PROJECT}
        service apache2 restart

        echo "Please enter logged user"
        read user
        chown ${user}.${user} ${PASTA} -Rf
        echo "Don't forget to change the database user password at configuration file 'application/config/database.php'"
}

uninstall(){
        waiting "Uninstalling"

        echo "Please enter root user MySQL password!"
        read rootpasswd
        mysql -uroot -p${rootpasswd} -e "DROP DATABASE ${MAINDB};"

        a2dissite ${PROJECT}
        rm /etc/apache2/sites-available/${PROJECT}.conf
        service apache2 restart
}

case "$1" in
	"install") clear; install ;;
	"uninstall") clear; uninstall ;;
	*) echo "Use parameters install or uninstall"
esac 
