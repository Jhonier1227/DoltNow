
# 📝 DoltNow - Gestor de Tareas Inteligente  

**DoltNow** es una aplicación web diseñada para mejorar la **productividad y organización personal** mediante la gestión eficiente de tareas. Con una interfaz limpia y minimalista, permite a los usuarios **crear, editar, eliminar y clasificar tareas** en distintas categorías.  

Su objetivo principal es **reducir la procrastinación** y ayudar a los usuarios a mantenerse enfocados en sus actividades diarias, brindando una experiencia fluida y sin distracciones.  

En futuras versiones, **DoltNow** incluirá un **cuaderno virtual** para tomar notas junto con las tareas y una **API REST** para integración con aplicaciones móviles.


## 🚀 Características  
✅ Registro e inicio de sesión de usuarios.  
✅ Creación, edición y eliminación de tareas.  
✅ Organización de tareas por categorías.  
✅ Cambio entre **modo claro y oscuro**.  
✅ Interfaz responsiva, inspirada en Notion.  
✅ Seguridad en el acceso con **contraseñas cifradas**.  

---

## 📂 Estructura del Proyecto  

A continuación, se explican las carpetas y archivos clave del sistema.

## 1️⃣ Configuración y Base de Datos (/config)
**📌 conexion.php**

Contiene la conexión a la base de datos mediante PDO (PHP Data Objects).
Permite realizar consultas y transacciones de manera segura.

## 2️⃣ Controladores del Sistema (/controllers)
**📌 registro.php**

✅Maneja el registro de nuevos usuarios.
✅Cifra las contraseñas antes de almacenarlas en la base de datos.

**📌 login.php**

✅Valida las credenciales del usuario.
✅Inicia sesión y almacena los datos en $_SESSION.

**📌 logout.php**

Destruye la sesión y cierra la cuenta del usuario.

## 3️⃣ Archivos Públicos (/public)
**📌 /public/css/styles.css**

✅Contiene los estilos de la aplicación con los colores oficiales.
✅Soporta modo claro y oscuro.

**📌 /public/js/script.js**

✅Maneja la interacción del usuario.
✅Carga dinámicamente las tareas mediante fetch().

## 4️⃣ Vistas del Usuario (/views)
**📌 login.html**

Página de inicio de sesión.

**📌 registro.html**

Página de registro de usuario.
**📌 tareas.html**

Panel donde el usuario gestiona sus tareas.

## 🛠️ Instalación y Configuración  
### 🔹 **Requisitos Previos**  
- **Servidor local** (XAMPP, MAMP, WAMP o Apache+MySQL+PHP).  
- **PHP 7+ y MySQL 5.7+**.  

### 🔹 **Pasos de Instalación**  
1️⃣ **Clonar el repositorio o descargar el proyecto**  
```bash
git clone https://github.com/tuusuario/doltnow.git
cd doltnow 