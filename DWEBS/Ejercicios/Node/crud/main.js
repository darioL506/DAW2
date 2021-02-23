var express = require("express");
var body_parser = require('body-parser');
var router = express.Router();
var app = express();
var nota_routes = require('./routes/rutas.js');
const port = 3000;

//Establecemos el motor de vistas.
app.set("view engine", "jade");

//Iniciamos los middlewares
app.use(body_parser.urlencoded({ extended: true }));
app.use(body_parser.json());

app.set("view engine", "jade");

app.use("/", nota_routes);

module.exports = app;

app.get("/index", function(req, res) {
    res.render('index');
});
app.get("/", function(req, res) {
    res.render('index');
});

//Lanzamos el servidor.
app.listen(port, () => {
    console.log("Example app listening at http://localhost:" + port)
})