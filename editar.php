<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['IdCliente'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $IdCliente = $_GET['IdCliente'];

    $sentencia = $bd->prepare("select * from cliente where IdCliente = ?;");
    $sentencia->execute([$IdCliente]);
    $cliente = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($cliente);
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
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $cliente->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido: </label>
                        <input type="text" class="form-control" name="txtApellido" autofocus required
                        value="<?php echo $cliente->apellido; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Direccion: </label>
                        <input type="text" class="form-control" name="txtDireccion" autofocus required
                        value="<?php echo $cliente->direccion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado: </label>
                        <input type="text" class="form-control" name="txtEstado" autofocus required
                        value="<?php echo $cliente->estado; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ciudad: </label>
                        <input type="text" class="form-control" name="txtCiudad" autofocus required
                        value="<?php echo $cliente->ciudad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">codigoPostal: </label>
                        <input type="number" class="form-control" name="txtcodigoPostal" autofocus required
                        value="<?php echo $cliente->codigoPostal; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">correoElectronico: </label>
                        <input type="text" class="form-control" name="txtcorreoElectronico" autofocus required
                        value="<?php echo $cliente->correoElectronico; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="IdCliente" value="<?php echo $cliente->IdCliente; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br><br><br>
<?php include 'template/footer.php' ?>