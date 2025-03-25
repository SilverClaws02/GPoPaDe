<?php
//API URL
// javítani!! $url = 'http://localhost/2per14/RESTAPI_methods/GPoPaDe/api_mysqli.php&#39;;
$url = 'http://localhost/2per14/RESTAPI_methods/GPoPaDe/api.php&#39';;
//figylej ide melyiket szeretnéd updatelni <-PATCH
$productId=8;

//be szeretném az erőforrást insertálni
//CREATE

$data = [
    'id' => $productId,
    'name' => 'Updated name Product Sedlak',
    'price' => 0.99,
    'description' => "This is the newest cutting-edge product"
];

//cURL session-t inicializálni kell
$ch=curl_init($url);

//POST kérés beállítása
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//itt történt módosítás
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

//végrehajtjuk a kérést
$response=curl_exec($ch);

//lezárjunk a session-t
curl_close($ch);

echo $response;