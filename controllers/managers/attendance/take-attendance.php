<?php

include(ROOT_PATH . "/views/normal-employee/includes/top-nav.view.php");

        if($request->status == 1){

            $ems->attend($request->id);

        }else if($request->status == 0){

            $ems->absent($request->id);

        }

        ?>

        <div id="flash-wrapper" class="container-fluid">

            <div id="flash_message" class="card m-auto">

                <div class="card-header text-right pt-3 pb-0">
                    <p class="text-info flash-header">تمت العلمية </p>
                </div>

                <div class="card-body text-center">
                    <h3 class="text-success">تم التسجيل بنجاح</h3>
                </div>

                <div class="card-footer">
                    <a class="btn btn-primary" href="/managers/take-attendance">حسناً</a>
                </div>

            </div>

        </div>

        <?php

?>