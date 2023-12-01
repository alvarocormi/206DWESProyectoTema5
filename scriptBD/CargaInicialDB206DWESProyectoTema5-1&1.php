<?php

/**
 * @author: Alvaro Cordero Miñambres
 * @since: 23/11/2022
 * @copyright: Copyright (c) 2023, Alvaro Cordero Miñambres
 * Script cragainicial tabla departamento
 */
define('DSN', 'mysql:host=db5014806762.hosting-data.io;dbname=dbs12302430'); //Direccion IP del host y nombre de la base de datos
define('USER', 'dbu1636093'); //Nombre del usuario de la base de datos
define('PASSWORD', 'daw2_Sauces'); //Contraseña del usuario de la base de datos


try {
    //Hago la conexion con la base de datos
    $miDB = new PDO(DSN, USER, PASSWORD);


    //Consulta para eliminar las tablas
    $consulta = <<<CONSULTA

    
    INSERT INTO dbs12302430.T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenNegocio, T02_FechaBajaDepartamento) VALUES
    ('AAA', 'Departamento de Ventas', NOW(), 100000.50, NULL),
    ('AAB', 'Departamento de Marketing', NOW(), 50089.50, NULL),
    ('AAC', 'Departamento de Finanzas', NOW(), 600.50, '2023-11-13 13:06:00');


    INSERT INTO dbs12302430.T01_Usuario (
        T01_CodUsuario,
        T01_Password,
        T01_DescUsuario,
        T01_Perfil
    ) VALUES 
        ('admin', SHA2('adminpaso', 256), 'Descripción del Usuario 0', 'administrador'),
        ('alvaro', SHA2('alvaropaso', 256), 'Descripción del Usuario 1', 'usuario'),
        ('carlos', SHA2('carlospaso', 256), 'Descripción del Usuario 2', 'usuario'),
        ('oscar', SHA2('oscarpaso', 256), 'Descripción del Usuario 3', 'usuario'),
        ('borja', SHA2('borjapaso', 256), 'Descripción del Usuario 4', 'usuario'),
        ('rebeca', SHA2('rebecapaso', 256), 'Descripción del Usuario 5', 'usuario'),
        ('erika', SHA2('erikapaso', 256), 'Descripción del Usuario 6', 'usuario'),
        ('ismael', SHA2('ismaelpaso', 256), 'Descripción del Usuario 7', 'usuario'),
        ('heraclio', SHA2('heracliopaso', 256), 'Descripción del Usuario 7', 'administrador'),
        ('amor', SHA2('amorpaso', 256), 'Descripción del Usuario 8', 'administrador'),
        ('antonio', SHA2('antoniopaso', 256), 'Descripción del Usuario 9', 'administrador'),
        ('alberto', SHA2('antoniopaso', 256), 'Descripción del Usuario 10', 'administrador');
CONSULTA;

    $consultaPreparada = $miDB->prepare($consulta);
    $consultaPreparada->execute();


    echo 'Tablas cargadas';
} catch (PDOException $excepcion) { //Codigo que se ejecuta si hay algun error
    $errorExcepcion = $excepcion->getCode(); //Obtengo el codigo del error y lo almaceno en la variable errorException
    $mensajeException = $excepcion->getMessage(); //Obtengo el mensaje del error y lo almaceno en la variable mensajeException
    echo "<span style='color: red'>Codigo del error: </span>" . $errorExcepcion; //Muestro el codigo del error
    echo "<span style='color: red'>Mensaje del error: </span>" . $mensajeException; //Muestro el mensaje del error
} finally {
    //Cierro la conexion
    unset($miDB);
}
