<?php

require_once __DIR__ . '/vendor/symfony/class-loader/Symfony/Component/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader;

$loader =  new classloader\UniversalClassLoader();
$loader->register();

$loader->registerNamespace('Symfony\\Component\\HttpFoundation', __DIR__ . '/vendor/symfony/http-foundation');