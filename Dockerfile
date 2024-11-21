# Use the official PHP image as a base
FROM php:8.1-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    libonig-dev \
    postgresql-client \
    && docker-php-ext-install pdo_pgsql zip exif \
    && docker-php-ext-enable exif

# Install Redis PHP extension
RUN pecl install redis && docker-php-ext-enable redis

# Set the working directory
WORKDIR /var/www/ticket-app

# Copy the existing application directory contents
COPY . /var/www/ticket-app

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy the initialization script
COPY docker-compose/init.sh /usr/local/bin/init.sh
RUN chmod +x /usr/local/bin/init.sh

# Expose port 80
EXPOSE 80
