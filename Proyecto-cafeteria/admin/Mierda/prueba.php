<?php
    session_start();
?>




<?php

    




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
            
       
        if ($_GET["boton"] == "Borrar") {
            session_destroy();
            header('Location: ../login.php');
           
        }   

            $nombre = $_GET["nombre"];
            $contraseña = $_GET["contraseña"];


            $sql = "SELECT * FROM usuario WHERE nombre=? AND contraseña=?";
                $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "ss", $nombre, $contraseña);
                mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                    echo("<br>");
                echo ("Bienvenido/a: ".$nombre );
                    echo("<br>");
                echo("Su contraseña es: " . $contraseña);
                    echo("<br>");
                $_SESSION["nombre"] = $nombre;
                $_SESSION["contraseña"] = $contraseña;

                echo("<a href='../login.php'>Volver a la página principal</a>");
            } else {
                $_SESSION["error"] = "No esta en la bbdd";
                header('Location: ../login.php');
            }

  

        mysqli_close($con);
    ?>