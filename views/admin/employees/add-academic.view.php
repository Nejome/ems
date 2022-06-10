<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php"); ?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12">

                <p class="text-secondary">مدير النظام /  <span class="text-info">الموظفين</span>  / <span class="green">إضافة موظف</span></p>

                <hr>

                <div class="card">

                    <di class="card-header text-center">

                        <h1 class="green">إستمارة إضافة موظف اكاديمي</h1>

                    </di>

                    <div class="card-body row">

                        <div class="col-sm-12 col-md-4">



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

                        <form method="POST" action="/add-academic" class="col-sm-12 col-md-8 float-right">

                            <h4 class="mr-5 text-info under-line text-center">المعلومات الشخصية</h4>

                            <div class="row">

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <input type="date" name="berth_day" id="berth" class="form-control text-right">
                                    </div>

                                    <label for="berth" class=" col-form-label blue col-md-4 text-left">تاريخ الميلاد</label>

                                </div>

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <input type="text" name="name" id="name" class="form-control text-right" value="<?php if(isset($errors)){echo $_POST['name'];}?>">
                                    </div>

                                    <label for="name" class=" col-form-label blue col-md-4 text-left">الأسم</label>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="2">
                                            <label class="form-check-label" for="inlineRadio2">انثي</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="1">
                                            <label class="form-check-label" for="inlineRadio1">ذكر</label>
                                        </div>
                                    </div>

                                    <label for="name" class=" col-form-label blue col-md-4 text-left">الجنس</label>

                                </div>

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <input type="text" name="address" id="address" class="form-control text-right" value="<?php if(isset($errors)){echo $_POST['address'];}?>">
                                    </div>

                                    <label for="address" class=" col-form-label blue col-md-4 text-left">العنوان</label>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto col">
                                        <input type="email" name="email" id="email" class="form-control text-right" value="<?php if(isset($errors)){echo $_POST['email'];}?>">
                                    </div>

                                    <label for="email" class=" col-form-label blue col-md-4 text-left">البريدالإلكتروني</label>

                                </div>

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <input type="text" name="phone" id="phone" class="form-control text-right" value="<?php if(isset($errors)){echo $_POST['phone'];}?>">
                                    </div>

                                    <label for="phone" class=" col-form-label blue col-md-4 text-left">رقم الهاتف</label>

                                </div>

                            </div>

                            <hr>

                            <h4 class="mr-5 text-info under-line text-center">معلومات العمل</h4>

                            <div class="row">

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <input type="date" name="hire-date" id="hire-date" class="form-control text-right" value="<?php if(isset($errors)){echo $_POST['hire-date'];}?>">
                                    </div>

                                    <label for="hire-date" class=" col-form-label blue col-md-4 text-left">تاريخ التعيين</label>

                                </div>

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">

                                        <select name="job_name" id="job_name" class="form-control text-right" dir="rtl">
                                            <?php foreach ($jobs as $job) { ?>
                                                <option value="<?=$job['job_id']?>"><?= $job['job_name'] ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>

                                    <label for="jop-name" class=" col-form-label blue col-md-4 text-left"> الوظيفة</label>

                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <input type="text" name="edu-qua" id="edu-qua" class="form-control text-right" value="<?php if(isset($errors)){echo $_POST['edu-qua'];}?>">
                                    </div>

                                    <label for="edu-qua" class="col-form-label blue col-md-4 text-left">المؤهل العلمي</label>

                                </div>

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <select name="contract-type" id="contract-type" class="form-control" dir="rtl">
                                            <option value="كامل">كامل</option>
                                            <option value="جزئي">جزئي</option>
                                            <option value="متعاون">متعاون</option>
                                        </select>
                                    </div>

                                    <label for="contract-type" class=" col-form-label blue col-md-4 text-left">نوع العقد</label>

                                </div>

                            </div>

                            <hr>

                            <h4 class="mr-5 text-info under-line text-center">المعلومات المالية</h4>

                            <div class="row">
                                <div class="form-group row col-6 m-auto">

                                    <div class="col-md-8 ml-auto">
                                        <input type="text" name="premiums" id="premiums" class="form-control text-right" value="<?php if(isset($errors)){echo $_POST['premiums'];}?>">
                                    </div>

                                    <label for="premiums" class=" col-form-label blue col-md-4 text-left">العلاوات</label>

                                </div>

                            </div>

                    </div>

                    <div class="card-footer">
                        <div class="form-group row">

                            <div class="col-md-6">
                                <a href="/admin/employees/manage" class="btn btn-secondary float-right">إلغاء العملية</a>
                            </div>

                            <div class="col-md-6">
                                <input type="submit" name="submit" class="btn btn-primary float-left ml-5" value="إضافة الموظف">
                            </div>

                        </div>
                    </div>

                    </form>

                </div>

            </div>
        </main>

        <?php include(ROOT_PATH . "/views/admin/includes/side-bar.view.php"); ?>

    </div>


<?php include(ROOT_PATH . "/views/admin/includes/bottom.view.php"); ?>