<?php 

include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';

$sql = "SELECT fecha_registro, COUNT(*) AS resultado FROM registrados GROUP BY fecha_registro ORDER BY fecha_registro";
$resultado = $con->query($sql);

$arreglo_registros = [];

while($registro_dia = $resultado->fetch_assoc()) {
  $fecha = $registro_dia['fecha_registro'];
  $registro['fecha'] = date('Y-m-d', strtotime($fecha));
  
  $registro['cantidad'] = $registro_dia['resultado'];

  $arreglo_registros[] = $registro;
}
// echo '<pre>';
// var_dump($arreglo_registros);
// var_dump(json_encode($arreglo_registros, true));
// echo '</pre>';

echo json_encode($arreglo_registros);
?>