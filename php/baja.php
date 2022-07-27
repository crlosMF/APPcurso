<?php
    $codigo = $_REQUEST['codigo'];

    //Conexion
    $conexion = mysqli_connect("localhost", "root", "gratis", "base3")
    or die("No se pudo conectar");

    //Query
    $query = "delete from alumnos where codigo='$codigo' ";

    //Query y guardo registros
    $registro = mysqli_query($conexion, $query)
        or die("No se pudo obtener los datos" . mysqli_error($conexion));

    //Cerrar conexion
    mysqli_close($conexion);

    //Mensaje
    if($registro){
        echo "";
        echo "<h1>Usuario dado de baja correctamente!</h1>";//si todo va bien
    }else{
        echo "";
        echo "<h1>No se ha podido dar de baja el usuario!</h1>";//si NO va bien
    }//
?>