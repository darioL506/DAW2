#Imagen
FROM php:7.4-apache

#Complementos
RUN docker-php-ext-install pdo pdo_mysql mysqli

# copiamos todos los ficheros en el directorio en cuestion
COPY ./src /var/www/html

# Exponemos el puerto 80
EXPOSE 80

# Quien lo ha realizado
#MAINTAINER D León “dario.churriego@gmail.com”
