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

```sh
$ sudo chmod +x installation/config.sh
$ sudo ./installation/config.sh install
```

Enter root user MySQL password when asked.
Enter logged user when asked.
Don't forget to change the database user password at configuration file 'application/config/database.php'

After this steps access http://www.leishdb.local/ the project is runing but the database is empty.
You can populate it dowloading the script from [this link](http://www.leishdb.com/welcome#downloads).