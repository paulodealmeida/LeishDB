#!/bin/sh
PROJECT=leishdb
URL=www.leishdb.local
PASTA="$PWD"

#TODO editar $db['default']['password'] do arquivo application/config/database.php

aguardar(){
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

instalar(){
	if [ -d "vendor" ]; then
		echo "Aplicação já foi instalada!"
	else
#                MAINDB=leishdb

                # If /root/.my.cnf exists then it won't ask for root password
#                if [ -f /root/.my.cnf ]; then
#
#                    mysql -e "CREATE DATABASE ${MAINDB} /*\!40100 DEFAULT CHARACTER SET utf8 */;"
#                    mysql -e "CREATE USER ${MAINDB}@localhost IDENTIFIED BY '${PASSWDDB}';"
#                    mysql -e "GRANT ALL PRIVILEGES ON ${MAINDB}.* TO '${MAINDB}'@'localhost';"
#                    mysql -e "FLUSH PRIVILEGES;"#

                # If /root/.my.cnf doesn't exist then it'll ask for root password   
#                else
#                    echo "Please enter root user MySQL password!"
#                    read rootpasswd
#                    mysql -uroot -p${rootpasswd} -e "CREATE DATABASE ${MAINDB} /*\!40100 DEFAULT CHARACTER SET utf8 */;"
#                    mysql -uroot -p${rootpasswd} -e "CREATE USER ${MAINDB}@localhost IDENTIFIED BY '${PASSWDDB}';"
#                    mysql -uroot -p${rootpasswd} -e "GRANT ALL PRIVILEGES ON ${MAINDB}.* TO '${MAINDB}'@'localhost';"
#                    mysql -uroot -p${rootpasswd} -e "FLUSH PRIVILEGES;"
#                fi

                # Criação da estrutura do banco
#                mysql -u user -p leishdb < db.sql

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

		echo "Informe seu usuário (Usuário da máquina)"
		read user
		chown ${user}.${user} ${PASTA} -Rf
	fi
}

desinstalar(){
	if [ -d "vendor" ]; then
		aguardar "Iniciando desinstalação"

		a2dissite ${PROJECT}
		rm /etc/apache2/sites-available/${PROJECT}.conf
		service apache2 restart

		rm vendor -Rf
	else
		echo "Aplicação ainda não foi instalada!"
	fi
}

case "$1" in
	"install") clear; instalar ;;
	"uninstall") clear; desinstalar ;;
	*) echo "Use os parametros install ou uninstall"
esac 
