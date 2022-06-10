<?php

include(ROOT_PATH . "/views/admin/includes/top-nav.view.php");

if(isset($_POST)) {



    if(!isset($_POST['name']) || $_POST['name'] == ''){

        $errors[] = 'ادخل اسم الموظف*';

    }

    if(!isset($_POST['berth_day']) || $_POST['berth_day'] == ''){

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


    if(!isset($_POST['hire-date']) || $_POST['hire-date'] == ''){

        $errors[] = 'ادخل تاريخ تعيين الموظف*';

    }

    if(!isset($_POST['edu-qua']) || $_POST['edu-qua'] == ''){

        $errors[] = 'ادخل المؤهل العلمي للموظف*';

    }

    if(!isset($_POST['contract-type']) || $_POST['contract-type'] == ''){

        $errors[] = 'ادخل نوع عقد الموظف*';

    }

    if(!isset($_POST['premiums']) || $_POST['premiums'] == ''){

        $errors[] = 'ادخل مجموع علاوات الموظف*';

    }



    if(isset($errors)){

        require 'views/admin/employees/add-academic.view.php';

    }else {

        $data = $_POST;

        $job = $ems->get_an_job($_POST['job_name']);

        $data['main_salary'] = $job['main_salary'];

        $data['branch_id'] = $job['branch_id'];

        $co = $ems->get_an_collage($job['branch_id']);

        $string = 'ج ق س ' . $co['collage_symbol'] . '/ ';

        $ems->insert_an_academic($data);

        $ems->set_file_number($string);

        $rows = $ems->get_all_employees();

        foreach($rows as $row){

            $info = $ems->get_leaves_info_of($row['employee_id']);

            $job = $ems->get_an_job($row['branch_id']);

            if($info == false){

                $ems->db->query("insert into leaves_information(employee_id, leave_duration) values($row[employee_id], $job[leave_duration])");

            }

        }

        ?>

        <div id="flash-wrapper" class="container-fluid">

            <div id="flash_message" class="card m-auto">

                <div class="card-header text-right pt-3 pb-0">
                    <p class="text-info flash-header">تمت العلمية </p>
                </div>

                <div class="card-body text-center">
                    <h3 class="text-success">تم اضافة <span class="text-info"><?=$_POST['name']?></span> بنجاح</h3>
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