<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php"); ?>

<div id="wrapper" class="container-fluid">

    <main>
        <div id="content" class="col-sm-12 col-md-10 m-auto">

            <p class="text-secondary"><?=$_SESSION['name']?> /  <span class="text-info">التقارير</span>  / <span class="text-primary">التقارير الواردة</span></p>

            <hr>

            <div class="card">

                <di class="card-header text-center">

                    <h1 class="text-primary">التقارير الواردة</h1>

                </di>

                <div class="card-body">

                    <table class="table table-striped table-bordered">

                        <thead>
                        <tr>
                            <th scope="col" class="float-right col-md-3 text-center text-info">اسم الموظف</th>
                            <th scope="col" class="float-right col-md-3 text-center text-info">الادارة/الكلية</th>
                            <th scope="col" class="float-right col-md-2 text-center text-info">تاريخ التقرير</th>
                            <th scope="col" class="float-right col-md-2 text-center text-info">المدير/العميد</th>
                            <th scope="col" class="float-right col-md-2 text-center text-info">العمليات</th>
                        </tr>

                        </thead>

                        <tbody>
                        <?php foreach($official as $rp){
                            $employee = $ems->get_an_official($rp['employee_id']);
                        ?>
                        <tr>
                            <td class="float-right col-md-3 text-center"><?=$employee['name']?></td>
                            <td class="float-right col-md-3 text-center"><?=$employee['branch']?></td>
                            <td class="float-right col-md-2 text-center"><?=$rp['report_date']?></td>
                            <td class="float-right col-md-2 text-center"><?=$employee['manager_name']?></td>
                            <td class="float-right col-md-2 text-center"><a href="#" class="red"><a href="/admin/reports/<?=$rp['id']?>/display-official/<?=$rp['employee_id']?>" class="text-success"><i class="fas fa-eye icon-size"></i></a> | <a href="/admin/reports/<?=$rp['id']?>/print-official/<?=$rp['employee_id']?>" class="red"><i class="far fa-file-pdf"></i></a></td>
                        </tr>
                        <?php } ?>

                        <?php foreach($academic as $rp){
                            $employee = $ems->get_an_academic($rp['employee_id']);
                            ?>
                            <tr>
                                <td class="float-right col-md-3 text-center"><?=$employee['name']?></td>
                                <td class="float-right col-md-3 text-center"><?=$employee['branch']?></td>
                                <td class="float-right col-md-2 text-center"><?=$rp['report_date']?></td>
                                <td class="float-right col-md-2 text-center"><?=$employee['manager_name']?></td>
                                <td class="float-right col-md-2 text-center"><a href="/admin/reports/<?=$rp['id']?>/display-academic/<?=$rp['employee_id']?>" class="text-success"><i class="fas fa-eye icon-size"></i></a> | <a href="/admin/reports/<?=$rp['id']?>/print-academic/<?=$rp['employee_id']?>" class="red"><i class="far fa-file-pdf"></i></a></td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </main>

    <?php include(ROOT_PATH . "/views/admin/includes/side-bar.view.php"); ?>

</div>


<?php include(ROOT_PATH . "/views/admin/includes/bottom.view.php"); ?>>