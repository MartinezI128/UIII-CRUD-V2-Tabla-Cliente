<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellido"])|| empty($_POST["txtDireccion"])|| empty($_POST["txtEstado"])|| empty($_POST["txtCiudad"])|| empty($_POST["txtcodigoPostal"]) || empty($_POST["txtcorreoElectronico"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $direccion = $_POST["txtDireccion"];
    $estado = $_POST["txtEstado"];
    $ciudad = $_POST["txtCiudad"];
    $codigoPostal = $_POST["txtcodigoPostal"];
    $correoElectronico = $_POST["txtcorreoElectronico"];
    
    $sentencia = $bd->prepare("INSERT INTO cliente(nombre,apellido,direccion,estado,ciudad,codigoPostal,correoElectronico) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$apellido,$direccion,$estado,$ciudad,$codigoPostal,$correoElectronico]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>