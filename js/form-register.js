async function enviarFormulario(datosFormulario) {
    const response = await fetch("../../rsc/php_session/register.php", {
        method: "POST",
        body: datosFormulario,
    });

    const respuesta = await response.text();
    const obj = JSON.parse(respuesta);

    // SALIO BIEN
    if (!obj.error) {
        document.getElementById(
            "respuesta"
        ).innerHTML = `${obj.success}, en 3 seg cargara el login. espere:)`;

        setTimeout(cambiarContador, 1000);
        setTimeout(cambiarContador, 2000);
        setTimeout(cambiarContador, 3000);
        setTimeout(cambiarWindow, 3500);
        return;
    }

    // ERROR
    if (!obj.success) {
        document.getElementById("respuesta").innerHTML = obj.error;
        return;
    }
}

var contador = 1;
function cambiarContador() {
    console.log(contador);
    document.getElementById("contador").innerHTML = contador;
    contador += 1;
    return contador;
}

function cambiarWindow() {
    console.log("4 second??");
    window.location.href = "../login/login.php";
}

document
    .getElementById("form-register")
    .addEventListener("submit", function (event) {
        event.preventDefault();

        const formulario = document.getElementById("form-register");
        const formularioData = new FormData(formulario);
        enviarFormulario(formularioData);
    });
