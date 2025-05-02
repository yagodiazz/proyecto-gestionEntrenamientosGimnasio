import './styles/material.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

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
