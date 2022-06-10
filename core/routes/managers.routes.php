<?php

use Carbon\Carbon;

$router->respond('GET', '/managers', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    require 'views/departments-managers/home.view.php';

});


/*
 * Leave management routes
 */

$router->respond('GET', '/managers/leaves/new-requests', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $my_employees = $ems->get_my_employees($_SESSION['user_emp_id']);

    require 'views/departments-managers/leaves-management/new-requests.view.php';

});

$router->respond('GET', '/managers/leaves/[:id]/view/[:employee_id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $emp = $ems->get_an_employee($request->employee_id);

    $rq = $ems->get_an_request($request->id);

    require 'views/departments-managers/leaves-management/view-details.view.php';

});

$router->respond('POST', '/managers/leaves/[:id]/decision/[:employee_id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $emp = $ems->get_an_employee($request->employee_id);

    $rq = $ems->get_an_request($request->id);

    $mail = $app->mail;

    require 'controllers/managers/leaves/taking-decision.php';

});

$router->respond('GET', '/mangers/[:id]/leaves', function($request, $response, $service, $app){

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

    require 'views/departments-managers/leaves-management/leaves-information-request.view.php';

});

$router->respond('POST', '/sending-manager-request/[:id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $emp = $ems->get_leaves_info_of($_SESSION['user_emp_id']);

    require 'controllers/managers/leaves/add-request.php';

});

$router->respond('GET', '/managers/leaves/department-archives', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $my_employees = $ems->get_my_employees($_SESSION['user_emp_id']);

    require 'views/departments-managers/leaves-management/archives.view.php';

});

$router->respond('GET', '/archives/[:id]/display/[:employee_id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $rq = $ems->get_an_request($request->id);

    $emp = $ems->get_an_employee($request->employee_id);

    $my_employees = $ems->get_my_employees($_SESSION['user_emp_id']);

    require 'views/departments-managers/leaves-management/just-display.view.php';

});

$router->respond('GET', '/managers/leaves/my-archives', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $requests = $ems->get_requests_of($_SESSION['user_emp_id']);

    require 'views/departments-managers/leaves-management/my-archives.view.php';

});

$router->respond('GET', '/managers/leaves/[:id]/display', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $rq = $ems->get_an_request($request->id);

    require 'views/departments-managers/leaves-management/display-my-request.view.php';

});

$router->respond('GET', '/managers/leaves/[:id]/edit', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $rq = $ems->get_an_request($request->id);

    require 'views/departments-managers/leaves-management/edit-my-request.view.php';

});


$router->respond('POST', '/edit-my-request/[:id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $rq = $ems->get_an_request($request->id);

    require 'controllers/managers/leaves/edit-request.php';

});


/*
 * Attendance routes
 */

$router->respond('GET', '/managers/take-attendance', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $employees = $ems->get_my_employees($_SESSION['user_emp_id']);

    require 'views/departments-managers/attendance/take-attendance.view.php';

});

$router->respond('GET', '/take-attendance-for/[:id]/[:status]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    require 'controllers/managers/attendance/take-attendance.php';

});

$router->respond('GET', '/managers/take-departure', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $employees = $ems->get_my_employees($_SESSION['user_emp_id']);

    require 'views/departments-managers/attendance/take-departure.view.php';

});

$router->respond('GET', '/take-departure-of/[:id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    require 'controllers/managers/attendance/take-departure.php';

});

$router->respond('GET', '/managers/employees-list', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $employees = $ems->get_my_employees($_SESSION['user_emp_id']);

    require 'views/departments-managers/attendance/employees-list.view.php';

});

$router->respond('GET', '/attendance-archives/[:employee_id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $atts = $ems->get_all_attendance_of($request->employee_id);

    $emp = $ems->get_an_employee($request->employee_id);

    require 'views/departments-managers/attendance/an-employee-archives.view.php';

});

/*
 * The Reports routes
 */



$router->respond('GET', '/managers/reports/new-requests', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $requests = $ems->get_reports_requests_for_me($_SESSION['user_emp_id']);

    require 'views/departments-managers/reports/new-requests.view.php';

});

$router->respond('GET', '/reports/fill-official-report-for/[:employee_id]/[:request_id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    require 'views/departments-managers/reports/fill-official-report.view.php';

});

$router->respond('GET', '/reports/fill-academic-report-for/[:employee_id]/[:request_id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    require 'views/departments-managers/reports/fill-academic-report.view.php';

});


$router->respond('POST', '/filling-academic-report/[:employee_id]/[:request_id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    require 'controllers/managers/reports/fill-academic-report.php';

});

$router->respond('POST', '/filling-official-report/[:employee_id]/[:request_id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    require 'controllers/managers/reports/fill-official-report.php';

});