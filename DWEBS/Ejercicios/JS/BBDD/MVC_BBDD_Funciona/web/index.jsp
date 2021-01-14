<%-- 
    Document   : index
    Created on : 04-oct-2019, 11:52:37
    Author     : fernando
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
            out.println(session.getId() + " " + session.getMaxInactiveInterval() + "<br>"); 
        %>
        <form name="for" action="controlador.jsp" method="POST">
            Nombre de usuario: <input type="text" name="nombre" value=""><br>
            Clave: <input type="text" name="clave" value="">
            <input type="submit" name="aceptar" value="Aceptar">
        </form>
    </body>
</html>
