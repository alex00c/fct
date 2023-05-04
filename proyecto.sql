CREATE DATABASE IF NOT EXISTS proyecto;

USE proyecto;

-- Crear tabla de empleados
CREATE TABLE IF NOT EXISTS empleados (
    Cod_Emp INT PRIMARY KEY,
    Nombre VARCHAR(255),
    Correo VARCHAR(255),
    Bonus DECIMAL(10,2),
    fecha_contrato DATE
);

-- Crear tabla de clientes
CREATE TABLE IF NOT EXISTS clientes (
    Nombre VARCHAR(255),
    DNI VARCHAR(20) PRIMARY KEY,
    Correo VARCHAR(255),
    Tel VARCHAR(20)
);

-- Crear tabla de productos
CREATE TABLE IF NOT EXISTS productos (
    Cod_Pro INT PRIMARY KEY,
    Nombre VARCHAR(255),
    Licencia VARCHAR(255),
    Precio DECIMAL(10,2)
);

-- Crear tabla de órdenes
CREATE TABLE IF NOT EXISTS ordenes (
    Cod_Pro INT,
    Cod_Cli VARCHAR(20),
    Cod_Emp INT,
    Fecha DATE,
    PrecioTotal DECIMAL(10,2),
    PRIMARY KEY (Cod_Pro, Cod_Cli, Cod_Emp),
    FOREIGN KEY (Cod_Pro) REFERENCES productos (Cod_Pro),
    FOREIGN KEY (Cod_Cli) REFERENCES clientes (DNI),
    FOREIGN KEY (Cod_Emp) REFERENCES empleados (Cod_Emp)
);

-- Crear tabla de departamentos
CREATE TABLE IF NOT EXISTS departamentos (
    Cod_Dep INT PRIMARY KEY,
    Nombre VARCHAR(255),
    Cod_Emp INT,
    Salario DECIMAL(10,2),
    FOREIGN KEY (Cod_Emp) REFERENCES empleados (Cod_Emp)
);
