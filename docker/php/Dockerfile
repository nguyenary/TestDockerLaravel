FROM php:7.4-fpm

RUN apt-get update -y \
    && apt-get install -y zlib1g-dev \
    libicu-dev \
     g++ \
     zip \
     unzip \
     ssh \
     git \
     libssl-dev \
     libbz2-dev \
     && apt-get clean


# Install addition php ext
RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl mysqli opcache pdo_mysql bz2 \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && pecl install apcu \
    && docker-php-ext-enable apcu

WORKDIR /var/www

# Clean up
RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    rm /var/log/lastlog /var/log/faillog

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
