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

    //Obtener datos
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $codigo = $_POST['codigo'];


    //Conexion
    $conexion = mysqli_connect("localhost", "root", "gratis", "base3")
        or die("No se pudo conectar");

    //Query
    $registro = mysqli_query($conexion, "insert into alumnos (nombre, mail, codigoCurso) values('$nombre', '$email', '$codigo')")
        or die("No se pudo insertar" . mysqli_error($conexion));

    //Cierro conexion
    mysqli_close($conexion);

     //Mensaje
    if($registro){
        echo "";
        echo "<h1>Usuario insertado correctamente</h1>";//si todo va bien
    }else{
        echo "";
        echo "<h1>Nos se ha podido registrar el usuario</h1>";//si NO va bien
    }//

    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>