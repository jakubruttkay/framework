<?php

require_once  __DIR__ . '/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$input = $request->get('name','World');

$response = new Response(sprintf('Hello %s', htmlspecialchars($input)));
$response->send();
//var_dump($request->query);

