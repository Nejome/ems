<?php

include(ROOT_PATH . "/views/admin/includes/top-nav.view.php");

use Carbon\Carbon;

if(isset($_POST)){

    if((!isset($_POST['user_emp_id'])) || ($_POST['user_emp_id'] == '')){

        $errors[] = 'اختر الموظف*';

    }

    if((!isset($_POST['user_name'])) || ($_POST['user_name'] == '')){

        $errors[] = 'ادخل اسم المستخدم*';

    }

    if((!isset($_POST['user_type'])) || ($_POST['user_type'] == '')){

        $errors[] = 'اختر نوع المستخدم*';

    }

    if(isset($errors)) {

        require 'views/admin/users/add-user.view.php';

    }else {

        $data = $_POST;

        $data['user_password'] = $data['user_name'] . rand(100, 600);

        $users->add_user($data);

        $user = $ems->get_an_employee($_POST['user_emp_id']);

        $mail->addAddress($user['email'], $user['name']);
        $mail->Subject = 'رسالة الترحيب';
        $now = Carbon::now();
        $mail->Body = require 'controllers/emails/new-user.php';

        $mail->send();

        ?>

        <div id="flash-wrapper" class="container-fluid">

            <div id="flash_message" class="card m-auto">

                <div class="card-header text-right pt-3 pb-0">
                    <p class="text-info flash-header">تمت العلمية </p>
                </div>

                <div class="card-body text-center">
                    <h3 class="text-success">تم اضافة مستخدم جديد للنظام</h3>
                </div>

                <div class="card-footer">
                    <a class="btn btn-primary" href="/admin/users/manage">حسناً</a>
                </div>


            </div>

        </div>

        <?php
    }

}
?>