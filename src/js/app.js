document.addEventListener('DOMContentLoaded', function() {

    eventListeners();
    darkMode();
});

function darkMode() {
    const botonDarkMode = document.querySelector('.dark-mode-boton');

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    if( prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function () {
        if( prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

    // Muestra Campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]')
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar'); // toggle agrega o remueve la calse 'mostrar' a un elemento html

}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');

    if(e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
                <label for="telefono">numero de Telefono: </label>
                <input placeholder="Tu Telefono" type="tel" id="telefono" name="contacto[telefono]">

                <p>Elija la fecha y la hora para la llamada</p>

                <label for="fecha">Fecha: </label>
                <input  type="date" id="fecha" name="contacto[fecha]">

                <label for="hora">Hora: </label>
                <input  type="time" id="hora" min="9:00" max="18:00" name="contacto[hora]">
        `;
    } else {
        contactoDiv.innerHTML = `
                <label for="email">E-mail: </label>
                <input placeholder="Tu Email" type="email" id="email" name="contacto[email]" required>
        `;
    }
}