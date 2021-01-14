<%-- 
    Document   : subefichero
    Created on : 20-oct-2019, 18:06:24
    Author     : fernando
--%>

<%@page import="Auxiliares.Constantes"%>
<%@page import="java.io.File"%>
<%@page import="org.apache.commons.fileupload.FileItem"%>
<%@page import="java.util.List"%>
<%@page import="org.apache.commons.fileupload.servlet.ServletFileUpload"%>
<%@page import="org.apache.commons.fileupload.disk.DiskFileItemFactory"%>
<%@page import="org.apache.commons.fileupload.FileItemFactory"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
            FileItemFactory factory = new DiskFileItemFactory();
            ServletFileUpload upload = new ServletFileUpload(factory);

            
            // 'request' es la HttpServletRequest que recibimos del formulario.
            // Los items obtenidos serán cada uno de los campos del formulario,
            // tanto campos normales como ficheros subidos.
            List items = upload.parseRequest(request);

            // Se recorren todos los items, que son de tipo FileItem
            for (Object item : items) {
                FileItem uploaded = (FileItem) item;

                // Hay que comprobar si es un campo de formulario. Si no lo es, se guarda el fichero
                // subido donde nos interese.
                if (!uploaded.isFormField()) {
                    // Es un campo fichero: guardamos el fichero en alguna carpeta (en este caso perfiles).
                    //Si lo ponemos como sigue: el archivo se guardará en 'glassfish5/glassfish/domains/domain1/config/perfiles'.
                    //File fichero = new File("perfiles", uploaded.getName()); 
                    //Este directorio anterior, por seguridad, luego no será accesible.
                    
                    //Cambiamos la ruta de destino a:
                    //String rutaDestino = "/home/fernando/NetBeansProjects/DAW2_19_20/SubirArchivos/web/perfiles";
                    File fichero = new File(Constantes.rutaServidor, uploaded.getName()); //El archivo se guardará en 'glassfish5/glassfish/domains/domain1/config/perfiles'.
                    uploaded.write(fichero);
                    out.println("Archivo '" + uploaded.getName() + "' subido correctamente.");
                } else {//Si es un campo de formulario (no fichero) extraemos su valor de la siguiente manera.
                    /*
                    Como el formulario debe ser enctype="multipart/form-data" para que admita el envío del fichero. 
                    La primera pega que encontramos con JSP es que si el envío el multipart, no funcionan las llamadas a 
                    request.getParameter(), siempre devuelven null. Por ello, si el formulario tiene más campos que 
                    necesitemos leer, debemos delegar toda la tarea en la librería apache-commons-fileupload.
                    */
                    // Para obtener clave y valor de los campos formulario.
                    String key = uploaded.getFieldName();
                    String valor = uploaded.getString();
                    out.println("Valor recuperado con uploaded: " + key + " = " + valor + "</br>");
                    //--> Vemos que la siguiente línea devolverá null por el tipo de enctype del formulario (necesario para sublir ficheros).
                    out.println("Valor recuperado directamente del request: " + request.getParameter(key) + "</br>"); 
                }
            }
            

        %>
        <a href='index.jsp'>Volver</a>
    </body>
</html>
