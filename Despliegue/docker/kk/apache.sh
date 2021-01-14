#! /bin/bash
echo "Cargando contenedor"
docker run -itd --name apache-1 -p 6969:80 httpd:alpine
echo "Lanzando"
docker container start apache-1
echo "Copiando"
docker cp . apache-1:/usr/local/apache2/htdocs