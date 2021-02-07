var express = require("express");
var body_parser = require('body-parser');
var cookieParser = require('cookie-parser');
var router = express.Router();
var app = express();

app.set("view engine", "jade");

app.use(body_parser.urlencoded({ extended: true }));
app.use(body_parser.json());

app.use(cookieParser());

var session = require('express-session');

app.use(session({
    secret: '123456789',
    resave: false,
    saveUninitialized: true
}))

app.get("/", function(req, res) {
    res.render("index");
});

// Para recuperar el valor de los parámetros enviados por POST utilizaremos el middleware body-parser.
app.post("/validar", function(req, res) {
    console.log(req.body);
    req.session.number = req.body.caja;
    console.log(req.session);
    res.render("mostrar", { number: req.session.number });
});