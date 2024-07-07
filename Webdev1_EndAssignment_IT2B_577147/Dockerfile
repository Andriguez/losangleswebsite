# Use the official PHP image
FROM php:8.2-apache

# Install necessary PHP extensions and libraries
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy application files to the container
COPY . /var/www/html/

# Expose port 80
EXPOSE 80