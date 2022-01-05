<?php 

namespace configPayPal;

require __DIR__ . '/vendor/autoload.php';
use PayPalCheckoutSdk\Orders\OrdersGetRequest;

require 'config.php';

$orderID = $_GET['orderID'];


// 3. Call PayPal to get the transaction details
$client = PayPalClient::client();
$response = $client->execute(new OrdersGetRequest($orderID));

// 4. Specify which information you want from the transaction details. For example:
/*$orderID = $response->result->id;
$email = $response->result->payer->email_address;
$name = $response->result->purchase_units[0]->shipping->name->full_name;
$address = $response->result->purchase_units[0]->shipping->address;*/
    
echo "<pre>";
// echo var_dump($response->result->{'purchase_units'}[0]->payments->captures[0]->id);
// echo var_dump($response->result->payer->name->{'given_name'});
// print_r($response->result);
echo "</pre>";
$nombreComprador = $response->result->payer->name->{'given_name'};
$apellidoComprador = $response->result->payer->name->surname;
$email = $response->result->payer->{'email_address'};
$idTransaccion = $response->result->{'purchase_units'}[0]->payments->captures[0]->id;


?>

<?php include_once 'includes/templates/header.php'; ?>

<section class="titulo-seccion seccion">
  <h2>Resumen Registro</h2>
  <?php 
            if(isset($_GET['exito']) && isset($_GET['orderID'])):
                if($_GET['exito'] == 1):?>

  <div class="resultado correcto">
    <p>Registro exitoso</p>
    <p>Numero de Orden: <?= $orderID ?></p>
    <p>Id de Transaccion: <?= $idTransaccion ?> </p>
    <p>Nombre: <?= $nombreComprador . ' ' .$apellidoComprador ?></p>
    <p>E-mail: <?= $email ?></p>
  </div>

  <?php   else: ?>
  <div class="resultado error">
    <p>Fallo el Registro</p>
  </div>
  <?php   endif;
            endif;
        ?>
</section>

<?php include_once 'includes/templates/footer.php'; ?>