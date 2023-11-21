/*
    Autor: Alvaro Cordero Miñambres.
    Utilidad: Este programa consiste en cargar datos en la tabla Departamento.
    Fecha-última-revisión: 01-11-2023.
*/
START TRANSACTION;
-- Usamos la base de datos de Departamento
USE DB206DWESProyectoTema5;
-- Inserción de datos en la tabla Departamento.
INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento)
VALUES ('001', 'Departamento 1', CURDATE(), 1000000.00, NULL);
INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento)
VALUES ('002', 'Departamento 2', CURDATE(), 750000.50, NULL);

INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento)
VALUES ('003', 'Departamento 3', CURDATE(), 500000.75, NULL);

INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento)
VALUES ('005', 'Departamento 5', CURDATE(), -50000.75, NULL);


COMMIT;