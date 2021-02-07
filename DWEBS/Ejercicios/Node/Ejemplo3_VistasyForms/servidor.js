var http = require('http'),
    fs = require('fs');

http.createServer(function(req, res) {
    fs.readFile('./index.html', function(err, html) {
        var html_string = html.toString(); //Convertimos 'index.html' que está almacenado en html en binario a una cadena.

    var variables = html_string.match(/[^\{\}]+(?=\})/g); //Este patrón buscará un valor entre llaves, 
                                                          //es decir variables a sustituir en 'index' en este caso.
                                                          //Esta función devuelve un vector con los nombres de variable encontrado en 'index'.
    //variables ['nombre']                                                          
    var nombre = "Hola ";
    var apellidos = "DAW2";

    for (let index = 0; index < variables.length; index++) {
       //eval permite pasar un String y lo evalúa como código de JS.
       var value = eval(variables[index]);
       html_string = html_string.replace("{" + variables[index] + "}",value);//Con esto estaremos remplazando en html la variable nombre por lo que vale aquí.
    }

    res.writeHead(200,{"Content-Type":"text/html"});
    res.write(html_string);//Enviamos el html procesado.
    res.end();
 });   
}).listen(8090);