<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php"); ?>

<div id="wrapper" class="container-fluid">

    <main>
        <div id="content" class="col-sm-12">

            <p class="text-secondary"><?=$_SESSION['name']?> /  <span class="text-info">التقارير</span>  / <span class="green">تفاصيل التقرير</span></p>

            <hr>

            <div class="card">

                <di class="card-header text-center">

                    <h1 class="green">تقرير اداء <span class="text-info"><?=$row['name']?></span></h1>

                </di>

                <div class="card-body">

                    <form class="col-sm-12 col-md-8 m-auto">

                        <h4 class="mr-5 text-info under-line text-center">المعلومات الشخصية</h4>

                        <div class="row">

                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label class=" col-form-label blue text-left"><?=$row['qualification']?></label>
                                </div>

                                <label class=" col-form-label col-md-4 text-left">المؤهل العلمي</label>

                            </div>

                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label for="name" class=" col-form-label blue text-left"><?=$row['name']?></label>
                                </div>

                                <label for="name" class=" col-form-label col-md-4 text-left">الأسم</label>

                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label  class=" col-form-label blue  text-left"><?=$row['hiring_date']?></label>
                                </div>

                                <label class=" col-form-label  col-md-4 text-left">تاريخ التعيين</label>

                            </div>

                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label class=" col-form-label blue text-left"><?=$row['branch']?></label>
                                </div>

                                <label class=" col-form-label  col-md-4 text-left">الكلية</label>

                            </div>

                        </div>

                            <div class="row">
                                <div class="form-group row col-6 m-auto">

                                    <div class="col-md-8 ml-auto">
                                        <label  class=" col-form-label blue  text-left"><?=$rp['report_date']?></label>
                                    </div>

                                    <label class=" col-form-label  col-md-4 text-left">تاريخ التقرير</label>

                                </div>
                            </div>

                        <hr>

                        <h4 class="mr-5 text-info under-line text-center">الأداء الأكاديمي</h4>

                        <table class="table table-striped table-bordered">

                            <thead>
                            <tr>
                                <th scope="col" class="float-right text-center col-md-10 text-info">الأداء الأكاديمي</th>
                                <th scope="col" class="float-right col-md-2 text-center text-info">الدرجة</th>
                            </tr>

                            </thead>

                            <tbody>

                            <tr>
                                <th scope="row" class="float-right col-md-10 text-right">الكفاءة في التدريس وفقاً للطلاب</th>
                                <td class="float-right col-md-2 text-center"><?=$rp['r1']?>/10</td>
                            </tr>

                            <tr>
                                <th scope="row" class="float-right col-md-10 text-right">الإلتزام بمواعيد المحاضرات</th>
                                <td class="float-right col-md-2 text-center"><?=$rp['r2']?>/10</td>
                            </tr>

                            <tr>
                                <th scope="row" class="float-right col-md-10 text-right">الإلتزام بالساعات المكتبية</th>
                                <td class="float-right col-md-2 text-center"><?=$rp['r3']?>/10</td>
                            </tr>

                            <tr>
                                <th scope="row" class="float-right col-md-10 text-right">الألتزام بالعبء التدريسي</th>
                                <td class="float-right col-md-2 text-center"><?=$rp['r4']?>/10</td>
                            </tr>

                            <tr>
                                <th scope="row" class="float-right col-md-10 text-right">اداء مهامه في الإرشاد الأكاديمي</th>
                                <td class="float-right col-md-2 text-center"><?=$rp['r5']?>/10</td>
                            </tr>

                            <tr>
                                <th scope="row" class="float-right col-md-10 text-right">المساهمة في تطوير المقررات التي يدرسها</th>
                                <td class="float-right col-md-2 text-center"><?=$rp['r6']?>/10</td>
                            </tr>

                            <tr>
                                <th scope="row" class="float-right col-md-10 text-right">القدرة علي الإبتكار والتجديد في طريقة التدريس</th>
                                <td class="float-right col-md-2 text-center"><?=$rp['r7']?>/10</td>
                            </tr>

                            <tr>
                                <th scope="row" class="float-right col-md-10 text-right">المشاركة في اللقاءات والندوات و ورش العمل علي مستوي الكلية والجامعة</th>
                                <td class="float-right col-md-2 text-center"><?=$rp['r8']?>/10</td>
                            </tr>

                            <tr>
                                <th scope="row" class="float-right col-md-10 text-right">المساهمة في أعمال اللجان في القسم أو الكلية أو الجامعة</th>
                                <td class="float-right col-md-2 text-center"><?=$rp['r9']?>/10</td>
                            </tr>

                            <tr>
                                <th scope="row" class="float-right col-md-10 text-right">تعاونه وعلاقاته في زملائة</th>
                                <td class="float-right col-md-2 text-center"><?=$rp['r10']?>/10</td>
                            </tr>

                            <?php $sum = $rp['r1'] + $rp['r2'] + $rp['r3'] + $rp['r4'] + $rp['r5'] + $rp['r6'] + $rp['r7'] + $rp['r8'] + $rp['r9'] + $rp['r10']?>

                            <tr>
                                <th scope="row" class="float-right col-md-10 text-right">المجموع الكلي للدرجات من 100</th>
                                <td class="float-right col-md-2 text-center text-info font-weight-bold"><?=$sum?>/100</td>
                            </tr>

                            </tbody>
                        </table>

                        <hr>

                        <h4 class="mr-5 text-info under-line text-center">التوصيات</h4>

                        <div class="row">
                            <div class="form-group row col">

                                <div class="col-md-8 ml-auto">
                                    <label class=" col-form-label blue text-right"><?=$rp['recommendations']?></label>
                                </div>

                                <label class=" col-form-label col-md-4 text-left">توصية مدير القسم</label>

                            </div>
                        </div>

                    </form>

                </div>

                <div class="card-footer">
                    <div class="col-6">
                        <a href="/admin/reports/received-reports" class="btn btn-secondary">رجوع</a>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <?php include(ROOT_PATH . "/views/admin/includes/side-bar.view.php"); ?>

</div>


<?php include(ROOT_PATH . "/views/admin/includes/bottom.view.php"); ?>