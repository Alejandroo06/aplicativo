<?php 

    include 'conexion.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../CSS/Funcion_Inventario.css" rel="stylesheet">
</head>
<body>
    
    <nav class="menu">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="../Administrador.php" class="enlace">
            <img src="../IMG/Miscelanea.jpg" alt="" class="logo">
        </a>
        <ul>    
            <h1>agregar producto</h1>
        </ul> 
    </nav>
    <main>
        <form action="Registro_Producto.php" method="POST" class="formulario__register" enctype="multipart/form-data">
            <br>
            <h2>productos</h2>

            <input type="text" placeholder="Nombre Producto" name="nombre_producto">
            <input type="text" placeholder="Cantidad" name="cantidad">
            <input type="text" placeholder="Descripción" name="descripción">
            <input class="bol" type="file" name="foto" id="foto" required>
            <br>
            <input type="text" placeholder="Precio" name="precio">
            <button type="submit">agregrar producto</button>
            <br>
            <br>
            <li ><a class="col" href="Inventario.php">VOLVER</a></li>
            <label>categorias</label>
            <select name="categorias" required>
            <option selected value="">seleccione</option>
            <option value="productos">producto</option>
            <option value="anchetas">anchetas</option>
            </select><br><br>

            <label class="dt">sub_categorias</label>
            <select class="dr" name="sub_categorias" required>
            <option selected value="">seleccione</option>
            <option value="piñateria">Piñateria</option>
            <option value="jugueteria">Jugueteria</option>
            <option value="peluches">Peluches</option>
            <option value="detalles">Detalles</option>
            <option value="cumpleaños">Cumpleaños</option>
            <option value="amor">Amor</option>
            <option value="dias especiales">Dias Especiales</option>
            </select>
 
        </form>
          
        
    </main>
    
</body>
</html>