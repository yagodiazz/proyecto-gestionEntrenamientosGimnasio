import './styles/ejercicios.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
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

//Ampliar cartas

function getCardElement(target) {
    if (target.classList.contains("card")) {
        return target;
    } else if (target.parentElement && target.parentElement.classList.contains("card")) {
        return target.parentElement;
    } else if (target.parentElement && target.parentElement.parentElement && target.parentElement.parentElement.classList.contains("card")) {
        return target.parentElement.parentElement;
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


//Iluminar ejercicios

document.body.addEventListener("mouseover", (e) => {
    if (e.target.classList.contains("enlace")) {
        e.target.style.borderBottom = "solid 2px white";
    }
});

document.body.addEventListener("mouseout", (e) => {
    if (e.target.classList.contains("enlace")) {
        e.target.style.borderBottom = "0px";
    }
});