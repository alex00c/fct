USE proyecto;

-- Insertar ejemplos en tabla empleados
INSERT INTO empleados (Cod_Emp, Nombre_Emp, Correo_Emp, Bonus_Emp, Fecha_Contrato_Emp)
VALUES (1, 'Juan Pérez', 'juanperez@example.com', 500.00, '2020-01-01'),
       (2, 'María González', 'mariagonzalez@example.com', 750.00, '2019-05-01'),
       (3, 'Pedro Gómez', 'pedrogomez@example.com', 300.00, '2021-03-15');

-- Insertar ejemplos en tabla clientes
INSERT INTO clientes (Nombre_Cli, DNI_Cli, Correo_Cli, Tel_Cli)
VALUES ('Ana Martínez', '12345678A', 'anamartinez@example.com', '123456789'),
       ('Luis García', '87654321B', 'luisgarcia@example.com', '987654321'),
       ('Sofía Fernández', '56789012C', 'sofiafernandez@example.com', '567890123');

-- Insertar ejemplos en tabla productos
INSERT INTO productos (Cod_Pro, Nombre_Pro, Licencia_Pro, Precio_Pro)
VALUES (1, 'Producto 1', 'Licencia 1', 10.99),
       (2, 'Producto 2', 'Licencia 2', 24.50),
       (3, 'Producto 3', 'Licencia 3', 18.75);

-- Insertar ejemplos en tabla ordenes
INSERT INTO ordenes (Cod_Pro_O, Cod_Cli_O, Cod_Emp_O, Fecha_O, PrecioTotal_O)
VALUES (1, '12345678A', 1, '2021-05-01', 10.99),
       (2, '87654321B', 2, '2021-04-15', 49.00),
       (3, '56789012C', 3, '2021-03-28', 75.00);

-- Insertar ejemplos en tabla departamentos
INSERT INTO departamentos (Cod_Dep, Nombre_Dep, Cod_Emp, Salario_Dep)
VALUES (1, 'Ventas', 1, 2000.00),
       (2, 'Recursos Humanos', 2, 2500.00),
       (3, 'Tecnología', 3, 3000.00);
