<!DOCTYPE html>
<html>
<head>
<style>
  /* Definimos el estilo del texto */
  .frase {
    color: black;
    border: 2px solid black; /* Agregamos un borde negro de 1px */
    padding: 5px; /* Agregamos un espacio de relleno de 5px */
    transition: color 0.3s ease, border-color 0.3s ease; /* Agregamos transiciones suaves para el cambio de color y borde */
  }
  
  /* Definimos el estilo del texto cuando se pasa el cursor sobre él */
  .frase:hover {
    color: red; /* Cambiamos el color a rojo cuando se pasa el cursor sobre el texto */
    border-color: red; /* Cambiamos el color del borde a rojo cuando se pasa el cursor sobre el texto */
  }
</style>
</head>
<body>

<!-- Agregamos un elemento de texto con la clase "frase" -->
<p class="frase">¡Texto con borde negro que se vuelve rojo al pasar el cursor!</p>

</body>
</html>
