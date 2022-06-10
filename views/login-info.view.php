<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="/views/css/main.css" rel="stylesheet">
    <link href="/views/css/bootstrap.css" rel="stylesheet">

    <title>معلومات الدخول</title>

</head>
<body>

<nav>
    <div id="login-nav">

        <p id="top-nav-text">جامعة <span class="red"> قاردن</span> سيتي | نظام إدارة شؤون الأفراد | <span class="green">بيانات تسجيل الدخول</span></p>

    </div>
</nav>

<div id="wrapper" class="container-fluid">

    <main>
        <div id="content" class="col-sm-12 col-md-12 m-auto">

            <p class="text-secondary">مدير النظام /  <span class="text-info">بيانات تسجيل الدخول</span></p>

            <div class="card">
                <div class="card-header">

                    <h1 class="green text-center">بيانات <?=$user['name']?> </h1>

                </div>
                <div class="card-body row">

                    <div class="col-md-5">

                        <?php

                        if(isset($errors)){

                            print '<div class="alert alert-danger">';

                            print '<h3>-: عفواً قم بالتحقق من الآتي</h3>';

                            print '<ul>';
                            foreach($errors as $error){

                                print '<li>'.$error.'</li>';

                            }
                            print '</ul>';

                            print '</div>';

                        }

                        ?>

                    </div>

                    <form method="POST" action="/edit-information/<?=$user['user_id']?>" class="col-sm-12 col-md-7">

                        <div class="form-group row">
                            <div class="col-md-6 ml-auto">
                                <input type="text" name="user_name" class="form-control text-center" value="<?=$user['user_name']?>">
                            </div>

                            <label class="col-form-label col-md-3 text-left text-info">اسم المستخدم</label>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 ml-auto">
                                <input type="email" name="email" class="form-control text-center" value="<?=$user['email']?>">
                            </div>

                            <label for="name" class="col-form-label col-md-3 text-left text-info">البريد الإلكتروني</label>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 ml-auto">
                                <input type="password" name ="current_password"  class="form-control  text-right">
                            </div>

                            <label class="col-form-label col-md-3 text-left text-info">كلمة السر الحالية</label>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 ml-auto">
                                <input type="password" name="new_password" class="form-control  text-right">
                            </div>

                            <label class="col-form-label col-md-3 text-left text-info">كلمة السر الجديدة</label>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 ml-auto">
                                <input type="password" name="new_password_confirm" class="form-control  text-right">
                            </div>

                            <label class="col-form-label col-md-3 text-left text-info">تأكيد كلمة السر الجديدة</label>
                        </div>


                </div>

                <div class="card-footer">
                    <div class="form-group row">
                        <div class="col">
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
                            <a href="<?=$link?>" class="btn btn-secondary">رجوع</a>
                        </div>

                        <div class="col text-left">
                            <input type="submit" class="btn btn-warning" value="تعديل">
                        </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <?php include(ROOT_PATH . "/views/admin/includes/side-bar.view.php"); ?>

</div>

<?php include(ROOT_PATH . "/views/admin/includes/bottom.view.php"); ?>
