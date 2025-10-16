<?php
    session_start();

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
        

        $sql = "INSERT INTO categoria (tipo_cat) 
                            VALUES ('$nombre')";

        if (mysqli_query($con, $sql)) {
            echo "Datos guardados correctamente";
            header('Location: lista_cat.php');
        } else {
            echo "Error al guardar los datos: " . mysqli_error($con);
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

    <form action="añadir_cat.php" method="post">
        <center>
            <h1> CATEGORIA ALTA</h1>
        </center> 

        <p> Nombre Categoria: <input type="text" name="nombre" required=""><br> </p>
        

        <br>
        <p> <input type="submit" name="boton" value="Alta"> </input></p>
    </form>
    <p><a href='lista_cat.php'>Volver a Lista Categorias</a></p>
    </div>   
</body>
</html>