<?php include(ROOT_PATH . "/views/departments-managers/includes/top-nav.view.php"); ?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12 col-md-8 m-auto">

                <p class="text-secondary">  <?=$_SESSION['name']?> / <span class="text-info">الإجازات</span>  / <span class="text-primary">إرشيف الطلبات</span></p>

                <div class="card">

                    <div class="card-header">
                        <h3 class="text-center text-primary">إرشيف الطلبات</h3>
                    </div>

                    <div class="card-body">

                        <table class="table table-striped table-bordered">

                            <thead>
                            <tr>
                                <th scope="col" class="float-right col-md-3 text-center text-info">تاريخ النشر</th>
                                <th scope="col" class="float-right col-md-3 text-center text-info">النوع</th>
                                <th scope="col" class="float-right col-md-3 text-center text-info">الحالة</th>
                                <th scope="col" class="float-right col-md-3 text-center text-info">العمليات</th>
                            </tr>

                            </thead>

                            <tbody>

                            <?php foreach($requests as $rq) {

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
                                    <td class="float-right col-md-3 text-center"><?=$rq['post_date']?></td>
                                    <td class="float-right col-md-3 text-center"><?=$type?></td>
                                    <td class="float-right col-md-3 text-center <?=$class?>"><?=$status?></td>
                                    <td class="float-right col-md-3 text-center"><a href="/managers/leaves/<?=$rq['request_id']?>/display" class="text-success"><i class="fas fa-eye icon-size"></i></a> | <a href="/managers/leaves/<?=$rq['request_id']?>/edit" class="text-warning"><i class="far fa-edit icon-size"></i></a></td>
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