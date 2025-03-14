# 📝 DoltNow - Gestor de Tareas  

**DoltNow** es una aplicación web para la gestión de tareas enfocada en la **acción y productividad**. Permite a los usuarios **crear, organizar y administrar sus tareas** de manera eficiente con una interfaz minimalista y moderna.

## 🚀 Características  
✅ Registro e inicio de sesión de usuarios.  
✅ Creación, edición y eliminación de tareas.  
✅ Organización de tareas por categorías.  
✅ Cambio entre **modo claro y oscuro**.  
✅ Interfaz responsiva, inspirada en Notion.  
✅ Seguridad en el acceso con **contraseñas cifradas**.  

---

## 📂 Estructura del Proyecto  
/DoltNow                      # Carpeta raíz del proyecto
│── /config                   # Configuración del sistema
│   ├── conexion.php          # Archivo para la conexión a la base de datos
│── /controllers              # Controladores PHP que manejan la lógica del backend
│   ├── registro.php          # Maneja el registro de usuarios
│   ├── login.php             # Maneja el inicio de sesión
│   ├── logout.php            # Cierra la sesión del usuario
│── /public                   # Archivos públicos como estilos y scripts
│   ├── css/                  # Carpeta que contiene los archivos de estilos CSS
│   │   ├── styles.css        # Archivo principal de estilos
│   ├── js/                   # Carpeta para archivos JavaScript
│   │   ├── script.js         # Archivo principal de JavaScript
│── /views                    # Archivos HTML que conforman la interfaz
│   ├── login.html            # Página de inicio de sesión
│   ├── registro.html         # Página de registro de usuario
│   ├── tareas.html           # Página de gestión de tareas (requiere login)
│── .htaccess                 # Configuración del servidor Apache (URLs amigables, restricciones)
│── README.md                 # Documentación del proyecto

---

## 🛠️ Instalación y Configuración  
### 🔹 **Requisitos Previos**  
- **Servidor local** (XAMPP, MAMP, WAMP o Apache+MySQL+PHP).  
- **PHP 7+ y MySQL 5.7+**.  

### 🔹 **Pasos de Instalación**  
1️⃣ **Clonar el repositorio o descargar el proyecto**  
```bash
git clone https://github.com/tuusuario/doltnow.git
cd doltnow 