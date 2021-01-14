<%-- 
    Document   : login
    Created on : 6 oct. 2020, 19:44:42
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
        <%
        if(session.getAttribute("usuarios")==null) {
            %><h1>El usuario no existe</h1><%
        } else {
            
            LinkedList<LinkedList<String>> usuarios = (LinkedList<LinkedList<String>>)session.getAttribute("usuarios");
            
            boolean nameB = false;
            boolean passwordB = false;

            String nombre = request.getParameter("name");
            String password = request.getParameter("password");

            for(LinkedList<String> usuario : usuarios) {
                for(String aux : usuario) {
                    if(aux.equals(nombre)) {
                        nameB = true;
                    }
                    if(aux.equals(password)) {
                        passwordB = true;
                    }
                }
                if(nameB && passwordB){                
                    break;
                }
            }
            
            if(nameB && passwordB) {
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
