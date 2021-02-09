/*
Este sería un ejemplo de como recoger variables de un formulario, procesarlas y devolverlas a index.
node form_params.js --> desde consola para ejecutar.
Esta forma de hacerlo es muy artesanal, es solo con afán didáctico. Se usarán posteriormente motores
de plantilla y frameworks de Node como Express.
*/
var http = require('http'), fs = require('fs');

http.createServer(function(req,res){

if (req.url.indexOf("favicon.ico") > 0) {return;} //Con esto pasamos de la petición si era al favicon.

 fs.readFile('./index.html',function(err,html){
    var html_string = html.toString(); //Convertimos 'index.html' que está almacenado en html en binario a una cadena.
    var array_params = [];
    var parametros = [];
    var variables = html_string.match(/[^\{\}]+(?=\})/g); //Este patrón buscará un valor entre llaves, 
                                                          //es decir variables a sustituir en 'index' en este caso.
                                                          //Esta función devuelve un vector con los nombres de variable encontrado en 'index'.
    //variables ['nombre']                                                          
    var nombre = "";
    var apellidos = "";
    if (req.url.indexOf("?")>0){
        //En url: /?nombre=elquesea&apellidos=otracosa
        var url_data = req.url.split("?");
        var array_params = url_data[1].split("&");
    }

    for (let index = 0; index < array_params.length; index++) {
        var parametro = array_params[index];
        //parametro =>  nombre=elquesea
        var param_data = parametro.split("=");
        //[nombre, elquesea]
        parametros[param_data[0]] = param_data[1];        
    }

    //Ahora remplazamos los valores de nuestra vista con los valores pasados como parámetros.
    for (let index = 0; index < variables.length; index++) {
       //eval permite pasar un String y lo evalúa como código de JS.
       var variable = variables[index];
       html_string = html_string.replace("{" + variables[index] + "}",parametros[variable]);//Con esto estaremos remplazando en html la variable nombre por lo que vale aquí.
    }

    res.writeHead(200,{"Content-Type":"text/html"});
    res.write(html_string);//Enviamos el html procesado.
    res.end();
 });   
}).listen(8090);