<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from productos where id = ?;");
    $sentencia->execute([$codigo]);
    $producto = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre del Producto: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $producto->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripcion del producto: </label>
                        <input type="text" class="form-control" name="txtDescripcion" autofocus required
                        value="<?php echo $producto->descripcion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de oferta: </label>
                        <input type="number" class="form-control" name="txtOferta" autofocus required
                        value="<?php echo $producto->tipo_oferta; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio regular: </label>
                        <input type="number" class="form-control" name="txtPrecioRegular" autofocus required
                        value="<?php echo $producto->precio_regular; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio con descuento </label>
                        <input type="number" class="form-control" name="txtPrecioDescuento" autofocus required
                        value="<?php echo $producto->precio_descuento; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $producto->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>