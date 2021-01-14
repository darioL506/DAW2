#Elegimos el nginx
FROM nginx:alpine

#Se añade la configuración al contenedor del proxy
COPY nginx.conf /etc/nginx/nginx.conf

#Se instala bash porque alpine no lo tiene de base
RUN apk update && apk add bash