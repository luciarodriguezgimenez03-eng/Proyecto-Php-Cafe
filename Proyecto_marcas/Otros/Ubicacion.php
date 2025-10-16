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
    <link rel="stylesheet" href="Ubicacion.css">
    <title>Document</title>
</head>
<body>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Boûlan</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
  <script src='main.js'></script>
  <!-- foundation-float.min.css: Compressed CSS with legacy Float Grid -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation-float.min.css"
    integrity="sha256-4ldVyEvC86/kae2IBWw+eJrTiwNEbUUTmN0zkP4luL4=" crossorigin="anonymous">

  <!-- foundation-prototype.min.css: Compressed CSS with prototyping classes -->
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation-prototype.min.css"
    integrity="sha256-BiKflOunI0SIxlTOOUCQ0HgwXrRrRwBkIYppEllPIok=" crossorigin="anonymous">

  <!-- foundation-rtl.min.css: Compressed CSS with right-to-left reading direction -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation-rtl.min.css"
    integrity="sha256-F+9Ns8Z/1ZISonBbojH743hsmF3x3AlQdJEeD8DhQsE=" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css/landing.css">
  <link rel="stylesheet" href="font.css">
  <link rel="shortcut icon" href="img/bread_food_4690.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&display=swap" rel="stylesheet">
</head>

<body>
  <main>

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

    <!-------------------------------------------------------------------UBICATION---------------------------------------------------------->

    <a name="ubicacion">
      <section class="ubicacion">
    </a>
    <div class="contenedor">
      <h2 class="titulo">Ubicación</h2>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2192.371354340237!2d-80.13905709766227!3d26.1266693721585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d900f91d01e6f5%3A0xbf8639531351a594!2sTacoCraft%20Taqueria%20%26%20Tequila%20Bar!5e0!3m2!1ses!2sve!4v1627151075505!5m2!1ses!2sve"
        width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      <table>
        <tbody>
          <tr>
            <th>Dirección:</th>
            <td>510 N Federal Hwy, Fort Lauderdale, FL 33301, Estados Unidos</td>
            <th>Horario:</th>
            <td>Lun - Vie: 7am - 9pm</td>

            <td>Sáb - Dom: 8am - 8pm</td>
          </tr>
        </tbody>
      </table>
    </div>
    </section>

    <!-----------------------------------------------------------------CONTACT---------------------------------------------------------->

    <a name="contacto">
      <section class="contacto">
    </a>
    <form id="myForm">
    <div class="contenedor">
      <h2 class="titulo">Contacto</h2>
      <form class="" action="" method="post">
        <label for="nombre">Nombre*</label>
        <input type="text" name="nombre" value="" placeholder="nombre" required>

        <form class="" action="" method="post">
          <label for="nombre">Apellido*</label>
          <input type="text" name="apellido" value="" placeholder="apellido" required>

          <form class="" action="" method="post">
            <label for="nombre">Correo electrónico*</label>
            <input type="email" name="correo electrónico" value="" placeholder="correo electronico" required>

            <form class="" action="" method="post">
              <label for="nombre">Mensaje*</label>
              <textarea name="mensaje" rows="4" cols="80" placeholder="escribe tu mensaje"></textarea>
              <button type="submit" name="button" class="button">Enviar</button>
              </form>

              <script>
                document.getElementById("myForm").addEventListener("submit", function(event) {
                  // Prevenir el envío del formulario
                event.preventDefault();
  
                  // Mostrar un mensaje de confirmación
              if (confirm("¿Estás seguro de que deseas enviar el formulario?")) {
                  // Mostrar otro mensaje después de la confirmación
                alert("¡El formulario ha sido enviado exitosamente!");
    
                  // Aquí puedes ejecutar el código que deseas
    
                  // Ejemplo: Redireccionar a otra página
                window.location.href = "../index.php";
    
                // Ejemplo: Ejecutar una función
                miFuncion();
              } else {
                  // Si el usuario cancela, no se envía el formulario
                return false;
                }
              });


              </script>
    </div>
    </form>
    </section>

    <!--------------------------------------------------------SOCIAL MEDIA--------------------------------------------------->

    <div class="social-bar">
      <a href="https://es-la.facebook.com/" class="icon icon-facebook" target="_blank"></a>
      <a href="https://twitter.com/?lang=es" class="icon icon-instagram" target="_blank"></a>
      <a href="https://www.instagram.com/?hl=es" class="icon icon-twitter" target="_blank"></a>
    </div>

    

  </main>
</body>
    
</body>
</html>