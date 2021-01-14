<%-- 
    Document   : registroCompleto
    Created on : 6 oct. 2020, 19:02:34
    Author     : dario
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="Datos.Usuario"%>
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
                
                LinkedList<String> asignatura = new LinkedList<String>();
                
                if(request.getParameter("dwc")==null) {
                    asignatura.addLast("0");
                } else {
                    asignatura.addLast(request.getParameter("dwc"));
                }
                if(request.getParameter("dws")==null) {
                    asignatura.addLast("0");
                } else {
                    asignatura.addLast(request.getParameter("dws"));
                }
                if(request.getParameter("di")==null) {
                    asignatura.addLast("0");
                } else {
                    asignatura.addLast(request.getParameter("di"));
                }
                
                int aux = Integer.parseInt(request.getParameter("edad").toString());
                
                Usuario newUser = new Usuario(request.getParameter("name"),request.getParameter("lastName"),request.getParameter("password"),Integer.parseInt(request.getParameter("edad")),request.getParameter("gender"),request.getParameter("fecha"),asignatura,request.getParameter("curso"));
                
                LinkedList<Usuario> usuarios = new LinkedList<Usuario>();
                
                usuarios.addLast(newUser);
                
                session.setAttribute("usuarios", usuarios);                                
                
                response.sendRedirect("../index.jsp");
                
            }
            else {
                
                LinkedList<String> asignatura = new LinkedList<String>();
                
                if(request.getParameter("dwc")==null) {
                    asignatura.addLast("0");
                } else {
                    asignatura.addLast(request.getParameter("dwc"));
                }
                if(request.getParameter("dws")==null) {
                    asignatura.addLast("0");
                } else {
                    asignatura.addLast(request.getParameter("dws"));
                }
                if(request.getParameter("di")==null) {
                    asignatura.addLast("0");
                } else {
                    asignatura.addLast(request.getParameter("di"));
                }                                
                
                Usuario newUser = new Usuario(request.getParameter("name"),request.getParameter("lastName"),request.getParameter("password"),Integer.parseInt(request.getParameter("edad")),request.getParameter("gender"),request.getParameter("fecha"),asignatura,request.getParameter("curso"));                                               
                
                LinkedList<Usuario> usuarios = (LinkedList<Usuario>)session.getAttribute("usuarios");
                
                usuarios.addLast(newUser);
                
                session.setAttribute("usuarios", usuarios);               
                
                response.sendRedirect("../index.jsp");
            }
        %>
        <form name="form1" action="index.jsp">
            <p></p>
            <input type="submit" name="back" value="Volver">
        </form>
    </body>
</html>
