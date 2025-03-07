<?php

/** 
 * Maneja el inicio de sesión de los usuarios.
 * - Verifica si el usuario existe en la base de datos.
 * - Si la contraseña es correcta crea una sesión y redirige a tareas.html. 
*/


session_start();
require '../config/conexion.php';  // Conexión a la base de datos


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST["correo"]);
    $contrasena = trim($_POST["contrasena"]);

    if (!empty($correo) && !empty($contrasena)) {
        try {
            // Busca al usuario por correo.
            
            $sql = "SELECT id_u, contrasena FROM usuarios WHERE correo = :correo";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
                // Iniciar sesión y almacenar datos del usuario
                $_SESSION["id_u"] = $usuario["id_u"];
                $_SESSION["correo"] = $correo;

                echo "<script>
                 alert('inicio sesion exitoso. Redirigiendo...');
                 </script>";
               
                // Redirigir a tareas.html
                header("Location:../views/tareas.html");
            
                exit();
            } else {
                header("Location:../views/login.html?error=1");
                exit();

               echo "<script>
                 alert('correo o contraseña incorrecta');
                 </script>" ;

                 
            }
        } catch (PDOException $e) {
            echo "Error en la base de datos: " . $e->getMessage();
            header("Location:../views/login.html?error=db");
            exit();
        }
    } else {
        echo "Todos los campos son obligatorios.";
        header("Location:../views/login.html?error=empty");
        exit();
    }
}
?>
