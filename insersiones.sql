USE proyecto;


INSERT INTO empleados (Cod_Emp, Nombre, Correo, Bonus, fecha_contrato , Cod_Dep)
VALUES (1, 'Juan Pérez', 'juanperez@example.com', 500.00, '2020-01-01', 1),
       (2, 'María González', 'mariagonzalez@example.com', 750.00, '2019-05-01', 2),
       (3, 'Pedro Gómez', 'pedrogomez@example.com', 300.00, '2021-03-15', 3),
    (4, 'Laura Hernández', 'laurahernandez@example.com', 400.00, '2022-01-01', 4),
        (5, 'Miguel Sánchez', 'miguelsanchez@example.com', 600.00, '2021-05-01', 5),
        (6, 'Marina López', 'marinalopez@example.com', 350.00, '2020-08-15', 6);

INSERT INTO clientes (Nombre, DNI, Correo, Tel)
VALUES ('Ana Martínez', '12345678A', 'anamartinez@example.com', '123456789'),
       ('Luis García', '87654321B', 'luisgarcia@example.com', '987654321'),
       ('Sofía Fernández', '56789012C', 'sofiafernandez@example.com', '567890123'),
       ('Carlos Ruiz', '23456789D', 'carlosruiz@example.com', '234567890'),
       ('Marta Rodríguez', '98765432E', 'martarodriguez@example.com', '876543210'),
       ('Javier Torres', '34567890F', 'javiertorres@example.com', '345678901');

INSERT INTO productos (Cod_Pro, Nombre, Licencia, Precio)
VALUES (1, 'Microsoft Office', 'JHG876F', 139),
(2, 'Adobe Photoshop', 'BGT567H', 299),
(3, 'AutoCAD', 'KJH876D', 199),
(4, 'Sketch', 'RTY345T', 99),
(5, 'VMware Fusion', 'FGH908J', 149),
(6, 'Final Cut Pro', 'DFG765S', 299);

INSERT INTO ordenes (Cod_Pro, Cod_Cli, Cod_Emp, Fecha, PrecioTotal)
VALUES (1, '12345678A', 1, '2021-05-01', 139),
       (2, '87654321B', 4, '2021-04-15',99 ),
       (3, '56789012C', 6, '2021-03-28', 299),
(4, '23456789D', 5, '2022-05-01', 149),
(5, '98765432E', 2, '2022-04-15', 299),
(6, '34567890F', 4, '2022-03-28', 99);

INSERT INTO departamentos (Cod_Dep, Nombre, Cod_Emp, Salario)
VALUES (1, 'Ventas', 2000.00),
       (2, 'Recursos Humanos', 2500.00),
       (3, 'Tecnología', 3000.00),
        (4, 'Contabilidad', 2200.00),
        (5, 'Marketing', 2800.00),
        (6, 'Desarrollo', 3200.00);