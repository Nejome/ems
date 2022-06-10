<?php

include(ROOT_PATH . "/views/admin/includes/top-nav.view.php");

if(isset($_POST)) {



    if(!isset($_POST['name']) || $_POST['name'] == ''){

        $errors[] = 'ادخل اسم الموظف*';

    }
    if(!isset($_POST['berth']) || $_POST['berth'] == ''){

        $errors[] = 'ادخل تاريخ ميلاد الموظف*';

    }
    if(!isset($_POST['address']) || $_POST['address'] == ''){

        $errors[] = 'ادخل عنوان الموظف*';

    }
    if(!isset($_POST['gender']) || $_POST['gender'] == ''){

        $errors[] = 'اختر جنس الموظف*';

    }

    if(!isset($_POST['phone']) || $_POST['phone'] == ''){

        $errors[] = 'ادخل رقم هاتف الموظف*';

    }else{

        if(!(strlen($_POST['phone']) == 10 || strlen($_POST['phone']) == 14)){

            $errors[] = 'رقم الهاتف الذي ادخلته غير صحيح*';

        }

    }

    if(!isset($_POST['email']) || $_POST['email'] == ''){

        $errors[] = 'قم بإدخال البريد الإلكتروني*';

    }else {

        $email_check = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if(!$email_check){

            $errors[] = 'عنوان البريد الإلكتروني الذي ادخلته غير صالح*';

        }

    }

    if(!isset($_POST['job_name']) || $_POST['job_name'] == ''){

        $errors[] = 'قم بإختيار اسم الوظيفة*';

    }


    if(!isset($_POST['hiring_date']) || $_POST['hiring_date'] == ''){

        $errors[] = 'ادخل تاريخ تعيين الموظف*';

    }

    if(!isset($_POST['qualification']) || $_POST['qualification'] == ''){

        $errors[] = 'ادخل المؤهل العلمي للموظف*';

    }

    if(!isset($_POST['contract_type']) || $_POST['contract_type'] == ''){

        $errors[] = 'ادخل نوع عقد الموظف*';

    }

    if(!isset($_POST['premiums']) || $_POST['premiums'] == ''){

        $errors[] = 'ادخل مجموع علاوات الموظف*';

    }

    if(isset($errors)){

        require 'views/admin/employees/edit-employee.view.php';

    }else {

        $data = $_POST;

        $job = $ems->get_an_job($_POST['job_name']);

        $data['branch_id'] = $job['branch_id'];

        $data['main_salary'] = $job['main_salary'];

        $ems->update_an_academic($request->id, $data);

        ?>

        <div id="flash-wrapper" class="container-fluid">

            <div id="flash_message" class="card m-auto">

                <div class="card-header text-right pt-3 pb-0">
                    <p class="text-info flash-header">تمت العلمية </p>
                </div>

                <div class="card-body text-center">
                    <h3 class="text-warning">تم تعديل بيانات <span class="text-success"><?=$_POST['name']?></span> بنجاح</h3>
                </div>

                <div class="card-footer">
                    <a class="btn btn-primary" href="/admin/employees/manage">حسناً</a>
                </div>


            </div>

        </div>

        <?php
    }


}
?>

