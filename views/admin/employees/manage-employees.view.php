<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php"); ?>


<div id="wrapper" class="container-fluid">

    <main>
        <div id="content" class="col-sm-12 col-md-12 m-auto">

            <p class="text-secondary">مدير النظام /  <span class="text-info">الموظفين</span>  / <span class="text-primary">إدارة الموظفين</span></p>

            <hr>

            <div class="card">

                <di class="card-header text-center">

                    <h1 class="text-primary">إدارة الموظفــين</h1>

                </di>

                <div class="card-body">

                    <table class="table table-striped table-bordered">

                        <thead>
                        <tr>
                            <th scope="col" class="float-right text-center col-md-3 text-info">رقم الملف</th>
                            <th scope="col" class="float-right col-md-3 text-center text-info">الإسم</th>
                            <th scope="col" class="float-right col-md-2 text-center text-info">رقم الهاتف</th>
                            <th scope="col" class="float-right col-md-2 text-center text-info">الوظيفة</th>
                            <th scope="col" class="float-right col-md-2 text-center text-info">العمليات</th>
                        </tr>

                        </thead>

                        <tbody>
                        <?php foreach($officials as $row) { ?>

                            <tr>
                                <th scope="row" class="float-right col-md-3 text-center"><?= $row['file_number'] ?></th>
                                <td class="float-right col-md-3 text-right"><?= $row['name'] ?></td>
                                <td class="float-right col-md-2 text-center"><?= $row['phone'] ?></td>
                                <td class="float-right col-md-2 text-center"><?= $row['job_name'] ?></td>
                                <td class="float-right col-md-2 text-center"><a href="/admin/officials/<?=$row['employee_id']?>/display" class="text-success"><i class="fas fa-eye icon-size"></i></a> | <a href="/admin/officials/<?=$row['employee_id']?>/edit" class="text-warning"><i class="far fa-edit icon-size"></i></a> | <a href="javascript:delete_employee(<?=$row['employee_id']?>, '<?=$row['name']?>')" class="text-danger"><i class="far fa-trash-alt icon-size"></i></a></td>
                            </tr>

                        <?php } ?>

                        <?php foreach($academics as $row) { ?>

                            <tr>
                                <th scope="row" class="float-right col-md-3 text-center"><?= $row['file_number'] ?></th>
                                <td class="float-right col-md-3 text-right"><?= $row['name'] ?></td>
                                <td class="float-right col-md-2 text-center"><?= $row['phone'] ?></td>
                                <td class="float-right col-md-2 text-center"><?= $row['job_name'] ?></td>
                                <td class="float-right col-md-2 text-center"><a href="/admin/academics/<?=$row['employee_id']?>/display" class="text-success"><i class="fas fa-eye icon-size"></i></a> | <a href="/admin/academics/<?=$row['employee_id']?>/edit" class="text-warning"><i class="far fa-edit icon-size"></i></a> | <a href="javascript:delete_employee(<?=$row['employee_id']?>, '<?=$row['name']?>')" class="text-danger"><i class="far fa-trash-alt icon-size"></i></a></td>
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

<script type="text/javascript">

    function delete_employee(id, name){

        if(confirm("هل تريد بالفعل حذف "+ name +".")){

            window.location.href = "/delete-employee/"+id;

        }

    }

</script>


<?php include(ROOT_PATH . "/views/admin/includes/bottom.view.php"); ?>