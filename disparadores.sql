
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
