<?php 

    include 'conexion.php';

    $id = $_REQUEST['id'];

    $query="SELECT * FROM ingreso_seguimiento WHERE id='$id'";
    $resultado = mysqli_query($conexion,$query);
    $fila=mysqli_fetch_assoc($resultado)
?>


<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/botones.css" rel="stylesheet">
    <link href="../CSS/IngresoSeguimiento.css" rel="stylesheet">    
    <title>Document</title>
</head>
<script>
    function mueveReloj(){
        momentoActual = new Date()
        hora = momentoActual.getHours()
        minuto = momentoActual.getMinutes()
        segundo = momentoActual.getSeconds()
        str_segundo = new String (segundo)
        if (str_segundo.length == 1)
        segundo = "0" + segundo
        str_minuto = new String (minuto)
        if (str_minuto.length == 1)
        minuto = "0" + minuto
        str_hora = new String (hora)
        if (str_hora.length == 1)
        hora = "0" + hora
        horaImprimible = hora + " : " + minuto + " : " + segundo
        document.form_reloj.reloj.value = horaImprimible
        setTimeout("mueveReloj()",1000);
    }
</script>
<body onload="mueveReloj()">
    <nav class="menu">
        <a href="../Administrador.php" class="enlace">
            <img src="../IMG/Miscelanea.jpg" alt="" class="logo">
        </a>
        <ul>
            <h1>Recoleccion del prodcuto</h1>
            <div class="alinear">
            <?php date_default_timezone_set('America/bogota'); $fecha = Date('Y-m-d')?>
            <input type="date" value="<?php echo $fecha;?>" disabled>
            <form name="form_reloj">
                <input type="text" name="reloj" size="13" onfocus="window.document.form_reloj.reloj.blur()" disabled>
            </form>
        </div><br>
        </ul>
    </nav>
    <main>
        <form action="Proceso_Editar.php?id=<?php echo $fila['id'] ?>" method="POST" enctype="multipart/form-data">
            <br>
            <h2>Ingreso recoleccion de paquete</h2>
            <br><br><h5>Ingrese Fecha de recolección</h5>
            <input type="text" style="text-align: center;" placeholder="Ingrese de creacion" name="created_at" value="<?php echo $fila['created_at']?>" disabled><br><br>
            <input type="date" style="text-align: center;" placeholder="Ingrese fecha actual" name="fecha_ingreso" value="<?php echo $fila['fecha_ingreso']?>">
            <br><br><h5>Ingrese Nombre del conductor</h5>
            <input type="text" placeholder="Nombre del conductor" name="nombre_conductor" value="<?php echo $fila['nombre_conductor']?>">
            <br><br><h5>Ingreso el tipo de producto</h5>
            <input type="text" placeholder="Ingrese tipo del producto" name="tipo_producto" value="<?php echo $fila['tipo_producto']?>">
            <br><br><h5>Ingrese numero de placa</h5>
            <input type="text" placeholder="Numero de placa" name="numero_placa" value="<?php echo $fila['numero_placa']?>">
            <br><br><h5>Ingrese destino del producto</h5>
            <input type="text" placeholder="Destino del producto" name="destino_producto" value="<?php echo $fila['destino_producto']?>">
            <br><br><h5>Ingrese Nombre del cliente</h5>
            <input type="text" placeholder="Nombre del cliente" name="nombre_cliente" value="<?php echo $fila['nombre_cliente']?>">
            <br><br><h5>Ingrese cedula del cliente</h5>
            <input type="text" placeholder="Cedula del cliente" name="cedula_cliente" value="<?php echo $fila['cedula_cliente']?>">
            <br><br><h5>Ingrese foto de la ficha de recolección</h5>
            <input class="bol" type="file" name="soporte_producto" id="soporte_producto" required><br><br>
            <button class="color_boton1 aling" type="submit">Actualizar seguimiento</button>
            <br><br>
        </form>
        <a href="Inventario.php"><button class="color_boton1 aling">Volver</button></a>
    </main> 
</body>
</html>