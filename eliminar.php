<?php 
    if(!isset($_GET['IdCliente'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $IdCliente = $_GET['IdCliente'];

    $sentencia = $bd->prepare("DELETE FROM cliente where IdCliente = ?;");
    $resultado = $sentencia->execute([$IdCliente]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>