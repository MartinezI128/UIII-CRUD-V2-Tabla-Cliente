<?php
    print_r($_POST);
    if(!isset($_POST['IdCliente'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $IdCliente = $_POST['IdCliente'];
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST["txtApellido"];
    $direccion = $_POST["txtDireccion"];
    $estado = $_POST["txtEstado"];
    $ciudad = $_POST["txtCiudad"];
    $codigoPostal = $_POST['txtcodigoPostal'];
    $correoElectronico = $_POST['txtcorreoElectronico'];

    $sentencia = $bd->prepare("UPDATE cliente SET nombre = ?,apellido = ?,direccion = ?, estado = ?,ciudad = ?,codigoPostal = ?, correoElectronico = ? where IdCliente = ?;");
    $resultado = $sentencia->execute([$nombre,$apellido,$direccion,$estado,$ciudad, $codigoPostal, $correoElectronico, $IdCliente]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>