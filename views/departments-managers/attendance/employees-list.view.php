<?php include(ROOT_PATH . "/views/departments-managers/includes/top-nav.view.php");?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12 col-md-5 m-auto">

                <p class="text-secondary">  <?=$_SESSION['name']?> / <span class="text-info">الحضور والغياب</span>  / <span class="text-primary">قائمة موظفي القسم</span></p>

                <div class="card">

                    <div class="card-header">
                        <h5 class="text-center text-primary">قائمة الموظفين</h5>
                    </div>

                    <div class="card-body">

                        <table class="table table-striped table-bordered">

                            <thead>
                            <tr>
                                <th scope="col" class="float-right col-md-7 text-center text-info">اسم الموظف</th>
                                <th scope="col" class="float-right col-md-5 text-center text-info">العملية</th>
                            </tr>

                            </thead>

                            <tbody>

                            <?php foreach($employees as $emp) { ?>

                                <tr>
                                    <td class="float-right col-md-7 text-center"><?=$emp['name']?></td>
                                    <td class="float-right col-md-5 text-center"><a href="/attendance-archives/<?=$emp['employee_id']?>" class="text-primary">عرض الحضور والغياب</a></td>
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