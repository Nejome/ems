<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php"); ?>

<div id="wrapper" class="container-fluid">

    <main>
        <div id="content" class="col-sm-12 col-md-9 m-auto">

            <p class="text-secondary">مدير النظام /  <span class="text-info">الإداراة</span>  / <span class="text-primary">إدارة الإدارة</span></p>

            <hr>

            <div class="card">

                <di class="card-header text-center">

                    <h1 class="text-primary">إدارة الإدارة</h1>

                </di>

                <div class="card-body">

                    <table class="table table-striped table-bordered">

                        <thead>
                        <tr>
                            <th scope="col" class="float-right text-center col-md-1 text-info">الرقم</th>
                            <th scope="col" class="float-right col-md-3 text-center text-info">الإسم</th>
                            <th scope="col" class="float-right col-md-2 text-center text-info">الرمز</th>
                            <th scope="col" class="float-right col-md-3 text-center text-info">المدير</th>
                            <th scope="col" class="float-right col-md-3 text-center text-info">العمليات</th>
                        </tr>

                        </thead>

                        <tbody>

                        <?php foreach($mgs as $mg) { ?>

                            <tr>
                                <th scope="row" class="float-right col-md-1 text-center"><?=$mg['management_id']?></th>
                                <td class="float-right col-md-3 text-right"><?=$mg['management_name']?></td>
                                <td class="float-right col-md-2 text-right"><?=$mg['management_symbol']?></td>
                                <td class="float-right col-md-3 text-center"><?=$mg['manager_name']?></td>
                                <td class="float-right col-md-3 text-center"><a href="/admin/managements/<?=$mg['management_id']?>/edit" class="text-warning"><i class="far fa-edit icon-size"></i></a> | <a href="javascript:delete_job(<?=$mg['management_id']?>, '<?=$mg['management_name']?>')" class="text-danger"><i class="far fa-trash-alt icon-size"></i></a></td>
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

        if(confirm("هل تريد بالفعل حذف " + name + ".")){

            window.location.href = "/delete-management/"+id;

        }

    }

</script>