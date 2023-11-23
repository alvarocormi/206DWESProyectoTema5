<?php

/**
 * @author: Alvaro Cordero Miñambres
 * @since: 23/11/2022
 * @copyright: Copyright (c) 2023, Alvaro Cordero Miñambres
 * Script cragainicial tabla departamento
 */
//Incluyo las variables de la conexion
require_once '../conf/confDB.php';

try {
    //Hago la conexion con la base de datos
    $miDB = new PDO(DSN, USER, PASSWORD);

    // Establezco el atributo para la aparicion de errores con ATTR_ERRMODE y le pongo que cuando haya un error se lance una excepcion con ERRMODE_EXCEPTION
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Consulta para eliminar las tablas
    $consulta = <<<CONSULTA
    USE dbs12302430;

    
    INSERT INTO
        T02_Departamento (
            T02_CodDepartamento,
            T02_DescDepartamento,
            T02_FechaCreacionDepartamento,
            T02_VolumenDeNegocio,
            T02_FechaBajaDepartamento
        )
    VALUES (
            'AAA',
            'Departamento de Ventas',
            '2023-11-13 13:06:00',
            100000.50,
            NULL
        ), (
            'AAB',
            'Departamento de Marketing',
            '2023-11-13 13:06:00',
            50089.50,
            NULL
        ), (
            'AAC',
            'Departamento de Finanzas',
            '2022-11-13 13:06:00',
            600.50,
            '2023-11-13 13:06:00'
        );
    
    INSERT INTO
        T01_Usuario (
            T01_CodUsuario,
            T01_Password,
            T01_DescUsuario,
            T01_Perfil
        )
    VALUES (
            'admin',
            SHA2 ('adminpaso', 256),
            'Descripción del Usuario 0',
            'administrador'
        ),
    VALUES (
            'alvaro',
            SHA2 ('alvaropaso', 256),
            'Descripción del Usuario 1',
            'usuario'
        ),
    VALUES (
            'carlos',
            SHA2 ('carlospaso', 256),
            'Descripción del Usuario 2',
            'usuario'
        ),
    VALUES (
            'oscar',
            SHA2 ('oscarpaso', 256),
            'Descripción del Usuario 3',
            'usuario'
        ),
    VALUES (
            'borja',
            SHA2 ('borjapaso', 256),
            'Descripción del Usuario 4',
            'usuario'
        ),
    VALUES (
            'rebeca',
            SHA2 ('rebecapaso', 256),
            'Descripción del Usuario 5',
            'usuario'
        ),
    VALUES (
            'erika',
            SHA2 ('erikapaso', 256),
            'Descripción del Usuario 6',
            'usuario'
        ),
    VALUES (
            'ismael',
            SHA2 ('ismaelpaso', 256),
            'Descripción del Usuario 7',
            'usuario'
        ),
    VALUES (
            'heraclio',
            SHA2 ('heracliopaso', 256),
            'Descripción del Usuario 7',
            'administrador'
        ),
    VALUES (
            'amor',
            SHA2 ('amorpaso', 256),
            'Descripción del Usuario 8',
            'administrador'
        ),
    VALUES (
            'antonio',
            SHA2 ('antoniopaso', 256),
            'Descripción del Usuario 9',
            'administrador'
        ),
    VALUES (
            'alberto',
            SHA2 ('antoniopaso', 256),
            'Descripción del Usuario 10',
            'administrador'
        );
    CONSULTA;

    $miDB->exec($consulta); //Ejecuto la consulta

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
