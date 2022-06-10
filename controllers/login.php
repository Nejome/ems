<?php

if(isset($_POST)){

    if((!isset($_POST['user_name'])) || ($_POST['user_name'] == '')){

        $errors[] = 'أدخل اسم المستخدم*';

    }

    if((!isset($_POST['user_password'])) || ($_POST['user_password'] == '')){

        $errors[] = 'أدخل كلمة المرور*';

    }
    if($users->login($_POST['user_name'], $_POST['user_password'])){

        $user = $users->get_user_info($_POST['user_name']);

        if($user['user_type'] == 1){

            require 'views/admin/home.view.php';

        }else if($user['user_type'] == 2){

            require 'views/departments-managers/home.view.php';

        }else if($user['user_type'] == 4){

            require 'views/normal-employee/home.view.php';

        }

    }else {

        $errors[] = 'تأكد من صحة البيانات المدخلة*';

    }

    if(isset($errors)){

        require 'views/login.view.php';

    }

}