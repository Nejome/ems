<?php

session_start();

//ini_set('session.cookie_lifetime', 0);

//ini_set('max_execution_time', 300);

require 'core/bootstrap.php';

define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"]);

$router = new Klein\Klein();

require 'routes.php';

$router->dispatch();