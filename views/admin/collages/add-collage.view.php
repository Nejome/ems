<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php"); ?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12 col-md-10 m-auto">

                <p class="text-secondary">مدير النظام /  <span class="text-info">الكليات</span>  / <span class="green">إضافة كلية</span></p>

                <hr>

                <div class="card">

                    <di class="card-header text-center">

                        <h1 class="green">إستمارة إضافة كلية</h1>

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

                        <form method="POST" action="/add-collage" class="col-sm-12 col-md-7 float-right">

                            <div class="form-group row">

                                <div class="col-md-6 ml-auto">
                                    <input type="text" name="collage_name" id="collage_name" class="form-control text-right" placeholder="أدخل إسم الكلية">
                                </div>

                                <label for="collage_name" class=" col-form-label blue col-md-3 text-left">إسم الكلية</label>

                            </div>

                            <div class="form-group row">

                                <div class="col-md-6 ml-auto">
                                    <input type="text" name="collage_symbol" id="collage_symbol" class="form-control text-right" placeholder="أدخل رمز الكلية">
                                </div>

                                <label for="collage_symbol" class=" col-form-label blue col-md-3 text-left">رمز الكلية</label>

                            </div>

                            <div class="form-group row">

                                <div class="col-md-6 ml-auto">
                                    <select name="collage_manager" dir="rtl" class="form-control text-right">
                                        <?php foreach($rows as $row) { ?>
                                            <option value="<?=$row['employee_id']?>"><?=$row['name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <label for="dept" class=" col-form-label blue col-md-3 text-left">مدير الكلية</label>

                            </div>

                    </div>

                    <div class="card-footer">
                        <div class="form-group row">

                            <div class="col-md-6">
                                <a href="/admin/collages/manage" class="btn btn-secondary">إلغاء العلمية</a>
                            </div>

                            <div class="col-md-6">
                                <input type="submit" class="btn btn-primary float-left ml-5" value="إضافة الكلية">
                            </div>
                                <div class="col-md-6">

                                <input type="submit" class="btn btn-primary float-left ml-5" value="اضافة قسم">

                            </div>
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