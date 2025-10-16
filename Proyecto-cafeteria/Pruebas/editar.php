<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="editar.css"> <!-- Enlazamos el archivo de estilos CSS del carrusel -->
    <title>Encabezado de Página Web</title>
</head>
<body>
    <!-------------------------------------HEADER----------------------------------------------------------------->
<header class="cafe-header">
    <div class="container">
      <div class="header-content">
        <h1 class="header-heading">

            <?php
                // Verificar si la sesión está activa
            if (isset($_SESSION['nombre'])) {
                // Mostrar mensaje de bienvenida con el nombre del usuario
                echo 'Bienvenido ' . $_SESSION['nombre'];
            } else {
                // Mostrar enlace de "Login"
                echo '<a href="login.php">Login</a>';
            }
        ?>
        </h1>
        
      </div>
      <div class="header-image">
        <img src="img/coffe_shop.png" alt="Imagen de ejemplo" width="200">
      </div>
      <div class="header-text">
        <a href="admin/Categoria/lista_cat.php">Categoria</a>
        <a href="admin/Productos/mostrarprod.php">Productos</a>
            <?php

            if (isset($_SESSION['roles']) && $_SESSION['roles'] == 3 ) {


                echo ' <a href="admin/Cliente/mostrardatosclientes.php">Clientes</a>';


            } else {
                echo '<li style="display:none;"><a href="admin/Cliente/mostrardatosclientes.php">Clientes</a></li>';
            }


            ?>

            <?php
            if (isset($_SESSION['roles']) && $_SESSION['roles'] == 3 ) {


                echo ' <a href="Delete.php" class="cerrar-sesion">Cerrar Sesion</a>';


            } else {
                echo '<li style="display:none;"><a href="Delete.php" class="cerrar-sesion">Cerrar Sesion</a></li>';
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


        

        
    
            <!-------------------------------------CARRUSEL----------------------------------------------------------------->

    <div class="contenedor">
    <br>
        <center><h3>PRODUCTOS DESTACADOS</h3></center>
      <br>  
    
    


    <!-- Carrusel -->
    <div class="ContainerCenter">
    <!-- Radio Seleccionar -->
    <input type="radio" name="Carrusel" id="Slider1" checked>
    <input type="radio" name="Carrusel" id="Slider2">
    <input type="radio" name="Carrusel" id="Slider3">

    <div class="Carrusels">
        <!-- Imagen contenido -->
        <div class="Carrusel"></div>
        <div class="Carrusel"></div>
        <div class="Carrusel"></div>

        <!-- Flechas a la izquierda por cada imagen -->
        <label for="Slider3" class="ArrowLeft Arrow1">❮</label>
        <label for="Slider1" class="ArrowLeft Arrow2">❮</label>
        <label for="Slider2" class="ArrowLeft Arrow3">❮</label>

        <!-- Flechas a la derecha por cada imagen -->
        <label for="Slider2" class="ArrowRight Arrow1">❯</label>
        <label for="Slider3" class="ArrowRight Arrow2">❯</label>
        <label for="Slider1" class="ArrowRight Arrow3">❯</label>

    </div>
    <br>
    <div class="contenedor-imagen">
        
        <img src="img/cafeteria2.jpg" alt="Imagen" width="1250">
        <div class="texto-encima">
            <h3>Historia de El Rincón del Café</h3>
            <br>
        <p>¡Bienvenido a nuestra acogedora cafetería, "El Rincón del Café"! Aquí en el corazón de la ciudad, 
            te ofrecemos una experiencia cálida y auténtica, donde el café es preparado con amor y dedicación.</p>
        <button class="btn" onclick="window.location.href='../Otros/historia.php'">Leer más</button>
    </div>
    
    <br>
    </div>
    <h1>&nbsp</h1>
    <br>
    <div class="gallery">
  <div class="image-container">
    <a href="Otros/reseña.php">
      <img src="../img/reseña.jpg" alt="Imagen 1">
      <div class="overlay">
        <center><p class="text">Reseñas</p></center>
      </div>
    </a>
  </div>
  <div class="image-container">
    <a href="codigo2.php">
      <img src="../img/bbdd.jpg" alt="Imagen 2">
      <div class="overlay">
        <center><p class="text">Diagrama</p></center>
      </div>
    </a>
  </div>
  <div class="image-container">
    <a href="Otros/Ubicacion.php">
      <img src="../img/ubicacion.jpg" alt="Imagen 3">
      <div class="overlay">
        <center><p class="text">Ubicación</p></center>
      </div>
    </a>
  </div>
</div>

    
    
    </div>
  

        <h1>&nbsp</h1>
    </div>
		</body>
        <footer class="cafe-footer">
  <div class="container">
    <div class="footer-content">
      <h3 class="footer-heading">Politica de privacidad</h3>
      <p class="footer-address">Aviso legal</p>
      
    </div>
    <div class="footer-content">
      <h3 class="footer-heading">Horario</h3>
      <p class="footer-hours">Lun - Vie: 7am - 9pm</p>
      <p class="footer-hours">Sáb - Dom: 8am - 8pm</p>
    </div>
    <div class="footer-content">
      <h3 class="footer-heading"></h3>
      <ul class="footer-social">
        <img src="../img/logo.webp" width="150" height="150"> 
        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
      </ul>
    </div>
  </div>
</footer>

</html>