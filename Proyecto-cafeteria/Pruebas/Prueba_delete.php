<?php
    session_start();

    
    
    

       

    if (!isset($_SESSION['nombre']) || !isset($_SESSION['contraseña'])) {
        header("Location: ../../login.php");


    }else{

        if (!isset($_SESSION['roles'])) {
            header("Location: ../../webinicial.php");
            echo "prueba";
            exit();
        }

        $rolUsuario = $_SESSION['roles'];
    
        if ($rolUsuario != 3 && $rolUsuario != 1) {
            echo "No tienes permisos para acceder a esta página";
            exit();
         }
         

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="delete.js"></script>
    <title>Document</title>
</head>
<body>

<h1>CLIENTES <?php
        if ($rolUsuario == 3) {
   
            echo "<td>". "<a href='añadirclientes.php'>AÑADIR</a>"."</td>";   
        }
                ?></h1>

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

     $query = "SELECT usuario.id, usuario.nombre , usuario.apellido, usuario.email, usuario.contraseña, usuario.direccion, usuario.rol ,roles.nombre_rol
                    FROM usuario,roles 
                        WHERE rol = id_rol;";

     $resultado = mysqli_query($con,$query);

     echo "<table border='1'>";

     while ($rows = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>"."ID: " . $rows["id"]."</td>";
        echo "<td>"."Nombre: " . $rows["nombre"]."</td>";
        echo "<td>"."Apellido: " . $rows["apellido"]."</td>";
        echo "<td>"."Email: " . $rows["email"]."</td>";
        echo "<td>"."Contraseña: " . $rows["contraseña"]."</td>";
        echo "<td>"."Dirección: " . $rows["direccion"]."</td>";
        echo "<td>"."Posición: " . $rows["nombre_rol"]."</td>";
        
        echo "<td><button onclick='eliminarRegistro(" . $rows["id"] . ")'>Eliminar</button></td>";

        

        echo "</tr>";
     }

     echo"</table>";

     mysqli_close($con);
     mysqli_free_result($resultado);
    }
?>

<p><a href='../../webinicial.php'>Volver a la página principal</a></p>
    
</body>
</html>
