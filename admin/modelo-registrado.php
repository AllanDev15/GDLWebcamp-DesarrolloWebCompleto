<?php
include_once 'funciones/funciones.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$boletos_adquiridos = $_POST['boletos'];
$camisas = $_POST['pedido_extra']['camisas']['cantidad'];
$etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];

$pedido = productos_json($boletos_adquiridos, $camisas, $etiquetas);
$regalo = $_POST['regalo'];
$total = $_POST['total_pedido'];

$eventos = $_POST['registro_evento'];
$registro_eventos = eventos_json($eventos);

// die(json_encode($_POST));

if ($_POST['registro'] == 'nuevo') {
  try {
    $stmt = $con->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,NOW(),?,?,?,?)");
    $stmt->bind_param("sssssis", $nombre, $apellido, $email, $pedido, $registro_eventos, $regalo, $total);
    $stmt->execute();
    if($stmt->affected_rows > 0) {
      $respuesta = array(
        'respuesta' => 'exito',
        'id_insertado' => $stmt->insert_id
      );
    } else {
      $respuesta = array(
        'respuesta' => 'error'
      );
    }
    $stmt->close();
    $con->close();
  } catch (Exception $e) {
    $respuesta = array(
      'respuesta' => $e->getMessage()
    );
  }

  echo json_encode($respuesta);
}

if ($_POST['registro'] == 'actualizar') {
  $fecha_registro = $_POST['fecha_registro'];
  $id_registro = $_POST['id_registro'];
  try {
    $stmt = $con->prepare("UPDATE registrados SET nombre_registrado = ?, apellido_registrado = ?,  email_registrado = ?, fecha_registro = ?, pases_articulos = ?, talleres_registrados = ?, regalo = ?, total_pagado = ? WHERE id_registrado = ?");
    $stmt->bind_param("ssssssisi", $nombre, $apellido, $email, $fecha_registro, $pedido, $registro_eventos, $regalo, $total, $id_registro);

    $stmt->execute();
    if($stmt->affected_rows > 0) {
        $respuesta = array(
            'respuesta' => 'exito',
            'id_actualizado' => $id_registro
        );
    } else {
        $respuesta = array(
            'respuesta' => 'error'
        );
    }

    $stmt->close();
    $con->close();

  } catch (Exception $e) {
    $respuesta = array(
        'respuesta' => $e->getMessage(),
    );
  }
  echo json_encode($respuesta);
}

if($_POST['registro'] === 'eliminar') {
    $id_borrar = $_POST['id'];

    try {
        $stmt = $con->prepare("DELETE FROM registrados WHERE id_registrado = ?");
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar,
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
    } catch (Exception $e) {
        $respuesta = array (
            'respuesta' => $e->getMessage()
        );
    }

    echo json_encode($respuesta);
}