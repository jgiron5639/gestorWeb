function mostrarFormulario(idFormulario) {
    var formulario1 = document.getElementById('formulario1');
    var formulario2 = document.getElementById('formulario2');
    var formularioAMostrar = document.getElementById(idFormulario);
  
    if (idFormulario === 'formulario1') {
      formulario1.style.display = 'block';
      formulario2.style.display = 'none';
    } else {
      formulario2.style.display = 'block';
      formulario1.style.display = 'none';
    }
  }

function irPagina(){
    window.location.href = 'home.php';
}