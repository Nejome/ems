<?php include(ROOT_PATH . "/views/normal-employee/includes/top-nav.view.php"); ?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12">

                <p class="text-secondary"><?=$_SESSION['name']?> /  <span class="text-info">الإجازات</span>  / <span class="green">تعديل الطلب</span></p>

                <hr>

                <div class="card">

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

                        <form method="POST" action="/edit-request/<?=$request['request_id']?>" class="col-sm-12 col-md-6  ml-auto border-left">

                            <div class="form-group row">

                                <div class="col-md-7 ml-auto">
                                    <select name="type" dir="rtl" class="form-control">
                                        <option value="1" <?php if($request['type'] == 1){echo 'selected';} ?>>إجازة مرضية</option>
                                        <option value="2" <?php if($request['type'] == 2){echo 'selected';} ?>>إجازة جزئية</option>
                                        <option value="3" <?php if($request['type'] == 3){echo 'selected';} ?>>إجازة سنوية</option>
                                    </select>
                                </div>

                                <label class=" col-form-label col-md-4 text-left">نوع الإجازة</label>

                            </div>

                            <div class="form-group row form-group">

                                <div class="col-md-7 ml-auto">
                                    <input type="date" name="from_date" class="form-control text-center" value="<?=$request['from_date']?>">
                                </div>

                                <label class=" col-form-label col-md-4 text-left">من</label>

                            </div>

                            <div class="form-group row form-group">

                                <div class="col-md-7 ml-auto">
                                    <input type="date" name="to_date" class="form-control text-center" value="<?=$request['to_date']?>">
                                </div>

                                <label class=" col-form-label col-md-4 text-left">حتي</label>

                            </div>

                            <div class="form-group">
                                <label class=" col-form-label col-md-5 text-left">الملاحظات اختياري</label>

                                <textarea rows="9" col="50"  name="notes" class="form-control col-8 ml-5 mr-auto text-right"><?=$request['notes']?></textarea>
                            </div>

                    </div>

                    <div class="card-footer">
                        <div class="form-group row">

                            <div class="col">
                                <a href="/employee/leaves/archives" class="btn btn-success">رجوع</a>
                            </div>

                            <div class="col text-left">
                                <input type="submit" class="btn btn-warning" value="تعديل">
                            </div>

                        </div>
                    </div>

                    </form>

                </div>

            </div>
        </main>

        <?php include(ROOT_PATH . "/views/normal-employee/includes/sidebar-nav.view.php"); ?>

    </div>


<?php include(ROOT_PATH . "/views/normal-employee/includes/bottom.view.php"); ?>