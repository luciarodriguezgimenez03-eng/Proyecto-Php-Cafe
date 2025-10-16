<?php
    session_start();

    
    
    

       

    if (!isset($_SESSION['nombre']) || !isset($_SESSION['contraseña'])) {
        header("Location: ../../login.php");


    }else{

        if (!isset($_SESSION['roles'])) {
            header("Location: ../../index.php");
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
    <script src="../../js/delete_cliente.js"></script>
    <title>Document</title>
</head>
<header class="cafe-header">
    <div class="container">
      <div class="header-content">
        <h1 class="header-heading">

            <?php
                // Verificar si la sesión está activa
            if (isset($_SESSION['nombre'])) {
                // Mostrar mensaje de bienvenida con el nombre del usuario
                echo 'Bienvenido ' . $_SESSION['nombre'];
                echo"<h1>&nbsp</h1>";
                echo '<p><a href="../../index.php"><--Pagina Principal</a></p>';
            } else {
                // Mostrar enlace de "Login"
                echo '<a href="../login.php">Login</a>';
                echo"<h1>&nbsp</h1>";
                echo '<p><a href="../../index.php">Pagina Principal</a></p>';
            }
        ?>
        </h1>
        
      </div>
      <div class="header-image">
        <img src="../../img/coffe_shop.png" alt="Imagen de ejemplo" width="200">
      </div>
      <div class="header-text">
        <a href="../../admin/Categoria/lista_cat.php">Categoria</a>
        <a href="../../admin/Productos/mostrarprod.php">Productos</a>
            <?php

            if (isset($_SESSION['roles']) && $_SESSION['roles'] == 3 ) {


              //echo ' <a href="../../admin/Cliente/mostrardatosclientes.php">Clientes</a>';


            } else {
                echo '<li style="display:none;"><a href="../../admin/Cliente/mostrardatosclientes.php">Clientes</a></li>';
            }


            ?>

            
    
        
      </div>
      <nav class="header-social">
        <ul>
          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </nav>
    </div>
  </header>
<body>
<style>

.cafe-header {
    background-color: #F8EFEA;
    padding: 30px 0;
  }
  
  .container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .header-content {
    flex-basis: 30%;
    text-align: left;
    margin-right: 20px; /* distancia lateral derecha */
  }
  
  .header-heading {
    font-size: 24px;
    color: #8C7A67;
    margin-bottom: 10px;
    
  }
  .header-heading a {
    color: #8C7A67; /* Cambia el color a negro */
    text-decoration: none; /* Opcional: quitar subrayado del enlace */
  }
  
  
  
  .header-image {
    flex-basis: 40%;
    text-align: center;
  }
  
  .header-image img {
    max-width: 100%;
    height: auto;
  }
  
  .header-text {
    flex-basis: 30%;
    text-align: right;
    margin-left: 20px; /* distancia lateral izquierda */
  }
  
  .header-social {
    list-style-type: none;
    padding: 0;
    margin-top: 20px;
  }
  
  .header-social li {
    display: inline-block;
    margin-right: 10px;
  }
  
  
  .header-text a {
  color: black;
  text-decoration: none;
  transition: color 0.3s ease;
  margin-right: 5px; /* Agregar distancia lateral derecha */
  }
  
  .header-text a.cerrar-sesion {
  margin-left: 20px; /* Agregar distancia lateral izquierda solo al enlace "Cerrar Sesion" */
  margin-right: 0; /* Quitar distancia lateral derecha */
  }
  
  .header-text a:last-child {
  margin-right: 0; /* Quitar distancia lateral derecha en el último enlace */
  }
  
  .header-text a:hover {
  color: #D4C4B4;
  }
  
  
  
  /**/
  
  
  * {margin:0; box-sizing:content-box;}
  /* Modificar fondo negro */
  /* Modificar fondo negro */







       table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #F8EFEA;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        h1 {
            color: #8C7A67;
        }
        u{
            color: #866a4c; 
        }

        a {
            color: #8C7A67;
            text-decoration: none;
        }

        a:hover {
            color: #D4C4B4;
        }

        p {
            margin-top: 20px;
        }
    </style>
<body>
    

<h1>USUARIOS:  <?php
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

     $query_rol1 = "SELECT usuario.id, usuario.nombre, usuario.apellido, usuario.email, usuario.direccion, usuario.rol, roles.nombre_rol
               FROM usuario, roles
               WHERE rol = id_rol AND usuario.rol = 1
               ORDER BY usuario.id DESC"; // Orden descendente por ID

              // Consulta para el rol 2
      $query_rol2 = "SELECT usuario.id, usuario.nombre, usuario.apellido, usuario.email, usuario.direccion, usuario.rol, roles.nombre_rol
               FROM usuario, roles
               WHERE rol = id_rol AND usuario.rol = 2
               ORDER BY usuario.id DESC"; // Orden descendente por ID

              // Consulta para el rol 3
      $query_rol3 = "SELECT usuario.id, usuario.nombre, usuario.apellido, usuario.email, usuario.direccion, usuario.rol, roles.nombre_rol
               FROM usuario, roles
               WHERE rol = id_rol AND usuario.rol = 3
               ORDER BY usuario.id DESC";


          $resultado_rol1 = mysqli_query($con, $query_rol1);
          $resultado_rol2 = mysqli_query($con, $query_rol2);
          $resultado_rol3 = mysqli_query($con, $query_rol3);
          echo"<br>";
echo"<br>";
echo"<br>";
    if ($rolUsuario == 3) {
          echo "<h1>Usuario - Empleado</h1>";
          echo "<table border='1'>";
          // Mostrar los resultados en la tabla

          
   
           
        
          while ($rows = mysqli_fetch_assoc($resultado_rol1)) {
              echo "<tr>";
              // Mostrar los datos en las celdas de la tabla
              echo "<td>" . "ID: " . $rows["id"] . "</td>";
              echo "<td>" . "Nombre: " . $rows["nombre"] . "</td>";
              echo "<td>" . "Apellido: " . $rows["apellido"] . "</td>";
              echo "<td>" . "Email: " . $rows["email"] . "</td>";
              echo "<td>" . "Dirección: " . $rows["direccion"] . "</td>";
              echo "<td>" . "Posición: " . $rows["nombre_rol"] . "</td>";
              echo "<td>" . "<a href='editarcliente.php?id=" . $rows["id"] . "'>EDITAR</a>" . "</td>";
              echo "<td><button onclick='eliminarRegistro(" . $rows["id"] . ")'>Eliminar</button></td>";
              echo "</tr>";
          }
          echo "</table>";
          echo"<br>";
echo"<br>";
echo"<br>";
}
if($rolUsuario == 3 || $rolUsuario == 1){


          echo "<h1>Usuario - Cliente</h1>";
echo "<table border='1'>";
// Mostrar los resultados en la tabla
while ($rows = mysqli_fetch_assoc($resultado_rol2)) {
    echo "<tr>";
    // Mostrar los datos en las celdas de la tabla
    echo "<td>" . "ID: " . $rows["id"] . "</td>";
    echo "<td>" . "Nombre: " . $rows["nombre"] . "</td>";
    echo "<td>" . "Apellido: " . $rows["apellido"] . "</td>";
    echo "<td>" . "Email: " . $rows["email"] . "</td>";
    echo "<td>" . "Dirección: " . $rows["direccion"] . "</td>";
    echo "<td>" . "Posición: " . $rows["nombre_rol"] . "</td>";
    echo "<td>" . "<a href='editarcliente.php?id=" . $rows["id"] . "'>EDITAR</a>" . "</td>";
    echo "<td><button onclick='eliminarRegistro(" . $rows["id"] . ")'>Eliminar</button></td>";
    echo "</tr>";
}
echo "</table>";
}
echo"<br>";
echo"<br>";
echo"<br>";
if ($rolUsuario == 3) {
echo "<h1>Usuario - Administrador</h1>";
echo "<table border='1'>";
// Mostrar los resultados en la tabla

while ($rows = mysqli_fetch_assoc($resultado_rol3)) {
    echo "<tr>";
    // Mostrar los datos en las celdas de la tabla
    echo "<td>" . "ID: " . $rows["id"] . "</td>";
    echo "<td>" . "Nombre: " . $rows["nombre"] . "</td>";
    echo "<td>" . "Apellido: " . $rows["apellido"] . "</td>";
    echo "<td>" . "Email: " . $rows["email"] . "</td>";
    echo "<td>" . "Dirección: " . $rows["direccion"] . "</td>";
    echo "<td>" . "Posición: " . $rows["nombre_rol"] . "</td>";
    echo "<td>" . "<a href='editarcliente.php?id=" . $rows["id"] . "'>EDITAR</a>" . "</td>";
    echo "<td><button onclick='eliminarRegistro(" . $rows["id"] . ")'>Eliminar</button></td>";
    echo "</tr>";
}
echo "</table>";
}
     mysqli_close($con);
     
    }
?>

    <br>
    <br>
    <br>

    
</body>
</html>
