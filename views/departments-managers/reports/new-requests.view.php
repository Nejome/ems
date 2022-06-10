<?php include(ROOT_PATH . "/views/departments-managers/includes/top-nav.view.php");
use Carbon\Carbon;
?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12 col-md-6 m-auto">

                <p class="text-secondary">  <?=$_SESSION['name']?> / <span class="text-info">التقارير</span>  / <span class="text-primary">طلبات التقارير الواردة</span></p>

                <div class="card">

                    <div class="card-header">
                        <h3 class="text-center text-primary">طلبات التقارير الواردة </h3>
                    </div>

                    <div class="card-body">

                        <table class="table table-striped table-bordered">

                            <thead>
                            <tr>
                                <th scope="col" class="float-right col-md-6 text-center text-info">اسم الموظف</th>
                                <th scope="col" class="float-right col-md-6 text-center text-info">استخراج تقرير</th>
                            </tr>

                            </thead>

                            <tbody>
                            <?php foreach($requests as $rq) {

                                $row = $ems->get_an_employee($rq['employee_id']);

                                if($rq['type'] == 1){
                                    $link = '/reports/fill-official-report-for/'.$rq['employee_id'].'/'.$rq['id'];
                                }else if($rq['type'] == 2){
                                    $link = '/reports/fill-academic-report-for/'.$rq['employee_id'].'/'.$rq['id'];
                                }

                                ?>
                                <tr>
                                    <td class="float-right col-md-6 text-center"><?=$row['name']?></td>
                                    <td class="float-right col-md-6 text-center"><a href="<?=$link?>" class="text-primary">ملء بيانات التقرير</a></td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>

                    </div>

                    <div class="card-footer">
                        <div class="col-6">
                            <a href="/managers" class="btn btn-secondary">رجوع</a>
                        </div>
                    </div>

                </div>
            </div>
        </main>


        <?php include(ROOT_PATH . "/views/departments-managers/includes/sidebar-nav.view.php"); ?>

    </div>

<?php include(ROOT_PATH . "/views/departments-managers/includes/bottom.view.php"); ?>