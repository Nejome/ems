<?php include(ROOT_PATH . "/views/departments-managers/includes/top-nav.view.php");
use Carbon\Carbon;
?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12 col-md-6 m-auto">

                <p class="text-secondary">  <?=$_SESSION['name']?> / <span class="text-info">الحضور والغياب</span>  / <span class="text-primary">تسجيل زمن الحضور</span></p>

                <div class="card">

                    <div class="card-header">
                        <h5 class="text-center text-primary">تسجيل زمن الحضور ليوم <span class="red"><?=(Carbon::now())->toDateString()?></span></h5>
                    </div>

                    <div class="card-body">

                        <table class="table table-striped table-bordered">

                            <thead>
                            <tr>
                                <th scope="col" class="float-right col-md-7 text-center text-info">اسم الموظف</th>
                                <th scope="col" class="float-right col-md-5 text-center text-info">تسجيل الحضور</th>
                            </tr>

                            </thead>

                            <tbody>

                            <?php foreach($employees as $emp) {

                                $result = $ems->get_an_attendance($emp['employee_id']);

                                if($result == []){
                                    $result = true;
                                }else {
                                    $result = false;
                                }

                                ?>

                                <tr>
                                    <td class="float-right col-md-7 text-center"><?=$emp['name']?></td>
                                    <td class="float-right col-md-5 text-center"><?php if($result){echo '<a href="/take-attendance-for/'.$emp['employee_id'].'/1" class="text-success">تسجيل حضور</a> | <a href="/take-attendance-for/'.$emp['employee_id'].'/0" class="red">تسجيل غياب</a>';}else {echo "<span class=text-primary>تم التسجيل</span>";} ?></td>
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