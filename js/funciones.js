async function enviarFormulario(datosFormulario) {
    const response = await fetch("crud/enviarFormulario.php", {
        method: "POST",
        body: datosFormulario,
    });

    const respuesta = await response.text();
    const obj = JSON.parse(respuesta);

    document.getElementById("respuesta").innerHTML = obj.success;
}

document
    .getElementById("formulario")
    .addEventListener("submit", function (event) {
        event.preventDefault();
        const formulario = document.getElementById("formulario");
        const formularioData = new FormData(formulario);
        enviarFormulario(formularioData);
    });
