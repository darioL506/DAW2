var express = require('express');
var bodyParser = require('body-parser');

var app = express();

// Importamos las rutas
var nota_routes = require('./routes/rutas.js');

var mongoose = require("mongoose");
mongoose.connect("mongodb://localhost:27017/usuarios");

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

app.set("view engine", "jade");

app.use("/", nota_routes);

module.exports = app;

console.log("Servidor arrancado en http://localhost:8090");

app.listen(8090);