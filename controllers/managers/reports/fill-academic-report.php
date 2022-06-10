<?php

use Carbon\Carbon;

include(ROOT_PATH . "/views/normal-employee/includes/top-nav.view.php");

if(isset($_POST)) {

    ///
    if((!isset($_POST['r1'])) || ($_POST['r1'] == '')){

        $errors[] = 'أدخل التقييم الاول';

    }else {

        $result = filter_input(INPUT_POST, 'r1', FILTER_VALIDATE_INT,
            array('options' => array('min_range' => 0, 'max_range' => 10)));

        if(!$result){
            $errors[] = 'اقل قيمة للتقيم الاول 0  اكبر قيمة 10';
        }

    }
    /////

    ///
    if((!isset($_POST['r2'])) || ($_POST['r2'] == '')){

        $errors[] = 'أدخل التقييم الثاني';

    }else {

        $result = filter_input(INPUT_POST, 'r2', FILTER_VALIDATE_INT,
            array('options' => array('min_range' => 0, 'max_range' => 10)));

        if(!$result){
            $errors[] = 'اقل قيمة للتقيم الثاني 0  اكبر قيمة 10';
        }

    }
    /////

    ///
    if((!isset($_POST['r3'])) || ($_POST['r3'] == '')){

        $errors[] = 'أدخل التقييم الثالث';

    }else {

        $result = filter_input(INPUT_POST, 'r3', FILTER_VALIDATE_INT,
            array('options' => array('min_range' => 0, 'max_range' => 10)));

        if(!$result){
            $errors[] = 'اقل قيمة للتقيم الثالث 0  اكبر قيمة 10';
        }

    }
    /////

    ///
    if((!isset($_POST['r4'])) || ($_POST['r4'] == '')){

        $errors[] = 'أدخل التقييم الرابع';

    }else {

        $result = filter_input(INPUT_POST, 'r1', FILTER_VALIDATE_INT,
            array('options' => array('min_range' => 0, 'max_range' => 10)));

        if(!$result){
            $errors[] = 'اقل قيمة للتقيم الرابع 0  اكبر قيمة 10';
        }

    }
    /////

    ///
    if((!isset($_POST['r5'])) || ($_POST['r5'] == '')){

        $errors[] = 'أدخل التقييم الخامس';

    }else {

        $result = filter_input(INPUT_POST, 'r5', FILTER_VALIDATE_INT,
            array('options' => array('min_range' => 0, 'max_range' => 10)));

        if(!$result){
            $errors[] = 'اقل قيمة للتقيم الخامس 0  اكبر قيمة 10';
        }

    }
    /////

    ///
    if((!isset($_POST['r6'])) || ($_POST['r6'] == '')){

        $errors[] = 'أدخل التقييم السادس';

    }else {

        $result = filter_input(INPUT_POST, 'r6', FILTER_VALIDATE_INT,
            array('options' => array('min_range' => 0, 'max_range' => 10)));

        if(!$result){
            $errors[] = 'اقل قيمة للتقيم السادس 0  اكبر قيمة 10';
        }

    }
    /////

    ///
    if((!isset($_POST['r7'])) || ($_POST['r7'] == '')){

        $errors[] = 'أدخل التقييم السابع';

    }else {

        $result = filter_input(INPUT_POST, 'r7', FILTER_VALIDATE_INT,
            array('options' => array('min_range' => 0, 'max_range' => 10)));

        if(!$result){
            $errors[] = 'اقل قيمة للتقيم السابع 0  اكبر قيمة 10';
        }

    }
    /////

    ///
    if((!isset($_POST['r8'])) || ($_POST['r8'] == '')){

        $errors[] = 'أدخل التقييم الثامن';

    }else {

        $result = filter_input(INPUT_POST, 'r8', FILTER_VALIDATE_INT,
            array('options' => array('min_range' => 0, 'max_range' => 10)));

        if(!$result){
            $errors[] = 'اقل قيمة للتقيم الثامن 0  اكبر قيمة 10';
        }

    }
    /////

    ///
    if((!isset($_POST['r9'])) || ($_POST['r9'] == '')){

        $errors[] = 'أدخل التقييم التاسع';

    }else {

        $result = filter_input(INPUT_POST, 'r9', FILTER_VALIDATE_INT,
            array('options' => array('min_range' => 0, 'max_range' => 10)));

        if(!$result){
            $errors[] = 'اقل قيمة للتقيم التاسع 0  اكبر قيمة 10';
        }

    }
    /////

    ///
    if((!isset($_POST['r10'])) || ($_POST['r10'] == '')){

        $errors[] = 'أدخل التقييم العاشر';

    }else {

        $result = filter_input(INPUT_POST, 'r10', FILTER_VALIDATE_INT,
            array('options' => array('min_range' => 0, 'max_range' => 10)));

        if(!$result){
            $errors[] = 'اقل قيمة للتقيم العاشر 0  اكبر قيمة 10';
        }

    }
    /////

    if((!isset($_POST['recommendations'])) || ($_POST['recommendations'] == '')){

        $errors[] = 'عفوا ادخل التوصيات';

    }

    if(isset($errors)){

        require 'views/departments-managers/reports/fill-academic-report.view.php';

    }else {

        $data = $_POST;

        $data['employee_id'] = $request->employee_id;

        $ems->add_academic_report($data);

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