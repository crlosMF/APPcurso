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

        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $mail = $_POST['mail'];
        $codigoCurso = $_POST['codigoCurso'];

        //Conexion
        $conexion = mysqli_connect("localhost", "root", "gratis", "base3")
        or die("No se pudo conectar");

        //Query
        $query = "update alumnos set nombre='$nombre', mail='$mail', codigoCurso='$codigoCurso' where codigo='$codigo' ";

        //Query y guardo registros
        $registro = mysqli_query($conexion, $query)
            or die("No se pudo obtener los datos" . mysqli_error($conexion));

        //Cerrar conexion
        mysqli_close($conexion);

        //Mensaje
        if($registro){
            echo "";
            echo "<h1>Usuario modificado correctamente!</h1>";//si todo va bien
        }else{
            echo "";
            echo "<h1>No se ha podido modificar el usuario!</h1>";//si NO va bien
        }//
    ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>