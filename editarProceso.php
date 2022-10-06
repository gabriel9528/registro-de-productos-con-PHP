<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre_producto = $_POST['txtNombre'];
    $descripcion = $_POST['txtDescripcion'];
    $oferta = $_POST['txtOferta'];
    $precio_regular = $_POST['txtPrecioRegular'];
    $precio_Descuento = $_POST['txtPrecioDescuento'];

    $sentencia = $bd->prepare("UPDATE productos SET nombre = ?, descripcion = ?, tipo_oferta = ?, precio_regular = ?, precio_descuento = ? where id = ?;");
    $resultado = $sentencia->execute([$nombre_producto, $descripcion, $oferta, $precio_regular, $precio_Descuento,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
