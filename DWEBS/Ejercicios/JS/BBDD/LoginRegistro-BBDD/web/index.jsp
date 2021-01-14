<%-- 
    Document   : index
    Created on : 06-oct-2020, 13:08:22
    Author     : dario
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.util.LinkedList" %>
<!DOCTYPE html>
<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>        
        <form name="form1" action="controlador.jsp">
            Nombre
            <input type="text" name="name" value="">
            <p></p>
            Contraseña
            <input type="password" name="password" value="">
            <p></p>
            <input type="submit" name="idexSubmit" value="Aceptar">
        </form>
        <p></p>
        <form name="form1" action="controlador.jsp">
            <input type="submit" name="registrar" value="Registrar">
        </form>
    </body>
</html>
