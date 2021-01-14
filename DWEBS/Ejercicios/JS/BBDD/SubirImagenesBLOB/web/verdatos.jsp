<%-- 
    Document   : verdatos
    Created on : 20-oct-2019, 20:33:33
    Author     : fernando
--%>

<%@page import="java.io.OutputStream"%>
<%@page import="Auxiliar.Persona"%>
<%@page import="Auxiliar.ConexionEstatica"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
            String nom = request.getParameter("nombre");
            Persona p = ConexionEstatica.existeUsuario(nom);
            if (p != null) {
                out.println("Nombre: " + p.getNombre());
                out.println("Edad: " + p.getEdad());
                //De esta manera que está comentada sólo muestra la foto en toda la página.
                //response.setContentType("image/gif");
                //OutputStream o = response.getOutputStream();
                %>
                <!-- <img src="<%-- o.write(p.getFoto()); o.flush(); o.close(); --%>"/>-->
                <img src='<%=p.getFotoimgString() %>' alt='Foto de perfil no encontrada'>
                <%
            } else {
                out.println("Usuario no existe");
            }
        %>
        <a href='index.jsp'>Volver</a>
    </body>
</html>
