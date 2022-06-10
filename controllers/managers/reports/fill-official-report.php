<?php

use Carbon\Carbon;

include(ROOT_PATH . "/views/normal-employee/includes/top-nav.view.php");

if(isset($_POST)) {


    if((!isset($_POST['r2'])) || ($_POST['r2'] == '')){

        $errors[] = 'أدخل درجة المواظبة';

    }else {

        $result = filter_input(INPUT_POST, 'r2', FILTER_VALIDATE_INT,
            array('options' => array('min_range' => 0, 'max_range' => 10)));

        if(!$result){
            $errors[] = 'اقل قيمة لدرجة المواظبة 0 و اكبر قيمة 10';
        }

    }

    if((!isset($_POST['recommendations'])) || ($_POST['recommendations'] == '')){

        $errors[] = 'ادخل التوصيات';

    }


    if(isset($errors)){

        require 'views/departments-managers/reports/fill-official-report.view.php';

    }else {

        $data = $_POST;

        $data['employee_id'] = $request->employee_id;

        $ems->add_official_report($data);

        $ems->delete_report_request($request->request_id);


        ?>
        <div id="flash-wrapper" class="container-fluid">

            <div id="flash_message" class="card m-auto">

                <div class="card-header text-right pt-3 pb-0">
                    <p class="text-info flash-header">تمت العلمية </p>
                </div>

                <div class="card-body text-center">
                    <h3 class="text-success">تم إرسال التقرير بنجاح</h3>
                </div>

                <div class="card-footer">
                    <a class="btn btn-primary" href="/managers/reports/new-requests">حسناً</a>
                </div>


            </div>

        </div>

        <?php
    }
}
?>