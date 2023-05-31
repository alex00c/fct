-- Crear tabla de clientes
CREATE TABLE IF NOT EXISTS clientes (
    Nombre VARCHAR(100),
    DNI VARCHAR(20) PRIMARY KEY,
    Correo VARCHAR(100),
    Tel VARCHAR(20)
);

-- Crear tabla de productos
CREATE TABLE IF NOT EXISTS productos (
    Cod_Pro INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100),
    Precio DECIMAL(10,2)

);

CREATE TABLE IF NOT EXISTS identificador (
    Cod_Pro INT,
    num_serie VARCHAR(50) PRIMARY KEY,
    FOREIGN KEY (Cod_Pro) REFERENCES productos (Cod_Pro),
    CONSTRAINT unique_licencia_cod_pro UNIQUE (num_serie, Cod_Pro)
);
ALTER TABLE licencia
ADD CONSTRAINT unique_licencia_cod_pro UNIQUE (licencia, Cod_Pro);

-- Crear tabla de departamentos
CREATE TABLE IF NOT EXISTS departamentos (
    Cod_Dep INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100),
    Salario DECIMAL(10,2)
);


-- Crear tabla de empleados
CREATE TABLE IF NOT EXISTS empleados (
    Cod_Emp INT AUTO_INCREMENT PRIMARY KEY,
    
    fecha_contrato DATE,
    telefono VARCHAR(10),
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

--Almacena las licencias / nºde serie de productos vendidos

CREATE TABLE ventas (
    Cod_Pro INT,
    num_serie VARCHAR(50),
    id_orden VARCHAR(20),
    fecha DATE,
    FOREIGN KEY (Cod_Pro) REFERENCES productos (Cod_Pro),
    FOREIGN KEY (num_serie) REFERENCES identificador (num_serie),
    FOREIGN KEY (id_orden) REFERENCES ordenes (id_orden)
);

-- Guarda las ordenes que se han cancelado ademas del motivo de la cancelacion

CREATE TABLE ordenes_canceladas (
    id_orden VARCHAR(30),
    motivo VARCHAR(255),
    fecha_cancelacion DATE,
    precio DECIMAL(10,2),
    PRIMARY KEY (id_orden)

);
