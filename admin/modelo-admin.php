<?php
include_once 'funciones/funciones.php';
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$password = $_POST['password'];
$id_registro = $_POST['id_registro'];

if ($_POST['registro'] == 'nuevo') {

    // die(json_encode($_POST));

    $nivel = 0;

    $opciones = array(
        'cost' => 12,
    );

    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

    try {
        $stmt = $con->prepare("INSERT INTO admins (usuario, nombre, password, nivel) VALUES(?,?,?,?)");
        $stmt->bind_param("sssi", $usuario, $nombre, $password_hashed, $nivel);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_admin' => $stmt->insert_id,
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error',
            );
        }

        $stmt->close();
        $con->close();

    } catch (Exception $e) {
        $respuesta = array(
            'error' => $e->getMessage(),
        );
    }

    echo json_encode($respuesta);

}

if ($_POST['registro'] == 'actualizar') {

    try {
        if (empty($_POST['password'])) {
            $stmt = $con->prepare("UPDATE admins SET usuario = ?, nombre = ?, editado = NOW() WHERE id_admin = ?");
            $stmt->bind_param("ssi", $usuario, $nombre, $id_registro);
        } else {
            $opciones_hash = array(
                'cost' => 12,
            );
            $stmt = $con->prepare("UPDATE admins SET usuario = ?, nombre = ?, password = ? WHERE id_admin = ?");
            $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones_hash);
            $stmt->bind_param("sssi", $usuario, $nombre, $hash_password, $id_registro);
        }
        
        $stmt->execute();
        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $stmt->insert_id,
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error',
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
        $stmt = $con->prepare("DELETE FROM admins WHERE id_admin = ?");
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
