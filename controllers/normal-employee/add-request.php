<?php

use Carbon\Carbon;

include(ROOT_PATH . "/views/normal-employee/includes/top-nav.view.php");

if(isset($_POST)){

    if((!isset($_POST['from_date'])) || ($_POST['from_date'] == '')){

        $errors[] = 'ادخل تاريخ بداية الإجازة*';

    }else {

        $from = new Carbon($_POST['from_date']);

    }

    if((!isset($_POST['to_date'])) || ($_POST['to_date'] == '')){

        $errors[] = 'ادخل تاريخ نهاية الإجازة*';

    }else {

        $to = new Carbon($_POST['to_date']);

    }

     if(isset($from) && isset($to)){

         if($to < $from){

             $errors[] = 'تأكد من ترتيب بداية ونهاية إجازتك*';

         }

         $requested_days = $to->diffInDays($from);

     }

    $row = $ems->get_leaves_info_of($_SESSION['user_emp_id']);

    if($_POST['type'] == 2 || $_POST['type'] == 3){

        if($row['available_days'] == 0){

            $errors[] = 'لا توجد لديك إجازة غير المرضية حاليا*ً';

        }else if($requested_days > $row['available_days']){

            $errors[] = 'انت لا تملك هذه الايام ، راجع الايام المتاحة*';

        }

    }

    if(isset($errors)) {

        require 'views/normal-employee/leaves/leaves-information-request.view.php';

    }else {

        $data = $_POST;

        if((!isset($_POST['notes'])) || ($_POST['notes'] == '')){

            $data['notes'] = 'لا توجد ملاحظات';

        }

        $data['post_date'] = Carbon::today();

        $data['employee_id'] = $_SESSION['user_emp_id'];

        $ems->add_request($data);

        ?>

        <div id="flash-wrapper" class="container-fluid">

            <div id="flash_message" class="card m-auto">

                <div class="card-header text-right pt-3 pb-0">
                    <p class="text-info flash-header">تمت العلمية </p>
                </div>

                <div class="card-body text-center">
                    <h3 class="text-success">تم إرسال الطلب بنجاح</h3>
                </div>

                <div class="card-footer">
                    <a class="btn btn-primary" href="/normal-employee">حسناً</a>
                </div>


            </div>

        </div>

        <?php
    }

}
?>