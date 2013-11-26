<?php


$routes = include __DIR__.'/../src/app.php';
$routes = new RouteCollection();
$routes->add('hello', new Route('/hello/{name}', array('name'=>'World')));
$routes->add('bye', new Route('/bye'));
$context = new RequestContext($request);
$matcher = new UrlMatcher($routes, $context);