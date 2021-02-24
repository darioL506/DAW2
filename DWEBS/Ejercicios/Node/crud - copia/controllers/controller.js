var express = require('express');
var bodyParser = require('body-parser');
var mysql = require('mysql');

var config = {
    host: 'localhost',
    user: 'dario',
    password: 'Chubaca2020',
    database: 'crudnode',
    port: 3306
};

var app = express();

var pool = mysql.createPool(config);

module.exports = pool;
exports.pool = pool;

app.use(bodyParser.json());

function login(req, res) {
    console.log("entro");
    
    pool.query('SELECT * FROM usuario WHERE DNI = ? AND PASSWORD = ?', [req.body.dni, req.body.password], function(error, result) {
        if (error) {
            throw error;
        } else {
            var resultado = result;
            if (resultado.length > 0) {
                console.log(resultado);
                pool.query('SELECT * FROM usuario', [req.body.dni, req.body.password], function(error2, result2) {
                    if (error2) {
                        throw error2;
                    } else {
                        var resultado2 = result2;
                        console.log(resultado2);
                        res.render("mostrar", { datos: resultado2, estado: true });
                    }
                });                
            } else {
                console.log('Registro no encontrado');
                res.render('mostrar', { datos: null, estado: false })
            }
        }
    });
};

function crud(req, res) {
    console.log(req.body.accion);
    if(req.body.accion === "Borrar") {
        console.log("entro");        
        pool.query('DELETE FROM usuario WHERE DNI = ?', [req.body.dni], function(error, result) {
            if (error) {
                throw error;
            } else {
                
                res.render("index");
                
            }
        });
    }
    if(req.body.accion === "Editar") {
        console.log("entro");        
        pool.query('Update usuario SET nombre = ? WHERE DNI = ?', [req.body.nombre,req.body.dni], function(error, result) {
            if (error) {
                throw error;
            } else {                
                res.render("index");                
            }
        });
    }
};

function indice(req, res){    
    res.render("index");
}

module.exports = {
    login,
    crud,
    indice
};