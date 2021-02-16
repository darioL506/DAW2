var mysql = require('mysql');
var express = require('express');
var app = express();
var bodyParser = require('body-parser');
var configDB = require("../config/db.config");

// app.use(body_parser.urlencoded({ extended: false }));
app.use(bodyParser.json());

/*
Para la eficiencia, vamos a crear un pool de MySQL, que nos permite utilizar múltiples conexiones 
a la vez en lugar de tener que manualmente abrir y cerrar conexiones múltiples.
*/
var pool = mysql.createPool(configDB);




checkDuplicateUsernameOrEmail = (req, res, next) => {
    pool.query('SELECT * FROM users WHERE email = ?', req.body.email, (error, result) => {
        if (error) throw error;
        var resultado = result;
        if (resultado.length > 0) {
            res.status(500).send({ status: 500, message: 'Error al registrar' });
        } else {
            next();
        }
    });
};

checkRolesExisted = (req, res, next) => {
    // if (req.body.roles) {
    //   for (let i = 0; i < req.body.roles.length; i++) {
    //     if (!ROLES.includes(req.body.roles[i])) {
    //       res.status(400).send({
    //         message: "Failed! Role does not exist = " + req.body.roles[i]
    //       });
    //       return;
    //     }
    //   }
    // }

    next();
};

const verifySignUp = {
    checkDuplicateUsernameOrEmail: checkDuplicateUsernameOrEmail,
    checkRolesExisted: checkRolesExisted
};

module.exports = verifySignUp;