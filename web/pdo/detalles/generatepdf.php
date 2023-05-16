<?php
header('Content-Type: text/html; charset=utf-8');

require('./fpdf/fpdf.php');
$buscar = $_REQUEST['buscar'];

class PDF extends FPDF
{


    function Tabla($header, $data)
    {
        $this->SetFont('Arial', '', 10);
        foreach ($header as $col) {
            $this->Cell(100, 40, $col, 0, 0,'L');
        }
        // Imprimir encabezados de columna
        $firstRow = true;
        foreach ($data as $row) {
            $this->Cell(100,40, utf8_decode($row['id']), 0, 0, 'L');
            if ($firstRow) {
                $this->Cell(100,40, utf8_decode($row['empleado']), 0, 0, 'L');
                $this->Cell(100,40, utf8_decode($row['cliente']), 0, 0, 'L');
                $this->Cell(100,40, utf8_decode($row['fecha']), 0, 0, 'L');
                $firstRow = false;
            }
            $this->Cell(100,40, utf8_decode($row['producto']), 0, 0, 'L');
            $this->Cell(100,40, utf8_decode($row['cantidad']), 0, 0, 'L');
            $this->Cell(100,40, utf8_decode($row['total']), 0, 0, 'L');
            $this->Ln();
        }
    }
}



$pdf = new PDF('P', 'pt', 'A4');


$header = array('ID', 'Empleado', 'Cliente', 'Fecha', 'Producto', 'Cantidad', 'Total');

// Conexión a la base de datos
$dsn = 'mysql:host=localhost;dbname=proyecto';
$username = 'root';
$password = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try {
    $conexion = new PDO($dsn, $username, $password, $options);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL
    $sql = "SELECT o.precio as pago, p.Cod_Pro as codigo, d.id_orden as id, e.Nombre as empleado, o.Cod_Cli as cliente, o.fecha as fecha, p.Nombre as producto, d.cantidad, d.precio_unitario as precioud, d.cantidad * d.precio_unitario AS total 
            FROM detalles_ordenes d INNER JOIN productos p ON d.Cod_Pro = p.Cod_Pro INNER JOIN ordenes o ON o.id_orden = d.id_orden INNER JOIN empleados e ON e.Cod_Emp = o.Cod_Emp
            WHERE d.id_orden LIKE :buscar";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':buscar', $buscar);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Generar el PDF
    $pdf->AddPage();
    $pdf->Tabla($header, $data);
    $pdf->Output();
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
