<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php"); ?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12 col-md-8 m-auto">

                <p class="text-secondary"><?=$_SESSION['name']?> /  <span class="text-info">الإجازات</span>  / <span class="text-primary">ارشيف الطلبات</span></p>

                <hr>

                <div class="card">

                    <di class="card-header text-center">

                        <h1 class="text-primary">ارشيف الطلبات</h1>

                    </di>

                    <div class="card-body">

                        <table class="table table-striped">

                            <thead>
                            <tr>
                                <th scope="col" class="float-right col-md-3 text-center text-info">اسم الموظف</th>
                                <th scope="col" class="float-right col-md-2 text-center text-info">نوع الإجازة</th>
                                <th scope="col" class="float-right col-md-2 text-center text-info">تاريخ نشر الطلب</th>
                                <th scope="col" class="float-right col-md-3 text-center text-info">الحالة</th>
                                <th scope="col" class="float-right col-md-2 text-center text-info">العمليات</th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php
                            foreach($employees as $emp){

                                $requests = $ems->get_all_requests_of($emp['employee_id']);
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
                                        $class = 'not-approved';
                                    }else if($rq['status'] == 1){
                                        $status = 'مقبول';
                                        $class = 'approved';
                                    }else if($rq['status'] == 2){
                                        $status = 'في الإنتظار';
                                        $class = 'waiting';
                                    }
                                    ?>
                                    <tr>
                                        <td class="float-right col-md-3 text-center"><?=$emp['name']?></td>
                                        <td class="float-right col-md-2 text-center"><?=$type?></td>
                                        <td class="float-right col-md-2 text-center"><?=$rq['post_date']?></td>
                                        <td class="float-right col-md-3 text-center <?=$class?>"><?=$status?></td>
                                        <td class="float-right col-md-2 text-center"><a href="/admin/leaves-archives/<?=$rq['request_id']?>/display/<?=$emp['employee_id']?>" class="btn btn-success">تفاصيل الطلب</a></td>
                                    </tr>
                                <?php }} ?>

                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </main>

        <?php include(ROOT_PATH . "/views/admin/includes/side-bar.view.php"); ?>

    </div>


<?php include(ROOT_PATH . "/views/admin/includes/bottom.view.php"); ?>