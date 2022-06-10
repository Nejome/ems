<?php

use Carbon\Carbon;

$router->respond('GET', '/normal-employee', function($request, $response, $service, $app){

    require 'views/normal-employee/home.view.php';

});

$router->respond('GET', '/employee/[:id]/leaves', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $rows = $ems->db->query("select employee_id, year(hiring_date) as year from employees");

    foreach($rows as $row){

        $last_leave = $ems->db->query("select year(last_leave) as year from leaves_information where employee_id = $row[employee_id]")

            ->fetch();

        $available = $ems->db->query("select available_days as days from leaves_information where employee_id = $row[employee_id]")
            ->fetch();

        $last_update = $ems->db->query("select year(last_update) as year from leaves_information where employee_id = $row[employee_id]")
            ->fetch();

        if($last_leave['year'] == null){

            if(((Carbon::now()->year - $row['year']) >= 1) && (Carbon::today()->year - $last_update['year'] >= 1)){

                $ems->db->prepare("update leaves_information set available_days = available_days + leave_duration, last_update = :last_update 
                            where employee_id = $row[employee_id]")
                    ->execute(array(':last_update' => Carbon::today()));

            }

        }else if(((Carbon::now()->year - $last_leave['year'] >= 1)) && (Carbon::today()->year - $last_update['year'] >= 1)){

            $ems->db->prepare("update leaves_information set available_days = available_days + leave_duration, last_update = :last_update
                            where employee_id = $row[employee_id]")
                ->execute(array(':last_update' => Carbon::today()));

        }

    }

    $emp = $ems->get_leaves_info_of($_SESSION['user_emp_id']);

    require 'views/normal-employee/leaves/leaves-information-request.view.php';

});

$router->respond('POST', '/sending-request/[:id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $emp = $ems->get_leaves_info_of($_SESSION['user_emp_id']);

    require 'controllers/normal-employee/add-request.php';

});

$router->respond('GET', '/employee/leaves/archives', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $requests = $ems->get_requests_of($_SESSION['user_emp_id']);

    require 'views/normal-employee/leaves/archives.view.php';

});

$router->respond('GET', '/employee/leaves/[:id]/display', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $request = $ems->get_an_request($request->id);

    require 'views/normal-employee/leaves/display-request.view.php';

});

$router->respond('GET', '/employee/leaves/[:id]/edit', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $request = $ems->get_an_request($request->id);

    require 'views/normal-employee/leaves/edit-request.view.php';

});

$router->respond('POST', '/edit-request/[:id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $request = $ems->get_an_request($request->id);

    require 'controllers/normal-employee/edit-request.php';

});
