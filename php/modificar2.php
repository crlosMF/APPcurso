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

        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $mail = $_POST['mail'];
        $codigocurso = $_POST['codigocurso'];

        //Conexion
        $conexion = mysqli_connect("localhost", "root", "gratis", "base3")
        or die("No se pudo conectar");

        //Query
        $query = "update alumnos set nombre='$nombre', mail='$mail', codigocurso='$codigocurso' where codigo='$codigo' ";

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
    </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</body>

</html>