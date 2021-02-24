var express = require("express");
var bodyParser = require('body-parser');
var cors = require("cors");

var app = express();

const port = 8090;


var corsOptions = {
    origin: "http://localhost:8081"
};

app.use(cors(corsOptions));

// parse requests of content-type - application/json
app.use(bodyParser.json());

// parse requests of content-type - application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: true }));



// simple route
app.get("/", (req, res) => {
    res.json({ message: "Bienvenido." });
});

// routes
require('./routes/bbdd.routes')(app);

// set port, listen for requests

app.listen(port, () => {
    console.log("Example app listening at http://localhost:" + port)
})

// //Lanzamos el servidor.
// console.log("Servidor arrancado: http://localhost:8090");
// app.listen(8090);