<%-- 
    Document   : index
    Created on : 29-sep-2020, 14:13:53
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
        <form name="form1" action="validar.jsp">
        <h1>Inserte su apuesta</h1>  
        <p>Cara (0) o Cruz (1 o más)</p>
        <%
            String aux = request.getParameter("numCaja");
            
            for (int i = 0; i < Integer.parseInt(aux); i++) {
                    %>
                    <input type="text" name="cajas" value=""><br><br>  
                    <%
                }
         %>
        
                     
            <input type="submit" name="validar" value="Validar">
        </form>
    </body>
</html>
