<?php

use App\Helpers\View;
use Bramus\Router\Router;

$router = new Router();

$router->setNamespace('\App\Controllers');
$router->get('/', 'ContactController@index');
$router->get('/contacts', 'ContactController@index');
$router->get('/contacts/create', function() {
    View::show('contacts.create');
});
$router->post('/contacts/{id}/delete', 'ContactController@delete');
$router->get('/contacts/{id}', 'ContactController@show');
$router->post('/contacts/{id}', 'ContactController@update');
$router->post('/contacts', 'ContactController@create');

$router->run();