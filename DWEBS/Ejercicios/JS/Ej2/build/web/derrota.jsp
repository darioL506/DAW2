<%-- 
    Document   : derrota
    Created on : 30-sep-2020, 12:35:33
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
        <h1>Has perdido</h1>
        <p>
            El número era 
            <%
                out.println(session.getAttribute("numAl"));
                //Borro el número para poder reiniciar con otro nuevo
                session.removeAttribute("numAl");
            %>
        </p>
        <form name="form1" action="index.jsp">                                    
            <input type="submit" name="submi" value="Volver a empezar">
        </form>
    </body>
</html>
