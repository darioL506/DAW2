#Imagen a usar
FROM ubuntu:16.04

RUN apt-get update

RUN apt install -y apache2 php libapache2-mod-php

COPY src/ /var/www/html

EXPOSE 80
