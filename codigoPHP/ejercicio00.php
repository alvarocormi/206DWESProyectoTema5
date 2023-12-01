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
$key = "";
$value = "";
echo ("<h3>Variables Superglobales: </h3>");
echo ("<p>Contenido de <span style='color:green'>" . '$_SERVER' . "</span> es de tipo <span>" . gettype($_SERVER) . "</span> y contiene: <br>");
foreach ($_SERVER as $key => $value) {
    echo "{$key} => {$value}<br>";
}
echo ("<p>Contenido de <span style='color:green'>" . '$GLOBALS' . "</span> es de tipo <span>" . gettype($GLOBALS) . "</span> y tiene el valor " . print_r($GLOBALS) . "</p>");
if (isset($_SESSION)) {
    echo ("<p>Contenido de <span style='color:green'>" . '$_SESSION' . "</span> es de tipo <span>" . gettype($_SESSION) . "</span> y contiene: <br>");
    foreach ($_SESSION as $key => $value) {
        echo "{$key} => {$value}<br>";
    }
} else {
    echo ("<p>Contenido de <span style='color:red'>" . '$_SESSION' . "</span> esta vacia.");
}
echo ("</p>");
if (empty($_COOKIE)) {
    echo ("<p>Contenido de <span style='color:green'>" . '$_COOKIE' . "</span> es de tipo <span>" . gettype($_COOKIE) . "</span> y contiene: <br>");
    foreach ($_COOKIE as $key => $value) {
        echo "{$key} => {$value}<br>";
    }
} else {
    echo ("<p>Contenido de <span style='color:red'>" . '$_COOKIE' . "</span> esta vacia.");
}

echo ("</p>");
if (is_null($_GET)) {
    echo ("<p>Contenido de <span style='color:green'>" . '$_GET' . "</span> es de tipo <span>" . gettype($_GET) . "</span> y contiene: <br>");
    foreach ($_GET as $key => $value) {
        echo "{$key} => {$value}<br>";
    }
} else {
    echo ("<p>Contenido de <span style='color:red'>" . '$_GET' . "</span> esta vacia.");
}
echo ("</p>");
if (is_null($_POST)) {
    echo ("<p>Contenido de <span style='color:green'>" . '$_POST' . "</span> es de tipo <span>" . gettype($_POST) . "</span> y contiene: <br>");
    foreach ($_POST as $key => $value) {
        echo "{$key} => {$value}<br>";
    }
} else {
    echo ("<p>Contenido de <span style='color:red'>" . '$_POST' . "</span> esta vacia.");
}
echo ("</p>");
if (is_null($_FILES)) {
    echo ("<p>Contenido de <span style='color:green'>" . '$_FILES' . "</span> es de tipo <span>" . gettype($_FILES) . "</span> y contiene: <br>");
    foreach ($_FILES as $key => $value) {
        echo "{$key} => {$value}<br>";
    }
} else {
    echo ("<p>Contenido de <span style='color:red'>" . '$_FILES' . "</span> esta vacia.");
}
echo ("</p>");
if (is_null($_REQUEST)) {
    echo ("<p>Contenido de <span style='color:green'>" . '$_REQUEST' . "</span> es de tipo <span>" . gettype($_REQUEST) . "</span> y contiene: <br>");
    foreach ($_REQUEST as $key => $value) {
        echo "{$key} => {$value}<br>";
    }
} else {
    echo ("<p>Contenido de <span style='color:red'>" . '$_REQUEST' . "</span> esta vacia.");
}
echo ("</p>");
if (is_null($_ENV)) {
    echo ("<p>Contenido de <span style='color:green'>" . '$_ENV' . "</span> es de tipo <span>" . gettype($_ENV) . "</span> y contiene: <br>");
    foreach ($_ENV as $key => $value) {
        echo "{$key} => {$value}<br>";
    }
} else {
    echo ("<p>Contenido de <span style='color:red'>" . '$_ENV' . "</span> esta vacia.");
}
echo ("</p>");

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