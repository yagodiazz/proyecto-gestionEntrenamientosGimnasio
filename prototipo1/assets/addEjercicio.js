import './styles/addEjercicio.css';
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