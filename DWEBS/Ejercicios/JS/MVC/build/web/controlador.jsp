<%-- 
    Document   : controlador
    Created on : 04-oct-2019, 11:55:10
    Author     : fernando
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>

<%
    if (request.getParameter("aceptar")!=null){
        String nom = request.getParameter("nombre");
        if (nom.equals("DAW2")){
            session.setAttribute("nombre", nom);
            response.sendRedirect("Vistas/exito.jsp");
        }
        else {
            response.sendRedirect("Vistas/incorrecto.jsp");
        }
    }


    //-----------------
    if (request.getParameter("cerrarSesion")!=null){
        session.removeAttribute("nombre");
        response.sendRedirect("index.jsp");
    }
    

    //-----------------
    if (request.getParameter("volver")!=null){
        response.sendRedirect("index.jsp");
    }
    %>
