
<%@page import="Paq.Email"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        
        <%
            
            Email email = new Email();
            
            String de = "auxiliardaw2@gmail.com";
            String clave = "Chubaca20";
            String para = request.getParameter("email");
            String mensaje= "Cuerpo del mensaje";
            String asunto = "Contraseña olvidada";
            
            
            email.enviarCorreo(de, clave, para, mensaje, asunto);
            out.println("Correo enviado");
            //response.sendRedirect("index.jsp");
            
        %>
        
    </body>
</html>
