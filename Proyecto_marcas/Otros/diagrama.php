<?php
    session_start();

    if (!isset($_SESSION['nombre']) || !isset($_SESSION['contraseña'])) {
        header("Location: ../login.php");


    }



?>


<!DOCTYPE html>
<html>
<head>
    <title>Cafetería</title>
    <style>
        body {
            background-color: #F5EFE6; /* Color de fondo crema */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            color: #8B4513; /* Color del título en café */
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .content img {
            width: 100%;
            max-width: 800px;
            margin-bottom: 20px;
        }

        .content h1 {
            color: #8B4513; /* Color del título en café */
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #8B4513; /* Color del botón en café */
            color: #FFFFFF; /* Color del texto del botón en blanco */
            text-decoration: none;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #A0522D; /* Color del botón en café más oscuro al hacer hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>DIAGRAMAS</h1>
        </div>
        <div class="content">
            <h1>DIAGRAMA ENTIDAD-RELACIÓN</h1>
            <img src="../img/diagrama_ER.png" alt="Imagen 1">
            <h1>DIAGRAMA UML</h1>
            <img src="../img/Diagrama_uml.png" alt="Imagen 2">
            
            <a href="../index.php" class="btn">Volver al inicio</a>
        </div>
    </div>
</body>
</html>