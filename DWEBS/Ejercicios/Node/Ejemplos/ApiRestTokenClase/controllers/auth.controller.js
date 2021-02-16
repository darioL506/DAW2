/*
There are 2 main functions for Authentication:
- signup: create new User in database (role is user if not specifying role)
- signin:

    find username of the request in database, if it exists
    compare password with password in database using bcrypt, if it is correct
    generate a token using jsonwebtoken
    return user information & access Token
    */
const config = require("../config/auth.config");
var configDB = require("../config/db.config");

var jwt = require("jsonwebtoken");
var bcrypt = require("bcryptjs");
var mysql = require('mysql');
var express = require('express');
var app = express();
var bodyParser = require('body-parser');

// app.use(body_parser.urlencoded({ extended: false }));
app.use(bodyParser.json());

/*
Para la eficiencia, vamos a crear un pool de MySQL, que nos permite utilizar múltiples conexiones 
a la vez en lugar de tener que manualmente abrir y cerrar conexiones múltiples.
*/
var pool = mysql.createPool(configDB);
// // Export the pool
// module.exports = pool;
// exports.pool = pool;


exports.signup = (req, res) => {

    var username = req.body.username;
    var email = req.body.email;
    var pass = bcrypt.hashSync(req.body.password);
    let now = new Date();
    pool.query('INSERT INTO users (username, email, password, createdAt, updatedAt) VALUES (?,?,?,?,?)', [username, email, pass, now, now], (error, result) => {
        if (error) res.status(500).send({ status: 500, message: 'Error al insertar' });
        else res.status(201).send({ status: 201, message: 'Registro añadido ID:' + result.insertId }); //En este caso esto devuelve 0 porque la clave no es Id.
    });


    // pool.query('SELECT * FROM users WHERE email = ?', req.body.email, (error, result) => {
    //     if (error) throw error;
    //     var resultado = result;
    //     if (resultado.length > 0) {
    //         res.status(500).send({ status: 500, message: 'Error al registrar' });
    //     } else {
    //         pool.query('INSERT INTO users (username, email, password, createdAt, updatedAt) VALUES (?,?,?,?,?)', [username, email, pass, now, now], (error, result) => {
    //             if (error) res.status(500).send({ status: 500, message: 'Error al insertar' });
    //             else res.status(201).send({ status: 201, message: 'Registro añadido ID:' + result.insertId }); //En este caso esto devuelve 0 porque la clave no es Id.
    //         });
    //     }
    // });
};



exports.signin = (req, res) => {
    pool.query('SELECT * FROM users WHERE email = ?', req.body.email, (error, result) => {
        if (error) throw error;
        if (result.length > 0) {
            var passwordIsValid = bcrypt.compareSync(
                req.body.password,
                result[0].password
            );
            if (!passwordIsValid) {
                return res.status(401).send({
                    status: 401,
                    accessToken: null,
                    message: "Invalid Password!"
                });
            } else {
                // console.log(result[0].id);
                var token = jwt.sign({ id: result[0].id }, config.secret, {
                    expiresIn: 86400 // 24 hours
                });
                res.status(200).send({ status: 200, accessToken: token, message: 'Login Ok' });
            }
        } else {
            return res.status(404).send({ status: 404, message: "User Not found." });
        }
    });
};