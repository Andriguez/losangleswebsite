FROM php:8.2-apache

# Install required PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip

# Install additional packages
RUN apt-get update && apt-get install -y git unzip libzip-dev

# Enable Apache mods
RUN a2enmod rewrite

# Copy composer binary
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application source code to the container
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html/

# Set permissions for Apache
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 for the web server
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
