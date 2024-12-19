document.getElementById('registerForm').addEventListener('submit', function (event) {
    const emailInput = document.getElementById('email');
    const emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

    if (!emailPattern.test(emailInput.value)) {
        alert('Por favor, introduce un correo electrónico válido de Gmail.');
        event.preventDefault(); // Previene el envío del formulario
    }
});