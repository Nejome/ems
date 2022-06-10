<?php include(ROOT_PATH . "/views/departments-managers/includes/top-nav.view.php"); ?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12">

                <p class="text-secondary"><?=$_SESSION['name']?> /  <span class="text-info">التقارير</span>  / <span class="green">ملء تقرير عن اكاديمي</span></p>

                <hr>

                <div class="card">

                    <di class="card-header text-center">

                        <h3 class="green">ملء تقرير اداء اكاديمي</h3>

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

                        <form method="POST" action="/filling-academic-report/<?=$request->employee_id?>/<?=$request->request_id?>" class="col-sm-12 col-md-8 m-auto">

                            <table class="table table-striped table-bordered">

                                <thead>
                                <tr>
                                    <th scope="col" class="float-right text-center text-info col-12">الأداء الأكاديمي</th>
                                </tr>

                                </thead>

                                <tbody>

                                <tr>
                                    <th scope="row" class="float-right col-12 text-right"><input type="number" name="r1" class="form-control text-center col-2 float-left" placeholder="الدرجة / 10"><span class="text-info">التقييم الاول:</span> الكفاءة في التدريس وفقاً للطلاب</th>
                                </tr>

                                <tr>
                                    <th scope="row" class="float-right col-12 text-right"><input type="number" name="r2" class="form-control text-center col-2 float-left" placeholder="الدرجة / 10"><span class="text-info">التقييم الثاني:</span> الكفاءة في التدريس وفقاً للطلابالإلتزام بمواعيد المحاضرات</th>
                                </tr>

                                <tr>
                                    <th scope="row" class="float-right col-12 text-right"><input type="number" name="r3" class="form-control text-center col-2 float-left" placeholder="الدرجة / 10"><span class="text-info">التقييم الثالث:</span> الكفاءة في التدريس وفقاً للطلابالإلتزام بالساعات المكتبية</th>
                                </tr>

                                <tr>
                                    <th scope="row" class="float-right col-12 text-right"><input type="number" name="r4" class="form-control text-center col-2 float-left" placeholder="الدرجة / 10"><span class="text-info">التقييم الرابع:</span> الكفاءة في التدريس وفقاً للطلابالألتزام بالعبء التدريسي</th>
                                </tr>

                                <tr>
                                    <th scope="row" class="float-right col-12 text-right"><input type="number" name="r5" class="form-control text-center col-2 float-left" placeholder="الدرجة / 10"><span class="text-info">التقييم الخامس:</span> الكفاءة في التدريس وفقاً للطلاباداء مهامه في الإرشاد الأكاديمي</th>
                                </tr>

                                <tr>
                                    <th scope="row" class="float-right col-12 text-right"><input type="number" name="r6" class="form-control text-center col-2 float-left" placeholder="الدرجة / 10"><span class="text-info">التقييم السادس:</span> الكفاءة في التدريس وفقاً للطلابالمساهمة في تطوير المقررات التي يدرسها</th>
                                </tr>

                                <tr>
                                    <th scope="row" class="float-right col-12 text-right"><input type="number" name="r7" class="form-control text-center col-2 float-left" placeholder="الدرجة / 10"><span class="text-info">التقييم السابع:</span> الكفاءة في التدريس وفقاً للطلابالقدرة علي الإبتكار والتجديد في طريقة التدريس</th>
                                </tr>

                                <tr>
                                    <th scope="row" class="float-right col-12 text-right"><input type="number" name="r8" class="form-control text-center col-2 float-left" placeholder="الدرجة / 10"><span class="text-info">التقييم الثامن:</span> الكفاءة في التدريس وفقاً للطلابالمشاركة في اللقاءات والندوات و ورش العمل علي مستوي الكلية والجامعة</th>
                                </tr>

                                <tr>
                                    <th scope="row" class="float-right col-12 text-right"><input type="number" name="r9" class="form-control text-center col-2 float-left" placeholder="الدرجة / 10"><span class="text-info">التقييم التاسع:</span> الكفاءة في التدريس وفقاً للطلابالمساهمة في أعمال اللجان في القسم أو الكلية أو الجامعة</th>
                                </tr>

                                <tr>
                                    <th scope="row" class="float-right col-12 text-right"><input type="number" name="r10" class="form-control text-center col-2 float-left" placeholder="الدرجة / 10"><span class="text-info">التقييم العاشر:</span> الكفاءة في التدريس وفقاً للطلابتعاونه وعلاقاته في زملائة</th>
                                </tr>

                                </tbody>
                            </table>

                            <hr>

                            <h4 class="mr-5 text-info under-line text-center">التوصيات</h4>

                            <div class="form-group">
                                <textarea rows="9" col="50"  name="recommendations" class="form-control col-8 ml-5 mr-auto text-right"></textarea>
                            </div>


                    </div>

                    <div class="card-footer">
                        <div class="form-group row">

                            <div class="col">
                                <input type="submit" class="btn btn-primary" value="ارسال التقييم">
                            </div>
                            </form>
                            <div class="col text-left">
                                <a href="/managers/reports/new-requests" class="btn btn-secondary">رجوع</a>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </main>

        <?php include(ROOT_PATH . "/views/departments-managers/includes/sidebar-nav.view.php"); ?>

    </div>


<?php include(ROOT_PATH . "/views/departments-managers/includes/bottom.view.php"); ?>