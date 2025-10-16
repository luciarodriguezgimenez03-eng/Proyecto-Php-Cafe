// Archivo: archivo.js

function eliminarRegistro(id) { 
    // Mostramos la ventana emergente para confirmar la eliminación
    let confirmacion = confirm(`¿Está seguro que desea eliminar el registro con ID ${id}?`);
      
    // Si se acepta la confirmación, redireccionamos a la página PHP encargada de eliminar el registro
    if (confirmacion) {
      window.location.href = `http://localhost/Proyecto_marcas/admin/Categoria/eliminar_cat.php?id=${id}`;
     
      
    }
  }
  