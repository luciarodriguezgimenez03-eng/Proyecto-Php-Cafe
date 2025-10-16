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

if (isset($_POST['boton'])) {
    // Entra cuando se da clic en el botón de enviar

    $nombre = $_POST['nombre'];
    $categoria = $_POST['opciones'];
    $alergia = $_POST['alergia'];
    $calorias = $_POST['calorias'];
    $detalles = $_POST['detalles'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO producto (nombre_prod, categoria, alergia, calorias, detalles, precio) 
            VALUES ('$nombre', '$categoria', '$alergia', '$calorias', '$detalles' ,'$precio')";



    if (mysqli_query($con, $sql)) {
        //echo "Datos guardados correctamente";
        header("Location: mostrarprod.php"); // Cambia 'pagina_despues_de_login.php' a la página a la que deseas redirigir después del inicio de sesión exitoso
        exit();
    } else {
       // echo "Error al guardar los datos: " . mysqli_error($con);
        header("Location: añadirprod.php"); // Cambia 'login.php' a la página de inicio de sesión
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
    <form action="añadirprod.php" method="post">
        <center>
            <h1> PRODUCTOS ALTA</h1>
        </center> 

        <p> Nombre: <input type="text" name="nombre"><br> </p>
        
        <p> <label for="opciones">Elige una categoria:</label></p>
            <select id="opciones" name="opciones"></p>
            <?php
                // Realizar la conexión a la base de datos
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

                // Realizar la consulta SELECT
                $sql = "SELECT id_cat, tipo_cat FROM categoria";
                $result = mysqli_query($con, $sql);

                // Mostrar las opciones en el select
                while ($row = mysqli_fetch_assoc($result)) {
                 echo "<option value='" . $row["id_cat"] . "'>" . $row["tipo_cat"] . "</option>";
                }

                
                ?>
            
            </select>
        <p> Alergia: <input type="text" name="alergia" required=""><br></p>
        <p> Calorias: <input type="text" name="calorias" required=""><br></p>
        <p> Precio: <input type="text" name="precio" required=""><br></p>
        <p> Detalles: <input type="text" name="detalles" required=""><br></p>

        <br>
        <p> <input type="submit" name="boton" value="Alta"> </input></p>
    </form>
    <p><a href="mostrarprod.php"> Volver a la lista Productos </a></p>
            </div> 
</body>
</html>
