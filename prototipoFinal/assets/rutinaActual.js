import './styles/rutinaActual.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
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
let opciones = document.querySelector(".opciones");
let btnOpciones = document.querySelector("#not_admin");
let oculto = true;
configuracion.addEventListener("click", (e) => {
    if (e.target.className == "config") {
        if (oculto == true) {
            oculto = false;
            opciones.style.visibility="visible";
        } else {
            oculto = true;
            opciones.style.visibility="hidden";
        }

    }
});

//Ocultar boton de configuración
if (btnOpciones == null) {
    configuracion.removeAttribute("hidden");
} else {
    configuracion.setAttribute("hidden", true);
}


//Redirección

document.querySelector('.finalizarRutina').addEventListener('click', function () {
    var url = this.getAttribute('data-url');
    window.location.href = url;
});


//Animación botones

document.body.addEventListener("mouseover", (e) => {
    if (e.target.tagName == "BUTTON" && e.target.className != "config" && e.target.classList.contains("navbar-toggler") != true) {
        e.target.style.backgroundColor = "orange";
    }
});

document.body.addEventListener("mouseout", (e) => {
    if (e.target.tagName == "BUTTON" && e.target.className != "config" && e.target.classList.contains("navbar-toggler") != true) {
        e.target.style.backgroundColor = "white";
    }
});


//Ampliar cartas

function getCardElement(target) {
    if (target.classList.contains("card")) {
        return target;
    } else if (target.parentElement && target.parentElement.classList.contains("card")) {
        return target.parentElement;
    } else if (target.parentElement && target.parentElement.parentElement && target.parentElement.parentElement.classList.contains("card")) {
        return target.parentElement.parentElement;
    } else if (target.parentElement && target.parentElement.parentElement && target.parentElement.parentElement.parentElement && target.parentElement.parentElement.parentElement.classList.contains("card")) {
        return target.parentElement.parentElement.parentElement;
    }
    else if (target.parentElement && target.parentElement.parentElement && target.parentElement.parentElement.parentElement && target.parentElement.parentElement.parentElement.parentElement && target.parentElement.parentElement.parentElement.parentElement.classList.contains("card")) {
        return target.parentElement.parentElement.parentElement.parentElement;
    }
    return null;
}

document.body.addEventListener("mouseover", (e) => {
    const cardElement = getCardElement(e.target);
    if (cardElement) {
        cardElement.style.transform = "scale(1.15)";
        cardElement.style.zIndex = "1";
    }
});

document.body.addEventListener("mouseout", (e) => {
    const cardElement = getCardElement(e.target);
    if (cardElement) {
        cardElement.style.transform = "scale(1)";
        cardElement.style.zIndex = "0";
    }
});