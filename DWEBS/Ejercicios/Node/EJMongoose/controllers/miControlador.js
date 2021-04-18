var express = require('express');
var bodyParser = require('body-parser');
var usuarios = require('../models/usuario.js');
var app = express();

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

function indice(req, res) {
    res.render("index");
}

function login(req, res) {
    console.log(req.body.dni)
    console.log(req.body.password)
    usuarios.find({ nombre: req.body.dni, password:req.body.password},        
        function(err, persona) {
            if (err) throw err;
            if (persona.length > 0) {
                usuarios.find(),
                function(err2, personas) {             
                    if (err2) throw err2; 
                    if (personas.length > 0) {
                        res.render("mostrar", { datos: personas, estado: true });
                    }
                    else {
                        console.log('No hay usuarios');
                        res.render('mostrar', { datos: null, estado: false })
                    }  
                }
            } else {
                console.log('Usuario no valido');
                res.render('mostrar', { datos: null, estado: false })
            }
        }
    );
};

function crud(req, res) {
    if(req.body.accion === "Borrar") {
        usuarios.deleteOne({ dni: req.body.dni },
            function(err, personas) {
                if (err) {
                    res.send(err);
                } else {
                    res.send(personas);
                }
            }
        );
    }
    if(req.body.accion === "Editar") {
        usuarios.updateOne({dni: req.body.dni},{$set:{ dni: req.body.dni, nombre:req.body.name }},
            function(err, personas) {
                if (err) {
                    res.send(err);
                } else {
                    res.send(personas);
                }
            }
        );
    }   
};

module.exports = {
    indice,
    login,
    crud,
};