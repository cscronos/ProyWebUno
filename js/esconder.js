// con la lectura de la funcion
// identifica el div que quiere mostrar por
// pantalla, miestras los demas se van con display none
function ActivDiv(Numero) {
    if (Numero == 1) {
        document.getElementById("1Div").style.display = "block";
        document.getElementById("2Div").style.display = "block";
    } else {
        document.getElementById("1Div").style.display = "none";
        document.getElementById("2Div").style.display = "none";
    }

    if (Numero == 3) {
        document.getElementById("3Div").style.display = "block";
    } else {
        document.getElementById("3Div").style.display = "none";
    }

    if (Numero == 6) {
        document.getElementById("6Div").style.display = "block";
    } else {
        document.getElementById("6Div").style.display = "none";
    }
}
