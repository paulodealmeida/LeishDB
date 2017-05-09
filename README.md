# LeishDB
LeishDB is a database for genomic annotation of Leishmania organisms. 
Currently, it stores data related to coding genes and non-coding RNAs from L. braziliensis. The website is 

## What is the leishDB ?

LeishDB is a database for genomic annotation of Leishmania organisms. Currently, it stores data related to coding genes and non-coding RNAs from L. braziliensis. This project is a web interface code of this database. Nothing block this project to be used in anothers databases or annotation project, because the data model is generic and support anothers organisms.
Documents and scripts

TORRES, Felipe Guimarães. Leishmania braziliensis: reanotação estruturação das informações em modelos de dados relacionais. 2015. 49 f. Dissertação (Mestrado em Computação Aplicada) - Universidade Estadual de Feira de Santana, Feira de Santana, 2015. LINK

## Support
* Universidad Mayor
* Fiocruz
* Beagle 
* FAPESB
* UEFS

## Installation
This script only runs on Ubuntu 16.04.

After clone the project:

```bash     
$ sudo chmod +x installation/config.sh
$ sudo ./installation/config.sh install
```

Enter root user MySQL password when asked. Enter  logged user when asked. Don't forget to change the database user password at configuration file 'application/config/database.php'

After this steps access http://www.leishdb.local/  the project is runing but the database is empty. You can populate it dowloading the script from this link.

# Download the last version of LeishDB source code
```bash  
wget https://github.com/fgtorres/LeishDB/archive/1.0.zip
mv 1.0.zip LeishDB.zip
mv LeishDB.zip /var/www/html/
cd /var/www/html/
gunzip LeishDB.zip 
```

# Restore and create the database backup
```bash
# Get the last version of the database
wget http://www.leishdb.com/downloads/database.zip
gunzip database.zip
cd database/database

#Restore the database
mysql -u <username> -p <DBName> < LeishDB_Data_Structure.sql
```

# Configuration script
```bash
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
        mysql -uroot -p${rootpasswd} leishdb < LeishDB_Structure.sql

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
        echo "Don't forget to chage the database user password at configuration file 'applicarion/config/database.php'"
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
```
This script only runs on Ubuntu 16 or newest.
