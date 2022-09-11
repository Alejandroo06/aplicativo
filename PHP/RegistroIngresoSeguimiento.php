
<?php include 'conexion.php';
    date_default_timezone_set('America/bogota');
    $fecha_ingreso = $_POST["fecha_ingreso"];
    $nombre_conductor = $_POST["nombre_conductor"];
    $tipo_producto = $_POST["tipo_producto"];
    $numero_placa = $_POST["numero_placa"];
    $destino_producto  = $_POST["destino_producto"];
    $foto=addslashes(file_get_contents($_FILES['soporte_producto']['tmp_name']));
    $created_at = date('Y-m-d h:i:s A');
    $updated_at = date('Y-m-d h:i:s A');
    $nombre_cliente = $_POST["nombre_cliente"];
    $cedula_cliente = $_POST["cedula_cliente"];

    $query = "INSERT INTO ingreso_seguimiento(fecha_ingreso, nombre_conductor, tipo_producto,foto, numero_placa, destino_producto, created_at,updated_at,nombre_cliente,cedula_cliente) 
                VALUES('$fecha_ingreso', '$nombre_conductor', '$tipo_producto','$foto', '$numero_placa', '$destino_producto', '$created_at','$updated_at','$nombre_cliente','$cedula_cliente')";
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
           window.location = "RegistroIngresoSeguimiento.php";
        </script> 
        ';
    }
    mysqli_close($Conexion);
?>