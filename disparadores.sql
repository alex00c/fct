
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

-- Elimina tantas licencias como cantidad de producto haya comprado el cliente 

DELIMITER //

CREATE TRIGGER eliminar_licencias AFTER INSERT ON detalles_ordenes
FOR EACH ROW
BEGIN
    DECLARE cantidad INT;
    SET cantidad = NEW.cantidad;
    WHILE cantidad > 0 DO
        DELETE FROM licencias WHERE Cod_Pro = NEW.Cod_Pro LIMIT 1;
        SET cantidad = cantidad - 1;
    END WHILE;
END //

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
