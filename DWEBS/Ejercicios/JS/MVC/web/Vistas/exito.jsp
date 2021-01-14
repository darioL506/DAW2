<%-- 
    Document   : exito
    Created on : 04-oct-2019, 11:56:58
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
            String n = (String) session.getAttribute("nombre");
            out.println("Bienvenido " + n);
        %>
        <form name="cerS" action="../controlador.jsp" method="POST">
            <input type="submit" name="cerrarSesion" value="Cerrar sesión">
        </form>
    </body>
</html>
