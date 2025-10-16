<?php
session_start();
session_unset();
session_destroy();
// header('Location: ../index.php');
    header('Location: http://localhost/Proyecto_marcas/index.php');

?>