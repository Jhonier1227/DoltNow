const params = new URLSearchParams(window.location.search);
if (params.has("error")){
    let mensaje = "";
        switch(params.get("error")){
            case "1":
               mensaje = "correo o contraseña incorrectos.";
                break;
            case "db":
               mensaje = "error en la base de datos. intentalo mas tardes. ";
                break;
            case "empty":
                mensaje = "todos los campos son obligatorios,";
                break;

        }
        document.getElementById("error-message").innerText = mensaje;

        document.getElementById("error-message").style.display = "block";

    }


