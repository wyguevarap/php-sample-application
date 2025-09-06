# Dockerfile para la aplicación PHP
FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql && \
    apt-get update && apt-get install -y libpng-dev zip unzip curl

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia el código fuente al contenedor
COPY . /var/www/html/

# Da permisos a los archivos
RUN chown -R www-data:www-data /var/www/html

# Expone el puerto 80
EXPOSE 80

# Habilita el módulo de reescritura de Apache
RUN a2enmod rewrite

# Configuración recomendada para desarrollo
ENV APACHE_DOCUMENT_ROOT /var/www/html/web
RUN sed -i "s|/var/www/html|${APACHE_DOCUMENT_ROOT}|g" /etc/apache2/sites-available/000-default.conf
WORKDIR /var/www/html/web
