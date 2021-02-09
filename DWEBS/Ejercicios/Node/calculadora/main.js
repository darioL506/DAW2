var express = require("express");
var body_parser = require('body-parser');
var cookieParser = require('cookie-parser');

const port = 3000;
var router = express.Router();
var app = express();

//Motor de plantillas
app.set("view engine", "jade");

app.use(body_parser.urlencoded({ extended: true }));
app.use(body_parser.json());

app.use(cookieParser());

var session = require('express-session');

app.get("/", function (req, res) {
    res.render("index");
});

// Para recuperar el valor de los parámetros enviados por POST utilizaremos el middleware body-parser.
app.post("/operar", function (req, res) {
    console.log(req.body);
    var result = 0;
    var num1 = parseInt(req.body.caja1);
    var num2 = parseInt(req.body.caja2);
    var op = req.body.op;
    console.log(req.session);
    if (op === "+") {
        result = num1 + num2;
    }
    else if (op === "-") {
        result = num1 - num2;
    }
    else if (op === "*") {
        result = num1 * num2;
    }
    else if (op === "/") {
        result = num1 / num2;
    } else {
        result = "error";
    }
    console.log(req.session);
    res.render("resultado", { number: result });
});

app.listen(port, () => {
    console.log("Example app listening at http://localhost:" + port)
})