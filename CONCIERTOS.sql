DROP DATABASE IF EXISTS conciertos;
CREATE DATABASE conciertos CHARACTER SET utf8mb4;
USE conciertos;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    preferencias VARCHAR(255), -- Aquí se pueden almacenar las preferencias del usuario como tipo de música
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE conciertos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    fecha DATE NOT NULL,
    ubicacion VARCHAR(255) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    tipo_musica VARCHAR(100) NOT NULL,
    descripcion TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE entradas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    concierto_id INT,
    cantidad INT NOT NULL,
    fecha_compra TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (concierto_id) REFERENCES conciertos(id) ON DELETE CASCADE
);

CREATE TABLE recomendaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    concierto_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (concierto_id) REFERENCES conciertos(id) ON DELETE CASCADE,
    recomendacion_generada TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

