<?php 
    /*if(isset($_POST['submit'])): 
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $regalo = $_POST['regalo'];
        $total = $_POST['total_pedido'];
        $fecha = date('Y-m-d H-i-s');
        //Convertimos los Pedidos a JSON
        $boletos = $_POST['boletos'];
        $camisas = $_POST['pedido_camisas'];
        $etiquetas = $_POST['pedido_etiquetas'];
        include_once 'includes/funciones/funciones.php';
        $pedido = productos_json($boletos, $camisas, $etiquetas);
        //Convertimos los Eventos a JSON
        $eventos = $_POST['registro'];
        $registro = eventos_json($eventos);
        // Insertando en la Base de Datos
        if(isset($nombre) && isset($apellido) && isset($email)):
            try{
                require_once('includes/funciones/bd_conexion.php');
                //statement
                $stmt = $con -> prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) values(?,?,?,?,?,?,?,?)");
                $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
                $stmt->execute();
                $stmt->close();
                $con->close();
                header('Location: validar_registro.php?exitoso=1&boletos=' . $boletos);
            } catch(Exception $e) {
                echo $e->getMessage();
            }

            
        endif;
    endif; */
?>
<!-- El codigo php se coloca antes de que se muestre el html en el navegador
para evitar cada vez que se recarge la pagina se inserte de nuevo la informacion en la BD -->
<?php include_once 'includes/templates/header.php'; ?>

    <section class="titulo-seccion contenedor">
        <h2>Resumen Registro</h2>
        <?php 
            if(isset($_GET['exito'])):
                if($_GET['exito'] == 1):
                    echo "Registro exitoso";
                    // echo $boletos;
                else:
                    echo "Registro_fallido";
                endif;
            endif;
        ?>
    </section>

<?php include_once 'includes/templates/footer.php'; ?>