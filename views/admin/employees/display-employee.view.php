<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php"); ?>

<div id="wrapper" class="container-fluid">

    <main>
        <div id="content" class="col-sm-12">

            <p class="text-secondary">مدير النظام /  <span class="text-info">الموظفين</span>  / <span class="green">عرض بيانات موظف</span></p>

            <hr>

            <div class="card">

                <di class="card-header text-center">

                    <h1 class="green">بيانات <span class="text-info"><?= $row['name'] ?></span></h1>

                </di>

                <div class="card-body">

                    <form class="col-sm-12 col-md-8 m-auto">

                        <h4 class="mr-5 text-info under-line text-center">المعلومات الشخصية</h4>

                        <div class="row">

                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label class=" col-form-label blue text-left"><?= $row['berth_day'] ?></label>
                                </div>

                                <label class=" col-form-label col-md-4 text-left">تاريخ الميلاد</label>

                            </div>

                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label class=" col-form-label blue text-left"><?= $row['name'] ?></label>
                                </div>

                                <label class=" col-form-label col-md-4 text-left">الأسم</label>

                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group row col">

                                <?php

                                if($row['gender'] == 1){
                                    $gender = 'ذكر';
                                }else {
                                    $gender = 'انثى';
                                }

                                ?>

                                <div class="col-md-8 ml-auto">
                                    <label class=" col-form-label blue  text-left"><?= $gender ?></label>
                                </div>

                                <label class=" col-form-label col-md-4 text-left">الجنس</label>

                            </div>

                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label class=" col-form-label blue text-left"><?= $row['address'] ?></label>
                                </div>

                                <label class=" col-form-label  col-md-4 text-left">العنوان</label>

                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto col">
                                    <label for="email" class=" col-form-label blue  text-left"><?= $row['email'] ?></label>
                                </div>

                                <label for="email" class=" col-form-label  col-md-4 text-left">البريدالإلكتروني</label>

                            </div>

                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label for="phone" class=" col-form-label blue  text-left"><?= $row['phone'] ?></label>
                                </div>

                                <label for="phone" class=" col-form-label  col-md-4 text-left">رقم الهاتف</label>

                            </div>

                        </div>

                        <hr>

                        <h4 class="mr-5 text-info under-line text-center">معلومات العمل</h4>

                        <div class="row">
                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label for="" class=" col-form-label blue text-left"><?= $row['branch'] ?></label>
                                </div>

                                <label for="" class=" col-form-label  col-md-4 text-left">الإدارة/الكلية</label>

                            </div>

                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label for="jop-name" class=" col-form-label blue text-left"><?= $row['job_name'] ?></label>
                                </div>

                                <label for="jop-name" class=" col-form-label  col-md-4 text-left">اسم الوظيفة</label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label for="edu-qua" class="col-form-label blue  text-left"><?= $row['qualification'] ?></label>
                                </div>

                                <label for="edu-qua" class="col-form-label  col-md-4 text-left">المؤهل العلمي</label>

                            </div>

                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label for="hire-date" class=" col-form-label blue  text-left"><?= $row['hiring_date'] ?></label>
                                </div>

                                <label for="hire-date" class=" col-form-label col-md-4 text-left">تاريخ التعيين</label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label  class=" col-form-label blue col-md-4 text-left"><?= $row['contract_type'] ?></label>
                                </div>

                                <label for="contract-type" class=" col-form-label col-md-4 text-left">نوع العقد</label>

                            </div>

                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label for="file-number" class=" col-form-label blue text-left"><?= $row['file_number'] ?></label>
                                </div>

                                <label for="file-number" class=" col-form-label col-md-4 text-left">رقم الملف</label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group row col-6  m-auto">
                                <div class="col-md-8 ml-auto">
                                    <label id="file-number" class=" col-form-label blue text-left"><?= $row['manager_name'] ?></label>
                                </div>

                                <label for="manger_nane" class=" col-form-label col-md-4 text-left">المدير</label>
                            </div>
                        </div>

                        <hr>

                        <h4 class="mr-5 text-info under-line text-center">المعلومات المالية</h4>

                        <div class="row">
                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label for="commission" class=" col-form-label blue text-left"><?= $row['premiums'] ?></label>
                                </div>

                                <label for="commission" class=" col-form-label col-md-4 text-left">مجموع العلاوات</label>

                            </div>

                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label for="main-sal" class=" col-form-label blue text-left"><?= $row['main_salary'] ?></label>
                                </div>

                                <label for="main-sal" class=" col-form-label col-md-4 text-left">الراتب الأساسي</label>

                            </div>
                        </div>

                    </form>

                </div>

                <div class="card-footer">
                    <div class="form-group row">

                        <div class="col-md-7">
                            <a href="/admin/employees/manage" class="btn btn-success">رجوع</a>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </main>

    <?php include(ROOT_PATH . "/views/admin/includes/side-bar.view.php"); ?>

</div>


<?php include(ROOT_PATH . "/views/admin/includes/bottom.view.php"); ?>