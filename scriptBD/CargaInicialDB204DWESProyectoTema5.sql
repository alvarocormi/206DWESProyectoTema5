/*
* @author Rebeca Sánchez Pérez
* @version 1.0
* @since 21/11/2023
*/

/*Se insertan valores en la tabla Departamento*/
-- Me posiciono en la base de datos
USE DB206DWESProyectoTema5;

-- Inserto los datos iniciales en la tabla Departamento
INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento) VALUES
    ('AAA', 'Departamento de Ventas', '2023-11-13 13:06:00', 100000.50, NULL),
    ('AAB', 'Departamento de Marketing', '2023-11-13 13:06:00', 50089.50, NULL),
    ('AAC', 'Departamento de Finanzas', '2022-11-13 13:06:00', 600.50, '2023-11-13 13:06:00');


-- Insertar un usuario básico
INSERT INTO T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario) 
VALUES ('usuario1', 'paso', 'Descripción del Usuario 1');

-- Insertar un administrador con imagen
INSERT INTO T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_Perfil, T01_ImagenUsuario) 
VALUES ('admin1', 'paso', 'Administrador 1', 'administrador', NULL);

-- Insertar un usuario con fecha y hora de última conexión personalizada
INSERT INTO T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_FechaHoraUltimaConexion) 
VALUES ('usuario2', 'paso', 'Descripción del Usuario 2', '2023-11-21 08:30:00');

-- Insertar un usuario con número de conexiones específico
INSERT INTO T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_NumConexiones) 
VALUES ('usuario3', 'paso', 'Descripción del Usuario 3', 5);
