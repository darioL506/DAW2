var express = require('express');
var bodyParser = require('body-parser');
var mysql = require('mysql');
var jwt = require("jsonwebtoken");

var config = {
    host: 'localhost',
    user: 'dario',
    password: 'Chubaca2020',
    database: 'crudnode',
    port: 3306
};

var app = express();

var pool = mysql.createPool(config);

app.use(bodyParser.json());

exports.login = (req, res) => {
    console.log("entro");
    
    pool.query('SELECT * FROM usuario WHERE DNI = ? AND PASSWORD = ?', [req.body.dni, req.body.password], function(error, result) {
        console.log(req.body)
        if (error) {
            console.log(error);            
        } else {
            var resultado = result;
            if (resultado.length > 0) {
                console.log(resultado);
                var token = jwt.sign({ id: result[0].id }, "crud-prueba", {
                    expiresIn: 86400 // 24 hours
                });
                return res.status(200).send({ status: 200, accessToken: token, message: 'Login Ok' });                                
            } else {                
                return res.status(404).send({ status: 404, message: "User Not found." });
            }
        }
    });
};

exports.getUsers = (req, res) => {
    pool.query('SELECT * FROM usuario', [req.body.dni, req.body.password], function(error, result) {
        if (error) {
            throw error;
        } else {
            var resultado = result;
            console.log(resultado);            
            return res.status(200).send({ status: 200, data: resultado });
        }
    });
};

exports.deleteUser = (dni) => {
    pool.query('DELETE FROM usuario WHERE DNI = ?', [dni], function(error, result) {
        if (error) {
            return res.status(404).send({ status: 404, message: "User Not found."+ error });
        } else {                
            return res.status(200).send({ status: 200, message: "Delete ok." });   
        }
    });
}

exports.updateUser = (dni,nombre) => {
    pool.query('Update usuario SET nombre = ? WHERE DNI = ?', [nombre,dni], function(error, result) {
        if (error) {
            return res.status(404).send({ status: 404, message: "User Not found."+ error });
        } else {                
            return res.status(200).send({ status: 200, message: "Update ok." });         
        }
    });
}