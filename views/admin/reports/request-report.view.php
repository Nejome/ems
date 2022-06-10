<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php"); ?>

<div id="wrapper" class="container-fluid">

    <main>
        <div id="content" class="col-sm-12 col-md-12 m-auto">

            <p class="text-secondary"> <?=$_SESSION['name']?> / <span class="text-info">التقارير</span>  / <span class="green">طلب تقرير عن موظف</span></p>

            <hr>

            <table class="table table-striped table-bordered">

                <thead>
                <tr>
                    <th scope="col" class="float-right text-center col-md-2 text-info">النوع</th>
                    <th scope="col" class="float-right col-md-3 text-center text-info">الإسم</th>
                    <th scope="col" class="float-right col-md-2 text-center text-info">الادارة/الكلية</th>
                    <th scope="col" class="float-right col-md-2 text-center text-info">الوظيفة</th>
                    <th scope="col" class="float-right col-md-3 text-center text-info">العمليات</th>
                </tr>

                </thead>

                <tbody>
                <?php foreach($officials as $row) {

                    $management = $ems->get_an_managements($row['branch_id']);

                    ?>

                    <tr>
                        <th scope="row" class="float-right col-md-2 text-center">اداري</th>
                        <td class="float-right col-md-3 text-center"><?= $row['name'] ?></td>
                        <td class="float-right col-md-2 text-center"><?= $management['management_name'] ?></td>
                        <td class="float-right col-md-2 text-center"><?= $row['job_name'] ?></td>
                        <td class="float-right col-md-3 text-center"><?php if($_SESSION['user_emp_id'] == $row['employee_id']){echo '<span class="text-secondary">لا يمكن</span>';}else{echo '<a href="/admin/request-report-about/'.$row['employee_id'].'" class="text-primary">طلب تقرير عن الموظف</a>';} ?></td>
                    </tr>


                <?php } ?>

                <?php foreach($academics as $row) {

                    $collage = $ems->get_an_collage($row['branch_id']);

                    ?>

                    <tr>
                        <th scope="row" class="float-right col-md-2 text-center">اكاديمي</th>
                        <td class="float-right col-md-3 text-center"><?= $row['name'] ?></td>
                        <td class="float-right col-md-2 text-center"><?= $collage['collage_name'] ?></td>
                        <td class="float-right col-md-2 text-center"><?= $row['job_name'] ?></td>
                        <td class="float-right col-md-3 text-center"><?php if($_SESSION['user_emp_id'] == $row['employee_id']){echo '<span class="text-secondary">لا يمكن</span>';}else{echo '<a href="/admin/request-report-about/'.$row['employee_id'].'" class="text-primary">طلب تقرير عن الموظف</a>';} ?></td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>

        </div>
    </main>

    <?php include(ROOT_PATH . "/views/admin/includes/side-bar.view.php"); ?>

</div>


<?php include(ROOT_PATH . "/views/admin/includes/bottom.view.php"); ?>