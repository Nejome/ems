<?php include(ROOT_PATH . "/views/departments-managers/includes/top-nav.view.php"); ?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12 col-md-8 m-auto">

                <p class="text-secondary"><?=$_SESSION['name']?> /  <span class="text-info">التقارير</span>  / <span class="green">ملء تقرير اداء اداري</span></p>

                <hr>

                <div class="card">
                    <di class="card-header text-center">

                        <h1 class="green">ملء تقرير اداءاداري </h1>

                    </di>

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

                        <form method="POST" action="/filling-official-report/<?=$request->employee_id?>/<?=$request->request_id?>" class="col-sm-12 col-md-8 float-right">

                            <div class="form-group row">

                                <div class="col-md-6 ml-auto">
                                    <select name="r1" dir="rtl" class="form-control text-right">
                                        <option <?php if(isset($errors)){if($_POST['r1'] == 3){echo 'selected';}}?> value="3">جيد</option>
                                        <option <?php if(isset($errors)){if($_POST['r1'] == 2){echo 'selected';}}?> value="2">جيد جدا</option>
                                        <option <?php if(isset($errors)){if($_POST['r1'] == 1){echo 'selected';}}?> value="1">ممتاز</option>
                                    </select>
                                </div>

                                <label class="col-form-label blue col-md-3 text-left">المظهر العام</label>

                            </div>

                            <div class="form-group row">

                                <div class="col-md-6 ml-auto">
                                    <input type="text" name="r2" class="form-control text-right" value="<?php if(isset($errors)){echo $_POST['r2'];}?>">
                                </div>

                                <label  class=" col-form-label blue col-md-3 text-left">المواظبة</label>

                            </div>

                            <div class="form-group row">

                                <div class="col-md-8 ml-auto">
                                    <textarea rows="9" col="50"  name="recommendations" class="form-control text-right">
                                        <?php if(isset($errors)){echo $_POST['recommendations'];}?>
                                    </textarea>
                                </div>

                                <label class=" col-form-label blue col-md-3 text-left">التوصيات</label>

                            </div>

                    </div>

                    <div class="card-footer">
                        <div class="form-group row">
                            <div class="col">
                                <input type="submit" class="btn btn-primary" value="ارسال التقرير">
                            </div>

                            <div class="col text-left">
                                <a href="/managers/reports/new-requests" class="btn btn-secondary">رجوع</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <?php include(ROOT_PATH . "/views/departments-managers/includes/sidebar-nav.view.php"); ?>

    </div>


<?php include(ROOT_PATH . "/views/departments-managers/includes/bottom.view.php"); ?>