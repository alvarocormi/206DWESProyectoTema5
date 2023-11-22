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
<title>Ejercicio 02 PHP</title>

<?php
//Incluimos el header
require_once("./header.php");
?>

<!-- CONTENIDO -->
<h2>Ejercicio 02 PHP</h2>
<p>CONTROL DE ACCESO MEDIANTE HEADER CON PDO</p>

<div class="respuesta" style="display: flex; flex-direction: column; align-items: flex-start;">

    <?php
    /**
     * @author Alvaro Cordero Miñambres
     * @version 1.0
     * @since 21/11/2023
     * @copyright Todos los derechos reservados Alvaro Cordero
     * 
     * @Annotation Desarrollo de un control de acceso con identificación del usuario basado en la función header() y
     * en el uso de una tabla “Usuario” de la base de datos. (PDO).
     * 
     */

    //Implementeamos la configuracion de la base de datos
    require_once('../conf/confDB.php');


    /**
     * @link https://www.php.net/manual/en/reserved.variables.server
     * 
     * $_SERVER['PHP_AUTH_USER'] -> se utiliza para obtener el nombre de usuario proporcionado por el cliente durante el proceso de autenticación HTTP básica.
     * $_SERVER['PHP_AUTH_PW'] -> se utiliza en el contexto de la autenticación básica HTTP. Esta variable contiene la contraseña proporcionada por el usuario durante el proceso de autenticación.
     */

    /**
     * Si el usuario aún no se ha autentificado, pedimos las credenciales
     * isset() -> Determina si una variable está definida y no es null
     */


    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {

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

        //Iniciamos el bloque try catch para controlar los errores
        try {
            /**
             * Establecimiento de la conexion
            /*
                Instanciamos un objeto PDO y establecemos la conexión
                Construccion de la cadena PDO: (ej. 'mysql:host=localhost; dbname=midb')
                host – nombre o dirección IP del servidor
                dbname – nombre de la base de datos
             */
            $miDB = new PDO(DSN, USER, PASSWORD);

            //Mensaje pàra verificar que la conexion ha sido correcta
            echo ('<p>CONEXION EXISTOSA</p>');

            //Guardo en una variable los datos pasados por teclado del usuario
            $usuario = $_SERVER['PHP_AUTH_USER'];

            //Guardo en una variable los datos pasados por teclado de la password
            $password = $_SERVER['PHP_AUTH_PW'];

            //Creo la consulta y le paso el usuario a la consulta
            /**
             * Mediante esta consulta comprobamos si el usuario existe en la base de datos
             */
            $consulta = "SELECT T01_CodUsuario, T01_Password FROM T01_Usuario WHERE T01_CodUsuario='{$usuario}'";

            // Preparo la consulta antes de ejecutarla
            $resultadoConsulta = $miDB->prepare($consulta);

            //Ejecuto la consulta con el array de parametros 
            $resultadoConsulta->execute();

            /**
             * Mediante el metodo rowCount() podemos contar el numero de filas que devuelve una consulta
             * Si es mayor a 0 entonces significa que la consulta a devuelto valores
             */

            if ($resultadoConsulta->rowCount() > 0) {


                //Guardo el resultado de la consulta en un objeto
                $oUsuario = $resultadoConsulta->fetchObject();

                //Encrypto la contraseña
                /**
                 * @link https://www.php.net/manual/es/function.hash.php
                 * 
                 * La funcion hash() ->  Generar un valor hash (resumen de mensaje)
                 *  Devuelve un string que contiene el digesto(hash) como dígitos hexadecimales en minúsculas, a menos que raw_output esté establecido en true, en cuyo caso la salida devuelta será el digesto del mensaje (hash) como datos binarios sin formato.
                 */

                $passwordEncriptada = hash('sha256', ($usuario . $password));

                /**
                 * Si el Codigo del usuario es distinto del usuario introducido por el usuario
                 * Si La contraseña del usuario es distinta que la contraseña introducida por el usuario enctyptada
                 */
                if (($oUsuario->T01_CodUsuario != $usuario) && ($oUsuario->T01_Password != $passwordEncriptada)) {

                    //Muestra de nuevo la cabecera de autentificacion
                    header('WWW-Authenticate: Basic realm="Contenido restringido"');

                    //Redirige con el estado Unauthorized
                    header("HTTP/1.0 401 Unauthorized");


                    //Finalizar la ejecución del script inmediatamente en el punto donde se llama
                    exit("Error de autenticacion!!!");


                    //Mostramos por pantalla los datos el usuario
                } else {

                    //Muestro un mensaje si todo ha ido bien.
                    echo "<p style='color: black;'>Usuario y password correctos!</p>";

                    //Muestro el usuario
                    echo "<p style='color: black;'>Nombre de usuario: " . $_SERVER['PHP_AUTH_USER'] . "</p>";

                    //Muestro la password
                    echo "<p style='color: black;'>Password: " . $_SERVER['PHP_AUTH_PW'] . "</p>";
                }
            }

            /**
             * Codigo que se ejecuta si hay algun error mediante la clase PDOException
             * @exception PDOException
             * */
        } catch (PDOException $excepcion) {

            //Obtengo el codigo del error y lo almaceno en la variable errorException
            $errorExcepcion = $excepcion->getCode();

            //Obtengo el mensaje del error y lo almaceno en la variable mensajeException
            $mensajeException = $excepcion->getMessage();

            //Muestro el codigo del error
            echo "<p style='color: black'>Codigo del error: " . $errorExcepcion . '</p>';

            //Muestro el mensaje del error
            echo "<p style='color: black'>Mensaje del error: " . $mensajeException . '</p>';

            //Pase lo que pase
        } finally {
            /**
             * 
             * @link https://www.php.net/manual/function.unset.php
             * 
             * Mediante unset podremos cerra la conexion con la base de datos
             */
            unset($DB206DWESProyectoTema5);
        }
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