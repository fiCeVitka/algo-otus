<?php

spl_autoload_register(static function ($class) {
    include $class . '.php';
});

$app = new App();
$app->boot($argv);
