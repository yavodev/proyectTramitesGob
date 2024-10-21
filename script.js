// Ejemplo simple de validación
document.querySelector('form').addEventListener('submit', function(e) {
    alert('Tu solicitud ha sido enviada correctamente.');
    e.preventDefault();
});


document.querySelector('.menu-button').addEventListener('click', function() {
    document.querySelector('.menu').classList.toggle('show');
});

 // Función para validar el formulario antes de enviarlo
 function validarFormulario() {
    var archivo = document.getElementById("archivo").value;
    if (archivo == "") {
        alert("Por favor, debes cargar el documento de identidad.");
        return false; // Evitar el envío del formulario
    }
    return true; // Permitir el envío del formulario
}
