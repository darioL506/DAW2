docker run -it --name tomcat-sh \
    --mount type=bind,source="$(pwd)"/shared,target=/usr/local/tomcat/webapps/ 
    -p 8889:8080 \
    tomcat:9.0