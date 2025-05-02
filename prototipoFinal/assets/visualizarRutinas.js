import './styles/visualizarRutinas.css';
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
            opciones.style.visibility = "visible";
        } else {
            oculto = true;
            opciones.style.visibility = "hidden";
        }

    }
});

//Ocultar boton de configuración
if (btnOpciones == null) {
    configuracion.removeAttribute("hidden");
} else {
    configuracion.setAttribute("hidden", true);
}

//Mostrar/ocultar filtro

let btnFiltro = document.querySelector(".btnFiltro");
let filtro = document.querySelector(".filtro");
let verFiltro = false;
btnFiltro.addEventListener("click", (e) => {
    if (verFiltro == false) {
        btnFiltro.innerText = "Ocultar";
        filtro.style.display = "";
        verFiltro = true;
    } else {
        btnFiltro.innerText = "Filtros";
        filtro.style.display = "none";
        verFiltro = false;
    }
});


//Animación botones

document.body.addEventListener("mouseover", (e) => {
    if (e.target.tagName == "BUTTON" && e.target.className != "config" && e.target.classList.contains("navbar-toggler") != true) {
        e.target.style.backgroundColor = "orange";
    }
})

document.body.addEventListener("mouseout", (e) => {
    if (e.target.tagName == "BUTTON" && e.target.className != "config" && e.target.classList.contains("navbar-toggler") != true) {
        e.target.style.backgroundColor = "white";
    }
})


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