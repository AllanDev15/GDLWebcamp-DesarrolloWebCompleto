<?php 

require __DIR__ . '/vendor/autoload.php';
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
// Creating an environment
$clientId = "AYw0iXuWjy78KVY0_ttEXIIYgVIjrxDgXcVkKdFIlo4NmdTsBTFD3698ddiiVz7IkXH-guae0xuzWE8w";
$clientSecret = "EF9ToYrDRPY9qrvLOA-Ol4UrKcKD9559-PA1cdFw8rq1Zam0pahF9Yy-lWD3lSC9oBQ428LHQA2gBTt-";

$enviroment = new SandboxEnvironment($clientId, $clientSecret);
$client = new PayPalHttpClient($enviroment);


// Construct a request object and set desired parameters
// Here, OrdersCreateRequest() creates a POST request to /v2/checkout/orders
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;


// $nombre = $_POST['nombre'];
// $apellido = $_POST['apellido'];
// $email = $_POST['email'];
$numero_boletos = $_POST['boletos'];
$unDiaCantidad = $_POST['boletos']['un_dia']['cantidad'];
$unDiaPrecio = $_POST['boletos']['un_dia']['precio'];
$completoCantidad = $_POST['boletos']['completo']['cantidad'];
$completoPrecio = $_POST['boletos']['completo']['precio'];
$dosDiasCantidad = $_POST['boletos']['2dias']['cantidad'];
$dosDiasPrecio = $_POST['boletos']['2dias']['precio'];
$eventos = $_POST['registro'];

$pedido_extra = $_POST['pedido_extra'];
$camisaCantidad = $_POST['pedido_extra']['camisas']['cantidad'];
$camisaPrecio = $_POST['pedido_extra']['camisas']['precio'];
$etiqCantidad = $_POST['pedido_extra']['etiquetas']['cantidad'];
$etiqPrecio = $_POST['pedido_extra']['etiquetas']['precio'];
$regalo = $_POST['regalo'];
$total = $_POST['total_pedido'];





$request = new OrdersCreateRequest();
$request->prefer('return=representation');


$orden = array(
    'intent' => 'CAPTURE',
    'application_context' =>
        array(
            'return_url' => 'http://localhost/GDLWebcamp?exito=true/',
            'cancel_url' => 'http://localhost/GDLWebcamp?exito=false/',
            'brand_name' => 'GDL Webcamp',
            /*'locale' => 'es-MX',
            'landing_page' => 'BILLING',
            'shipping_preference' => 'SET_PROVIDED_ADDRESS',
            'user_action' => 'PAY_NOW',*/
        ),
        'purchase_units' =>
            array(
                0 =>
                    array(
                        'reference_id' => 'GDLWebcamp2020',
                        'description' => 'Conferencia Desarrollo Web',
                        'custom_id' => 'GDLWebcamp',
                        'invoice_id' => uniqid("GDLW_"),
                        'soft_descriptor' => 'GDLWebcamp2020',
                        'amount' =>
                            array(
                                'currency_code' => 'MXN',
                                'value' => $total,
                                'breakdown' => 
                                    array(
                                        'item_total' => 
                                        array(
                                            'currency_code' => 'MXN',
                                            'value' => $total
                                        )
                                    )
                            ),
                        'items' => 
                        array (
                            
                        )
                    )
            )
);

$i=0;
foreach($numero_boletos as $key => $value) {
    if( ((int) $value['cantidad'] > 0) && $value['cantidad'] != '') {
        $boleto = array(
            'name' => 'Boleto(s)',
            'description' => 'Pase ' . $key,
            'unit_amount' => array (
                'currency_code' => 'MXN',
                'value' => (int)$value['precio']
            ),
            'quantity' => (int)$value['cantidad'],
        );
        array_push($orden['purchase_units'][0]['items'], $boleto);
    }
}

foreach($pedido_extra as $key => $value) {
    if( ((int) $value['cantidad'] > 0) && $value['cantidad'] != '') {
        if($key == 'camisas') {
            $precio = 9.3;
        }
        else{
            $precio = (int) $value['precio'];
        }

        $boleto = array(
            'name' => 'Extra',
            'description' => $key,
            'unit_amount' => array (
                'currency_code' => 'MXN',
                'value' => $precio
            ),
            'quantity' => (int)$value['cantidad'],
        );
        array_push($orden['purchase_units'][0]['items'], $boleto);
    }
}

$request->body = $orden;

// Call API with your client and get a response for your call
$response = $client->execute($request);


$json_obj = array(
    'orderID' => $response->result->id
);

$jsonString = json_encode($json_obj);

// echo "<pre>";
// echo var_dump($json_obj);
// echo "</pre>";



echo $jsonString;

// echo json_encode($response->result, JSON_PRETTY_PRINT), "\n";

?>