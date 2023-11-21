/*
    Autor: Alvaro Cordero Miñambres
    Fecha-última-revisión: 21-11-2023.
*/
START TRANSACTION;

-- Creación de la base de datos.
CREATE DATABASE IF NOT EXISTS DB206DWESProyectoTema5;
USE DB206DWESProyectoTema5;

-- Creacion de la tabla Departamento
CREATE TABLE IF NOT EXISTS T02_Departamento(
   T02_CodDepartamento VARCHAR(3) PRIMARY KEY,
   T02_DescDepartamento VARCHAR(255) NOT NULL,
   T02_FechaCreacionDepartamento DATETIME NOT NULL,
   T02_VolumenDeNegocio FLOAT NOT NULL,
   T02_FechaBajaDepartamento DATETIME NULL
)engine=Innodb;

-- Creación del usuario.
CREATE USER 'user206DWESProyectoTema5'@'%' IDENTIFIED BY 'P@ssw0rd';
-- Dar permisos al usuario 'usuarioDAW204DBDepartamentos'.
GRANT ALL ON DB206DWESProyectoTema5.* to 'user206DWESProyectoTema5'@'%';

COMMIT;