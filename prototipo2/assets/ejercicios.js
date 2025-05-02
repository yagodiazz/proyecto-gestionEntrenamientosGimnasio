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


//Visualizar footer

var footer = document.querySelector('.footer');
if (document.body.offsetHeight > window.innerHeight) {
    window.addEventListener('scroll', function () {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            footer.style.display = 'block'; // Muestra el footer cuando el usuario llega al final de la página
        } else {
            footer.style.display = 'none'; // Oculta el footer si no está al final de la página
        }
    });
} else {
    footer.style.display = 'block';
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

let enlace = document.querySelector(".enlace");

enlace.addEventListener("mouseover", (e) => {
    e.target.style.color = "#9ea7f9";
});

enlace.addEventListener("mouseout", (e) => {
    e.target.style.color = "black";
});