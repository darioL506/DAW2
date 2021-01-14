<%-- 
    Document   : suma
    Created on : 29-sep-2020, 13:37:55
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
            int num1 = Integer.parseInt(request.getParameter("num1"));
            int num2 = Integer.parseInt(request.getParameter("num2"));
            
            Integer result = 0;
            
            if(request.getParameter("sumar") != null) {
                result = num1 + num2;
            }
            if(request.getParameter("restar") != null) {
                result = num1 - num2;
            }
            if(request.getParameter("multi") != null) {
                result = num1 * num2;
            }
            if(request.getParameter("divid") != null) {
                result = num1 / num2;
            }
        %>
        
        <br>
        
        El resultado es 
        <%
            out.println(result);
        %>
        <form name="form1" action="index.jsp">
            <input type="submit" value="Volver">
        </form>
        
    </body>
</html>
