<?php

include(ROOT_PATH . "/views/admin/includes/top-nav.view.php");

$users->delete_an_user($request->id);

?>

<div id="flash-wrapper" class="container-fluid">

    <div id="flash_message" class="card m-auto">

        <div class="card-header text-right pt-3 pb-0">
            <p class="text-info flash-header">تمت العلمية </p>
        </div>

        <div class="card-body text-center">
            <h3 class="text-danger">تم الحذف بنجاح</h3>
        </div>

        <div class="card-footer">
            <a class="btn btn-primary" href="/admin/users/manage">حسناً</a>
        </div>


    </div>

</div>