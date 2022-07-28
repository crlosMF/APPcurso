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

    //Obtener datos
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $codigo = $_POST['codigo'];


    //Conexion
    $conexion = mysqli_connect("localhost", "root", "gratis", "base3")
        or die("No se pudo conectar");

    //Query
    $registro = mysqli_query($conexion, "insert into alumnos (nombre, mail, codigocurso) values('$nombre', '$email', '$codigo')")
        or die("No se pudo insertar" . mysqli_error($conexion));

    //Cierro conexion
    mysqli_close($conexion);

     //Mensaje
    if($registro){
        echo "";
        echo "<h1>Usuario insertado correctamente!</h1>";//si todo va bien
    }else{
        echo "";
        echo "<h1>Nos se ha podido registrar el usuario!</h1>";//si NO va bien
    }//

    ?>

</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>