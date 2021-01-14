<%-- 
    Document   : validar
    Created on : 29-sep-2020, 13:26:14
    Author     : dario
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
            String edadS = request.getParameter("cajaEdad");
            int edad = Integer.parseInt(edadS);
            if (edad >= 18) {
        %>
        <input type="text" value="Soy mayor de edad">
        <%
            } else {
               %>  
               <h1>No lo soy</h1>
        <% 
            }
            for (int i = 0; i < 10; i++) {
                    out.println(i+"  ");
                }
        %>
    </body>
</html>
