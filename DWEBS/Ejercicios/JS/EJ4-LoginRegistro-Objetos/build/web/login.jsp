<%-- 
    Document   : login
    Created on : 6 oct. 2020, 19:44:42
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
        if(session.getAttribute("usuarios")==null) {
            %><h1>El usuario no existe</h1><%
        } else {
            
            LinkedList<Usuario> usuarios = (LinkedList<Usuario>)session.getAttribute("usuarios");
            
            boolean encontrado = false;

            String nombre = request.getParameter("name");
            String password = request.getParameter("password");            

            int i = 0;

            while( i < usuarios.size() && !encontrado ) {
                Usuario aux = usuarios.get(i);
                if (aux.getNombre().equals(nombre) && aux.getPassword().equals(password)) {
                    encontrado = true;
                }
                i++;
            }
            
            if(encontrado) {
                %><h1>Bienvenido</h1><%
            } else {
                %><h1>El usuario no existe</h1><%
            }            
        }
        %>
        <form name="form1" action="index.jsp">
            <p></p>
            <input type="submit" name="back" value="Volver">
        </form>
    </body>
</html>
