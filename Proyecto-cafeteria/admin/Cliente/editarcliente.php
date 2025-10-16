<?php
  $servername = "127.0.0.1"; // Nombre/IP del servidor
  $database = "practica_2"; // Nombre de la BBDD
  $username = "root"; // Nombre del usuario
  $password = ""; // Contraseña del usuario

  // Creamos la conexión
  $con = mysqli_connect($servername, $username, $password, $database);

  if (!$con) {
    die("La conexión ha fallado: " . mysqli_connect_error());
  }

  if (isset($_POST['enviar'])) {
    //Entra cuando le da al boton de enviar

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $contraseña=hash("sha256", $contraseña);
    $direccion = $_POST['direccion'];

    $sql = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', email='$email', contraseña='$contraseña', direccion='$direccion' WHERE id=$id";

    if (mysqli_query($con, $sql)) {
      //echo "Datos guardados correctamente";
      header("Location: mostrardatosclientes.php"); // Cambia 'pagina_despues_de_login.php' a la página a la que deseas redirigir después del inicio de sesión exitoso
      exit();
    } else {
      // echo "Error al guardar los datos: " . mysqli_error($con);
      header("Location: editarcliente.php"); // Cambia 'login.php' a la página de inicio de sesión
      exit();
    }

  } else {
    //Cuando no entra
    $id = $_GET['id'];
    $sql ="SELECT * FROM usuario WHERE id='".$id."'";
    echo $id;
    $resultado = mysqli_query($con,$sql);
    $fila = mysqli_fetch_assoc($resultado);

    $nombre = $fila["nombre"];
    $apellido = $fila["apellido"];
    $email = $fila["email"];
    $contraseña = $fila["contraseña"];
    $direccion = $fila["direccion"];
    $rol = $fila["rol"];

    mysqli_close($con);
  }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #8C7A67;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #FFFFFF;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        form p {
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #8C7A67;
            color: #FFFFFF;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #866a4c;
        }
    </style>
<body>
<div class="container">

  <h1>EDITAR CLIENTE</h1>

  <form action="editarcliente.php" method="post">
    <input type="hidden" name="id" required="" value="<?php echo $id ?>">
    <p> Nombre: <input type="text" name="nombre" required="" value="<?php echo $nombre ?>"><br> </p>
    <p> Apellido: <input type="text" name="apellido" required="" value="<?php echo $apellido ?>"><br></p>
    <p> Email: <input type="email" name="email" required="" value="<?php echo $email ?>"><br></p>
    <p> Contraseña: <input type="password" name="contraseña" required="" value="<?php echo $contraseña ?>"><br></p>
    <p> Dirección: <input type="text" name="direccion" required="" value="<?php echo $direccion ?>"><br></p>
    <input type="submit" name="enviar" value="Guardar">
  </form>
  <p><a href="mostrardatosclientes.php"> Volver a la lista Usuarios  </a></p>
  <p><a href="../../otros/pedido.php"> Volver a los pedidos </a></p>
      </div>
</body>
</html>
