<?php include(ROOT_PATH . "/views/normal-employee/includes/top-nav.view.php"); ?>

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

                        <?php foreach($requests as $re) {

                            if($re['type'] == 1){
                                $type = 'مرضية';
                            }else if($re['type'] == 2){
                                $type = 'جزئية';
                            }else if($re['type'] == 3){
                                $type = 'سنوية';
                            }

                            if($re['status'] == 0){
                                $status = 'مرفوض';
                            }else if($re['status'] == 1){
                                $status = 'مقبول';
                            }else if($re['status'] == 2){
                                $status = 'في الإنتظار';
                            }

                            ?>

                            <tr>
                                <td class="float-right col-md-3 text-center"><?=$re['post_date']?></td>
                                <td class="float-right col-md-3 text-center"><?=$type?></td>
                                <td class="float-right col-md-3 text-center"><?=$status?></td>
                                <td class="float-right col-md-3 text-center"><a href="/employee/leaves/<?=$re['request_id']?>/display" class="text-success"><i class="fas fa-eye icon-size"></i></a> | <a href="/employee/leaves/<?=$re['request_id']?>/edit" class="text-warning"><i class="far fa-edit icon-size"></i></a></td>
                            </tr>

                        <?php } ?>

                        </tbody>
                    </table>

                </div>

                <div class="card-footer">
                    <div class="col-6">
                        <a href="/normal-employee" class="btn btn-secondary">رجوع</a>
                    </div>
                </div>

            </div>
        </div>
    </main>


<?php include(ROOT_PATH . "/views/normal-employee/includes/sidebar-nav.view.php"); ?>

</div>

<?php include(ROOT_PATH . "/views/normal-employee/includes/bottom.view.php"); ?>