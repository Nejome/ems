<?php

include(ROOT_PATH . "/views/admin/includes/top-nav.view.php");

if(isset($_POST)){

    if((!isset($_POST['management_name'])) || ($_POST['management_name'] == '')){

        $errors[] = 'ادخل اسم الإدارة*';

    }

    if((!isset($_POST['management_symbol'])) || ($_POST['management_symbol'] == '')){

        $errors[] = 'ادخل رمز الإدارة*';

    }

    if(isset($errors)) {

        require 'views/admin/managements/edit-management.view.php';

    }else {

        $data = $_POST;

        $ems->update_an_management($request->id, $data);

        ?>

        <div id="flash-wrapper" class="container-fluid">

            <div id="flash_message" class="card m-auto">

                <div class="card-header text-right pt-3 pb-0">
                    <p class="text-info flash-header">تمت العلمية</p>
                </div>

                <div class="card-body text-center">
                    <h3 class="text-warning">تم تعديل بيانات الإدارة بنجاح</h3>
                </div>

                <div class="card-footer">
                    <a class="btn btn-primary" href="/admin/managements/manage">حسناً</a>
                </div>


            </div>

        </div>

        <?php
    }

}
?>