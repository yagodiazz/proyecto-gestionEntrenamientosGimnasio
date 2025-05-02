import './styles/ejercicios.css';

//Input filtrado
let inputBuscar = document.querySelector(".buscar");
let ejercicios = document.querySelector(".ejercicios");

inputBuscar.addEventListener("input", (e) => {
    const searchTerm = e.target.value.toLowerCase();
    for (const i of ejercicios.querySelectorAll(".ejercicio")) {
        let txt = i.querySelector("a").innerText.toLowerCase();
        if (txt.includes(searchTerm)) {
            i.style.display = ""; 
        } else {
            i.style.display = "none"; 
        }
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