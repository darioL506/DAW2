<%-- 
    Document   : borrarvars
    Created on : 24-oct-2018, 10:41:44
    Author     : faranzabe
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
            //Las variables de aplicación se pierden cuando se repliega la aplicación en el servidor (Glassfish o Tomcat)
            //También borrando manualmente.
            application.removeAttribute("varCompartida");
            out.print("Variable de aplicación borrada.");
            %>
    </body>
</html>
