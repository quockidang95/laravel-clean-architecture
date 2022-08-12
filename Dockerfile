FROM php:8.0.22-fpm-alpine3.16

# Set working directory
WORKDIR /var/www/html

# Install PHP Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install sockets

# Copy existing application directory
COPY . .