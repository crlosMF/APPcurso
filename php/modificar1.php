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
        <!--Comienzo navbar-->
        <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
      <a class="navbar-brand" href="html/alta.html">Alta alumnos</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="php/consulta.php">Administrar alumnos</a>
          </li>
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
            $codigoCurso = $reg['codigoCurso'];
        }

        //Cerrar conexion
        mysqli_close($conexion);
    ?>

    <div class="contenedor">
    <h1>Modificar alumno!</h1>

        <form action="modificar2.php" method="POST">
            <div class="form-group">
                <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $nombre; ?>">
            </div>

            <div class="form-group">
                <label for="mail">Email:</label>
                <input type="text" name="mail" value="<?php echo $mail; ?>">
            </div>

            <div class="form-group">
                <label for="codigoCurso">Codigo curso:</label>
                <input type="text" name="codigoCurso" value="<?php echo $codigoCurso; ?>">
            </div>

            <div class="bt-submit">
                <button type="submit" class="btn btn-primary btn-submit">Enviar</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>