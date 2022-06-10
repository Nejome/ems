<?php

use Carbon\Carbon;

include(ROOT_PATH . "/views/departments-managers/includes/top-nav.view.php");

if(isset($_POST)) {

    $data = $_POST;

    if($_POST['manager_notes'] == ''){

        $data['manager_notes'] = 'لا توجد';

    }

    if($_POST['decision'] == 1){

        $data['position'] = 2;

        $data['status'] = 2;

    }else if($_POST['decision'] == 2){

        $data['position'] = 3;

        $data['status'] = 0;

    }

    $ems->manager_decision($rq['request_id'], $data);

    if($data['decision'] == 2) {

        $mail->addAddress($emp['email'], $emp['name']);
        $mail->Subject = 'Leave decision';
        $now = Carbon::now();
        $mail->Body = require 'controllers/emails/leave-request-rejected.php';

        $mail->send();

    }

    ?>

    <div id="flash-wrapper" class="container-fluid">

        <div id="flash_message" class="card m-auto">

            <div class="card-header text-right pt-3 pb-0">
                <p class="text-info flash-header">تمت العلمية </p>
            </div>

            <div class="card-body text-center">
                <h3 class="text-success">تم إرسال القرار بنجاح</h3>
            </div>

            <div class="card-footer">
                <a class="btn btn-primary" href="/managers/leaves/new-requests">حسناً</a>
            </div>


        </div>

    </div>

<?php
}
?>