<?php

include(ROOT_PATH . "/views/admin/includes/top-nav.view.php");

if(isset($_POST)){

    if((!isset($_POST['collage_name'])) || ($_POST['collage_name'] == '')){

        $errors[] = 'ادخل اسم الكلية*';

    }

    if((!isset($_POST['collage_symbol'])) || ($_POST['collage_symbol'] == '')){

        $errors[] = 'ادخل رمز الكلية*';

    }

    if(isset($errors)) {

        require 'views/admin/collages/add-collage.view.php';

    }else {

        $data = $_POST;

        $ems->insert_an_collage($data);

        ?>

        <div id="flash-wrapper" class="container-fluid">

            <div id="flash_message" class="card m-auto">

                <div class="card-header text-right pt-3 pb-0">
                    <p class="text-info flash-header">تمت العلمية </p>
                </div>

                <div class="card-body text-center">
                    <h3 class="text-success">تم اضافة كلية جديدة جديدة بنجاح</h3>
                </div>

                <div class="card-footer">
                    <a class="btn btn-primary" href="/admin/collages/manage">حسناً</a>
                </div>


            </div>

        </div>

        <?php
    }

}
?>