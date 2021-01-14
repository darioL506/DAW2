<%-- 
    Document   : index
    Created on : 23-sep-2020, 10:50:11
    Author     : alejandro
--%>

<%@page import="Modelo.Serpiente"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Serpiente</title>
    </head>
    <body>
        <%
            //Variables
            Serpiente s = new Serpiente();
            boolean ataqueMangosta = false;
            int ataque = 0;

            //Inicio
            while (s.getTamanio() > 0 && !ataqueMangosta) {
                //Temporizador
                Thread.sleep(1000);
                out.flush();

                //Recorrido simple para mostrarla encadenada
                for (int i = 0; i < s.getTamanio(); i++) {
        %>
        <input style="background-color: <%= s.getColor(i)%>" type="text" name="color">
        <%
            }
        %>

        <br>

        <%
                s.crece();

                //Ataque mangosta
                ataque = (int) (Math.random() * 100 + 1);
                if (ataque <= 10) {
                    ataqueMangosta = true;
                    out.println("La serpiente ha muerto por la mangosta! Edad --> " + s.getEdad());
                    s.remove();
                }
            }

        %>
    </body>
</html>
