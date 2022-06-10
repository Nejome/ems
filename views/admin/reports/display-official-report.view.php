<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php"); ?>

<div id="wrapper" class="container-fluid">

<main>
    <div id="content" class="col-sm-12 col-md-8 m-auto">

        <p class="text-secondary"><?=$_SESSION['name']?> /  <span class="text-info">التقارير</span>  / <span class="green">تفاصيل التقرير</span></p>

        <hr>

        <div class="card">
            <di class="card-header text-center">

                <h1 class="green">تقرير اداء <span class="text-info"><?=$row['name']?></span></h1>

            </di>

            <div class="card-body">

                <table class="table table-striped table-bordered">

                    <thead>
                    <tr>
                        <th scope="col" class="float-right text-center col-md-5 text-info">الاسم</th>
                        <th scope="col" class="float-right col-md-7 text-center text-info">المحتوى</th>
                    </tr>

                    </thead>

                    <tbody>

                    <tr>
                        <th scope="row" class="float-right col-md-5 text-right">تاريخ التعيين</th>
                        <td class="float-right col-md-7 text-center blue"><?=$row['hiring_date']?></td>
                    </tr>

                    <tr>
                        <th scope="row" class="float-right col-md-5 text-right">الوظيفة</th>
                        <td class="float-right col-md-7 text-center blue"><?=$row['branch']?></td>
                    </tr>

                    <?php

                    if($rp['r1'] == 1){
                        $look = 'ممتاز';
                    }else if($rp['r1'] == 2){
                        $look = 'جيد جدا';
                    }else if($rp['r1'] == 3){
                        $look = 'جيد';
                    }

                    ?>

                    <tr>
                        <th scope="row" class="float-right col-md-5 text-right">المظهر العام</th>
                        <td class="float-right col-md-7 text-center blue"><?=$look?></td>
                    </tr>

                    <tr>
                        <th scope="row" class="float-right col-md-5 text-right">المواظية</th>
                        <td class="float-right col-md-7 text-center blue"><?=$rp['r2']?>/10</td>
                    </tr>

                    </tbody>

                </table>

                <div class="row">
                    <div class="form-group row col">

                        <div class="col-md-8 ml-auto">
                            <label for="commission" class=" col-form-label blue text-right"><?=$rp['recommendations']?></label>
                        </div>

                        <label for="commission" class=" col-form-label col-md-4 text-left">توصية المدير المباشر</label>

                    </div>
                </div>

                <div class="card-footer">
                    <div class="col-6">
                        <a href="/admin/reports/received-reports" class="btn btn-secondary">رجوع</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>

    <?php include(ROOT_PATH . "/views/admin/includes/side-bar.view.php"); ?>

</div>


<?php include(ROOT_PATH . "/views/admin/includes/bottom.view.php"); ?>