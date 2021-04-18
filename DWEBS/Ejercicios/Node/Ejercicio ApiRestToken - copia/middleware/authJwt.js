const jwt = require("jsonwebtoken");

verifyToken = (req, res, next) => {
    
    let token = req.headers["authorization"];

    if (!token) {
        return res.status(403).send({
            status: 403,
            message: "No token provided!"
        });
    }

    jwt.verify(token, 'crud-prueba', (err, decoded) => {
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

const authJwt = {
    verifyToken: verifyToken
};
module.exports = authJwt;