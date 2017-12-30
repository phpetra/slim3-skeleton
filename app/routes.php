<?php
// Routes

use Slim\Http\Request;
use Slim\Http\Response;


// separate actions
$app->get('/', App\Action\HomeAction::class)
    ->setName('homepage');

// basic routes
$app->get('/api', function (Request $request, Response $response) {
    //$uri = $request->getParam('uri');
    //$name = $request->getAttribute('name');
    $streets = $this->some_service->findAll();
    return $response
        ->withJson($streets);
})->setName('example');


$app->get('/admin', function (Request $request, Response $response) {
    $this->logger->addInfo('Secret site just for admins');

    $response = $this->view->render(
        $response,
        'secret.twig',
        []
    );

    return $response;
})->setName('admin');

