<?php
/*
 * Maneja el registro de nuevos usuarios.
 * - Verifica si el correo ya esta registrado.
 * - Si no esta registrado, alamacena los datos del usuario en la base de datos.
 * - Muestra una alerta y redirige a login.html. 

*/



require '../config/conexion.php'; // conexión a la base de datos.

function registrarUsuario($pdo, $nombre, $correo, $contrasena) {
   
   
    try {
        // Encriptar la contraseña antes de guardarla en la base de datos
        $contrasena_hash = password_hash($contrasena, PASSWORD_BCRYPT);

        $sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES (:nombre, :correo, :contrasena)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contrasena', $contrasena_hash);

        
            
        if ($stmt->execute()) {
            // Si el usuario esta registrado lo redirije a la pagina de login.html
            header("Location:../views/login.html");
           "<script> 
             alert('Registro exitoso. ahora puedes iniciar sesion.');
             window.localition.href = '../views/login.html';
           </script>";
            
           exit();
            
        } else {
            // marca un error si hubo una falla en el registro
            return "Error al registrar usuario.";
        }
    } catch (PDOException $e) {
        // manda un error a la base de datos.
        return "Error: " . $e->getMessage();
    }
}

// Verificar si se envió el formulario de registro

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ''));
    $correo = htmlspecialchars(trim($_POST['correo'] ?? ''));
    $contrasena = htmlspecialchars(trim($_POST['contrasena'] ?? ''));
    
     // Revisa de que todos los campos requeridos. 
    if ($nombre && $correo && $contrasena) {
        echo registrarUsuario($pdo, $nombre, $correo, $contrasena);
    } else {
        // manda un mensaje de error si todos los campos no han sido ingresado.
        echo "Error: Todos los campos son obligatorios.";
    }
}
?>
