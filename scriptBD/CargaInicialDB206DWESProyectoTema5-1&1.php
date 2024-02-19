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

    

    INSERT INTO dbs12302430.T01_Usuario (
        T01_CodUsuario,
        T01_Password,
        T01_DescUsuario,
        T01_Perfil
    ) VALUES 
        ('admin', SHA2('adminpaso', 256), 'administrador', 'administrador'),
        ('alvaro', SHA2('alvaropaso', 256), 'Alvaro Cordero Miñambres', 'usuario'),
        ('carlos', SHA2('carlospaso', 256), 'Carlos Garcia Cachon', 'usuario'),
        ('oscar', SHA2('oscarpaso', 256), 'Oscar Pascual Ferrero', 'usuario'),
        ('borja', SHA2('borjapaso', 256), 'Borja Nuñez Refoyo', 'usuario'),
        ('rebeca', SHA2('rebecapaso', 256), 'Rebeca Sanchez Perez', 'usuario'),
        ('erika', SHA2('erikapaso', 256), 'Erika', 'usuario'),
        ('ismael', SHA2('ismaelpaso', 256), 'Ismael Ferreras Garcia', 'usuario'),
        ('heraclio', SHA2('heracliopaso', 256), 'Heraclio Borbujo Moran', 'administrador'),
        ('amor', SHA2('amorpaso', 256), 'Amor Rodriguez Navarro', 'administrador'),
        ('antonio', SHA2('antoniopaso', 256), 'Antonio Jañez Velada', 'administrador'),
        ('alberto', SHA2('antoniopaso', 256), 'Alberto Bahillo Fernandez', 'administrador');
    
        INSERT INTO dbs12302430.T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento) VALUES
        ('AAA', 'Departamento de Ventas', NOW(), 100000.50, NULL),
        ('AAB', 'Departamento de Marketing', NOW(), 50089.50, NULL),
        ('AAC', 'Departamento de Finanzas', NOW(), 600.50, '2023-11-13 13:06:00');

    
        INSERT INTO dbs12302430.T08_Pregunta (T08_CodPregunta, T08_DescPregunta, T08_FechaAlta, T08_Respuesta, T08_AutorRespuesta, T08_Valor)
        VALUES 
        ('001', '¿Cuál es la capital de Francia?', '2024-02-12 10:00:00', 'París', 'Admin1', 10),
        ('002', '¿Quién escribió la Odisea?', '2024-02-12 10:05:00', 'Homero', 'Admin2', 8),
        ('003', '¿En qué año comenzó la Primera Guerra Mundial?', '2024-02-12 10:10:00', '1914', 'Admin3', 9),
        ('004', '¿Cuál es el símbolo químico del oro?', '2024-02-12 10:15:00', 'Au', 'Admin4', 7),
        ('005', '¿Qué año se firmó la Declaración de Independencia de los Estados Unidos?', '2024-02-12 10:20:00', '1776', 'Admin5', 9);
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
