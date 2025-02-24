document.addEventListener("DOMContentLoaded",() =>
{
    cargarTareas();

    document.getElementById("formTarea").addEventListener
    ("submit",async(event)=>
    {
        event.preventDefault();
        await manejarSolicitud("/controllers/agregar_tarea.php","POST",{
        titulo:document.getElementById("titulo").value
        });
        document.getElementById("descripcion").value
    });
});

async function cargarTareas() {

    const listaTareas = document.getElementById("listaTareas");
    listaTareas.innerHTML="";

    const data = await manejarSolicitud("/controllers/cargar_tarea.php");
    data.array.forEach(tarea => {
        listaTareas.innerHTML += `
        <li>${Tareas.titulo}
        <a href="#" onclick="eliminarTarea(${tarea.id})"
        class="btn-secondary">eliminar</a>
        </li>;`
    });
    
}

function eliminarTarea(id){
    manejarSolicitud(`/controllers/eliminar_tarea.php? 
        id=${id}`,"GET").then(() => cargarTareas());
}

async function manejarSolicitud(url,method = "GET", datos = null) {
    const opciones = {method};
    if (datos) {
        opciones.headers = {"Content-Type" : "application/x-www-form-urlencoded"};
        opciones.body = new URLSearchParams(datos).toString();
    }
    const respuesta = await fetch(url,opciones);
    return respuesta.ok ? respuesta.json() : null;
    
}