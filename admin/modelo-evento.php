<?php
include_once 'funciones/funciones.php';
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$password = $_POST['password'];
$id_registro = $_POST['id_registro'];

$titulo = $_POST['titulo_evento'];
$categoria_id = $_POST['categoria_evento'];
$invitado_id = $_POST['invitado'];
// Obtener fecha
$fecha = $_POST['fecha_evento'];
$fecha_formateada = date('Y-m-d', strtotime($fecha));
$hora = $_POST['hora_evento'];
$hora_24 = date('H:i', strtotime($hora));

$clave = ' ';

//actualizar
$id_registro = $_POST['id_registro'];

if ($_POST['registro'] == 'nuevo') {
  try {
    $stmt = $con->prepare("INSERT INTO eventos(nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv, clave) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("sssiis", $titulo, $fecha_formateada, $hora_24, $categoria_id, $invitado_id, $clave);
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
    die(json_encode($respuesta));
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
    try {
        $stmt = $con->prepare("UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?, id_cat_evento = ?, id_inv = ?, editado = NOW() WHERE evento_id = ?");
        $stmt->bind_param('sssiii', $titulo, $fecha_formateada, $hora_24, $categoria_id, $invitado_id, $id_registro);
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
        $stmt = $con->prepare("DELETE FROM eventos WHERE evento_id = ?");
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
