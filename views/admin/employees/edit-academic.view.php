<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php"); ?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12">

                <p class="text-secondary">مدير النظام /  <span class="text-info">الموظفين</span>  / <span class="text-warning">تعديل بيانات موظف</span></p>

                <hr>

                <div class="card">

                    <di class="card-header text-center">

                        <h1 class="text-warning">تعديل بيانات <span class="text-info"><?=$row['name']?></span></h1>

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

                        <form method="POST" action="/edit-academic/<?=$row['employee_id']?>" class="col-sm-12 col-md-8">

                            <h4 class="mr-5 text-info under-line text-center">المعلومات الشخصية</h4>

                            <div class="row">

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <input type="date" name="berth" id="berth" class="form-control text-right" value="<?=$row['berth_day']?>">
                                    </div>

                                    <label for="berth" class=" col-form-label blue col-md-4 text-left">تاريخ الميلاد</label>

                                </div>

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <input type="text" name="name" id="name" class="form-control text-right" value="<?=$row['name']?>">
                                    </div>

                                    <label for="name" class=" col-form-label blue col-md-4 text-left">الأسم</label>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"  name="gender" id="female" value="2" <?php if($row['gender'] == 2){echo 'checked';}?>>
                                            <label class="form-check-label" for="inlineRadio2">انثي</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="1" <?php if($row['gender'] == 1){echo 'checked';}?>>
                                            <label class="form-check-label" for="inlineRadio1">ذكر</label>
                                        </div>
                                    </div>

                                    <label for="name" class=" col-form-label blue col-md-4 text-left">الجنس</label>

                                </div>

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <input type="text" name="address" id="address" class="form-control text-right" value="<?=$row['address']?>">
                                    </div>

                                    <label for="address" class=" col-form-label blue col-md-4 text-left">العنوان</label>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto col">
                                        <input type="email" name="email" id="email" class="form-control text-right" value="<?=$row['email']?>">
                                    </div>

                                    <label for="email" class=" col-form-label blue col-md-4 text-left">البريدالإلكتروني</label>

                                </div>

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <input type="text" name="phone" id="phone" class="form-control text-right" value="<?=$row['phone']?>">
                                    </div>

                                    <label for="phone" class=" col-form-label blue col-md-4 text-left">رقم الهاتف</label>

                                </div>

                            </div>

                            <hr>

                            <h4 class="mr-5 text-info under-line text-center">معلومات العمل</h4>

                            <div class="row">

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <input type="date" name="hiring_date" id="hiring_date" class="form-control text-right" value="<?=$row['hiring_date']?>">
                                    </div>

                                    <label for="hiring_date" class=" col-form-label blue col-md-4 text-left">تاريخ التعيين</label>

                                </div>

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <select name="job_name" class="form-control text-right" dir="rtl">
                                            <?php foreach($jobs as $job) { ?>
                                                <option value="<?=$job['job_id']?>" <?php if($job['job_id'] == $row['job_id']){echo 'selected';} ?>><?=$job['job_name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <label for="jop-name" class=" col-form-label blue col-md-4 text-left">اسم الوظيفة</label>

                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <input type="text" name="qualification" id="edu-qua" class="form-control text-right" value="<?=$row['qualification']?>">
                                    </div>

                                    <label for="qualification" class="col-form-label blue col-md-4 text-left">المؤهل العلمي</label>

                                </div>

                                <div class="form-group row col">

                                    <div class="col-md-8 ml-auto">
                                        <select name="contract_type" id="contract-type" class="form-control" dir="rtl">
                                            <?php foreach($contract_type as $cont) { ?>
                                                <option value="<?=$cont?>" <?php if($row['contract_type'] == $cont){echo 'selected';} ?>><?=$cont?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <label for="contract-type" class=" col-form-label blue col-md-4 text-left">نوع العقد</label>

                                </div>
                            </div>

                            <hr>

                            <h4 class="mr-5 text-info under-line text-center">المعلومات المالية</h4>

                            <div class="row">
                                <div class="form-group row col-7 m-auto">

                                    <div class="col-md-8 ml-auto">
                                        <input type="text" name="premiums" id="premiums" class="form-control text-right" value="<?=$row['premiums']?>">
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
                                <input type="submit" class="btn btn-warning float-left ml-5" value="تعديل الموظف">
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