<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Listado alumnos</title>
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


    <h1>Listado alumnos!</h1>
    <?php

    //Conexion
    $conexion = mysqli_connect("localhost", "root", "gratis", "base3")
      or die("No se pudo conectar");

    //Query
    $query = "select * from alumnos";

    //Query y guardo registros
    $registros = mysqli_query($conexion, $query)
      or die("No se pudo obtener los datos" . mysqli_error($conexion));

    //Muestra los registros
    echo "<div> <table class='table table-dark table-hover tb-consulta'> <tr> <th>Nombre</th> <th>Mail</th> <th>Codigo curso</th> <th>Modificar</th> <th>Borrar</th> </tr>";

    while ($reg = mysqli_fetch_array($registros)) {
      $codigo = $reg['codigo'];
      echo
      "<tr> 
                    <td>" . $reg['nombre'] . "</td> <td>" . $reg['mail'] . "</td> <td>" . $reg['codigocurso'] . "</td>
                    <form action='modificar1.php' method='post'>
                        <input type='hidden' name='codigo' value='$codigo' />
                        <td><input class='btn btn-primary' type='submit' value='Modificar' /></td>
                    </form>


                    <form action='baja.php' method='POST'>
                        <input type='hidden' name='codigo' value='$codigo' />
                        <td><input class='btn btn-danger' type='submit' value='Borrar' /></td>
                    </form>
                </tr>";
    } //

    "</table> </div> </br>";


    //Cierro conexion
    mysqli_close($conexion);
    ?>



  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>