<?php
session_start();

$servername = "127.0.0.1"; // Nombre/IP del servidor
$database = "practica_2"; // Nombre de la BBDD
$username = "root"; // Nombre del usuario
$password = ""; // Contraseña del usuario

// Creamos la conexión
$con = mysqli_connect($servername, $username, $password, $database);

// Comprobamos la conexión
if (!$con) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

if (isset($_POST['nombre']) && isset($_POST['contraseña'])) {
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];
    $contraseña = hash("sha256", $contraseña);
    

    //$query = "SELECT * FROM usuario WHERE nombre='" . $nombre . "' AND contraseña='" . $contraseña . "'";






    
    $query = "SELECT * FROM usuario WHERE nombre=? AND contraseña=?";
      $stmt = mysqli_prepare($con, $query);
      mysqli_stmt_bind_param($stmt, "ss", $nombre, $contraseña);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      
      

    if (mysqli_num_rows($result) > 0) {
          $consulta = "SELECT * FROM usuario WHERE nombre='$nombre' AND contraseña='$contraseña'";
          $resultado = mysqli_query($con, $consulta);

      if (!$resultado) {
        die('Error en la consulta: ' . mysqli_error($con));
      }
        $fila = mysqli_fetch_assoc($resultado);
        $_SESSION['nombre'] = $fila["nombre"];
        $_SESSION['contraseña'] = $fila["contraseña"];
        $_SESSION['roles'] = $fila["rol"];
        $_SESSION['id'] = $fila["id"];
        mysqli_close($con);

    header('Location: index.php');
}
else{
   mysqli_close($con);
   
   
   echo '<div style="position: fixed; top: 0; left: 0; right: 0; background-color: black; color: white; font-family: \'Helvetica\', sans-serif; font-size: 24px; text-align: center; padding: 10px; z-index: 9999; transition: background-color 0.3s ease-in-out;">';
    echo '<center><span style="font-size: 36px; font-family: \'Impact\', sans-serif;">NO EXISTE EL USUARIO O CONTRASEÑA</span></center>';
    echo '</div>';
   

}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    
<div class="login-box">
  <h2>Login</h2>
  <form action="" method="post">
    <div class="user-box">
      <input type="text" name="nombre" required="">
      <label>Usuario</label>
    </div>
    <div class="user-box">
      <input type="password" name="contraseña" required="">
      <label>Contraseña</label>
    </div>
    <a href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <input type="submit" id="login" name="boton" value="Login" class="btn-transparent">
      
    </a>
    <center>
        <input type="button" class="btn-transparent" value="Invitado" onclick="window.location.href='index.php'">
    </center>

  </form>
</div>
</body>
</html>