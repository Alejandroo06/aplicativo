<?php 

    include 'conexion.php';

    $id = $_REQUEST['id'];

    $nombre_producto = $_POST['nombre_producto'];   
    $cantidad = $_POST['cantidad'];
    $descripción = $_POST['descripción'];
    $foto=$_FILES['foto'];
    $categorias = $_POST['categorias'];
    $sub_categorias = $_POST['sub_categorias'];
    $precio = $_POST['precio'];

    $query = "UPDATE producto SET nombre_producto='$nombre_producto', cantidad='$cantidad', descripción='$descripción', foto='$foto', categorias='$categorias', sub_categorias='$sub_categorias', precio='$precio' WHERE id = '$id'";
    $resultado = mysqli_query($conexion,$query);

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
           window.location = "Registro_Producto.php";
        </script>   
        ';
    }
?>