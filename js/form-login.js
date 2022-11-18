async function enviarFormulario(datosFormulario) {
    const response = await fetch("../../rsc/php_session/register.php", {
        method: "POST",
        body: datosFormulario,
    });

    const respuesta = await response.text();
    const obj = JSON.parse(respuesta);
}

document
    .getElementById("form-login")
    .addEventListener("submit", function (event) {
        event.preventDefault();

        const formulario = document.getElementById("form-login");
        const formularioData = new FormData(formulario);
        enviarFormulario(formularioData);
    });
