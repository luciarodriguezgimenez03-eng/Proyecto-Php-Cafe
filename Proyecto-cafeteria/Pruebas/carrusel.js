let carruselInner = document.querySelector('.carrusel-inner');
let carruselWidth = carruselInner.offsetWidth;
let carruselImages = document.querySelectorAll('.carrusel img');

carruselInner.style.transform = 'translateX(0)';

function cambiarImagen() {
  carruselInner.style.transform = `translateX(-${carruselWidth}px)`;
  carruselInner.appendChild(carruselImages[0]);
  carruselInner.removeEventListener('transitionend', cambiarImagen);
  setTimeout(() => {
    carruselInner.style.transition = 'none';
    carruselInner.style.transform = 'translateX(0)';
    setTimeout(() => {
      carruselInner.style.transition = '';
      carruselInner.addEventListener('transitionend', cambiarImagen);
    }, 100);
  }, 500);
}

carruselInner.addEventListener('transitionend', cambiarImagen);

let intervalo = setInterval(cambiarImagen, 3000); // Cambiar imagen cada 3 segundos

// Detener el carrusel al pasar el cursor por encima
carruselInner.addEventListener('mouseover', () => {
  clearInterval(intervalo);
});

// Reanudar el carrusel al quitar el cursor
carruselInner.addEventListener('mouseout', () => {
  intervalo = setInterval(cambiarImagen, 3000);
});

// Ajustar tamaño de las imágenes al ser añadidas al carrusel
carruselImages.forEach((img) => {
  img.style.maxHeight = '200px'; // Tamaño máximo deseado para las imágenes
});
