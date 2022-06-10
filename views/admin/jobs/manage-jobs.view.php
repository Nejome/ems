<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php"); ?>

<div id="wrapper" class="container-fluid">

    <main>
        <div id="content" class="col-sm-12 col-md-11 m-auto">

            <p class="text-secondary">مدير النظام /  <span class="text-info">الوظائف والأقسام</span>  / <span class="text-primary">إدارة الوظائف</span></p>

            <hr>

            <div class="card">

                <di class="card-header text-center">

                    <h1 class="text-primary">إدارة الوظــــائف</h1>

                </di>

                <div class="card-body">

                    <table class="table table-striped table-bordered">

                        <thead>
                        <tr>
                            <th scope="col" class="float-right text-center col-md-1 text-info">الرقم</th>
                            <th scope="col" class="float-right col-md-2 text-center text-info">الإسم</th>
                            <th scope="col" class="float-right col-md-2 text-center text-info">القسم</th>
                            <th scope="col" class="float-right col-md-2 text-center text-info">المرتب</th>
                            <th scope="col" class="float-right col-md-2 text-center text-info">مدة الإجازة</th>
                            <th scope="col" class="float-right col-md-3 text-center text-info">العمليات</th>
                        </tr>

                        </thead>

                        <tbody>

                        <?php foreach($mgs_jobs as $job) { ?>

                        <tr>
                            <th scope="row" class="float-right col-md-1 text-center"><?=$job['job_id']?></th>
                            <td class="float-right col-md-2 text-right"><?=$job['job_name']?></td>
                            <td class="float-right col-md-2 text-right"><?=$job['management_name']?></td>
                            <td class="float-right col-md-2 text-center"><?=$job['main_salary']?></td>
                            <td class="float-right col-md-2 text-center"><?=$job['leave_duration']?></td>
                            <td class="float-right col-md-3 text-center"><a href="/admin/jobs/<?=$job['job_id']?>/edit" class="text-warning"><i class="far fa-edit icon-size"></i></a> | <a href="javascript:delete_job(<?=$job['job_id']?>, '<?=$job['job_name']?>')" class="text-danger"><i class="far fa-trash-alt icon-size"></i></a></td>
                        </tr>

                        <?php } ?>

                        <?php foreach($cols_jobs as $job) { ?>

                            <tr>
                                <th scope="row" class="float-right col-md-1 text-center"><?=$job['job_id']?></th>
                                <td class="float-right col-md-2 text-right"><?=$job['job_name']?></td>
                                <td class="float-right col-md-2 text-right"><?=$job['collage_name']?></td>
                                <td class="float-right col-md-2 text-center"><?=$job['main_salary']?></td>
                                <td class="float-right col-md-2 text-center"><?=$job['leave_duration']?></td>
                                <td class="float-right col-md-3 text-center"><a href="/admin/jobs/<?=$job['job_id']?>/edit" class="text-warning"><i class="far fa-edit icon-size"></i></a> | <a href="javascript:delete_job(<?=$job['job_id']?>, '<?=$job['job_name']?>')" class="text-danger"><i class="far fa-trash-alt icon-size"></i></a></td>
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


<?php include(ROOT_PATH . "/views/admin/includes/bottom.view.php"); ?>

<script type="text/javascript">

    function delete_job(id, name){

        if(confirm("هل تريد بالفعل حذف وظيفة " + name + ".")){

            window.location.href = "/delete-job/"+id;

        }

    }

</script>