<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);
$app->add(new \Slim\Middleware\JwtAuthentication([
    "path" => ["/user","/secret/generate"],
    "secret" => "myapp_key",
    "algorithm" => ["HS256", "HS384"]
]));
