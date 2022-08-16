#!/usr/bin/env bash

FROM ubuntu:20.04

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update

# Force Locale
RUN apt-get install -y locales \
    && echo "LC_ALL=en_US.UTF-8" >> /etc/default/locale \
    && locale-gen en_US.UTF-8 \
    && export LANG=en_US.UTF-8

# Install ssh server
RUN apt-get -y install openssh-server pwgen \
    && mkdir -p /var/run/sshd \
    && sed -i "s/UsePrivilegeSeparation.*/UsePrivilegeSeparation no/g" /etc/ssh/sshd_config \
    && sed -i "s/UsePAM.*/UsePAM no/g" /etc/ssh/sshd_config \
    && sed -i "s/PermitRootLogin.*/PermitRootLogin yes/g" /etc/ssh/sshd_config

RUN apt-get install -y software-properties-common nano curl \
    && apt-get install -y build-essential dos2unix gcc git git-flow libpcre3-dev apt-utils \
    && apt-get install -y make python3-pip re2c supervisor unattended-upgrades whois vim zip unzip

RUN apt-get install -y sudo

# Create loja user
RUN adduser loja \
    && usermod -p $(echo a | openssl passwd -1 -stdin) loja \
    && usermod -p $(echo a | openssl passwd -1 -stdin) root \
    && usermod -aG sudo loja \
    && usermod -aG www-data loja

# acl
RUN apt install -y acl

# Timezone
RUN ln -sf /usr/share/zoneinfo/UTC /etc/localtime

RUN add-apt-repository ppa:ondrej/php

RUN apt-get install -y php8.1-cli php8.1-common php8.1-mysql php8.1-zip php8.1-gd php8.1-mbstring php8.1-curl php8.1-xml php8.1-bcmath  php8.1-pgsql

# install composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && printf "\nPATH=\"/home/loja/.composer/vendor/bin:\$PATH\"\n" | tee -a /home/loja/.profile

# install symfony cli
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | sudo -E bash
RUN sudo apt install symfony-cli

# Install Node
RUN curl --silent --location https://deb.nodesource.com/setup_16.x | bash - 
RUN apt-get install -y nodejs

# Beanstalkd
RUN apt-get install -y beanstalkd \
    && sed -i "s/#START=yes/START=yes/" /etc/default/beanstalkd

# Set Some PHP CLI Settings
# RUN sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php/7.4/cli/php.ini \
#     && sed -i "s/display_errors = .*/display_errors = On/" /etc/php/7.4/cli/php.ini \
#     && sed -i "s/memory_limit = .*/memory_limit = 512M/" /etc/php/7.4/cli/php.ini \
#     && sed -i "s/;date.timezone.*/date.timezone = UTC/" /etc/php/7.4/cli/php.ini \
#     && sed -i "s/.*daemonize.*/daemonize = no/" /etc/php/7.4/fpm/php-fpm.conf \
#     && sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php/7.4/fpm/php.ini \
#     && sed -i "s/display_errors = .*/display_errors = On/" /etc/php/7.4/fpm/php.ini \
#     && sed -i "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/" /etc/php/7.4/fpm/php.ini \
#     && sed -i "s/memory_limit = .*/memory_limit = 512M/" /etc/php/7.4/fpm/php.ini \
#     && sed -i "s/;extension=intl/extension=intl/" /etc/php/7.4/fpm/php.ini \
#     && sed -i "s/;extension=intl/extension=intl/" /etc/php/7.4/fpm/php.ini \
#     && sed -i "s/post_max_size = 8M/post_max_size = 100M/" /etc/php/7.4/fpm/php.ini \
#     && sed -i "s/upload_max_filesize = 2M/upload_max_filesize = 100M/" /etc/php/7.4/fpm/php.ini \
#     && sed -i "s/;date.timezone.*/date.timezone = UTC/" /etc/php/7.4/fpm/php.ini


ADD supervisor/conf.d/supervisor.conf /etc/supervisor/conf.d/supervisor.conf
EXPOSE 80 22 35729 9876
WORKDIR /var/www/html
CMD ["/usr/bin/supervisord"]
