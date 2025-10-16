<?php
    session_start();

    if (!isset($_SESSION['nombre']) || !isset($_SESSION['contraseña'])) {
        header("Location: ../login.php");


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
                echo '<p><a href="../index.php"><--Pagina Principal</a></p>';
            } else {
                // Mostrar enlace de "Login"
                echo '<a href="../login.php">Login</a>';
                echo"<h1>&nbsp</h1>";
                echo '<p><a href="../index.php">Pagina Principal</a></p>';
            }
        ?>
        </h1>
        
      </div>
      <div class="header-image">
        <img src="../img/coffe_shop.png" alt="Imagen de ejemplo" width="200">
      </div>
      <div class="header-text">
        <a href="../admin/Categoria/lista_cat.php">Categoria</a>
        <a href="../admin/Productos/mostrarprod.php">Productos</a>
            <?php

            if (isset($_SESSION['roles']) && $_SESSION['roles'] == 3 ) {


                echo ' <a href="../admin/Cliente/mostrardatosclientes.php">Clientes</a>';


            } else {
                echo '<li style="display:none;"><a href="../admin/Cliente/mostrardatosclientes.php">Clientes</a></li>';
            }


            ?>
            </header>
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
  margin-right: 20px;
}

.header-heading {
  font-size: 24px;
  color: #8C7A67;
  margin-bottom: 10px;
}

.header-heading a {
  color: #8C7A67;
  text-decoration: none;
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
  margin-left: 20px;
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
  margin-right: 5px;
}

.header-text a.cerrar-sesion {
  margin-left: 20px;
  margin-right: 0;
}

.header-text a:last-child {
  margin-right: 0;
}

.header-text a:hover {
  color: #D4C4B4;
}

/* Agregar estilos para dispositivos móviles */

@media (max-width: 767px) {
  .container {
    flex-wrap: wrap;
  }
  
  .header-content {
    flex-basis: 100%;
    text-align: center;
    margin-right: 0;
    margin-bottom: 20px;
  }
  
  .header-image {
    flex-basis: 100%;
  }
  
  .header-text {
    flex-basis: 100%;
    text-align: center;
    margin-left: 0;
    margin-top: 20px;
    margin-bottom: 20px;
  }
  
  .header-text a {
    margin: 0 5px;
  }
  
  .header-text a.cerrar-sesion {
    margin: 0 20px;
  }
}





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
            color: black;
            padding: 5px;
            transition: color 0.3s ease, border-color 0.3s ease;
        }

        a:hover {
            color: red;
            border-color: red;
        }

        p {
            margin-top: 20px;
        }
    </style>
<body>
<h1>DETALLES DE PEDIDOS</h1>

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

        $query = "SELECT usuario.id, usuario.nombre, producto.id_prod, producto.nombre_prod, linea_prod.cantidad, pedidos.fecha
        FROM usuario, producto, linea_prod, pedidos
        WHERE usuario.id = pedidos.id_usu
            AND pedidos.id_pedido = linea_prod.id_pedido
            AND linea_prod.id_prod = producto.id_prod;";
            
$resultado = mysqli_query($con, $query);

if ($resultado) {
  $rolUsuario = $_SESSION['roles'];
  $fila = mysqli_fetch_assoc($resultado);
  $nombreUsuario = $fila["nombre"];
  if ($rolUsuario == 3 || $rolUsuario == 1) {
      echo "<td><a href='../admin/cliente/editarcliente.php?id=" . $fila["id"] . "'>Nombre: " . $nombreUsuario . "</a></td>";
      
}else{
  echo "<td><a>Nombre: " . $nombreUsuario . "</a></td>";

}
        
  

  echo "<table border='1'>";
  echo "<tr>";
  echo "<td>"."ID: " . $fila["id_prod"]."</td>";
  echo "<td>"."Nombre: " . $fila["nombre_prod"]."</td>";
  echo "<td>"."Cantidad: " . $fila["cantidad"]."</td>";
  echo "<td>"."Fecha: " . $fila["fecha"]."</td>";
  echo "</tr>";
  echo "</table>";
} else {
  echo "Error en la consulta SQL: " . mysqli_error($con);
}
?>
    
    <p><a href="pedido.php"> Volver a los pedidos </a></p>
</body>
</html>