#Версия PHP
FROM php:7.3-fpm
#Дополнительные библиотеки
RUN docker-php-ext-install mysqli pdo pdo_mysql
#Установка  ДЕБАГЕРА
RUN apt-get update && apt-get install -y wget git unzip \
    && pecl install xdebug-2.7.1 \
    && docker-php-ext-enable  xdebug
#Настройка параметров PHP
ADD ./php.ini /usr/local/etc/php/php.ini
#Установка композера
RUN wget https://getcomposer.org/installer -O - -q \
    | php -- --install-dir=/bin --filename=composer --quiet
#Для сборки JS и стилей
RUN apt-get install -y npm
#Рабочая папка
WORKDIR /var/www