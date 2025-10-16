<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


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

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $sql = "INSERT INTO sesion (nick, usuario) VALUES ('$nombre', '$email')";

  if (mysqli_query($con, $sql)) {
    echo "Datos guardados correctamente";
  } else {
    echo "Error al guardar los datos: " . mysqli_error($con);
  }

  // Cierre de la conexión a la base de datos
  mysqli_close($con);





    ?>
    
</body>
</html>