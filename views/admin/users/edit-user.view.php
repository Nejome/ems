<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php"); ?>

    <div id="wrapper" class="container-fluid">
        <main>
            <div id="content" class="col-sm-12 col-md-11 m-auto">

                <p class="text-secondary">مدير النظام /  <span class="text-info">المستخدمين</span>  / <span class="text-primary">تعديل مستخدم</span></p>

                <hr>

                <div class="card">

                    <div class="card-header text-center">

                        <h1 class="text-primary">تعديل مستخدم</h1>

                    </div>

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

                        <form method="POST" action="/edit-user/<?=$row['user_id']?>" class="col-sm-12 col-md-7 float-right">

                            <div class="form-group row">
                                <div class="col-md-6 ml-auto">
                                    <input type="text" name="user_name" class="form-control  text-right" value="<?=$row['user_name']?>">
                                </div>

                                <label for="name" class="col-form-label col-md-3 text-left text-info">اسم المستخدم للدخول</label>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 ml-auto">
                                    <select name="user_type" id="user-type" class="form-control" dir="rtl">
                                        <option value="1" <?php if($row['user_type'] == 1){echo 'selected';} ?>>شؤون الأفراد</option>
                                        <option value="2" <?php if($row['user_type'] == 2){echo 'selected';} ?>>مدير قسم</option>
                                        <option value="4" <?php if($row['user_type'] == 4){echo 'selected';} ?>>موظف عادي</option>
                                    </select>
                                </div>

                                <label for="user-type" class="col-form-label col-md-3 text-left text-info">نوع المستخدم</label>
                            </div>

                    </div>

                    <div class="card-footer">
                        <div class="form-group row">

                            <div class="col-md-6">
                                <a href="/admin/users/manage" class="btn btn-secondary float-right">إلغاء العملية</a>
                            </div>

                            <div class="col-md-6">
                                <input type="submit" name="submit" class="btn btn-warning float-left ml-5" value="تعديل المستخدم">
                            </div>

                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </main>
    </div>

<?php include(ROOT_PATH . "/views/admin/includes/side-bar.view.php"); ?>

    </div>


<?php include(ROOT_PATH . "/views/admin/includes/bottom.view.php"); ?>