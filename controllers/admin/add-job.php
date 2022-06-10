<?php

include(ROOT_PATH . "/views/admin/includes/top-nav.view.php");

if(isset($_POST)){

    if((!isset($_POST['name'])) || ($_POST['name'] == '')){

        $errors[] = 'ادخل اسم الوظيفة*';

    }

   if((!isset($_POST['main_salary'])) || ($_POST['main_salary'] === '')) {
        $errors[] = 'ادخل الراتب الاساسي*';
   }else {

        if($_POST['main_salary'] <= 30){
            $errors[] = 'الرتب الاساسي الذي ادخلته غير صحيح*';
       }
   }

      if((!isset($_POST['leave_duration'])) || ($_POST['leave_duration'] == '')) {

        $errors[] = 'ادخل مدة الإجازة';

      }else {
          $leave_duration_check = filter_input(INPUT_POST, 'leave_duration', FILTER_VALIDATE_INT,
              array('options' => array('min_range' => 20,
                  'max_range' => 50)));
          if(is_null($leave_duration_check) || $leave_duration_check === false){

              $errors[] = 'ادخل مدة اجازة بين 20 و 50 يوم*';

          }
      }

    if(isset($errors)) {

        require 'views/admin/jobs/add-jop.view.php';

    }else {

        $data = $_POST;

       $ems->insert_an_job($data);

        ?>

        <div id="flash-wrapper" class="container-fluid">

            <div id="flash_message" class="card m-auto">

                <div class="card-header text-right pt-3 pb-0">
                    <p class="text-info flash-header">تمت العلمية </p>
                </div>

                <div class="card-body text-center">
                    <h3 class="text-success">تم اضافة وظيفة جديدة بنجاح</h3>
                </div>

                <div class="card-footer">
                    <a class="btn btn-primary" href="/admin/jobs/manage">حسناً</a>
                </div>


            </div>

        </div>

<?php
    }

}
?>