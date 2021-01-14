<%-- 
    Document   : registroCompleto
    Created on : 6 oct. 2020, 19:02:34
    Author     : dario
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@ page import="java.util.LinkedList" %>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Te has registrado con exito!</h1>
        <%
            if(session.getAttribute("usuarios")==null) {
                
                LinkedList<String> newUser = new LinkedList<String>();
                newUser.addLast(request.getParameter("name"));
                newUser.addLast(request.getParameter("lastName"));
                newUser.addLast(request.getParameter("password"));
                newUser.addLast(request.getParameter("edad"));
                newUser.addLast(request.getParameter("gender"));
                newUser.addLast(request.getParameter("fecha"));
                if(request.getParameter("dwc")==null) {
                    newUser.addLast("0");
                } else {
                    newUser.addLast(request.getParameter("dwc"));
                }
                if(request.getParameter("dws")==null) {
                    newUser.addLast("0");
                } else {
                    newUser.addLast(request.getParameter("dws"));
                }
                if(request.getParameter("di")==null) {
                    newUser.addLast("0");
                } else {
                    newUser.addLast(request.getParameter("di"));
                }
                
                newUser.addLast(request.getParameter("curso"));
                
                LinkedList<LinkedList<String>> usuarios = new LinkedList<LinkedList<String>>();
                
                usuarios.addLast(newUser);
                
                session.setAttribute("usuarios", usuarios);
                
            }
            else {
                
                LinkedList<String> newUser = new LinkedList<String>();
                newUser.addLast(request.getParameter("name"));
                newUser.addLast(request.getParameter("lastName"));
                newUser.addLast(request.getParameter("password"));
                newUser.addLast(request.getParameter("edad"));
                newUser.addLast(request.getParameter("gender"));
                newUser.addLast(request.getParameter("fecha"));
                if(request.getParameter("dwc")==null) {
                    newUser.addLast(request.getParameter("0"));
                } else {
                    newUser.addLast(request.getParameter("dwc"));
                }
                if(request.getParameter("dws")==null) {
                    newUser.addLast(request.getParameter("0"));
                } else {
                    newUser.addLast(request.getParameter("dws"));
                }
                if(request.getParameter("di")==null) {
                    newUser.addLast(request.getParameter("0"));
                } else {
                    newUser.addLast(request.getParameter("di"));
                }
                
                newUser.addLast(request.getParameter("curso"));
                
                LinkedList<LinkedList<String>> usuarios = (LinkedList<LinkedList<String>>)session.getAttribute("usuarios");
                
                usuarios.addLast(newUser);
                
                session.setAttribute("usuarios", usuarios);
            }
        %>
        <form name="form1" action="index.jsp">
            <p></p>
            <input type="submit" name="back" value="Volver">
        </form>
    </body>
</html>
