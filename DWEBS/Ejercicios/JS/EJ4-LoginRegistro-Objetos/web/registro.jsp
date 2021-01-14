<%-- 
    Document   : registro
    Created on : 06-oct-2020, 13:18:46
    Author     : dario
--%>

<%@page import="Datos.Usuario"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <form name="form1" action="registroCompleto.jsp">
            
            <label>Nombre</label>
            <input type="text" name="name" value="Nombre">
            <input type="text" name="lastName" value="Apellido">
            <br>
            
            <label>Contraseña</label>
            <input type="password" name="password" value="">
            <br>
            
            <label>Edad</label>
            <input type="number" name="edad" value="">
            <br>
            
            <label>Sexo</label>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Hombre</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Mujer</label><br>
            
            <label>Fecha</label>
            <input type="date" name="fecha">
            <br>
            
            <label>Asignaturas</label>
            <input type="checkbox" name="dwc" value="dwc">
            <label for="dwc"> Desarrollo Web Cliente</label>
            <input type="checkbox" name="dws" value="dws">
            <label for="dws"> Desarrollo Web Servidor</label>
            <input type="checkbox" name="di" value="di">
            <label for="di"> Desarrollo de Interfaces</label>
            <br>    
            
            <label>Curso</label>
            <select name="curso">
                <option value="daw">DAW</option>
                <option value="dam">DAM</option>
            </select>
            <br>
            
            <input type="submit" name="resg" value="Registrar">
        </form>
        <form name="form2" action="index.jsp">
            <p></p>
            <input type="submit" name="back" value="Volver">
        </form>
    </body>
</html>
