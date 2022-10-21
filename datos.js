// Despues de llamar la funcion
// lee los datos del archo php con fetch
// luego manejar los datos e imprimirlos con un formato
// definido
function llamarDatos() {
    fetch("FolderPHP/recivirDatos.php")
        .then((response) => response.json())
        .then((data) => mostrarData(data))
        .catch((error) => console.log(error));

    const mostrarData = (data) => {
        // console.log(data);
        let body = "";
        for (let i = 0; i < data.length; i++) {
            body += `<tr>
                        <td>${data[i].id}</td>
                        <td>${data[i].nombre}</td>
                        <td>${data[i].apellido}</td>
                    <td>${data[i].email}</td></tr>`;
        }
        document.getElementById("data").innerHTML = body;
    };
}
