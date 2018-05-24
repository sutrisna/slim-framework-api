<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/[{id}]', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'index.phtml', $args);
});
