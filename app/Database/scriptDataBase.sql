

CREATE DATABASE parodi_lucas;

USE parodi_lucas;

CREATE TABLE parodi_lucas.usuario (
    codUsuario INT AUTO_INCREMENT NOT NULL, 
    nombre_completo VARCHAR (100) NOT NULL,
    usuario VARCHAR (10) NOT NULL,
    correo VARCHAR (100) NOT NULL,
    telefono VARCHAR (15) NOT NULL, -- Por el tema del + 54 o los guiones utilizo varchar y no begint
    direccion VARCHAR (100) NOT NULL,
    password VARCHAR (60) NOT NULL,  
    PRIMARY KEY (codUsuario)
);

--DROP TABLE parodi_lucas.usuario;
INSERT INTO 
    parodi_lucas.usuario (nombre_completo, usuario, correo, telefono, direccion, password)
    VALUES ('Parodi Lucas', 'parodi', 'lucas@lucas', '3794-409720', 'Casss', '$2y$10$Cuha6/ElxwPfgaRjArFxxudUhD9cW5fUll0NGCQJz5O5hlQ8OuuTi')

SELECT * FROM parodi_lucas.usuario;
