<%-- 
    Document   : validar
    Created on : 29-sep-2020, 14:16:36
    Author     : dario
--%>

<%@page import="java.util.Random"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Resultados</h1>
        <%
            String valores[] = request.getParameterValues("cajas");
            for (int i = 0; i < valores.length; i++) {
                    Random rd = new Random(); 
                    boolean bool = rd.nextBoolean();
                    
                    %>
                    <input type="text" name="elegido" value="
                           <% out.println(valores[i]); %>
                           ">
                    <input type="text" name="elegido" value="
                    <%
                    if(bool) {
                        out.println("Acertado");
                    }
                    else {
                        out.println("Fallaste");
                    }
                    %>       
                    ">
                    <br>
                    <br>
                    <%
                    
                }
        %>
        <form action="index.jsp">
            <input type="submit" value="Volver">
        </form>
    </body>
</html>
