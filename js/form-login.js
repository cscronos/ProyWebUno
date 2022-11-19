async function enviarFormulario(datosFormulario) {
    const response = await fetch("../../rsc/php_session/login.php", {
        method: "POST",
        body: datosFormulario,
    });

    const respuesta = await response.text();
    const obj = JSON.parse(respuesta);

    // success
    if (!obj.error) {
        document.getElementById(
            "respuesta"
        ).innerHTML = `${obj.success}, login correctamente)`;
        cambiarWindow();
    }
    // ERROR
    if (!obj.success) {
        document.getElementById("respuesta").innerHTML = obj.error;
        return;
    }
}

function cambiarWindow() {
    console.log("salio bien la cosa parece");
    window.location.href = "../index/index.php";
}

document
    .getElementById("form-login")
    .addEventListener("submit", function (event) {
        event.preventDefault();

        const formulario = document.getElementById("form-login");
        const formularioData = new FormData(formulario);
        enviarFormulario(formularioData);
    });
