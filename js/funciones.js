async function enviarFormulario(datosFormulario) {
    const response = await fetch("../../rsc/crud/enviarFormulario.php", {
        method: "POST",
        body: datosFormulario,
    });

    const respuesta = await response.text();
    const obj = JSON.parse(respuesta);
    console.log("hola");

    document.getElementById("respuesta").innerHTML = obj.success;
    document.getElementById("mensaje").value = "";
}

document
    .getElementById("formulario")
    .addEventListener("submit", function (event) {
        event.preventDefault();

        const formulario = document.getElementById("formulario");
        const formularioData = new FormData(formulario);
        enviarFormulario(formularioData);
    });
