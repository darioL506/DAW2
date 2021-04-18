var express = require('express');

var bodyParser = require('body-parser');

var NotaController = require('../controllers/miControlador.js');
var Usuario = require("../models/usuario.js");

var api = express.Router();

api.use(bodyParser.urlencoded({ extended: false }));
api.use(bodyParser.json());

//Rutas

api.get('/', NotaController.indice);

api.get('/indice', NotaController.indice);

api.post("/crud", NotaController.crud);

api.post("/login", NotaController.login)

module.exports = api;