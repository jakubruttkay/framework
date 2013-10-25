<?php
require_once __DIR__ . '/../vendor/autoload.php';


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;


$request = Request::createFromGlobals();

//$map = array(
//    '/hello' => __DIR__.'/../src/pages/hello.php',
//    '/bye'   => __DIR__.'/../src/pages/bye.php',
//);
$routes = new RouteCollection();
$routes->add('hello', new Route('/hello/{name}', array('name'=>'World')));
$routes->add('bye', new Route('/bye'));
$context = new RequestContext($request);
$matcher = new UrlMatcher($routes, $context);

//$path = $request->getPathInfo();
//if (isset($map[$path])) {
//    ob_start();
//    extract($request->query->all(), EXTR_SKIP);
//    include sprintf(__DIR__.'/../src/pages/%s.php', $map[$path]);
//    $response = new Response(ob_get_clean());
//
//    require $map[$path];
//} else {
//    $response = new Response('404 Error: Not Found', 404);
//}
try{
    extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
    ob_start();
    include sprintf(__DIR__.'/../src/pages/%s.php', $_route);

    $response = new Response(ob_get_clean());
} catch (Symfony\Component\Routing\Exception\ResourceNotFoundException $e) {
    $response = new Response('Error: 404 - Route not found', 404);
} catch (Exception $e) {
    $response = new Response('Error: 500 - Error occurred', 500);
}

$response->send();
