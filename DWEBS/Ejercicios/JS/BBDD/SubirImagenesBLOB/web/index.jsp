<%-- 
    Document   : index
    Created on : 20-oct-2019, 18:54:34
    Author     : fernando
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        Registrar a un usuario </br>
        <form action="subefichero.jsp" enctype="multipart/form-data" method="post"> 
            Nombre del usuario: <input type="text" name="nombre" value=""></br>
            Edad del usuario: <input type="number" name="edad" value="0"></br>
            Foto de perfil: <input type="file" name="fichero"/></br> 
            <input type="submit" value="Subir fichero"/> 
        </form> 
        </br>
        </br>
        </br>
        </br>
        Buscar a un usuario </br>
        <form action='verdatos.jsp' method="POST">
            Nombre del usuario: <input type="text" name="nombre" value=""></br>
            <input type='submit' name='aceptar' value="Aceptar">
        </form>
    </body>
</html>
