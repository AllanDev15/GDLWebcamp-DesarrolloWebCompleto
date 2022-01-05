<?php 

include_once 'funciones/funciones.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$fecha = date('Y-m-d H-i-s');

$boletos = $_POST['boletos'];

$eventos = $_POST['registro'];
$camisas = $_POST['pedido_extra']['camisas']['cantidad'];
$etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];
$regalo = $_POST['regalo'];
$total = $_POST['total_pedido'];

$pedido = productos_json($boletos, $camisas, $etiquetas);
$registro = eventos_json($eventos);

try
{
    require_once('funciones/bd_conexion.php');
    $stmt = $con -> prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) values(?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
    $stmt->execute();
    if($stmt->affected_rows > 0) {
        $respuesta = array(
            'res' => 'exito',
            'id' => $stmt->insert_id
        );
    }else {
        $respuesta = array(
            'res' => 'fallo'
        );
    }

    $stmt->close();
    $con->close();
}
catch(Exception $e) {
    $respuesta = array(
        'res' => 'fallo',
        'error' => $e->getMessage()
    );
}


echo json_encode($respuesta);

?>