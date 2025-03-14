DoltNow - Gestor de Tareas Inteligente 🚀
DoltNow es una aplicación web diseñada para optimizar la gestión de tareas y mejorar la productividad personal y profesional. Su diseño intuitivo y minimalista permite a los usuarios organizar, priorizar y completar tareas de manera eficiente.

📌 Futuras actualizaciones:
✔️ Cuaderno Virtual 📖 para tomar notas junto con las tareas.
✔️ API REST para integración con aplicaciones móviles.

📌 Descripción del Proyecto
DoltNow permite a los usuarios:
✅ Registrarse e iniciar sesión de manera segura.
✅ Crear, editar y eliminar tareas.
✅ Organizar tareas en categorías.
✅ Cambiar entre modo claro y oscuro.
✅ Administrar sus tareas desde cualquier navegador.

🔹 Tecnologías utilizadas
Tecnología	Uso:

> HTML, CSS, JavaScript:	Diseño e interactividad de la interfaz.
>PHP (con PDO y MySQL)	Backend, autenticación y gestión de datos.
>Bootstrap	Diseño responsivo y estilizado.
>Apache (.htaccess)	Seguridad y configuración del servidor.

📂 Estructura del Proyecto
A continuación, se explican las carpetas y archivos clave del sistema.

1️⃣ Configuración y Base de Datos (/config)
📌 conexion.php
Contiene la conexión a la base de datos mediante PDO (PHP Data Objects).
Permite realizar consultas y transacciones de manera segura.

2️⃣ Controladores del Sistema (/controllers)

📌 registro.php

Maneja el registro de nuevos usuarios.
Cifra las contraseñas antes de almacenarlas en la base de datos.

📌 login.php

Valida las credenciales del usuario.
Inicia sesión y almacena los datos en $_SESSION.

📌 logout.php

Destruye la sesión y cierra la cuenta del usuario.

3️⃣ Archivos Públicos (/public)
📌 /public/css/styles.css

Contiene los estilos de la aplicación con los colores oficiales.
Soporta modo claro y oscuro.

📌 /public/js/script.js

Maneja la interacción del usuario.
Carga dinámicamente las tareas mediante fetch().

4️⃣ Vistas del Usuario (/views)
📌 login.html

Página de inicio de sesión.

📌 registro.html

Página de registro de usuario.

📌 tareas.html

Panel donde el usuario gestiona sus tareas.

5️⃣ Configuración del Servidor (.htaccess)
📌 Protege archivos sensibles


📌 Instalación y Configuración
🔹 1️⃣ Requisitos previos
Servidor Local (XAMPP, MAMP, WAMP o Apache+MySQL+PHP).
PHP 7+ y MySQL 5.7+.

🔹 2️⃣ Pasos de Instalación

1️⃣ Clonar el repositorio

git clone https://github.com/tuusuario/doltnow.git
cd doltnow
2️⃣ Configurar la base de datos

Importa el archivo DoltNow.sql en MySQL.
Modifica /config/conexion.php con tus credenciales.
3️⃣ Ejecutar el proyecto

Inicia Apache y MySQL.
Abre en el navegador:
http://localhost/GestionTareas/views/login.html

📌 Funcionalidades Futuras 🔮
📖 1️⃣ Cuaderno Virtual
✔️ Permitir a los usuarios tomar notas junto a sus tareas.
✔️ Posibilidad de añadir imágenes, listas y archivos adjuntos.

📡 2️⃣ API REST para Aplicaciones Móviles
✔️ Creación de una API en PHP con JSON para permitir la integración con apps móviles.
✔️ Autenticación mediante tokens JWT.
✔️ Endpoints para la gestión de tareas:


📜 Licencia
DoltNow está bajo la licencia MIT, lo que permite su modificación y distribución libre.

👨‍💻 Autor
📌 Jhonier Stiven Montaño Castillo
🔹 Proyecto desarrollado como parte de DoltNow.

