FROM php:8.3-fpm

# Установка системных зависимостей и PHP расширений
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libicu-dev \
        libpq-dev \
        libxpm-dev \
        libvpx-dev \
        libzip-dev \
        curl \
    # Конфигурация и установка GD ДО установки Node.js (чтобы использовать системные библиотеки)
    && docker-php-ext-configure gd \
        --with-freetype=/usr/include/ \
        --with-jpeg=/usr/include/ \
        --with-xpm=/usr/lib/x86_64-linux-gnu/ \
    && docker-php-ext-install -j$(nproc) gd intl zip pgsql pdo_pgsql exif sockets \
    # Установка PECL расширений
    && pecl install xdebug \
    && docker-php-ext-enable xdebug sockets \
    # Установка Node.js и npm из NodeSource
    && curl -fsSL https://deb.nodesource.com/setup_24.x | bash - \
    && apt-get install -y nodejs \
    # Установка Composer
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    # Очистка кеша для уменьшения размера образа
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Создаем пользователя и группу
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Переключаемся на созданного пользователя
USER www

# Указываем рабочую директорию для пользователя www
WORKDIR /var/www/html
