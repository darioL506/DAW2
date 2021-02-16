var express = require("express");
var bodyParser = require('body-parser');
var cors = require("cors");

var app = express();


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
require('./routes/auth.routes')(app);
require('./routes/user.routes')(app);

// set port, listen for requests
const PORT = process.env.PORT || 8090;
app.listen(PORT, () => {
    console.log(`Servidor arrancado en http://localhost:${PORT}.`);
});



// //Lanzamos el servidor.
// console.log("Servidor arrancado: http://localhost:8090");
// app.listen(8090);