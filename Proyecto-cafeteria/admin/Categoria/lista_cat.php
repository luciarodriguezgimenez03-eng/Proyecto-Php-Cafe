<?php
    session_start();

    if (!isset($_SESSION['nombre']) || !isset($_SESSION['contraseña'])) {
        header("Location: ../../Login.php");
    }else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/delete_cat.js"></script>
    <title>Categoria</title>
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
        <!--<a href="../admin/Categoria/lista_cat.php">Categoria</a>-->
        <a href="../../admin/Productos/mostrarprod.php">Productos</a>
            <?php

            if (isset($_SESSION['roles']) && $_SESSION['roles'] == 3 ) {


                echo ' <a href="../../admin/Cliente/mostrardatosclientes.php">Clientes</a>';


            } else {
                echo '<li style="display:none;"><a href="../admin/Cliente/mostrardatosclientes.php">Clientes</a></li>';
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

<h1>CATEGORIAS: <?php 
                        $rolUsuario = $_SESSION['roles'];
                        if ($rolUsuario == 3 || $rolUsuario == 1) {
                        echo "<td>". "<a href='añadir_cat.php'>AÑADIR</a>"."</td>";  
                        } 
                                ?>&nbsp&nbsp&nbsp&nbsp&nbsp</h1>

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

     $query = "SELECT *
                    FROM categoria";

     $resultado = mysqli_query($con,$query);

     echo "<br>";
     echo "<table border='1'>";

     while ($rows = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>"."ID: " . $rows["id_cat"]."</td>";
        echo "<td>"."Nombre Categoria: " . $rows["tipo_cat"]."</td>";
        
        if ($rolUsuario == 3 || $rolUsuario == 1) {
            echo "<td>"."<u>". "<a href='edit_cat.php?id=". $rows["id_cat"]."'>EDITAR</a>"."</u>"."</td>";
            echo "<td><button onclick='eliminarRegistro(" . $rows["id_cat"] . ")'>Eliminar</button></td>";
        }
        echo "</tr>";
     }
     
     echo"</table>";

     mysqli_close($con);
     mysqli_free_result($resultado);
    }
?>


    
</body>
</html>