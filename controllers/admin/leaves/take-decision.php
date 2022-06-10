<?php

use Carbon\Carbon;

include(ROOT_PATH . "/views/admin/includes/top-nav.view.php");

if(isset($_POST)) {

    $data = $_POST;

    if($_POST['admin_notes'] == ''){

        $data['admin_notes'] = 'لا توجد';

    }

    $from = new Carbon($rq['from_date']);

    $to = new Carbon($rq['to_date']);

    if($_POST['decision'] == 0){

        $data['position'] = 3;

        $data['status'] = 0;

        $data['days'] = 0;

        $data['to'] = $info['last_leave'];

    }else if($_POST['decision'] == 1){

        $data['position'] = 3;

        $data['status'] = 1;

        $data['days'] = $to->diffInDays($from);

        $data['to'] = $rq['to_date'];

    }

    $ems->admin_decision($emp['employee_id'],$rq['request_id'], $data);

    if($data['decision'] == 0) {

        $mail->addAddress($emp['email'], $emp['name']);
        $mail->Subject = 'Response of Leave request';
        $now = Carbon::now();
        $mail->Body = require 'controllers/emails/leave-request-rejected.php';

        $mail->send();

    }else if($data['decision'] == 1) {

        $mail->addAddress($emp['email'], $emp['name']);
        $mail->Subject = 'Response of Leave request';
        $now = Carbon::now();
        $mail->Body = require 'controllers/emails/leave-request-accepted.php';

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
                <a class="btn btn-primary" href="/admin/leaves/requests">حسناً</a>
            </div>


        </div>

    </div>

    <?php
}
?>