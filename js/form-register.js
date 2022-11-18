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
        ).innerHTML = `${obj.success}, em 4 seg cargara el login. espere:)`;

        setTimeout(cambiarWindow, 4000);
        return;
    }

    // ERROR
    if (!obj.success) {
        document.getElementById("respuesta").innerHTML = obj.error;
        return;
    }
}

function cambiarWindow() {
    console.log("hola");
}

document
    .getElementById("form-register")
    .addEventListener("submit", function (event) {
        event.preventDefault();

        const formulario = document.getElementById("form-register");
        const formularioData = new FormData(formulario);
        enviarFormulario(formularioData);
    });
