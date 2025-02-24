CREATE TABLE usuarios(
    id_u INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100)NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    contrasena VARCHAR(255)NOT NULL 
);

CREATE TABLE categorias(
    id_c INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE tareas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    completado BOOLEAN DEFAULT FALSE,
    fecha_creacion TIMESTAMP DEFAULT
    CURRENT_TIMESTAMP,
    categoria_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_u) ON
    DELETE CASCADE,
    FOREIGN KEY(categoria_id) REFERENCES categorias(id_c)
    ON DELETE SET NULL
);




