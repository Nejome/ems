<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php");

$data['manager_id'];

if($emp['type'] == 1){

    $management = $ems->get_an_managements($emp['branch_id']);

    $data['manager_id'] = $management['management_manager'];

}else if($emp['type'] == 2){

    $collage = $ems->get_an_collage($emp['branch_id']);

    $data['manager_id'] = $collage['collage_manager'];

}

$data['employee_id'] = $emp['employee_id'];

$data['type'] = $emp['type'];

$data['branch_id'] = $emp['branch_id'];

$ems->add_report_request($data);

?>
<div id="flash-wrapper" class="container-fluid">

    <div id="flash_message" class="card m-auto">

        <div class="card-header text-right pt-3 pb-0">
            <p class="text-info flash-header">تمت العلمية </p>
        </div>

        <div class="card-body text-center">
            <h3 class="text-success">تم ارسال الطلب بنجاح</h3>
        </div>

        <div class="card-footer">
            <a class="btn btn-primary" href="/admin">حسناً</a>
        </div>


    </div>

</div>