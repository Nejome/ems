<?php

$router->respond('GET', '/admin', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    require 'views/admin/home.view.php';

});

$router->respond('GET', '/admin/users/add', function($request, $response, $service, $app){

    $users = $app->users;

    $ems = $app->ems_db;

    $officials = $ems->get_all_official();

    $academics = $ems->get_all_academic();

    require 'views/admin/users/add-user.view.php';

});

$router->respond('POST', '/add-user', function($request, $response, $service, $app){

    $users = $app->users;

    $ems = $app->ems_db;

    $officials = $ems->get_all_official();

    $academics = $ems->get_all_academic();

    $mail = $app->mail;

    require 'controllers/admin/users/add-user.php';

});

$router->respond('GET', '/admin/users/manage', function($request, $response, $service, $app){

    $users = $app->users;

    $rows = $users->get_all_users();

    require 'views/admin/users/manage-users.view.php';

});


$router->respond('GET', '/delete-user/[:id]', function($request, $response, $service, $app){

    $users = $app->users;

    $row = $users->get_user($request->id);

    require 'controllers/admin/users/delete-user.php';

});


$router->respond('GET', '/admin/users/[:id]/edit', function($request, $response, $service, $app){

    $users = $app->users;

    $row = $users->get_user($request->id);

    require 'views/admin/users/edit-user.view.php';

});

$router->respond('POST', '/edit-user/[:id]', function($request, $response, $service, $app){

    $users = $app->users;

    $row = $users->get_user($request->id);

    require 'controllers/admin/users/edit-user.php';

});

//employees
$router->respond('GET', '/admin/official/add', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $jobs = $ems->get_managements_jobs();

    require 'views/admin/employees/add-official.view.php';

});

$router->respond('POST', '/add-official', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $jobs = $ems->get_managements_jobs();

    require 'controllers/admin/add-official.php';

});

$router->respond('GET', '/admin/academic/add', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $jobs = $ems->get_collages_jobs();

    require 'views/admin/employees/add-academic.view.php';

});

$router->respond('POST', '/add-academic', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $jobs = $ems->get_collages_jobs();

    require 'controllers/admin/add-academic.php';

});

$router->respond('GET', '/admin/employees/manage', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $officials = $ems->get_all_official();

    $academics  = $ems->get_all_academic();

    require 'views/admin/employees/manage-employees.view.php';

});

$router->respond('GET', '/admin/officials/[:id]/display', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $row = $ems->get_an_official($request->id);

    require 'views/admin/employees/display-employee.view.php';

});

$router->respond('GET', '/admin/academics/[:id]/display', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $row = $ems->get_an_academic($request->id);

    require 'views/admin/employees/display-employee.view.php';

});



$router->respond('GET', '/admin/officials/[:id]/edit', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $row = $ems->get_an_official($request->id);

    $jobs = $ems->get_managements_jobs();

    $contract_type = ['كامل', 'جزئي', 'متعاون'];

    require 'views/admin/employees/edit-official.view.php';

});

$router->respond('GET', '/admin/academics/[:id]/edit', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $row = $ems->get_an_employee($request->id);

    $jobs = $ems->get_collages_jobs();

    $contract_type = ['كامل', 'جزئي', 'متعاون'];

    require 'views/admin/employees/edit-academic.view.php';

});

$router->respond('POST', '/edit-official/[:id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $row = $ems->get_an_official($request->id);

    $jobs = $ems->get_managements_jobs();

    $contract_type = ['كامل', 'جزئي', 'متعاون'];

    require 'controllers/admin/edit-official.php';

});

$router->respond('POST', '/edit-academic/[:id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $row = $ems->get_an_academic($request->id);

    $jobs = $ems->get_collages_jobs();

    $contract_type = ['كامل', 'جزئي', 'متعاون'];

    require 'controllers/admin/edit-academic.php';

});

$router->respond('GET', '/delete-employee/[:id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $row = $ems->get_an_employee($request->id);

    require 'controllers/admin/delete-employee.php';

});

// End of the Employees routes

//jobs routes

$router->respond('GET', '/admin/jobs/add/type', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    require 'views/admin/jobs/add-job-type.view.php';

});

$router->respond('POST', '/admin/jobs/add', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    if($_POST['type'] == 1){

        $branches = $ems->get_all_managements();

    }else if($_POST['type'] == 2){

        $branches = $ems->get_all_collages();

    }

    $type = $_POST['type'];

    require 'views/admin/jobs/add-jop.view.php';

});

$router->respond('POST', '/add-job', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    if($_POST['type'] == 1){

        $branches = $ems->get_all_managements();

    }else if($_POST['type'] == 2){

        $branches = $ems->get_all_collages();

    }

    $type = $_POST['type'];

    require 'controllers/admin/add-job.php';

});

$router->respond('GET', '/admin/jobs/manage', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $mgs_jobs = $ems->get_managements_jobs();

    $cols_jobs = $ems->get_collages_jobs();

    require 'views/admin/jobs/manage-jobs.view.php';

});
$router->respond('GET', '/admin/jobs/[:id]/edit', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $job = $ems->get_an_job($request->id);

    $ems = $app->ems_db;

    if($job['type'] == 1){

        $branches = $ems->get_all_managements();

    }else if($job['type'] == 2){

        $branches = $ems->get_all_collages();

    }

    $type = $job['type'];

    require 'views/admin/jobs/edit-job.view.php';

});

$router->respond('POST', '/edit-job/[:id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $job = $ems->get_an_job($request->id);

    $ems = $app->ems_db;

    if($job['type'] == 1){

        $branches = $ems->get_all_managements();

    }else if($job['type'] == 2){

        $branches = $ems->get_all_collages();

    }

    $type = $job['type'];

    require 'controllers/admin/edit-job.php';

});

$router->respond('GET', '/delete-job/[:id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    require 'controllers/admin/delete-job.php';

});
//End of jobs routes



//managements routes

$router->respond('GET', '/admin/managements/add', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $rows = $ems->get_all_official();

    require 'views/admin/managements/add-management.view.php';

});

$router->respond('POST', '/add-management', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $rows = $ems->get_all_official();

    require 'controllers/admin/add-management.php';

});

$router->respond('GET', '/admin/managements/manage', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $mgs = $ems->get_all_managements();

    require 'views/admin/managements/manage-managements.view.php';

});


$router->respond('GET', '/admin/managements/[:id]/edit', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $rows = $ems->get_all_official();

    $mg = $ems->get_an_managements($request->id);

    require 'views/admin/managements/edit-management.view.php';

});

$router->respond('POST', '/edit-management/[:id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $rows = $ems->get_all_official();

    $mg = $ems->get_an_managements($request->id);

    require 'controllers/admin/edit-management.php';

});

$router->respond('GET', '/delete-management/[:id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    require 'controllers/admin/delete-management.php';

});

//end of managements routes

//*************************************************

//collages routes



$router->respond('GET', '/admin/collages/add', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $rows = $ems->get_all_academic();

    require 'views/admin/collages/add-collage.view.php';

});

$router->respond('POST', '/add-collage', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $rows = $ems->get_all_academic();

    require 'controllers/admin/add-collage.php';

});

$router->respond('GET', '/admin/collages/manage', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $collages = $ems->get_all_collages();

    require 'views/admin/collages/manage-collages.view.php';

});


$router->respond('GET', '/admin/collages/[:id]/edit', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $rows = $ems->get_all_academic();

    $co = $ems->get_an_collage($request->id);

    require 'views/admin/collages/edit-collage.view.php';

});

$router->respond('POST', '/edit-collage/[:id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $rows = $ems->get_all_academic();

    $co = $ems->get_an_collage($request->id);

    require 'controllers/admin/edit-collage.php';

});

$router->respond('GET', '/delete-collage/[:id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    require 'controllers/admin/delete-collage.php';

});


//end of collages routes


//leaves management
$router->respond('GET', '/admin/leaves/requests', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $employees = $ems->get_all_employees();

    require 'views/admin/leaves-management/new-requests.view.php';

});

$router->respond('GET', '/admin/leaves/[:id]/request-details/[:employee_id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $emp = $ems->get_an_employee($request->employee_id);

    $rq = $ems->get_an_request($request->id);

    require 'views/admin/leaves-management/view-details.view.php';

});

$router->respond('POST', '/leaves-request/[:id]/taking-decision/[:employee_id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $rq = $ems->get_an_request($request->id);

    $emp = $ems->get_an_employee($request->employee_id);

    $mail = $app->mail;

    $info = $ems->get_leaves_info_of($request->employee_id);

    require 'controllers/admin/leaves/take-decision.php';

});

$router->respond('GET', '/admin/leaves/archives', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $employees = $ems->get_all_employees();

    require 'views/admin/leaves-management/archives.view.php';

});
$router->respond('GET', '/admin/leaves-archives/[:id]/display/[:employee_id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $rq = $ems->get_an_request($request->id);

    $emp = $ems->get_an_employee($request->employee_id);

    require 'views/admin/leaves-management/just-display.view.php';

});


//reports

$router->respond('GET', '/admin/reports/request-report', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $officials = $ems->get_all_official();

    $academics  = $ems->get_all_academic();

    require 'views/admin/reports/request-report.view.php';

});

$router->respond('GET', '/admin/request-report-about/[:id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $emp = $ems->get_an_employee($request->id);

    require 'controllers/admin/reports/request-report.php';

});

$router->respond('GET', '/admin/reports/received-reports', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $academic = $ems->get_all_academic_reports();

    $official = $ems->get_all_official_reports();

    require 'views/admin/reports/received-report.view.php';

});

$router->respond('GET', '/admin/reports/[:id]/display-official/[:employee_id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $row = $ems->get_an_official($request->employee_id);

    $rp = $ems->get_an_official_report($request->id);

    require 'views/admin/reports/display-official-report.view.php';

});

$router->respond('GET', '/admin/reports/[:id]/print-official/[:employee_id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $row = $ems->get_an_official($request->employee_id);

    $rp = $ems->get_an_official_report($request->id);

    $rqs = $ems->get_leaves_requests_for_report($request->employee_id);

    require 'controllers/admin/reports/print-official.php';

});

$router->respond('GET', '/admin/reports/[:id]/display-academic/[:employee_id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $row = $ems->get_an_academic($request->employee_id);

    $rp = $ems->get_an_academic_report($request->id);

    require 'views/admin/reports/display-academic-report.view.php';

});

$router->respond('GET', '/admin/reports/[:id]/print-academic/[:employee_id]', function($request, $response, $service, $app){

    $ems = $app->ems_db;

    $row = $ems->get_an_academic($request->employee_id);

    $rp = $ems->get_an_academic_report($request->id);

    $rqs = $ems->get_leaves_requests_for_report($request->employee_id);

    require 'controllers/admin/reports/print-academic.php';

});