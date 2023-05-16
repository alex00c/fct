USE proyecto;




INSERT INTO clientes (Nombre, DNI, Correo, Tel)
VALUES ('Ana Martínez', '12345678A', 'anamartinez@example.com', '123456789'),
       ('Luis García', '87654321B', 'luisgarcia@example.com', '987654321'),
       ('Sofía Fernández', '56789012C', 'sofiafernandez@example.com', '567890123'),
       ('Carlos Ruiz', '23456789D', 'carlosruiz@example.com', '234567890'),
       ('Marta Rodríguez', '98765432E', 'martarodriguez@example.com', '876543210'),
       ('Javier Torres', '34567890F', 'javiertorres@example.com', '345678901');

INSERT INTO productos (Cod_Pro, Nombre , Precio)
VALUES (1, 'Microsoft Office', 139),
(2, 'Adobe Photoshop', 299),
(3, 'AutoCAD', 199),
(4, 'Sketch', 99),
(5, 'VMware Fusion', 149),
(6, 'Final Cut Pro', 299);



INSERT INTO departamentos (Cod_Dep, Nombre,Salario)
VALUES (1, 'Ventas', 2000.00),
       (2, 'Recursos Humanos', 2500.00),
       (3, 'Tecnología', 3000.00),
        (4, 'Contabilidad', 2200.00),
        (5, 'Marketing', 2800.00),
        (6, 'Desarrollo', 3200.00);

INSERT INTO empleados (Cod_Emp, Nombre, Correo, Bonus, fecha_contrato , Cod_Dep)
VALUES (1, 'Juan Pérez', 'juanperez@example.com', 500.00, '2020-01-01', 1),
       (2, 'María González', 'mariagonzalez@example.com', 750.00, '2019-05-01', 2),
       (3, 'Pedro Gómez', 'pedrogomez@example.com', 300.00, '2021-03-15', 3),
    (4, 'Laura Hernández', 'laurahernandez@example.com', 400.00, '2022-01-01', 4),
        (5, 'Miguel Sánchez', 'miguelsanchez@example.com', 600.00, '2021-05-01', 5),
        (6, 'Marina López', 'marinalopez@example.com', 350.00, '2020-08-15', 6);

INSERT INTO ordenes (id_orden, Cod_Emp, Cod_Cli, fecha , precio) VALUES 
('ORD001', 1, '12345678A', '2023-05-01', 0),
('ORD002', 2, '87654321B', '2023-05-02' , 0),
('ORD003', 3, '23456789D', '2023-05-03', 0),
('ORD004', 4, '34567890F', '2023-05-04', 0);


INSERT INTO detalles_ordenes (id_orden, Cod_Pro, cantidad, precio_unitario) VALUES 
('ORD001', 1, 2, 69.50),
('ORD002', 2, 1, 299.00),
('ORD003', 6, 1, 299.00),
('ORD003', 4, 2, 99.00);

INSERT INTO licencia (Cod_Pro, licencia)
VALUES 
(1, 'ABC-DEF-GHI'),
(1, 'JKL-MNO-PQR'),
(1, 'STU-VWX-YZ0'),
(2, '1AB-2CD-3EF'),
(2, '4GH-5IJ-6KL'),
(2, '7MN-8OP-9QR'),
(3, '0ST-UVW-XYZ'),
(3, 'ABC-DEF-GHI'),
(3, 'JKL-MNO-PQR'),
(4, 'STU-VWX-YZ0'),
(4, '1AB-2CD-3EF'),
(4, '4GH-5IJ-6KL'),
(5, '7MN-8OP-9QR'),
(5, '0ST-UVW-XYZ'),
(5, 'ABC-DEF-GHI'),
(6, 'JKL-MNO-PQR'),
(6, 'STU-VWX-YZ0'),
(6, '1AB-2CD-3EF');
