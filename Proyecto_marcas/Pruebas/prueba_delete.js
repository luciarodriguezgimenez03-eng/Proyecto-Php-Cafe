function eliminarRegistro(id) { 
    // Mostramos la ventana emergente para confirmar la eliminación
    let confirmacion = confirm(`¿Está seguro que desea eliminarlo?`);
    
    // Si se acepta la confirmación, redireccionamos a la página PHP encargada de eliminar el registro
    if (confirmacion) {
      window.location.href = `../Delete.php?id=${id}`;
    }
  }