<?php ob_start(); 
    include 'conexion.php';
    $id = $_REQUEST['id'];
    $sql="SELECT * FROM ingreso_seguimiento WHERE id='$id'";
    $resultado=mysqli_query($conexion,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="CSS/Table.css">  -->
    <title>Factura Electronica</title>
</head>
<body>
    <h1 style="text-align:center;font-family:Arial, Helvetica, sans-serif;">Factura electronica de Ingreso </h1>
    <?php while($fila=mysqli_fetch_assoc($resultado)){?>
    <h5>Nombre Cliente: <?php echo $fila['nombre_cliente']?></h5>
    <h5>Cedula Cliente: <?php echo $fila['cedula_cliente']?></h5>
    <h5>Fecha creacion: <?php date_default_timezone_set('America/bogota');  echo $updated_at = date('Y-m-d h:i:s A'); ?></h5>
    <table border="2" cellpadding="1" cellspacing="0" width="100%">
        
        <tr>
            <td width="30%" style="text-align:center;">Codigo</td>
            <td width="50%" style="text-align:center;">Nombre del conductor</td>
            <td width="50%" style="text-align:center;">Fecha de recoleccion</td>
            <td width="50%" style="text-align:center;">Numero de placa</td>
            <td width="50%" style="text-align:center;">Tipo de producto</td>
            <td width="50%" style="text-align:center;">Foto</td>
            <td width="50%" style="text-align:center;">Fecha creacion</td>
        </tr>
        <tr>
            <td style="text-align:center;"><?php echo $fila['id'] ?></td>
            <td style="text-align:center;"><?php echo $fila['nombre_conductor'] ?></td>
            <td style="text-align:center;"><?php echo $fila['fecha_ingreso'] ?></td>
            <td style="text-align:center;"><?php echo $fila['numero_placa'] ?></td>
            <td style="text-align:center;"><?php echo $fila['tipo_producto'] ?></td>
            <td style="text-align:center;"><img style="width: 150px" src="data:image/jpg;base64, <?php echo base64_encode($fila['foto'])?>" alt=""></td>
            <td style="text-align:center;"><?php echo $fila['created_at'] ?></td>
        </tr>
    </table>
    <?php } ?>
</body>
</html>
<?php 
    $html = ob_get_clean();
    require_once '../libreria/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('Letter');
    $dompdf->render();
    $dompdf->stream("archivo.pdf", array("Attachment" => false));
?>