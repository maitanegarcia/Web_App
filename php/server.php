<?php
/*const express = require('express');
const app = express();
const mysql = require('mysql');

const conection = mysql.createConnection({
    host: 'localhost', 
    user: 'root',
    password: '', 
    database: 'login_register_db'
});

conection.connect((err) => {
    if (err) throw err;
    console.log('La conexión funciona');
});

app.post('/registro', async (req, res) => {
    const { nombre, apellido1, apellido2, correo_electronico, usuario, contrasena } = req.body.datos;
    const sql = `INSERT INTO usuarios (nombre, apellido1, apellido2, correo_electronico, usuario, contrasena) VALUES (?, ?, ?, ?, ?, ?)`;
    conection.query(sql, [nombre, apellido1, apellido2, correo_electronico, usuario, contrasena], (err, result) => {
        if (err) {
            console.error('Error en el registro', err);
            res.status(500).send('Error en el registro');
        } else {
            console.log('Usuario registrado exitosamente');
            res.send('Registro exitoso');
        }
    });
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Servidor escuchando en el puerto ${PORT}`);
});
*/?>
