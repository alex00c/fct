-- Crear tabla de clientes
CREATE TABLE IF NOT EXISTS clientes (
    Nombre VARCHAR(100),
    DNI VARCHAR(20) PRIMARY KEY,
    Correo VARCHAR(100),
    Tel VARCHAR(20)
);

-- Crear tabla de productos
CREATE TABLE IF NOT EXISTS productos (
    Cod_Pro INT PRIMARY KEY,
    Nombre VARCHAR(100),
    Precio DECIMAL(10,2)
);

CREATE TABLE IF NOT EXISTS licencia (
    Cod_Pro INT,
    licencia VARCHAR(50) PRIMARY KEY,
    FOREIGN KEY (Cod_Pro) REFERENCES productos (Cod_Pro)
);
ALTER TABLE licencia
ADD CONSTRAINT unique_licencia_cod_pro UNIQUE (licencia, Cod_Pro);

-- Crear tabla de departamentos
CREATE TABLE IF NOT EXISTS departamentos (
    Cod_Dep INT PRIMARY KEY,
    Nombre VARCHAR(100),
    Salario DECIMAL(10,2)
);

-- Crear tabla de empleados
CREATE TABLE IF NOT EXISTS empleados (
    Cod_Emp INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100),
    Correo VARCHAR(100),
    Bonus DECIMAL(10,2),
    fecha_contrato DATE,
    Cod_Dep INT,
    FOREIGN KEY (Cod_Dep) REFERENCES departamentos (Cod_Dep)
);

-- Crear tabla de órdenes
CREATE TABLE IF NOT EXISTS ordenes (
    id_orden VARCHAR(20) PRIMARY KEY,
    Cod_Emp INT,
    Cod_Cli VARCHAR(20),
    fecha DATE,
    precio DECIMAL(10,2),
    FOREIGN KEY (Cod_Cli) REFERENCES clientes (DNI),
    FOREIGN KEY (Cod_Emp) REFERENCES empleados (Cod_Emp)
);
-- Crear tabla de Detalles
CREATE TABLE IF NOT EXISTS detalles_ordenes (
    id_orden VARCHAR(20),
    Cod_Pro INT,
    cantidad INT,
    precio_unitario DECIMAL(10,2),
    PRIMARY KEY (id_orden, Cod_Pro),
    FOREIGN KEY (Cod_Pro) REFERENCES productos (Cod_Pro)
);
