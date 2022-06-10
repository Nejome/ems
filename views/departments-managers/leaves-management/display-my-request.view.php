<?php include(ROOT_PATH . "/views/departments-managers/includes/top-nav.view.php"); ?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12">

                <p class="text-secondary"><?=$_SESSION['name']?> /  <span class="text-info">الإجازات</span>  / <span class="green">تفاصيل الطلب</span></p>

                <hr>

                <div class="card">

                    <div class="card-body">

                        <form class="col-sm-12 col-md-8 m-auto">

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

                            if($rq['manager_notes'] == null){

                                $manager_notes = 'لا توجد';

                            }else {

                                $manager_notes = $request['manager_notes'];

                            }

                            if($rq['admin_notes'] == null){

                                $admin_notes = 'لا توجد';

                            }else {

                                $admin_notes = $request['admin_notes'];

                            }

                            ?>

                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label class=" col-form-label blue text-left <?=$class?>"><?=$status?></label>
                                </div>

                                <label class=" col-form-label col-md-4 text-left">حالة الطلب</label>

                            </div>

                            <div class="row">

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <label class=" col-form-label blue text-left"><?=$rq['post_date']?></label>
                                    </div>

                                    <label class=" col-form-label col-md-4 text-left">تاريخ نشر الطلب</label>

                                </div>

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <label class=" col-form-label blue text-left"><?=$type?></label>
                                    </div>

                                    <label class=" col-form-label col-md-4 text-left">نوع الطلب</label>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <label class=" col-form-label blue text-left"><?=$rq['to_date']?></label>
                                    </div>

                                    <label class=" col-form-label col-md-4 text-left">حتي</label>

                                </div>

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <label class=" col-form-label blue text-left"><?=$rq['from_date']?></label>
                                    </div>

                                    <label class=" col-form-label col-md-4 text-left">من</label>

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-5 ml-auto">
                                    <lable class="text-info">
                                        <?=$rq['notes']?>
                                    </lable>
                                </div>

                                <div class="col-3 ml-auto text-left">
                                    <lable>ملاحظاتي</lable>
                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-5 ml-auto">
                                    <lable class="text-info">
                                        <?=$admin_notes?>
                                    </lable>
                                </div>

                                <div class="col-3 ml-auto text-left">
                                    <lable>ملاحظات مدير القسم</lable>
                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-5 ml-auto">
                                    <lable class="text-info">
                                        <?=$admin_notes?>
                                    </lable>
                                </div>

                                <div class="col-3 ml-auto text-left">
                                    <lable>ملاحظات شؤون الأفراد</lable>
                                </div>

                            </div>

                        </form>

                    </div>

                    <div class="card-footer">
                        <div class="form-group row">

                            <div class="col-md-7">
                                <a href="/managers/leaves/my-archives" class="btn btn-success">رجوع</a>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </main>

        <?php include(ROOT_PATH . "/views/departments-managers/includes/sidebar-nav.view.php"); ?>

    </div>


<?php include(ROOT_PATH . "/views/departments-managers/includes/bottom.view.php"); ?>