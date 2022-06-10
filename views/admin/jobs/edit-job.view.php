<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php"); ?>

<div id="wrapper" class="container-fluid">

    <main>
        <div id="content" class="col-sm-12 col-md-10 m-auto">

            <p class="text-secondary">مدير النظام /  <span class="text-info">الوظائف والأقسام</span>  / <span class="text-warning">تعديل وظيفة</span></p>

            <hr>

            <div class="card">

                <di class="card-header text-center">

                    <h1 class="text-warning">إستمارة تعديل وظيفة</h1>

                </di>

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

                    <form method="POST" action="/edit-job/<?=$job['job_id']?>" class="col-sm-12 col-md-7 float-right">

                        <div class="form-group row">

                            <div class="col-md-6 ml-auto">
                                <input type="text" name="name" id="name" class="form-control text-right" value="<?=$job['job_name']?>">
                            </div>

                            <label for="name" class=" col-form-label blue col-md-3 text-left">إسم الوظيفة</label>

                        </div>

                        <div class="form-group row">

                            <div class="col-md-6 ml-auto">
                                <select name="branch_id" dir="rtl" class="form-control text-right">
                                    <?php foreach($branches as $branch) { ?>
                                        <option value="<?=$branch[0]?>"><?=$branch[1]?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <label for="dept" class=" col-form-label blue col-md-3 text-left"><?php if($type == 1){echo 'الإدارة';}else{echo 'الكلية';} ?></label>

                        </div>

                        <div class="form-group row">

                            <div class="col-md-6 ml-auto">
                                <input type="number" name="main_salary" id="sal" class="form-control text-right" value="<?=$job['main_salary']?>">
                            </div>

                            <label for="sal" class=" col-form-label blue col-md-3 text-left">الراتب الأساسي</label>

                        </div>

                        <div class="form-group row">

                            <div class="col-md-6 ml-auto">
                                <input type="number" name="leave_duration" id="leave" class="form-control text-right" value="<?=$job['leave_duration']?>">
                            </div>

                            <label for="leave" class=" col-form-label blue col-md-3 text-left">مدة الإجازة السنوية</label>

                        </div>


                </div>

                <div class="card-footer">
                    <div class="form-group row">

                        <div class="col-md-6">
                            <a href="/admin/jobs/manage" class="btn btn-secondary float-right">إلغاء العملية</a>
                        </div>

                        <div class="col-md-6">
                            <input type="submit" class="btn btn-warning float-left ml-5" value="تعديل الوظيفة">
                        </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <?php include(ROOT_PATH . "/views/admin/includes/side-bar.view.php"); ?>

</div>


<?php include(ROOT_PATH . "/views/admin/includes/bottom.view.php"); ?>>