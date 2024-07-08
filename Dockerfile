# Usa la imagen oficial de PHP desde Docker Hub
FROM php:7.4.3

# Install bundled extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar el código fuente de la aplicación
COPY . .

# Instalar dependencias con Composer
RUN composer install --no-dev --optimize-autoloader

# Copiar los archivos modificados de Klein y rm si la version de php es mayor a 8
# COPY klein/Klein.php /var/www/html/vendor/klein/klein/src/Klein/Klein.php
# COPY klein/DataCollection.php /var/www/html/vendor/klein/klein/src/Klein/DataCollection/DataCollection.php
# COPY klein/HttpException.php /var/www/html/vendor/klein/klein/src/Klein/Exceptions/HttpException.php
# RUN rm -rf klein

COPY .env.prod .env
RUN rm -rf .env.prod 
# Exponer el puerto 8001 para el servidor PHP
EXPOSE 8001

# Iniciar el servidor PHP
CMD ["php", "-S", "0.0.0.0:8001", "./router.php"]
### build
# docker build -t api-example-service .
# docker build -t api-example-service:0.0.1 .
### cambia tag
# docker image tag api-contactabilidad-service:0.0.1 nameDev/api-example-service:0.0.1
######### push
# docker push jhamisruiz/api-example-service:0.0.1
####
# docker container run -d --name example-service -p 64000:8001 api-example-service