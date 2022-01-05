<?php 

require_once 'includes/funciones/funciones.php';

// Asi llega la informacion de boletos en $_POST['boletos']
$boletos = array(
    'un_dia' => array(
        'cantidad' => '1',
        'precio' => '30'
    ),
    'completo' => array(
        'cantidad' => '2',
        'precio' => '50'
    ),
    '2dias' => array(
        'cantidad' => '',
        'precio' => '45'
    )
);

// Asi llega la informacion de extras en $_POST['pedido_extra']
$eventos = array(
    'taller_02', 'taller_04', 'conf_02', 'conf_03'
);

$registro = eventos_json($eventos);
$res = productos_json($boletos, 1, 1);

echo "<pre>";
echo var_dump($res);
echo var_dump($registro);
echo "</pre>";

?>