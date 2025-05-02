import './styles/rutinaActual.css';
//Puenteado de las sesiones de symfony con js
let btnfinalizarRutina = document.querySelector(".finalizarRutina");
console.log(btnfinalizarRutina);
btnfinalizarRutina.addEventListener("click", (e) => {
    if (e.target.className == "finalizarRutina") {
        console.log("ab");
        
        const sessionData = {
            formValue: false,
            RutinaActual: ''
        };

        fetch('http://localhost:8000/actualizar-datos-sesion', { 
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(sessionData)
        })
            .then(response => {

            if (response.ok) {
                console.log('La variable de sesión se actualizó correctamente.');
            } else {
                console.error('Error al actualizar la variable de sesión.');
            }
        })
        .catch(error => {
            console.error('Error en la solicitud AJAX:', error);
        });
    }
});

//Botón configuración
let configuracion = document.querySelector(".config");
let isAdmin = configuracion.getAttribute("id");
let opciones = document.querySelector(".opciones");
let oculto = true;
configuracion.addEventListener("click", (e) => {
    if (e.target.className == "config") {
        if (oculto == true) {
            oculto = false;
            opciones.removeAttribute("hidden");
        } else {
            oculto = true;
            opciones.setAttribute("hidden", false);
        }

    }
});

//Ocultar boton de configuración
if (isAdmin == "admin") {
    opciones.removeAttribute("hidden");
} else {
    configuracion.setAttribute("hidden", false);
}