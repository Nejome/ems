<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="/views/css/main.css" rel="stylesheet">
    <link href="/views/css/bootstrap.css" rel="stylesheet">

    <title>تم التعديل</title>

</head>
<body>

<nav>
    <div id="login-nav">

        <p id="top-nav-text">جامعة <span class="red"> قاردن</span> سيتي | نظام إدارة شؤون الأفراد | <span class="green">بيانات تسجيل الدخول</span></p>

    </div>
</nav>
<?php

if(isset($_POST)){

    if((!isset($_POST['user_name'])) || ($_POST['user_name'] == '')){

        $errors[] = 'أدخل إسم المستخدم*';

    }

    if((!isset($_POST['email'])) || ($_POST['email'] == '')){

        $errors[] = 'أدخل البريد الإلكتروني*';

    }

    if(strlen($_POST['current_password']) > 0 || strlen($_POST['new_password']) > 0){

        if(!password_verify($_POST['current_password'], $user['user_password'])){

            $errors[] = 'كلمة المرور الحالية غير صحيحة*';

        }

        if($_POST['current_password'] == ''){

            $errors[] = 'أدخل كلمة المرور الحالية*';

        }

        if($_POST['new_password'] == ''){

            $errors[] = 'أدخل كلمة المرور الجديدة*';

        }

        if($_POST['new_password_confirm'] == ''){

            $errors[] = 'أدخل تأكيد كلمة المرور الجديدة*';

        }

        if($_POST['new_password'] != $_POST['new_password_confirm']){

            $errors[] = 'كلمة المرور الجديدة وتأكيد كلمة المرور الجديد غير متطابقين*';

        }

    }

    if(isset($errors)){

        require 'views/login-info.view.php';

    }else {

        $data = $_POST;

        $data['user_emp_id'] = $_SESSION['user_emp_id'];

        if(strlen($_POST['new_password']) > 0 && isset($_POST['new_password'])){

            $users->update_user_with_password($request->id, $data);

        }else {

            $users->update_user($request->id, $data);

        }

        ?>

<div id="flash-wrapper" class="container-fluid">

    <div id="flash_message" class="card m-auto">

        <div class="card-header text-right pt-3 pb-0">
            <p class="text-info flash-header">تمت العلمية </p>
        </div>

        <div class="card-body text-center">
            <h3 class="text-warning">تم تعديل بياناتك بنجاح</h3>
        </div>

        <?php
        if($_SESSION['user_type'] == 1){
            $link = '/admin';
        }else if($_SESSION['user_type'] == 2){
            $link = '/managers';
        }else if($_SESSION['user_type'] == 3){
            $link = '/financial-officer';
        }else if($_SESSION['user_type'] == 4){
            $link = '/normal-employee';
        }
        ?>

        <div class="card-footer">
            <a class="btn btn-primary" href="<?=$link?>">حسناً</a>
        </div>


    </div>

</div>

   <?php

    }

}

?>