<?php

/**
 * @author: Alvaro Cordero Miñambres
 * @since: 23/11/2022
 * @copyright: Copyright (c) 2023, Alvaro Cordero Miñambres
 * Script creadcion de la base de datos
 */

define('DSN', 'mysql:host=db5014806762.hosting-data.io;dbname=dbs12302430'); //Direccion IP del host y nombre de la base de datos
define('USER', 'dbu1636093'); //Nombre del usuario de la base de datos
define('PASSWORD', 'daw2_Sauces'); //Contraseña del usuario de la base de datos


try {
    //Hago la conexion con la base de datos
    $miDB = new PDO(DSN, USER, PASSWORD);

    //Consulta para eliminar las tablas
    $consulta = <<<CONSULTA
            
    create table if not exists dbs12302430.T01_Usuario(
    T01_CodUsuario varchar(8) primary key,
    T01_Password varchar(255),
    T01_DescUsuario varchar (255),
    T01_NumConexiones int DEFAULT 0,
    T01_FechaHoraUltimaConexion datetime default NULL,
    T01_Perfil enum('usuario','administrador') default 'usuario',
    T01_ImagenUsuario blob)engine=innodb; 
    

    create table if not exists dbs12302430.T02_Departamento(
    T02_CodDepartamento varchar(3) primary key,
    T02_DescDepartamento varchar(255),
    T02_FechaCreacionDepartamento datetime,
    T02_VolumenDeNegocio float,
    T02_FechaBajaDepartamento datetime default null)engine=innodb;

    create table if not exists dbs12302430.T08_Pregunta(
    T08_CodPregunta varchar(3) primary key,
    T08_DescPregunta varchar(255),
    T08_FechaAlta datetime,
    T08_Respuesta varchar(255),
    T08_AutorRespuesta varchar(255),
    T08_Valor integer,
    T08_FechaBaja datetime default null)engine=innodb;
    CONSULTA;

    $miDB->exec($consulta); //Ejecuto la consulta

    echo 'Tablas creadas con exito';
} catch (PDOException $excepcion) { //Codigo que se ejecuta si hay algun error
    $errorExcepcion = $excepcion->getCode(); //Obtengo el codigo del error y lo almaceno en la variable errorException
    $mensajeException = $excepcion->getMessage(); //Obtengo el mensaje del error y lo almaceno en la variable mensajeException
    echo "<span style='color: red'>Codigo del error: </span>" . $errorExcepcion; //Muestro el codigo del error
    echo "<span style='color: red'>Mensaje del error: </span>" . $mensajeException; //Muestro el mensaje del error
} finally {
    //Cierro la conexion
    unset($miDB);
}
