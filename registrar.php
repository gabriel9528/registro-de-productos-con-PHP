<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtDescripcion"]) || empty($_POST["txtOferta"]) || empty($_POST["txtPrecioRegular"]) || empty($_POST["txtPrecioDescuento"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$nombre_precio = $_POST["txtNombre"];
$descripcion = $_POST["txtDescripcion"];
$oferta = $_POST["txtOferta"];
$precio_regular = $_POST["txtPrecioRegular"];
$precio_descuento = $_POST["txtPrecioDescuento"];

$sentencia = $bd->prepare("INSERT INTO productos(nombre,descripcion,tipo_oferta,precio_regular,precio_descuento) VALUES (?,?,?,?,?);");
$resultado = $sentencia->execute([$nombre_precio, $descripcion, $oferta, $precio_regular, $precio_descuento]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
