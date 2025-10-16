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

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        $contraseña = hash("sha256", $contraseña);
       
        $direccion= $_POST['direccion'];
        $opcionSeleccionada = $_POST['opciones'];
        var_dump($_POST['opciones']);

        $sql = "INSERT INTO usuario (nombre, apellido , email , contraseña , Direccion, rol ) 
                            VALUES ('$nombre', '$apellido' , '$email' , '$contraseña' , '$direccion' , '$opcionSeleccionada')";

        if (mysqli_query($con, $sql)) {
            //echo "Datos guardados correctamente";
            header("Location: mostrardatosclientes.php"); // Cambia 'pagina_despues_de_login.php' a la página a la que deseas redirigir después del inicio de sesión exitoso
            exit();
        } else {
            // echo "Error al guardar los datos: " . mysqli_error($con);
            header("Location: añadirclientes.php"); // Cambia 'login.php' a la página de inicio de sesión
            exit();
        }

        // Cierre de la conexión a la base de datos
        mysqli_close($con);
    }
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

    <form action="añadirclientes.php" method="post">
        <center>
            <h1> CLIENTES ALTA</h1>
        </center> 

        <p> Nombre: <input type="text" name="nombre" required=""><br> </p>
        <p> Apellido: <input type="text" name="apellido" required=""><br></p>
        <p> Email: <input type="email" name="email" required=""><br></p>
        <p> Contraseña: <input type="password" name="contraseña" required=""><br></p>
        <p> Dirección: <input type="text" name="direccion" required=""><br></p>

        <p> <label for="opciones">Elige un rol:</label></p>
        <select id="opciones" name="opciones"></p>
            <option value="1">Empleado</option>
            <option value="2">Cliente</option>
            <option value="3">Admin</option>
        </select>

        <br>
        <p> <input type="submit" name="boton" value="Alta"> </input></p>
    </form>
    <p><a href="mostrardatosclientes.php"> Volver a la lista Usuarios </a></p>
    </div>   
</body>
</html>
