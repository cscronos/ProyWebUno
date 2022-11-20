//
//
// ______________________
// CRUD READ COMENTARIO
async function readData() {
    console.log("click button eliminar");
    const response = await fetch("../../rsc/crud/readData.php", {
        method: "POST",
    });

    const respuesta = await response.text();
    const obj = JSON.parse(respuesta);
    // console.log(obj[0].id);

    let body = "";
    for (let i = 0; i < obj.length; i++) {
        body += `<tr class="tabla-body-tr">
                        <td>${obj[i].id}</td>
                        <td>${obj[i].user}</td>
                        <td>${obj[i].mensaje}</td>
                        <td><button class="button-eliminar" onclick="borrarComentario(${obj[i].id})"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAZNJREFUSEvFluFRwzAMhd+bADYAJoANgA3YADoBIwAjMAFlA5gAmICyAWwAE4h7OTvnOo7TKOlF/1rH+mTpSTaxkHEhLopgM7sCcDpTUBuSr7mvDtjM1gCuZ4JGN2uSq9TnFtjMzgB8zgyN7k5IfscfOfgCwNuewJck3z3gLwDHAA56AvsDoBP1acMFFlTZEFhR53BBtS6w1ktwF7jdFHSQwhsoyY0yYWZ95XKBfwFoY3QuEcZ6pVD9L40cFsrhAstPCY4smD6o9rvBHXg8VUh/DToZLAc/JCWy1sxMojoaaMNJJ94SUnbiktrTWNzgXL0SUl7jGtwFLkHjhCupvTRkXOAVSV0e6tO8ZXK13wB4mqudGufBWUm9Q+uTVC3nstJwiK1WW3eleo4Lqwpe5j4O4tnHC+SZpETXWu3N1fRpYqrt7UDOH8NMTz/Tm+sl3zfqlWlm9wDueuAPJLW+k40CV0rRSeUQfTQ4wDUaz4PzD5K6/EeZF6x6pw+B2OM7w13gcOpmkJAcDW327RzizB8uBv4HrI/iHx7d41wAAAAASUVORK5CYII="/></buttos></td>`;
    }
    document.getElementById("div-table-eliminar").style.display = "flex";
    document.getElementById("data").innerHTML = body;
}

// ERROR
// ----- donde no esta el id, daña el addEvent:(
// document.getElementById("eliminarData").addEventListener("click", function () {
//     readData();
// });
// ----- solucion; un onClick();
function readDataButton() {
    readData();
}

//
//
// ______________________
// CRUD BORRAR COMENTARIO

async function borrarComentario(id) {
    console.log("eliminaste un comentario");
    const formulario = document.getElementById("form-invi-1");
    const formularioData = new FormData(formulario);
    formularioData.append("id_comentario", id);
    const response = await fetch("../../rsc/crud/eliminar.php", {
        method: "POST",
        body: formularioData,
    });

    // para que se actualice la lista
    readData();

    document.getElementById("respuesta-eliminar").innerHTML =
        "<p>Se borro correctamente</p>";
}

//
//
// ______________________
// CRUD UPDATE COMENTARIO

async function updateData() {
    console.log("click button editar");
    const response = await fetch("../../rsc/crud/readData.php", {
        method: "POST",
    });

    const respuesta = await response.text();
    const obj = JSON.parse(respuesta);
    // console.log(obj[0].id);

    let body = "";
    for (let i = 0; i < obj.length; i++) {
        body += `<tr class="tabla-body-tr">
                        <td>${obj[i].id}</td>
                        <td>${obj[i].user}</td>
                        <td>${obj[i].mensaje}</td>
                        <td><button class="button-update" onclick="editarComentarioButton(${obj[i].id})"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAARNJREFUSEvN1mENAjEMBeB3CkACEpAASgAFSACcgAIkYAEpOIC8ZEuW3drrtpK7/SPk9tHXrceAmdYwkwtveB0K+UwV5AkTfQVwD0DFveCIbgP8BqDiXvAVwCWLV8W9YJp3AIcMvwHgjxqtHpjxngFw87hS/AHgKB2yVjjtKbFThvOjiPLLFjg/SDHmFJ+6TdVwCU1jNuM1FWsocbWneQRW2BW19tgdtcCcRE8AG+G0VMWb7qFFTZSzNw7+3G5GtYr/imow3ywr73gtUX8FlPeUk6p7ST0uwW6oFnUOu6IavEuyZL/5bnVd1snliloGiDsYN1xcxdJ1ak1gVGDNdWpFiy2V4OIftA55tN/ietxRnO3RH63uLh+7k92sAAAAAElFTkSuQmCC"/></buttos></td>`;
    }
    document.getElementById("div-table-editar").style.display = "flex";
    document.getElementById("data2").innerHTML = body;
}

document.getElementById("updateData").addEventListener("click", function () {
    updateData();
});

let id = "";
async function editarComentarioButton(a) {
    id = a;
    document.getElementById("div-form-editar").style.display = "flex";
}

async function editarComentario() {
    const formulario = document.getElementById("form-update");
    const formularioData = new FormData(formulario);
    formularioData.append("id_comentario", id);
    const response = await fetch("../../rsc/crud/update.php", {
        method: "POST",
        body: formularioData,
    });
    document.getElementById("mensaje2").value = "";
    updateData();
    console.log("se updateo");
}

document
    .getElementById("form-update")
    .addEventListener("submit", function (event) {
        event.preventDefault();
        editarComentario();
    });
