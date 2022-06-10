<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="views/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="views/css/main.css">

    <title>تسجيل الدخول</title>

</head>
<body>

<nav>
    <div id="login-nav">

        <p id="top-nav-text">جامعة <span class="red"> قاردن</span> سيتي | نظام إدارة شؤون الأفراد | <span class="green">صفحة تسجيل الدخول</span></p>

    </div>
</nav>

<div id="login-wrapper" class="container-fluid">

    <div class="card col-6 m-auto p-0">

        <div class="card-header">
            <h3 class="text-info text-center">تسجيل الدخول</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="/login" class="">

                <div class="form-group row">

                    <div class="col-md-6 ml-auto">
                        <input type="text" name="user_name" class="form-control text-right">
                    </div>

                    <label class=" col-form-label blue col-md-3 text-left">اسم المستخدم</label>

                </div>

                <div class="form-group row">

                    <div class="col-md-6 ml-auto">
                        <input type="password" name="user_password" class="form-control text-right">
                    </div>

                    <label class=" col-form-label blue col-md-3 text-left">كلمة المرور</label>

                </div>

                <?php

                if(isset($errors)){

                    print '<div class="alert alert-danger text-right list-unstyled">';

                    foreach($errors as $error){

                        print "<li>".$error."</li>";

                    }

                    print '</div>';

                }

                ?>

        </div>

        <div class="card-footer">

            <div class="form-group row">

                <div class="col-md-6">
                    <input type="button" class="btn btn-secondary float-right" value="إلغاء العملية">
                </div>

                <div class="col-md-6">
                    <input type="submit" class="btn btn-primary" value="تسجيل الدخول">
                </div>

            </div>

        </div>
            </form>
    </div>

</div>

</body>
</html>