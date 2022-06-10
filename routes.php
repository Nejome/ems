<?php

use PHPMailer\PHPMailer\PHPMailer;

$router->respond(function($request, $response, $service, $app){

    $app->register('ems_db', function(){

        $config = require 'core/config.php';

        $ems_db = new ems_db($config['database']);

        return $ems_db;

    });

    $app->register('users', function(){

        $config = require 'core/config.php';

        $users = new users($config['database']);

        return $users;

    });

    $app->register('mail', function(){

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = '';
        $mail->SMTPAuth = true;
        $mail->Username = '';
        $mail->Password = '';
        $mail->Port = 25;
        $mail->CharSet = 'utf-8';
        $mail->setFrom('ems@admin.com', 'Employee management system');
        $mail->isHTML(true);

        return $mail;

    });

});


$router->respond('GET', '/', function($request, $response, $service){

    require 'views/login.view.php';

});

$router->respond('POST', '/login', function($request, $response, $service, $app){

    $users = $app->users;

    require 'controllers/login.php';

});

$router->respond('GET', '/logout', function($request, $response, $service, $app){

    $users = $app->users;

    $users->logout();

    require 'views/login.view.php';

});

$router->respond('GET', '/login-information/[:id]', function($request, $response, $service, $app){

    $users = $app->users;

    $user = $users->get_user($request->id);

    require 'views/login-info.view.php';

});

$router->respond('POST', '/edit-information/[:id]', function($request, $response, $service, $app){

    $users = $app->users;

    $user = $users->get_user($request->id);

    require 'controllers/edit-info.php';

});


/*-----------------
 * the Admin routes
-----------------*/
require 'core/routes/admin.routes.php';

/*-----------------
 * the departments managers routes
-----------------*/
require 'core/routes/managers.routes.php';

/*-----------------
 * the normal employees routes
-----------------*/
require 'core/routes/normal-employees.routes.php';