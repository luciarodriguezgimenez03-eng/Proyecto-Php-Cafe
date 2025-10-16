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

// Comprobamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $opinion = $_POST["opinion"];
    $puntuacion = $_POST["puntuacion"];
    $id_usuario = $_SESSION["id"]; // Obtenemos el id de usuario de la sesión

    // Obtenemos el nombre de usuario de la tabla de usuarios
    $query_usuario = "SELECT nombre FROM usuario WHERE id = $id_usuario";
    $result_usuario = mysqli_query($con, $query_usuario);
    $row_usuario = mysqli_fetch_assoc($result_usuario);
    $nombre_usuario = $row_usuario["nombre"];

    // Insertamos la opinión en la tabla de opiniones
    $query_opinion = "INSERT INTO opinion (opinion, puntuacion, id_usuario, nombre_usuario) VALUES ('$opinion', '$puntuacion', '$id_usuario', '$nombre_usuario')";
    $result_opinion = mysqli_query($con, $query_opinion);

    if ($result_opinion) {
        echo "Opinión guardada con éxito.";
    } else {
        echo "Error al guardar la opinión: " . mysqli_error($con);
    }
}
?>




<!DOCTYPE html>
<html>
<head>
    <title>Reseñas de [Nombre de la cafetería]</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<form id="myForm">
    <h1>¡Comparte tu experiencia y puntúa nuestra cafetería!</h1>
    <p>En [Nombre de la cafetería], valoramos la opinión de nuestros clientes y queremos conocer tus comentarios sobre tu visita a nuestra cafetería. ¿Disfrutaste de nuestro delicioso café o de nuestros sabrosos postres? ¿Cómo fue el servicio? ¿Qué te pareció el ambiente? Queremos saberlo todo.</p>
    <p>Por favor, toma un momento para dejarnos tu reseña y puntuación:</p>
    <form action="Pruebalogin.php" method="post">
        <label for="reseña">Tu reseña:</label><br>
        <textarea id="reseña" name="reseña" rows="4" cols="50"></textarea><br>
        
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
                window.location.href = "../webinicial.php";
    
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


