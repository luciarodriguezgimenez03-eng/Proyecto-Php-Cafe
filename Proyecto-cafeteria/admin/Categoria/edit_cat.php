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
 

    $sql = "UPDATE categoria SET tipo_cat='$nombre' WHERE id_cat=$id";

    if (mysqli_query($con, $sql)) {
      echo "Registro actualizado con éxito";
      header("Location: lista_cat.php");
    } else {
      echo "Error al actualizar el registro: " . mysqli_error($con);
      header("Location: edit_cat.php");
    }

  } else {
    //Cuando no entra
    $id = $_GET['id'];
    
    $sql ="SELECT * FROM categoria WHERE id_cat='".$id."'";
    
    $resultado = mysqli_query($con,$sql);
    $fila = mysqli_fetch_assoc($resultado);

    $nombre = $fila["tipo_cat"];
    

    if (mysqli_query($con, $sql)) {
        //echo "Registro actualizado con éxito";
      } else {
        echo "Error al actualizar el registro: " . mysqli_error($con);
      }

  }

  mysqli_close($con);
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

  <h1>EDITAR CATEGORIA</h1>

  <form action="edit_cat.php" method="POST">
  <input type="hidden" name="id" value="<?php echo $id ?>">
    <p> Nombre Categoria: <input type="text" name="nombre" required="" value="<?php echo $nombre ?>"><br> </p>
    

    <p> <input type="submit" name="enviar" value="Modificar"> </input></p>

    <p><a href="LISTA_CAT.php"> Volver a Lista Categorias </a></p>
      </div>
</form>
</body>
</html>
