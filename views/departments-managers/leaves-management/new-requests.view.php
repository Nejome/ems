<?php include(ROOT_PATH . "/views/departments-managers/includes/top-nav.view.php"); ?>

<div id="wrapper" class="container-fluid">

    <main>
        <div id="content" class="col-sm-12 col-md-10 m-auto">

            <p class="text-secondary"><?=$_SESSION['name']?> /  <span class="text-info">الإجازات</span>  / <span class="text-primary">الطلبات الجديدة</span></p>

            <hr>

            <div class="card">

                <di class="card-header text-center">

                    <h1 class="text-primary">الطلبات الجديدة</h1>

                </di>

                <div class="card-body">

                    <table class="table table-striped">

                        <thead>
                        <tr>
                            <th scope="col" class="float-right col-md-2 text-center text-info">اسم الموظف</th>
                            <th scope="col" class="float-right col-md-2 text-center text-info">نوع الإجازة</th>
                            <th scope="col" class="float-right col-md-2 text-center text-info">تاريخ نشر الطلب</th>
                            <th scope="col" class="float-right col-md-4 text-center text-info">تاريخ الإجازة الإجازة</th>
                            <th scope="col" class="float-right col-md-2 text-center text-info">العمليات</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php foreach($my_employees as $emp) {
                            $requests = $ems->get_new_requests_of($emp['employee_id']);
                            foreach($requests as $rq) {

                                if($rq['type'] == 1){
                                    $type = 'مرضية';
                                }else if($rq['type'] == 2){
                                    $type = 'جزئية';
                                }else if($rq['type'] == 3){
                                    $type = 'سنوية';
                                }

                                if($rq['status'] == 0){
                                    $status = 'مرفوض';
                                }else if($rq['status'] == 1){
                                    $status = 'مقبول';
                                }else if($rq['status'] == 2){
                                    $status = 'في الإنتظار';
                                }
                            ?>

                                <tr>
                                    <td class="float-right col-md-2 text-center"><?=$emp['name']?></td>
                                    <td class="float-right col-md-2 text-center"><?=$type?></td>
                                    <td class="float-right col-md-2 text-center"><?=$rq['post_date']?></td>
                                    <td class="float-right col-md-4 text-center"> من <?=$rq['from_date']?> الي <?=$rq['to_date']?></td>
                                    <td class="float-right col-md-2 text-center"><a href="/managers/leaves/<?=$rq['request_id']?>/view/<?=$emp['employee_id']?>" class="text-success"><i class="fas fa-eye icon-size"></i></a></td>
                                </tr>

                        <?php } } ?>

                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </main>

    <?php include(ROOT_PATH . "/views/departments-managers/includes/sidebar-nav.view.php"); ?>

</div>


<?php include(ROOT_PATH . "/views/departments-managers/includes/bottom.view.php"); ?>