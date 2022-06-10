<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php"); ?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12 col-md-8 m-auto">

                <p class="text-secondary"><?=$_SESSION['name']?> /  <span class="text-info">الإجازات</span>  / <span class="text-primary">تفاصيل الطلب</span></p>

                <hr>

                <div class="card">

                    <?php
                    if($rq['type'] == 1){
                        $type = 'مرضية';
                    }else if($rq['type'] == 2){
                        $type = 'جزئية';
                    }else if($rq['type'] == 3){
                        $type = 'سنوية';
                    }

                    if($rq['status'] == 0){
                        $status = 'مرفوض';
                        $class = 'not-approved';
                    }else if($rq['status'] == 1){
                        $status = 'مقبول';
                        $class = 'approved';
                    }else if($rq['status'] == 2){
                        $status = 'في الإنتظار';
                        $class = 'waiting';
                    }

                    if($rq['admin_notes'] == null){
                        $admin_notes = 'لا توجد';
                    }else {
                        $admin_notes = $rq['admin_notes'];
                    }

                    if($rq['manager_notes'] == null){
                        $manager_notes = 'لا توجد';
                    }else {
                        $manager_notes = $rq['manager_notes'];
                    }

                    ?>

                    <di class="card-header text-center">

                        <h1 class="text-primary">تفاصيل الطلب</h1>

                    </di>

                    <div class="card-body">

                        <div class="m-auto">

                            <div class="row">

                                <div class="form-group row col">

                                    <div class="col-md-7 ml-auto">
                                        <label for="berth" class=" col-form-label blue text-left"><?=$rq['post_date']?></label>
                                    </div>

                                    <label for="berth" class=" col-form-label col-md-5 text-left">تاريخ النشر</label>

                                </div>

                                <div class="form-group row col">

                                    <div class="col-md-7 ml-auto">
                                        <label for="berth" class=" col-form-label blue text-left"><?=$emp['name']?></label>
                                    </div>

                                    <label for="berth" class=" col-form-label col-md-5 text-left">الإسم</label>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group row col">

                                    <div class="col-md-7 ml-auto">
                                        <label for="name" class="col-form-label blue text-left"><?=$emp['email']?></label>
                                    </div>

                                    <label for="name" class=" col-form-label col-md-5 text-left">البريد الإلكتروني</label>

                                </div>

                                <div class="form-group row col">

                                    <div class="col-md-7 ml-auto">
                                        <label for="berth" class=" col-form-label blue text-left"><?=$emp['phone']?></label>
                                    </div>

                                    <label for="berth" class=" col-form-label col-md-5 text-left">رقم الهاتف</label>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group row col">

                                    <div class="col-md-7 ml-auto">
                                        <label class="col-form-label blue text-left"> من <?=$rq['from_date']?> الي <?=$rq['to_date']?></label>
                                    </div>

                                    <label class=" col-form-label col-md-5 text-left">فترة الإجازة</label>

                                </div>

                                <div class="form-group row col">

                                    <div class="col-md-7 ml-auto">
                                        <label for="name" class="col-form-label blue text-left"><?=$type?></label>
                                    </div>

                                    <label for="name" class="col-form-label col-md-5 text-left">نوع الإجازة</label>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group row col">

                                    <div class="col-md-7 ml-auto">
                                        <label for="name" class=" col-form-label blue text-left <?=$class?>"><?=$status?></label>
                                    </div>

                                    <label for="name" class=" col-form-label col-md-5 text-left">الحالة</label>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group row col-8 ml-auto">

                                    <div class="col-md-8">
                                        <label class=" col-form-label blue text-right"><?=$rq['notes']?></label>
                                    </div>

                                    <label class=" col-form-label col-md-4 text-left">ملاحظات مقدم الطلب</label>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group row col-8 ml-auto">

                                    <div class="col-md-8">
                                        <label class=" col-form-label blue text-right"><?=$manager_notes?></label>
                                    </div>

                                    <label class=" col-form-label col-md-4 text-left">تعليق مدير القسم</label>

                                </div>

                                <div class="form-group row col-8 ml-auto">

                                    <div class="col-md-8">
                                        <label class=" col-form-label blue text-right"><?=$admin_notes?></label>
                                    </div>

                                    <label class=" col-form-label col-md-4 text-left">تعليق شؤون الافراد</label>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="card-footer">

                        <div class="row">
                            <div class="col-6">
                                <a href="/admin/leaves/archives" class="btn btn-secondary">رجوع</a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </main>

        <?php include(ROOT_PATH . "/views/departments-managers/includes/sidebar-nav.view.php"); ?>

    </div>


<?php include(ROOT_PATH . "/views/departments-managers/includes/bottom.view.php"); ?>