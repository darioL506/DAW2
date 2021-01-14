<%-- 
    Document   : index
    Created on : 29-sep-2020, 13:34:40
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
        <form name="form1" action="suma.jsp">
            Número 1 <input type="text" name="num1" value="">
            <br>
            Número 2 <input type="text" name="num2" value="">
            <br>
            <input type="submit" name="sumar" value="+">
            <input type="submit" name="restar" value="-">
            <input type="submit" name="multi" value="*">
            <input type="submit" name="divid" value="/">
        </form>
    </body>
</html>
