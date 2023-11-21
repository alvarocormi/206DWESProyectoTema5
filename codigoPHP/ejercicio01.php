<?php
//Incluimos el head
require_once("./head.php");
?>
<!-- Iconos-->
<link rel="shortcut icon" href="../../webroot/img/palma.png" type="image/x-icon" />

<!--CSS-->
<link rel="stylesheet" href="../webroot/css/main.css" />
<link rel="stylesheet" href="../webroot/css/proyectoTema5.css" />

<!-- TITLE -->
<title>Ejercicio 01 PHP</title>

<?php
//Incluimos el header
require_once("./header.php");
?>

<!-- CONTENIDO -->
<h2>Ejercicio 01 PHP</h2>
<p>CONTROL DE ACCESO MEDIANTE HEADER</p>

<div class="respuesta" style="display: flex; flex-direction: column; align-items: flex-start;">

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
     * $_SERVER['PHP_AUTH_PW'] -> se utiliza en el contexto de la autenticación básica HTTP. Esta variable contiene la contraseña proporcionada por el usuario durante el proceso de autenticación.
     */

    //Si el usuario no es PEPE y la contrasena no es paso entramos en el if
    if ($_SERVER['PHP_AUTH_USER'] != 'pepe' || $_SERVER['PHP_AUTH_PW'] != 'paso') {
        /**
         * @link https://www.php.net/manual/es/function.header.php
         * 
         * Cuando el navegador recibe este encabezado, mostrará un cuadro de diálogo de inicio de sesión al usuario, solicitándole un nombre de usuario y una contraseña. El usuario debe proporcionar las credenciales correctas para acceder al recurso protegido.
         */
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');

        /**
         * @link https://developer.mozilla.org/es/docs/Web/HTTP/Status/401
         * 
         * Cuando un cliente realiza una solicitud a un recurso protegido y no proporciona credenciales válidas o no proporciona credenciales en absoluto, el servidor puede responder con el código de estado 401 y el encabezado WWW-Authenticate para indicar al cliente que se requiere autenticación.
         */
        header('HTTP/1.0 401 Unauthorized');


        /**
         *@link https://www.php.net/manual/es/function.exit.php
         * 
         *La función exit en PHP se utiliza para finalizar la ejecución del script inmediatamente en el punto donde se llama
         */
        exit("<p style='color: black'>Error de autenticacion<p>");

        //Si las credenciales de autenticacion son correctas 
    } else {

        //Mostramos por pantalla los datos el usuario

        //Muestro un mensaje si todo ha ido bien.
        echo "<p style='color: black;'>Usuario y password correctos!</p>";

        //Muestro el usuario
        echo "<p style='color: black;'>Nombre de usuario: " . $_SERVER['PHP_AUTH_USER'] . "</p>";

        //Muestro la password
        echo "<p style='color: black;'>Password: " . $_SERVER['PHP_AUTH_PW'] . "</p>";
    }

    ?>
</div>

</div>

</main>

</body>

<?php
//Importamos el footer
require_once("./footer.php")
?>

</html>