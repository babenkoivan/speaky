FROM php:7.3-cli-alpine

# Install system libraries
RUN apk update && \
    apk add --no-cache git autoconf gcc g++ make zlib-dev libzip-dev

# Install xdebug
RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

# Install composer
RUN wget https://getcomposer.org/installer && \
    php installer --install-dir=/usr/local/bin/ --filename=composer && \
    rm installer

# Copy project files
WORKDIR /app
COPY . .

# Install project dependencies
RUN composer install --no-interaction --optimize-autoloader

# Set correct permissions to executables
RUN chmod +x bin
