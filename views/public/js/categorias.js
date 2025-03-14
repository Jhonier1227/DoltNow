document.addEventListener("DOMContentLoaded", function () {
    cargarCategorias();

    document.getElementById("formCategoria").addEventListener("submit", function (event) {
        event.preventDefault();

        const nombreCategoria = document.getElementById("nombreCategoria").value.trim();

        if (!nombreCategoria) {
            alert("Por favor, ingresa un nombre para la categoría.");
            return;
        }

        fetch("../controllers/agregar_categoria.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `nombre=${encodeURIComponent(nombreCategoria)}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById("formCategoria").reset();
                cargarCategorias();
            } else {
                alert("Error al agregar la categoría.");
            }
        });
    });
});

function cargarCategorias() {
    fetch("../controllers/cargar_categorias.php")
        .then(response => response.json())
        .then(data => {
            const listaCategorias = document.getElementById("listaCategorias");
            const selectCategoria = document.getElementById("categoria");
            listaCategorias.innerHTML = "";
            selectCategoria.innerHTML = '<option value="">Sin categoría</option>';

            data.forEach(categoria => {
                const li = document.createElement("li");
                li.classList.add("list-group-item");
                li.innerHTML = `${categoria.nombre}`;
                listaCategorias.appendChild(li);

                const option = document.createElement("option");
                option.value = categoria.id_c;
                option.textContent = categoria.nombre;
                selectCategoria.appendChild(option);
            });
        });
}
