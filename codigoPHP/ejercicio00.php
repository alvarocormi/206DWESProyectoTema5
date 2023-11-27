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
<title>Ejercicio 00 PHP</title>

<?php
//Incluimos el header
require_once("./header.php");
?>

<!-- CONTENIDO -->
<h2>Ejercicio 00 PHP</h2>
<p>CONTENIDO DE LAS VARIABLES SUPERGLOBALES Y PHPINFO()</p>


<?php
/**
 * @author Alvaro Cordero Miñambres
 * @version 1.0
 * @since 21/11/2023
 * @copyright Todos los derechos reservados Alvaro Cordero
 * 
 * @Annotation Mostrar el contenido de las variables superglobales y phpinfo():
 * 
 * 
 */

/**
 * @link https://www.php.net/manual/es/reserved.variables.session.php
 * 
 * La variable $_SESSION esta vacia la primera vez que habres la pagina+
 * Si no esta vacia mostramos su contenido
 * 
 */
if (isset($_SESSION)) {
    echo ("<p style='color: black;>Contenido de <span>" . '$_SESSION' . "</span> es de tipo <span>" . gettype($_SESSION) . "</span> y tiene el valor ");
    print_r($_SESSION);
    //Si esta vacia muestra un mensaje mostrando que esta vacia
} else {
    echo ("<p style='color: black;>Contenido de <span>" . '$_SESSION' . "</span> esta vacia.</p>");
}

/**
 * @link https://www.php.net/manual/es/reserved.variables.server.php
 * 
 * Mostramos el contenido e la variable $_SERVER
 */
echo ("<p style='color: black;'>Contenido de <span>" . '$_SERVER' . "</span> es de tipo <span>" . gettype($_SERVER) . "</span> y tiene el valor " . var_dump($_SERVER) . "</p>");

/**
 * @link https://www.php.net/manual/es/reserved.variables.cookies.php
 * 
 * Mostramos el contenido de la variable $_COOKIE
 */
echo ("<p>Contenido de <span>" . '$_COOKIE' . "</span> es de tipo <span>" . gettype($_COOKIE) . "</span> y tiene el valor " . print_r($_COOKIE) . "</p>");


//Mostramos el contenido del phpinfo()
phpinfo();
?>

</div>

</main>

</body>

<?php
//Importamos el footer
require_once("./footer.php")
?>

</html>