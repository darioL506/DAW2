<%-- 
    Document   : index
    Created on : 20-sep-2019, 11:57:05
    Author     : fernando
--%>

<%@page import="Datos.Persona"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
            Persona p = new Persona("DAW2",135);
            
            out.println(p);
            %>
    </body>
</html>
