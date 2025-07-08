CREATE DATABASE sonic_store;

USE sonic_store;

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    imagen VARCHAR(255),
    fecha_lanzamiento DATE NOT NULL,
    plataforma VARCHAR(50) NOT NULL
);
