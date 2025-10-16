<?php
    session_start();

    var_dump($_POST);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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


        if (isset($_POST['enviar'])) {
            //Entra cuando le da al boton de enviar
        
            $id = $_POST['id'];
            $estado = $_POST['estado'];
            
        
            $sql = "UPDATE pedidos SET estado='$estado' WHERE id_pedido=$id";        
            if (mysqli_query($con, $sql)) {
              //echo "Datos guardados correctamente";
              header("Location: linea_pedido.php"); // Cambia 'pagina_despues_de_login.php' a la página a la que deseas redirigir después del inicio de sesión exitoso
              exit();
            } else {
              // echo "Error al guardar los datos: " . mysqli_error($con);
              header("Location: estado.php"); // Cambia 'login.php' a la página de inicio de sesión
              exit();
            }
        
          
        }   }echo"Prueba";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <form action="" method="post">
        <center>
            <h1> Editar Estado Compra</h1>
        </center> 

        <p> Estado: <input type="text" name="estado"><br> </p>
        

        <br>
        <p> <input type="submit" name="boton" value="enviar"> </input></p>
    </form>
    <p><a href='pedido.php'>Volver a Pedido</a></p>
    </div>   
</body>
</html>