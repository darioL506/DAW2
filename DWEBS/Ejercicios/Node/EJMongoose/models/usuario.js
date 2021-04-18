var mongoose = require("mongoose");


var userSchema = new mongoose.Schema({
    dni: { type: String },
    nombre: { type: String },
    password: { type: String }
}, { collection: 'usuarios.usuarios'});


var User = mongoose.model('user', userSchema);

module.exports = User;