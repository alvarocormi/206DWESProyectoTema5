<?php

/**
 * @author Alvaro Cordero Miñambres, Carlos Garcia Cachondo
 * @version 1.0
 * @since 21/11/2023
 * @copyright Todos los derechos reservados Alvaro Cordero
 * 
 * @Annotation Desarrollo de un control de acceso con identificación del usuario basado en la función header() y
 * en el uso de una tabla “Usuario” de la base de datos. (PDO).
 * 
 */

//Implementeamos la configuracion de la base de datos
require_once('../conf/confDBPDO.php');

try {
    // Establecemos la conexión por medio de PDO
    $miDB = new PDO(DSN, USER, PASSWORD);

    /**
     * Mediante la variable isset() -> Validamos si la variable $_SERVER esta vacia o es null
     * Si el usuario no se ha autenticado
     */
    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {

        //Enviamos una cabecera header auteticaion
        header('WWW-Authenticate: Basic realm="Acceso restringido"');

        //Le enviamos una cabecera con un mensaje de error 401
        header('HTTP/1.0 401 Unauthorized');

        //Mostranmos un mensaje de error por pantalla
        echo 'Se requieren credenciales para acceder a esta página.';

        //Le damos la opcion al usuario de volver al home mediante este enlace
        echo ("<button><a href='../indexProyectoTema5.php'>Volver al home</a></button>");

        //Finalizamos la ejecuion del script mediante la funcion exit
        exit();
    }

    // Guardamos el nombre de usuario recibido por '$_SERVER'
    $usuario = $_SERVER['PHP_AUTH_USER'];

    // Guardamos la contraseña del usuario recibido por '$_SERVER'
    $contrasena = $_SERVER['PHP_AUTH_PW'];

    // Guardamos la contraseña codificada utilizando la funcion hash
    $hashContrasena = hash('sha256', $usuario . $contrasena);

    // Creamos la consulta a la BD 
    $sql = "SELECT * FROM T01_Usuario WHERE T01_CodUsuario = ? AND T01_Password = ?";

    // Preparamos la consulta la ejecutamos
    $stmt = $miDB->prepare($sql);

    // Ejecutamos la consulta
    $stmt->execute([$usuario, $hashContrasena]);

    // Lo que devuelve la consulta, lo pasamos a un objeto
    $result = $stmt->fetch(PDO::FETCH_OBJ);


    // Si no a fallado la consulta mostramos el siguiente mensaje juntos con la decripcion del usuario que se a 'logeado'
    if ($result) {
        $nombre_usuario = $result->T01_DescUsuario;
        echo ("<div>Credenciales correctas<br><br>Bienvenido, $nombre_usuario!</div>");
    } else {
        header('HTTP/1.1 401 Unauthorized'); // Mensaje de error
        echo 'Credenciales incorrectas. Acceso denegado.';
        // En función de si estamos en el servidor de Desarrollo o Explotación nos mostrará un link u otro para volver al 'home'
        echo ("<button><a href='../indexProyectoTema5.php'>Volver al home</a></button>");
        exit();
    }
} catch (PDOException $miExcepcionPDO) {
    $errorExcepcion = $miExcepcionPDO->getCode(); // Almacenamos el código del error de la excepción en la variable '$errorExcepcion'
    $mensajeExcepcion = $miExcepcionPDO->getMessage(); // Almacenamos el mensaje de la excepción en la variable '$mensajeExcepcion'

    echo "<span>Error: </span>" . $mensajeExcepcion . "<br>"; // Mostramos el mensaje de la excepción
    echo "<span>Código del error: </span>" . $errorExcepcion; // Mostramos el código de la excepción
    die($miExcepcionPDO);
} finally {
    unset($miDB); // Para cerrar la conexión
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
</head>

<!-- TITLE -->
<title>Ejercicio 02 PHP</title>


<?php
//Importamos el footer
require_once("./footer.php")
?>

</html>