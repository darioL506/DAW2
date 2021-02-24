const NotaController = require("../controllers/user.controller");

module.exports = function(app) {

    app.use(function(req, res, next) {
        res.header(
            "Access-Control-Allow-Headers",
            "x-access-token, Origin, Content-Type, Accept"
        );
        next();
    });

    app.post("/login", NotaController.login);

    app.get("/getUsers",NotaController.getUsers);

    app.post("/crudDelete/{dni}",NotaController.deleteUser);
    
    app.post("/crudUpdate/{dni}",NotaController.updateUser);

};