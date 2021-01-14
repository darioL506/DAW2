    <%-- 
    Document   : controlador
    Created on : 04-oct-2019, 11:55:10
    Author     : fernando
--%>

<%@page import="java.util.Enumeration"%>
<%@page import="java.util.HashMap"%>
<%@page import="Auxiliar.Bitacora"%>
<%@page import="java.util.LinkedList"%>
<%@page import="Modelo.ConexionEstatica"%>
<%@page import="Modelo.Persona"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>

<%
   
    if (request.getParameter("aceptar") != null) {
        String nom = request.getParameter("nombre");
        ConexionEstatica.nueva();
        Persona p = ConexionEstatica.existeUsuario(nom);
        if (p != null) {
            session.setAttribute("obj", p);

            //Opción a) Con LinkedList.
            LinkedList personas = ConexionEstatica.obtenerPersonas();

            //Opción b) Con tablas Hash.
            //HashMap<String, Persona> personas = ConexionEstatica.obtenerPersonas2();
            
            session.setAttribute("personas", personas);
            ConexionEstatica.cerrarBD();

            Bitacora.escribirBitacora("El usuario " + p.getNombre() + " ha entrado en el sistema.");
            response.sendRedirect("Vistas/exito.jsp");
        } else {
            response.sendRedirect("Vistas/incorrecto.jsp");
        }
    }

    //-----------------
    if (request.getParameter("cerrarSesion") != null) {
        //Esto elimina todos los elementos de la sesión sin reiniciarla.
        /*Enumeration<String> varSesion = session.getAttributeNames();
        while (varSesion.hasMoreElements()) {
            String varSe = varSesion.nextElement();
            session.removeAttribute(varSe);
        }
        */
        //Esto se carga la sesión y crea otra de nuevo.
        //Una gran medida de seguridad para evitar un ataque de apropiación de sesión es invalidar.
        session.invalidate();
        response.sendRedirect("index.jsp");
    }

    //-----------------
    if (request.getParameter("volver") != null) {
        response.sendRedirect("index.jsp");
    }

    //-----------------
    if (request.getParameter("acepCRUD") != null) {
        String nomSeleccionado = request.getParameter("nombre");
        session.setAttribute("nombSeleccionado", nomSeleccionado);
        String dniSeleccionado = request.getParameter("dni");
        session.setAttribute("dniSeleccionado", dniSeleccionado);
        response.sendRedirect("Vistas/verregistro.jsp");
    }

    //-----------------
    if (request.getParameter("volverRegistro") != null) {
        response.sendRedirect("Vistas/exito.jsp");
    }

%>
