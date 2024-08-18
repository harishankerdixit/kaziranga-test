# Use the official PHP image with Apache
FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy the Laravel application code
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html/

# Ensure proper permissions for Apache
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

# Install PHP extensions required by Laravel and install dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port 80
EXPOSE 80

