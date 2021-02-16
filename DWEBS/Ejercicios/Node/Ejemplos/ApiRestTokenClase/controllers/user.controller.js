exports.allAccess = (req, res) => {
    res.status(200).send({ status: 200, message: "Contenido público." });
};

exports.userBoard = (req, res) => {
    res.status(200).send({ status: 200, message: "Contenido accesible solo por el usuario." });
};

exports.adminBoard = (req, res) => {
    res.status(200).send("Admin Content.");
};

exports.moderatorBoard = (req, res) => {
    res.status(200).send("Moderator Content.");
};