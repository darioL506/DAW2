const NotaController = require("../controllers/user.controller");
const { authJwt } = require("../middleware");

module.exports = function(app) {

    app.use(function(req, res, next) {
        res.header(
            "Access-Control-Allow-Headers",
            "x-access-token, Origin, Content-Type, Accept"
        );
        next();
    });

    app.post("/login", NotaController.login);

    app.get("/getUsers",[authJwt.verifyToken],NotaController.getUsers);

    app.post("/crudDelete",[authJwt.verifyToken],NotaController.deleteUser);
    
    app.post("/crudUpdate",[authJwt.verifyToken],NotaController.updateUser);

};