FROM centos:7

MAINTAINER Paulo de Almeida <paulodealmeida@gmail.com>

RUN rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm

RUN rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm

RUN yum install epel-release httpd php71w php71w-cli php71w-common php71w-mbstring php71w-mysql php71w-pdo php71w-pear php71w-gd -y

EXPOSE 80

ADD run-httpd.sh /run-httpd.sh
RUN chmod -v +x /run-httpd.sh

CMD ["/run-httpd.sh"]
