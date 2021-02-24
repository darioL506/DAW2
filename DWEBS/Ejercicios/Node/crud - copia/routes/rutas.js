
var express = require('express');
 
var NotaController = require('../controllers/controller.js');
 
var api = express.Router();

//Rutas
app.post("/login", NotaController.login);

    app.get("http://localhost:8090/getUsers");

    app.post("/crudDelete",NotaController.deleteUser);
    
    app.post("/crudUpdate",NotaController.updateUser);
 
module.exports = api;

