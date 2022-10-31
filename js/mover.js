// Detectamos el nav y el contenido:
let elNavbar = document.getElementById("myFun");
let elMain = document.getElementsByClassName("myFun1");
let navChico = document.getElementsByClassName("nav-chico");

window.onscroll = function () {
    scrollFunction();
};

// Dado un problema dado cuando el nav se FIXEA
// se le agrega a los pixeles a los DIV
// para que no se tepeen hacia arriba

// Esta funcion detecta el scroll
// fixea el nav en una pos determinada
function scrollFunction() {
    if (
        document.body.scrollTop > 160 ||
        document.documentElement.scrollTop > 160
    ) {
        elNavbar.style.position = "fixed";
        elMain[0].style.marginTop = "49px";
        elMain[1].style.marginTop = "49px";
        elMain[2].style.marginTop = "49px";
        elMain[3].style.marginTop = "49px";
        navChico[0].style.position = "fixed";
        navChico[0].style.marginTop = "-110px";
    } else {
        elNavbar.style.position = "relative";
        elMain[0].style.marginTop = "0px";
        elMain[1].style.marginTop = "0px";
        elMain[2].style.marginTop = "0px";
        elMain[3].style.marginTop = "0px";
        navChico[0].style.position = "absolute";
        navChico[0].style.marginTop = "0px";
    }
}
