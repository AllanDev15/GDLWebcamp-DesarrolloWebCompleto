<?php

namespace configPayPal;

// require __DIR__ . '/vendor/autoload.php';
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient
{
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    public static function environment()
    {
        $clientId = "AYw0iXuWjy78KVY0_ttEXIIYgVIjrxDgXcVkKdFIlo4NmdTsBTFD3698ddiiVz7IkXH-guae0xuzWE8w";
        $clientSecret = "EF9ToYrDRPY9qrvLOA-Ol4UrKcKD9559-PA1cdFw8rq1Zam0pahF9Yy-lWD3lSC9oBQ428LHQA2gBTt-";
        return new SandBoxEnvironment($clientId, $clientSecret);
    }
}