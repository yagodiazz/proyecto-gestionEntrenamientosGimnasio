import './styles/usuarios.css';
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


//Animación botones

document.body.addEventListener("mouseover", (e) => { 
    if (e.target.tagName == "BUTTON" && e.target.className!="config") {
        e.target.style.backgroundColor = "#ced3ff";
    } 
})

document.body.addEventListener("mouseout", (e) => {  
    if (e.target.tagName == "BUTTON" && e.target.className!="config" && e.target.className!="navbar-toggler") {
        e.target.style.backgroundColor = "white";
    } 
})