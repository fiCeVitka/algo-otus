<?php

spl_autoload_register(static function ($class) {
    include $class . '.php';
});

ini_set('memory_limit', '-1');

$app = new App();
$app->boot($argv);
