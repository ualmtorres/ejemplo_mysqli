CREATE DATABASE IF NOT EXISTS tutorial_mysqli;

USE tutorial_mysqli;

CREATE TABLE IF NOT EXISTS Persona (
    id INT PRIMARY KEY,
    nombre VARCHAR(50),
    empresa VARCHAR(50)
);

INSERT INTO Persona VALUES (1, 'Juan Pérez', 'Empresa XYZ');
INSERT INTO Persona VALUES (2, 'María López', 'Empresa ABC');