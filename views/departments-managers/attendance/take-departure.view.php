<?php include(ROOT_PATH . "/views/departments-managers/includes/top-nav.view.php");
use Carbon\Carbon;
?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12 col-md-6 m-auto">

                <p class="text-secondary">  <?=$_SESSION['name']?> / <span class="text-info">الحضور والغياب</span>  / <span class="text-primary">تسجيل زمن الحضور</span></p>

                <div class="card">

                    <div class="card-header">
                        <h5 class="text-center text-primary">تسجيل زمن الانصراف ليوم <span class="red"><?=(Carbon::now())->toDateString()?></span></h5>
                    </div>

                    <div class="card-body">

                        <table class="table table-striped table-bordered">

                            <thead>
                            <tr>
                                <th scope="col" class="float-right col-md-7 text-center text-info">اسم الموظف</th>
                                <th scope="col" class="float-right col-md-5 text-center text-info">تسجيل الانصراف</th>
                            </tr>

                            </thead>

                            <tbody>

                            <?php foreach($employees as $emp) {

                              $att = $ems->get_today_attendance_of($emp['employee_id']);

                                ?>

                                <tr>
                                    <td class="float-right col-md-7 text-center"><?=$emp['name']?></td>
                                    <td class="float-right col-md-5 text-center"><?php if($att['departure_time'] != null){echo '<span class="text-success">تم التسجيل</span>';}else{if($att['status'] == 1){echo '<a href="/take-departure-of/'.$att['id'].'">تسجيل زمن الانصراف</a>';}else {echo '<span class="red">لم يحضر</span>';}} ?></td>
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