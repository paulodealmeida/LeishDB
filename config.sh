#!/bin/sh
PROJECT=leishdb
URL=www.leishdb.local
PASTA="$PWD"

#TODO editar $config['base_url'] do arquivo application/config/config.php
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
		#aguardar "Iniciando instalação"
		#composer install
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
		echo "        ErrorLog \"${PASTA}/logs/error.log\"" >> /etc/apache2/sites-available/${PROJECT}.conf
		echo "        CustomLog \"${PASTA}/logs/access.log\" common" >> /etc/apache2/sites-available/${PROJECT}.conf
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
