var express = require("express");
var bodyParser = require('body-parser');
var cors = require("cors");

var app = express();

const port = 8090;


var corsOptions = {
    origin: "http://localhost:8081"
};

app.use(cors(corsOptions));

app.use(bodyParser.json());

app.use(bodyParser.urlencoded({ extended: true }));

app.get("/", (req, res) => {
    res.json({ message: "Bienvenido." });
});

require('./routes/bbdd.routes')(app);

//Puerto de acceso
app.listen(port, () => {
    console.log("Example app listening at http://localhost:" + port)
})