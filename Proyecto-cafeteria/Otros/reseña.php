<?php
session_start();

if (!isset($_SESSION['nombre']) || !isset($_SESSION['contraseña'])) {
  header("Location: ../login.php");


}




?>





<!DOCTYPE html>
<html>
<head>
    <title>Reseñas de El Rincón del Café</title>
    <link rel="stylesheet" href="reseña.css">
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
<form id="myForm">
    <h1>¡Comparte tu experiencia y puntúa nuestra cafetería!</h1>
    <p>En El Rincón del Café, valoramos la opinión de nuestros clientes y queremos conocer tus comentarios sobre tu visita a nuestra cafetería. ¿Disfrutaste de nuestro delicioso café o de nuestros sabrosos postres? ¿Cómo fue el servicio? ¿Qué te pareció el ambiente? Queremos saberlo todo.</p>
    <p>Por favor, toma un momento para dejarnos tu reseña y puntuación:</p>
    <form action="Pruebalogin.php" method="post">
        <label for="reseña">Tu reseña:</label><br>
        <textarea id="reseña" name="reseña" rows="4" cols="50" required=""></textarea><br>
        
        <label for="puntuacion">Puntuación:</label>
        <div class="emojis">
            <input type="radio" id="emoji5" name="puntuacion" value="5">
            <label for="emoji5">&#x1F601;</label>
            <input type="radio" id="emoji4" name="puntuacion" value="4">
            <label for="emoji4">&#x1F642;</label>
            <input type="radio" id="emoji3" name="puntuacion" value="3">
            <label for="emoji3">&#x1F610;</label>
            <input type="radio" id="emoji2" name="puntuacion" value="2">
            <label for="emoji2">&#x1F625;</label>
            <input type="radio" id="emoji1" name="puntuacion" value="1">
            <label for="emoji1">&#x1F614;</label>
        </div>

        <input type="submit" value="Enviar reseña">
        <br>
        
        </form>
    </form>


    

    <script>
                document.getElementById("myForm").addEventListener("submit", function(event) {
                  // Prevenir el envío del formulario
                event.preventDefault();
  
                  // Mostrar un mensaje de confirmación
              if (confirm("¿Estás seguro de que deseas publicar esta reseña?")) {
                  // Mostrar otro mensaje después de la confirmación
                alert("¡Ya se ha colgado tu reseña! Gracias por tu apoyo y opinion");
    
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
</body>
</html>


