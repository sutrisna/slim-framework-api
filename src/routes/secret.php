<?php

use Slim\Http\Request;
use Slim\Http\Response;

use Firebase\JWT\JWT;

// Routes

$app->get('/secret/generate', function (Request $request, Response $response, array $args) {
    $key = "myapp_key";
    $now = new DateTime();

    $payload = array(
        "nama" => "trisna",
        "iat" => $now->getTimeStamp()
    );

    $token = JWT::encode($payload,$key,"HS256");
    return $response->withJson($token);
});
