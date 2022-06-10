<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php"); ?>

<div id="wrapper" class="container-fluid">

    <main>
        <div id="content" class="col-sm-12 col-md-12 m-auto">

            <p class="text-secondary"><?=$_SESSION['name']?> /  <span class="text-info">الإجازات</span>  / <span class="text-primary">تفاصيل الطلب</span></p>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-info">تفاصيل الطلب</h3>
                </div>

                <div class="card-body row">

                    <div class="col-md-4">

                        <form method="POST" action="/leaves-request/<?=$rq['request_id']?>/taking-decision/<?=$emp['employee_id']?>">

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
                            }else if($rq['status'] == 1){
                                $status = 'مقبول';
                            }else if($rq['status'] == 2){
                                $status = 'في الإنتظار';
                            }

                            if($rq['manager_notes'] == null){

                                $manager_notes = 'لا توجد';

                            }else {

                                $manager_notes = $rq['manager_notes'];

                            }
                            ?>

                            <div class="form-group row">

                                <div class="col-md-8 ml-auto">

                                    <select name="decision" class="form-control" dir="rtl">
                                        <option value="1">قبول الطلب</option>
                                        <option value="0">رفض الطلب</option>
                                    </select>

                                </div>

                                <label for="decision" class="col-form-label blue col-md-3 text-center">القرار</label>

                            </div>

                            <div class="form-group">

                                <label for="admin_notes" class="blue mr-3">الملاحظات / التعليق</label>

                                <textarea rows="9" col="50" name="admin_notes" id="comment" class="form-control text-right" placeholder="ادخل الملاحظات / التعليق"></textarea>

                            </div>

                            <div class="row">
                                <div class="form-group m-auto">
                                    <input type="submit" class="btn btn-primary" value="ارسال القرار">
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="col-md-8 display-section">

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
                                    <label for="berth" class=" col-form-label blue text-left"><?=$emp['phone']?></label>
                                </div>

                                <label for="berth" class=" col-form-label col-md-5 text-left">رقم الهاتف</label>

                            </div>

                            <div class="form-group row col">

                                <div class="col-md-7 ml-auto">
                                    <label for="name" class=" col-form-label blue text-left"><?=$emp['email']?></label>
                                </div>

                                <label for="name" class=" col-form-label col-md-5 text-left">البريد الإلكتروني</label>

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


                        <div class="row form-group">

                            <div class="col-5 ml-auto">
                                <lable class="blue">
                                    <?=$rq['notes']?>
                                </lable>
                            </div>

                            <div class="col-3 ml-auto text-left">
                                <lable>ملاحظات مقدم الطلب</lable>
                            </div>

                        </div>

                        <div class="row form-group">

                            <div class="col-5 ml-auto">
                                <lable class="blue">
                                    <?=$manager_notes?>
                                </lable>
                            </div>

                            <div class="col-3 ml-auto text-left">
                                <lable>ملاحظات مدير القسم</lable>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="card-footer">

                    <div class="row">
                        <div class="col-6">
                            <a href="/admin/leaves/requests" class="btn btn-secondary">رجوع</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>

    <?php include(ROOT_PATH . "/views/admin/includes/side-bar.view.php"); ?>

</div>


<?php include(ROOT_PATH . "/views/admin/includes/bottom.view.php"); ?>