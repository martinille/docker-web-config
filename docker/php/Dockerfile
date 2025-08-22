FROM php:8.4-fpm

WORKDIR /var/www/html

# PHP dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype-dev \
    libicu-dev \
    libzip-dev \
    libbz2-dev \
    libonig-dev \
    libldap2-dev \
    zlib1g-dev \
    libxml2-dev \
    libxslt1-dev \
    cron \
    curl \
    git \
    unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ && \
    docker-php-ext-install \
    gd \
    intl \
    pdo_mysql \
    mysqli \
    exif \
    pcntl \
    bcmath \
    zip \
    bz2 \
    iconv \
    ctype \
    soap \
    sockets \
    xml \
    xsl \
    calendar \
    gettext \
    ldap

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# PHP-FPM user/group
RUN groupadd -g 1000 appgroup \
    && useradd -m -u 1000 -g 1000 appuser

# patch FPM pool config
RUN sed -i 's/^clear_env = yes/clear_env = no/' /usr/local/etc/php-fpm.d/www.conf && \
    printf "\n" >> /usr/local/etc/php-fpm.d/www.conf && \
    printf "user = appuser\n" >> /usr/local/etc/php-fpm.d/www.conf && \
    printf "group = appgroup\n" >> /usr/local/etc/php-fpm.d/www.conf && \
    printf "env[APP_ENV]=\$APP_ENV\n" >> /usr/local/etc/php-fpm.d/www.conf && \
    printf "env[DATABASE_PASS]=\$DATABASE_PASS\n" >> /usr/local/etc/php-fpm.d/www.conf

CMD ["bash", "/usr/local/bin/entrypoint.sh"]
