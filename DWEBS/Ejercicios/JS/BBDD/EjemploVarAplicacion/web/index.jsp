<%-- 
    Document   : index
    Created on : 18-oct-2020, 20:28
    Author     : faranzabe
--%>

<%@page import="java.util.Enumeration"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
            Integer contador = (Integer) application.getAttribute("numerodeVisitas");
            if (contador == null || contador == 0) {
                contador = 1;
            } else {
                contador = contador + 1;
            }
            application.setAttribute("numerodeVisitas", contador);
        %>
        <h3>Número total de visitas a la página: <%= contador%></h3>


        <%
            //Para ver el total de variables de aplicación definidas:
            Enumeration varsAp = application.getAttributeNames();
            while (varsAp.hasMoreElements()) {
                out.println(varsAp.nextElement() + "<br>");
            }
            out.println("Tiempo de sesión por defecto: " + application.getSessionTimeout());
        %>
    </body>
</html>
