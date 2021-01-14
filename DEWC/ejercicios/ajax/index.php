<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="utf-8">
        <title>Ejemplo de Ajax con jQuery, PHP y JSON</title>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="miAjax.js"></script>
    </head>
    <body>
        <h1>Este ejercicio usa json para enviar datos entre la petición Ajax y PHP.</h1>
        <form name="formu" id="formulario" method="POST">
            <input id="texto" size="50" type="text" value="" name="texto" placeholder="Escribe un género de libro">
        </form>
        <p id="respuesta"></p>
    </body>
</html>
