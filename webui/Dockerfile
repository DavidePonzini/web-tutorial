FROM php:8.2-apache

# Install PHP extensions (add more as needed)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expose HTTP port
EXPOSE 80

# Copy the web application files into the container
COPY . /var/www/html/

# Set permissions for uploading files
RUN chown -R www-data:www-data /var/www/html/res