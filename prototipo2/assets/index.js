import './styles/index.css';
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
            opciones.removeAttribute("hidden");
        } else {
            oculto = true;
            opciones.setAttribute("hidden", true);
        }

    }
});

//Ocultar boton de configuración
if (btnOpciones == null) {
    configuracion.removeAttribute("hidden");
} else {
    configuracion.setAttribute("hidden", true);
}


//Ampliar imágenes
document.body.addEventListener("mouseover", (e) => {
    if (e.target.classList.contains("imgEj")) {
        e.target.style.transform = "scale(1.3)";
        e.target.style.zIndex = "1";
    }
});

document.body.addEventListener("mouseout", (e) => {
    if (e.target.classList.contains("imgEj")) {
    e.target.style.transform = "scale(1)";
    e.target.style.zIndex = "0";
    }
});