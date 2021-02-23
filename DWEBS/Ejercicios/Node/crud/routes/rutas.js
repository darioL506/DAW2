
var express = require('express');
 
var NotaController = require('../controllers/controller.js');
 
var api = express.Router();

//Rutas
api.post("/login", NotaController.login);

api.post("/crud",NotaController.crud)

api.post("/index",NotaController.indice)
 
module.exports = api;

