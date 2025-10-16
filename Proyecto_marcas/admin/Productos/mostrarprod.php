<?php
    session_start();

    if (!isset($_SESSION['nombre']) || !isset($_SESSION['contraseña'])) {
        header("Location: ../../login.php");
    }else{
        
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/delete_prod.js"></script>
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
        <!--<a href="../admin/Productos/mostrarprod.php">Productos</a>-->
            <?php

            if (isset($_SESSION['roles']) && $_SESSION['roles'] == 3 ) {


                echo ' <a href="../../admin/Cliente/mostrardatosclientes.php">Clientes</a>';


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




    body {
    background-image: url('../../img/prueba_prod.jpg'); /* Reemplaza la ruta de la imagen con la ruta de tu imagen de fondo */
    background-size: cover;
    background-position: center;
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
            color: #8C7A67;
            text-decoration: none;
        }

        a:hover {
            color: #D4C4B4;
        }

        p {
            margin-top: 20px;
            
        }
        
        span{
            color: white;
        }
        h3{
            color: #D4C4B4 ;
        }
        h2{
            color: #D4C4B4 ;
        }




</style>
<br>
        <br>
    <h1>PRODUCTOS: <?php
                        $rolUsuario = $_SESSION['roles'];
                        if ($rolUsuario == 3 || $rolUsuario == 1) {
                             echo "<a href='añadirprod.php'>AÑADIR</a>"; 
                        }   
                                ?></h1><br>

        <ul>
    <h3>CATEGORIAS: <?php
                             echo "<span>";
                             echo "<td>". "<a href='../Categoria/lista_cat.php'>Mostrar</a>"."</td>";   
                             echo "</span>";
                    ?>&nbsp&nbsp&nbsp&nbsp&nbsp</h3><br>
        <ul>
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
    
    $query = "SELECT categoria.tipo_cat , producto.id_prod , producto.nombre_prod , producto.categoria , producto.alergia , producto.calorias, producto.detalles, producto.precio 
                FROM producto, categoria
                WHERE categoria.id_cat = producto.categoria
                ORDER BY categoria.tipo_cat;"; 

    $resultado = mysqli_query($con,$query);

    $categoria_actual = '';
    echo "<ul>";
    
   

    while ($rows = mysqli_fetch_assoc($resultado)) {
        $tipo_cat = $rows["tipo_cat"];
        $id_prod = $rows["id_prod"];
        $nombre_prod = $rows["nombre_prod"];
        $alergia = $rows["alergia"];
        $calorias = $rows["calorias"];
        $detalles = $rows["detalles"];
        $precio = $rows["precio"];
        
        
        if ($categoria_actual != $tipo_cat) {
            if ($categoria_actual != '') {
                echo "</ul>";
            }
            echo "<h2>$tipo_cat</h2>";
            echo "<ul>";
            $categoria_actual = $tipo_cat;
        }
       echo"<span>";
        echo "<li>";
        echo "ID: $id_prod<br>";
        echo "Nombre: $nombre_prod<br>";
        echo "Alergenos: $alergia<br>";
        echo "Calorias: $calorias cal<br>";
        echo "Precio: $precio<br>";
        echo "Detalles: $detalles<br>";
        echo"</span>";
       // echo "<a href='añadirprod.php?id_prod=$id_prod'>AÑADIR</a><br>";
       
        if ($rolUsuario == 3 || $rolUsuario == 1) {
        echo "<a href='editarprod.php?id_prod=$id_prod'>EDITAR</a><br>";
        echo "<td><button onclick='eliminarRegistro(" . $rows["id_prod"] . ")'>Eliminar</button></td>";
        }
        echo "</li>";
    }
    echo "</ul>";

    mysqli_close($con);
    mysqli_free_result($resultado); 
}
?>



</body>
</html>
