/*
To process Authentication & Authorization, we have these functions:
- check if token is provided, legal or not. We get token from x-access-token of HTTP headers, then use jsonwebtoken's verify() function.
- check if roles of the user contains required role or not.
*/
const jwt = require("jsonwebtoken");
const config = require("../config/auth.config.js");

verifyToken = (req, res, next) => {
    //let token = req.headers["x-access-token"];
    let token = req.headers["authorization"];
    // console.log(req.headers["authorization"]);

    if (!token) {
        return res.status(403).send({
            status: 403,
            message: "No token provided!"
        });
    }

    jwt.verify(token, config.secret, (err, decoded) => {
        if (err) {
            return res.status(401).send({
                status: 401,
                message: "Unauthorized!"
            });
        }
        req.userId = decoded.id;
        next();
    });
};


//Estos middleware deberían pasarse para los roles correspondientes. Tendríamos que ver si el usuario que haya ingresado tiene o no el rol correcto.
isAdmin = (req, res, next) => {
    next();
};

isModerator = (req, res, next) => {
    next();
};

isModeratorOrAdmin = (req, res, next) => {
    next();
};

const authJwt = {
    verifyToken: verifyToken,
    isAdmin: isAdmin,
    isModerator: isModerator,
    isModeratorOrAdmin: isModeratorOrAdmin
};
module.exports = authJwt;