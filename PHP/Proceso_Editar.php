<?php 

    include 'conexion.php';

    $id = $_REQUEST['id'];

    $query="SELECT created_at FROM ingreso_seguimiento WHERE id='$id'";
    $resultado = mysqli_query($conexion,$query);
    $red = mysqli_fetch_array($resultado);

    date_default_timezone_set('America/bogota');
    $fecha_ingreso = $_POST["fecha_ingreso"];
    $nombre_conductor = $_POST["nombre_conductor"];
    $tipo_producto = $_POST["tipo_producto"];
    $numero_placa = $_POST["numero_placa"];
    $destino_producto  = $_POST["destino_producto"];
    $foto=addslashes(file_get_contents($_FILES['soporte_producto']['tmp_name']));
    $created_at = $red['created_at'];
    $updated_at = date('Y-m-d h:i:s A');
    $nombre_cliente = $_POST["nombre_cliente"];
    $cedula_cliente = $_POST["cedula_cliente"];

    $query = "UPDATE ingreso_seguimiento SET fecha_ingreso='$fecha_ingreso', nombre_conductor='$nombre_conductor' , tipo_producto= '$tipo_producto', foto='$foto', numero_placa='$numero_placa', destino_producto='$destino_producto', created_at='$created_at',updated_at='$updated_at',nombre_cliente='$nombre_cliente',cedula_cliente='$cedula_cliente' WHERE id='$id'";
    $ejecutar = mysqli_query($conexion,$query);
    if($ejecutar){
        echo '
            <script>
               alert("Has registrado el producto");
               window.location = "Inventario.php";
            </script>   
        ';
    }else{
        echo '
        <script>
           alert("Por favor intentalo de nuevo");
           window.location = "EditarIngresoSeguimiento.php";
        </script>   
        ';
    }
?>