<?php
//Incluimos el head
require_once("./codigoPHP/head.php");
?>

<!-- Iconos-->
<link rel="shortcut icon" href="../webroot/img/palma.png" type="image/x-icon" />

<!--CSS-->
<link rel="stylesheet" href="./webroot/css/main.css" />
<link rel="stylesheet" href="./webroot/css/proyectoTema5.css" />

<title>Alvaro Cordero Miñambres</title>

<?php
//Incluimos el header
require_once("./codigoPHP/header.php");
?>

<h2>APLICACIONES WEB USANDO CODIGO EMBEBIDO</h2>
<p>IES LOS SAUCES - BENAVENTE</p>

<div class="mt-4" style="width: 100%">
    <table class="table table-striped table-secondary table-bordered m-auto" style="width: 55%;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Enunciado</th>
                <th scope="col">Ejecutar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Script Creacion</th>
                <td>
                    Script creación de base de datos y usuario.

                </td>
                <td>
                    <a href="./mostrarCodigo/muestraScriptCreacion.php" class="text-white text-decoration-none">muestra</a>
                </td>
            </tr>
            <tr>
                <th scope="row">Script Borrado</th>
                <td>
                    Script borrado de base de datos y usuario:

                </td>
                <td>
                    <a href="./mostrarCodigo/muestraScriptBorrar.php" class="text-white text-decoration-none">muestra</a>
                </td>
            </tr>
            <tr>
                <th scope="row">Script Carga Inicial</th>
                <td>
                    Script carga inicial de base de datos:

                </td>
                <td>
                    <a href="./mostrarCodigo/muestraScriptCargaInicial.php" class="text-white text-decoration-none">muestra</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="mt-4" style="width: 100%">
    <table class="table table-striped table-secondary table-bordered m-auto" style="width: 55%;  margin-top: 700px;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ejercicios</th>
                <th scope="col">Ejecutar</th>
                <th scope="col">Mostrar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">0</th>
                <td>
                    Mostrar el contenido de las variables globales y phpinfo()

                </td>
                <td>
                    <a href="./codigoPHP/ejercicio00.php" class="text-white text-decoration-none">ejecutar</a>
                </td>
                <td>
                    <a href="./mostrarCodigo/muestraEjercicio00.php" class="text-white text-decoration-none">mostrar</a>
                </td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>
                    Desarrollo de un control de acceso con identificación del usuario basado en la función header().

                </td>
                <td>
                    <a href="./codigoPHP/ejercicio01.php" class="text-white text-decoration-none">ejecutar</a>
                </td>
                <td>
                    <a href="./mostrarCodigo/muestraEjercicio01.php" class="text-white text-decoration-none">mostrar</a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>
                    Desarrollo de un control de acceso con identificación del usuario basado en la función header() con PDO.

                </td>
                <td>
                    <a href="./codigoPHP/ejercicio02.php" class="text-white text-decoration-none">ejecutar</a>
                </td>
                <td>
                    <a href="./mostrarCodigo/muestraEjercicio02.php" class="text-white text-decoration-none">mostrar</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</main>
</body>
<?php
//Importamos el footer
require_once("./codigoPHP/footer.php")
?>

</html>