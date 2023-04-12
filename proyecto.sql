CREATE DATABASE IF NOT EXISTS proyecto;

USE proyecto;

-- Crear tabla de empleados
CREATE TABLE IF NOT EXISTS empleados (
    Cod_Emp INT PRIMARY KEY,
    Nombre_Emp VARCHAR(255),
    Correo_Emp VARCHAR(255),
    Bonus_Emp DECIMAL(10,2),
    Fecha_Contrato_Emp DATE
);

-- Crear tabla de clientes
CREATE TABLE IF NOT EXISTS clientes (
    Nombre_Cli VARCHAR(255),
    DNI_Cli VARCHAR(20) PRIMARY KEY,
    Correo_Cli VARCHAR(255),
    Tel_Cli VARCHAR(20)
);

-- Crear tabla de productos
CREATE TABLE IF NOT EXISTS productos (
    Cod_Pro INT PRIMARY KEY,
    Nombre_Pro VARCHAR(255),
    Licencia_Pro VARCHAR(255),
    Precio_Pro DECIMAL(10,2)
);

-- Crear tabla de órdenes
CREATE TABLE IF NOT EXISTS ordenes (
    Cod_Pro_O INT,
    Cod_Cli_O VARCHAR(20),
    Cod_Emp_O INT,
    Fecha_O DATE,
    PrecioTotal_O DECIMAL(10,2),
    PRIMARY KEY (Cod_Pro_O, Cod_Cli_O, Cod_Emp_O, Fecha_O),
    FOREIGN KEY (Cod_Pro_O) REFERENCES productos (Cod_Pro),
    FOREIGN KEY (Cod_Cli_O) REFERENCES clientes (DNI_Cli),
    FOREIGN KEY (Cod_Emp_O) REFERENCES empleados (Cod_Emp)
);

-- Crear tabla de departamentos
CREATE TABLE IF NOT EXISTS departamentos (
    Cod_Dep INT PRIMARY KEY,
    Nombre_Dep VARCHAR(255),
    Cod_Emp INT,
    Salario_Dep DECIMAL(10,2),
    FOREIGN KEY (Cod_Emp) REFERENCES empleados (Cod_Emp)
);
