FROM php:8.2-apache

RUN a2enmod rewrite
RUN apt-get update -y \
	&& apt-get install -y --no-install-recommends \
	libxml2-dev \
	git \
	zlib1g-dev \
	libjpeg-dev \
	libpng-dev \
	libmagickwand-dev \
	libmcrypt-dev \
	openssh-client \
	unzip \
	libzip-dev \
	webp \
	wget \
	redis-tools \
	vim \
	nano \
	libicu-dev \
    jpegoptim \
    optipng \
    pngquant \
    && apt-get clean -y \
	&& rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php --filename=composer --install-dir=/usr/bin && php -r "unlink('composer-setup.php');"

RUN docker-php-ext-configure gd --with-jpeg
RUN docker-php-ext-configure intl
RUN docker-php-ext-install \
	pdo \
	pdo_mysql \
	mysqli \
	opcache \
	bcmath \
	calendar \
	soap \
	zip \
	gd \
	sockets \
	intl \
