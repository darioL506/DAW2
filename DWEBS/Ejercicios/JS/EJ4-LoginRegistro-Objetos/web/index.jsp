<%-- 
    Document   : index
    Created on : 06-oct-2020, 13:08:22
    Author     : dario
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.util.LinkedList" %>
<%@page import="Datos.Usuario"%>
<!DOCTYPE html>
<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>  
        <%
        if(session.getAttribute("usuarios")!=null) {
        %>
        <p>
        <%
            LinkedList<Usuario> usuarios = (LinkedList<Usuario>)session.getAttribute("usuarios");
            
            for(Usuario aux : usuarios) {
                %> <p> <% out.println(aux.toString()); %></p><%
            }
            
        %>
        </p>
        <%
        }
        %>
        
        <form name="form1" action="login.jsp">
            Nombre
            <input type="text" name="name" value="">
            <p></p>
            Contraseña
            <input type="password" name="password" value="">
            <p></p>
            <input type="submit" name="submi" value="Aceptar">
        </form>
        <p></p>
        <form name="form1" action="registro.jsp">
            <input type="submit" name="submi" value="Registrar">
        </form>
    </body>
</html>
