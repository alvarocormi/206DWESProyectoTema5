<?php

/**
 * @author Alvaro Cordero Miñambres
 * @version 1.0
 * @since 21/11/2023
 * @copyright Todos los derechos reservados Alvaro Cordero
 * 
 * @Annotation Desarrollo de un control de acceso con identificación del usuario basado en la función header().
 * ProyectoTema5
 * 
 */


/**
 * @link https://www.php.net/manual/en/reserved.variables.server
 * 
 * $_SERVER['PHP_AUTH_USER'] -> se utiliza para obtener el nombre de usuario proporcionado por el cliente durante el proceso de autenticación HTTP básica.
 * $_SERVER['PHP_AUTH_PW'] -> se utiliza en el contexto de la autenticación básica HTTP. Esta variable contiene la contraseña proporcionada por el usuario  *durante el proceso de autenticación.
 */
//Si el usuario no es PEPE y la contrasena no es paso y  ninguna de las variables esta vacio o es null entramos en el if
if (!isset($_SERVER['PHP_AUTH_USER']) && !isset($_SERVER['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_USER'] != 'admin' || $_SERVER['PHP_AUTH_PW'] != 'paso') {
    /**
     * @link https://www.php.net/manual/es/function.header.php
     * 
     * Cuando el navegador recibe este encabezado, mostrará un cuadro de diálogo de inicio de sesión al usuario, solicitándole un nombre de usuario y una  *contraseña. El usuario debe proporcionar las credenciales correctas para acceder al recurso protegido.
     */
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');

    /**
     * @link https://developer.mozilla.org/es/docs/Web/HTTP/Status/401
     * 
     * Cuando un cliente realiza una solicitud a un recurso protegido y no proporciona credenciales válidas o no proporciona credenciales en absoluto, el  * *servidor puede responder con el código de estado 401 y el encabezado WWW-Authenticate para indicar al cliente que se requiere autenticación.
     */
    header('HTTP/1.0 401 Unauthorized');

    //Mostramos un error de autenticacion
    echo("Error de auntenticacion!!<br>");
    
    //Le damos la opcion al usuario de volver al home diante este enlace
    echo("<a href='http://daw206.isauces.local/206DWESProyectoTema5/indexProyectoTema5.php'>Volver al home</a>");

    /**
     *@link https://www.php.net/manual/es/function.exit.php
     * 
     *La función exit en PHP se utiliza para finalizar la ejecución del script inmediatamente en el punto donde se llama
     */
    exit();

    //Si las credenciales de autenticacion son correctas 
} else {

    //Mostramos por pantalla los datos el usuario

    //Muestro un mensaje si todo ha ido bien.
    echo "<p style='color: white;'>Usuario y password correctos!</p>";

    //Muestro el usuario
    echo "<p style='color: white;'>Nombre de usuario: " . $_SERVER['PHP_AUTH_USER'] . "</p>";

    //Muestro la password
    echo "<p style='color: white;'>Password: " . $_SERVER['PHP_AUTH_PW'] . "</p>";

    //Volver al home
    echo "<p style='color: white;'>Volver al home: <a href='../indexProyectoTema5.php'>Home</a></p>";

}


?>
<?php
//Incluimos el head
require_once("./head.php");
?>
<!-- Iconos-->
<link rel="shortcut icon" href="../../webroot/img/palma.png" type="image/x-icon" />



<!-- TITLE -->
<title>Ejercicio 01 PHP</title>



</div>

</main>

</body>

<?php
//Importamos el footer
require_once("./footer.php")
?>

</html>