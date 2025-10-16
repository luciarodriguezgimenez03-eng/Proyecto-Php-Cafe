<?php

    $servername = "127.0.0.1"; // Nombre/IP del servidor
     $database = "practica_2"; // Nombre de la BBDD
     $username = "root"; // Nombre del usuario
     $password = ""; // Contraseña del usuario
     // Creamos la conexión
     $con = mysqli_connect($servername, $username, $password, $database);
      //Comprobamos la conexión
     if (!$con) {
         die("La conexión ha fallado: " . mysqli_connect_error());
     }
     
     $id = $_GET["id"];

// Ejecutar la consulta para eliminar el registro con el id especificado
$sql = "DELETE FROM categoria WHERE id_cat=$id";

if (mysqli_query($con, $sql)) {
  
  header("Location: http://localhost/Proyecto_marcas/admin/Categoria/lista_cat.php");
} else {
  echo "Error al eliminar registro: " . mysqli_error($con);
}

// Cerrar la conexión
mysqli_close($con);
     
     
     
     
     
?>

<p><a href="lista_cat.php"> Volver a la lista </a></p>