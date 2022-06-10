<?php include(ROOT_PATH . "/views/departments-managers/includes/top-nav.view.php"); ?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12 col-md-12 m-auto">

                <p class="text-secondary"><?=$_SESSION['name']?> /  <span class="text-info">الإجازات</span>  / <span class="text-primary">معلومات الإجازات - تقديم طلب</span></p>

                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-primary">معلومات الإجازات - تقديم طلب</h3>
                    </div>

                    <div class="card-body row">

                        <div class="col-4">

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

                        <div class="col-4 border-left">

                            <h3 class="text-info text-center">تقديم طلب إجازة</h3>

                            <form method="POST" action="/sending-manager-request/<?=$_SESSION['user_emp_id']?>">

                                <div class="form-group row">

                                    <div class="col-md-7 ml-auto">
                                        <select name="type" dir="rtl" class="form-control">
                                            <option value="1" <?php if(isset($errors) && $_POST['type'] == 1){echo 'selected';} ?>>إجازة مرضية</option>
                                            <option value="2" <?php if(isset($errors) && $_POST['type'] == 2){echo 'selected';} ?>>إجازة جزئية</option>
                                            <option value="3" <?php if(isset($errors) && $_POST['type'] == 3){echo 'selected';} ?>>إجازة سنوية</option>
                                        </select>
                                    </div>

                                    <label class=" col-form-label col-md-4 text-left">نوع الإجازة</label>

                                </div>

                                <div class="form-group row form-group">

                                    <div class="col-md-7 ml-auto">
                                        <input type="date" name="from_date" class="form-control" value="<?php if(isset($errors)){echo $_POST['from_data'];} ?>">
                                    </div>

                                    <label class=" col-form-label col-md-4 text-left">من</label>

                                </div>

                                <div class="form-group row form-group">

                                    <div class="col-md-7 ml-auto">
                                        <input type="date" name="to_date" class="form-control" value="<?php if(isset($errors)){echo $_POST['to_data'];} ?>">
                                    </div>

                                    <label class=" col-form-label col-md-4 text-left">حتي</label>

                                </div>

                                <div class="form-group">
                                    <label class=" col-form-label col-md-5 text-left">الملاحظات اختياري</label>

                                    <textarea rows="9" col="50" name="notes" class="form-control"><?php if(isset($errors) && isset($_POST['notes'])){echo $_POST['notes'];} ?></textarea>
                                </div>

                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-success" value="ارسال">
                                </div>

                            </form>

                        </div>

                        <div class="col-4 border-left">

                            <h3 class="text-info text-center">معلومات الإجازات</h3>

                            <div class="form-group row">

                                <div class="col-md-7 ml-auto">
                                    <label for="berth" class=" col-form-label blue text-right"><?=$emp['name']?></label>
                                </div>

                                <label for="berth" class=" col-form-label col-md-5 text-left">الإسم</label>

                            </div>

                            <div class="form-group row">

                                <div class="col-md-7 ml-auto">
                                    <label for="berth" class=" col-form-label blue text-right"><?=$emp['leave_duration']?></label>
                                </div>

                                <label for="berth" class=" col-form-label col-md-5 text-left">مدة الإجازة السنوية</label>

                            </div>

                            <div class="form-group row">

                                <div class="col-md-7 ml-auto">
                                    <label for="berth" class=" col-form-label blue text-right"><?=$emp['available_days']?></label>
                                </div>

                                <label for="berth" class=" col-form-label col-md-5 text-left">الأيام المتاحة</label>

                            </div>

                            <div class="form-group row">

                                <?php
                                if($emp['last_leave'] == null){

                                    $last_leave = 'لا يوجد';

                                }else {

                                    $last_leave = $emp['last_leave'];

                                }
                                ?>

                                <div class="col-md-7 ml-auto">
                                    <label for="berth" class=" col-form-label blue text-right"><?=$last_leave?></label>
                                </div>

                                <label for="berth" class=" col-form-label col-md-5 text-left">تاريخ اخر إجازة</label>

                            </div>

                        </div>

                    </div>

                    <div class="card-footer">

                        <div class="row">
                            <div class="col-6">
                                <a href="/normal-employee" class="btn btn-secondary">رجوع</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </main>

        <?php include(ROOT_PATH . "/views/departments-managers/includes/sidebar-nav.view.php"); ?>

    </div>

<?php include(ROOT_PATH . "/views/departments-managers/includes/bottom.view.php"); ?>