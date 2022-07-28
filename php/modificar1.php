<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirmacion alta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="../css/estilo.css" rel="stylesheet">
</head>

<body>
    <div class="contenedor">
        <!--Comienzo navbar-->
        <nav class="navbar navbar-default" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" style="margin-left: 10px;" href="../index.html">Inicio</a>
            </div>
            <ul class="nav navbar-nav">
            <li><a href="../html/alta.html">Alta alumnos</a></li>
            <li><a href="consulta.php">Administrar alumno</a></li>
            </ul>
        </div>
        </nav>
        <!--Fin navbar-->

    <?php 
        $codigo = $_REQUEST['codigo'];

        //Conexion
        $conexion = mysqli_connect("localhost", "root", "gratis", "base3")
        or die("No se pudo conectar");

        //Query
        $query = "select * from alumnos where codigo='$codigo'";

        //Query y guardo registros
        $registros = mysqli_query($conexion, $query)
            or die("No se pudo obtener los datos" . mysqli_error($conexion));

        while ($reg = mysqli_fetch_array($registros)) {
            $nombre = $reg['nombre'];
            $mail = $reg['mail'];
            $codigocurso = $reg['codigocurso'];
        }

        //Cerrar conexion
        mysqli_close($conexion);
    ?>

    <h1>Modificar alumno!</h1>
    <p><i>Cambie los datos que quiera modificar</i></p>

        <form action="modificar2.php" method="POST">
            <div class="form-group">
                <input class="input-modificar" type="hidden" name="codigo" value="<?php echo $codigo; ?>">
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input class="input-modificar" type="text" name="nombre" value="<?php echo $nombre; ?>">
            </div>

            <div class="form-group">
                <label for="mail">Email:</label>
                <input class="input-modificar" type="text" name="mail" value="<?php echo $mail; ?>">
            </div>

            <div class="form-group">
                <label for="codigocurso">Codigo curso:</label>
                <input class="input-modificar" type="text" name="codigocurso" value="<?php echo $codigocurso; ?>">
            </div>

            <div class="bt-submit">
                <button type="submit" class="btn btn-primary btn-submit">Enviar</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    </body>

</html>