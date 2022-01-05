<?php
include_once 'funciones/funciones.php';

$nombre = $_POST['nombre_invitado'];
$apellido = $_POST['apellido_invitado'];
$biografia = $_POST['biografia_invitado'];


if ($_POST['registro'] == 'nuevo') {
  /*$respuesta = array(
    'post' => $_POST,
    'file' => $_FILES
  );
  die(json_encode($respuesta));*/

  $directorio = '../img/invitados/';
  if(!is_dir($directorio)) {
    mkdir($directorio, 0775, true);
  }

  if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'] )){
    $imagen_url =$_FILES['archivo_imagen']['name'];
    $imagen_resultado =  "Se subio correctamente";
  } else {
    $respuesta = array(
      'respuesta' => error_get_last()
    );
  }

  try {
    $stmt = $con->prepare("INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion, url_imagen) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $apellido, $biografia, $imagen_url);
    $stmt->execute();
    if($stmt->affected_rows > 0) {
      $respuesta = array(
        'respuesta' => 'exito',
        'id_insertado' => $stmt->insert_id,
        'resultado_imagen' => $imagen_resultado
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
  $id_registro = $_POST['id_registro'];
  
  $directorio = '../img/invitados/';
  if(!is_dir($directorio)) {
    mkdir($directorio, 0775, true);
  }
  if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'] )){
    $imagen_url =$_FILES['archivo_imagen']['name'];
    $imagen_resultado =  "Se subio correctamente";
  } else {
    $respuesta = array(
      'respuesta' => error_get_last()
    );
  }
  try {

    if($_FILES['archivo_imagen']['size'] > 0) {
      // Con Imagen
      $stmt = $con->prepare('UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ?, url_imagen = ? WHERE invitado_id = ?');
      $stmt->bind_param("ssssi", $nombre, $apellido, $biografia, $imagen_url, $id_registro);
    } else {
      // Sin Imagen
      $stmt = $con->prepare('UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ? WHERE invitado_id = ?');
      $stmt->bind_param("sssi", $nombre, $apellido, $biografia, $id_registro);
    }
    $estado = $stmt->execute();
    if($estado) {
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
        $stmt = $con->prepare("DELETE FROM invitados WHERE invitado_id = ?");
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