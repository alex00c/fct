
-- Actualiza el precio de la orden cuando se añaden productos nuevos

DELIMITER &&
CREATE TRIGGER actualizar_precio_insert AFTER INSERT ON detalles_ordenes
FOR EACH ROW
BEGIN
    UPDATE ordenes SET precio = (
        SELECT SUM(precio_unitario * cantidad)
        FROM detalles_ordenes
        WHERE id_orden = NEW.id_orden
    )
    WHERE id_orden = NEW.id_orden;
END&&


-- Actualiza el precio de la orden cuanod se modifica la tabla detalles_ordenes

DELIMITER &&
CREATE TRIGGER actualizar_precio_update AFTER UPDATE ON detalles_ordenes
FOR EACH ROW
BEGIN
    UPDATE ordenes SET precio = (
        SELECT SUM(precio_unitario * cantidad)
        FROM detalles_ordenes
        WHERE id_orden = NEW.id_orden
    )
    WHERE id_orden = NEW.id_orden;
END &&
DELIMITER ;


-- Elimina he inserta en otra tabla las ordenes canceladass

DELIMITER //

CREATE TRIGGER eliminar_orden
AFTER DELETE ON ordenes
FOR EACH ROW
BEGIN
    -- Elimina en la tabla detalles_ordenes
 DELETE FROM detalles_ordenes
    WHERE id_orden = OLD.id_orden;

    -- Insertar en la tabla ordenes_canceladas
    INSERT INTO ordenes_canceladas (id_orden, motivo, fecha_cancelacion, precio)
    VALUES (OLD.id_orden, 'Orden cancelada', CURDATE(), OLD.precio);
END //

DELIMITER ;

-- Inserta en la tabla ventas los productos vendidos al hacer una orden
DELIMITER //

CREATE TRIGGER insertar_ventas AFTER INSERT ON detalles_ordenes
FOR EACH ROW
BEGIN
    DECLARE cantidad INT;
    SET cantidad = NEW.cantidad;

    WHILE cantidad > 0 DO
        INSERT INTO ventas (Cod_Pro, num_serie, id_orden, fecha)
        SELECT d.Cod_Pro, i.num_serie, NEW.id_orden, CURRENT_DATE()
        FROM detalles_ordenes d
        JOIN identificador i ON d.Cod_Pro = i.Cod_Pro
        WHERE d.id_orden = NEW.id_orden
        LIMIT 1;

        SET cantidad = cantidad - 1;
    END WHILE;
END //

DELIMITER ;

