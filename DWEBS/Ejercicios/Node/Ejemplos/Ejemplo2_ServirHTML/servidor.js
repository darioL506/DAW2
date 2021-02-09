var http = require('http'), fs = require('fs');
 
var html = fs.readFileSync('./index.html'); //Realiza una llamada síncrona.
//var html = fs.readFile('./index.html'); //Realiza una llamada asíncrona. El servidor no espera a que el archivo sea leído.

http.createServer(function (req, res) {
    //var html = fs.readFile('./index.html'); //Si lo ponemos aquí se recargará con cada petición y 
                                              //no será necesario reiniciar el servidor para aplicar 
                                              //los cambios de index.hrml.
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.write(html);
    res.end();


    //Otro tipo de respuesta de mi página.
    // res.writeHead(200, {'Content-Type': 'application/json'});
    // res.write(JSON.stringify({nombre:"Fernando",apellido:"Aranzabe"}));
    // res.end();
}).listen(8090);
