$(document).ready(function() {
    $('#modo-btn').click(function() {
        $('body').toggleClass('dark-mode');
        localStorage.setItem("modo", $('body').hasClass('dark-mode') ? "oscuro" : "claro");
        $('#modo-btn').text($('body').hasClass('dark-mode') ? "☀️" : "🌙");
    });
    if (localStorage.getItem("modo") === "oscuro") {
        $('body').addClass('dark-mode');
        $('#modo-btn').text("☀️");
    }
});

document.addEventListener("DOMContentLoaded", function () {
    cargarTareas();

    document.getElementById("formTarea").addEventListener("submit", function (event) {
        event.preventDefault();

        const idTarea = document.getElementById("idTarea").value;
        const titulo = document.getElementById("titulo").value.trim();
        const descripcion = document.getElementById("descripcion").value.trim();

        if (!titulo || !descripcion) {
            alert("Por favor, completa todos los campos.");
            return;
        }

        let url = "../controllers/agregar_tarea.php";
        let body = `titulo=${encodeURIComponent(titulo)}&descripcion=${encodeURIComponent(descripcion)}`;

        // Si hay un ID, significa que se está editando una tarea existente
        if (idTarea) {
            url = "../controllers/editar_tarea.php";
            body += `&id=${idTarea}`;
        }

        fetch(url, {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: body
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById("formTarea").reset();
                document.getElementById("idTarea").value = "";
                cargarTareas();
            } else {
                alert("Error al guardar la tarea.");
            }
        });
    });
});

// Cargar tareas desde el servidor y mostrarlas en la interfaz
function cargarTareas() {
    fetch("../controllers/cargar_tareas.php")
        .then(response => response.json())
        .then(data => {
            const listaTareas = document.getElementById("listaTareas");
            listaTareas.innerHTML = "";

            data.forEach(tarea => {
                const li = document.createElement("li");
                li.classList.add("task-item");
                li.innerHTML = `
                    <span class="${tarea.completado ? 'completado' : ''}">${tarea.titulo}</span>
                    <button onclick="editarTarea(${tarea.id}, '${tarea.titulo}', '${tarea.descripcion}')" class="btn btn-editar">✏</button>
                    <button onclick="completarTarea(${tarea.id})" class="btn btn-completar">✔</button>
                    <button onclick="eliminarTarea(${tarea.id})" class="btn btn-eliminar">❌</button>
                `;
                listaTareas.appendChild(li);
            });
        });
}

// Marcar una tarea como completada o desmarcarla
function completarTarea(id) {
    fetch(`../controllers/completar_tarea.php?id=${id}`, { method: "GET" })
        .then(response => response.json())
        .then(data => {
            if (data.success) cargarTareas();
        });
}

// Eliminar una tarea
function eliminarTarea(id) {
    if (confirm("¿Estás seguro de que quieres eliminar esta tarea?")) {
        fetch(`../controllers/eliminar_tarea.php?id=${id}`, { method: "GET" })
            .then(response => response.json())
            .then(data => {
                if (data.success) cargarTareas();
            });
    }
}

// Función para editar una tarea (carga los datos en el formulario)
function editarTarea(id, titulo, descripcion) {
    document.getElementById("idTarea").value = id;
    document.getElementById("titulo").value = titulo;
    document.getElementById("descripcion").value = descripcion;
}
