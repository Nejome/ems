<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php");
use Carbon\Carbon;
?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12 col-md-12 m-auto">

                <p class="text-secondary">مدير النظام /  <span class="text-info">المستخدمين</span>  / <span class="text-primary">إدارة المستخدمين</span></p>

                <hr>

                <div class="card">

                    <di class="card-header text-center">

                        <h1 class="text-primary">إدارة المستخدمين</h1>

                    </di>

                    <div class="card-body">

                        <table class="table table-striped table-bordered">

                            <thead>
                            <tr>
                                <th scope="col" class="float-right col-md-2 text-center text-info">الإسم</th>
                                <th scope="col" class="float-right col-md-2 text-center text-info">النوع</th>
                                <th scope="col" class="float-right col-md-2 text-center text-info">رقم الهاتف</th>
                                <th scope="col" class="float-right col-md-3 text-center text-info">البريد الألكتروني</th>
                                <th scope="col" class="float-right col-md-2 text-center text-info">الحالة</th>
                                <th scope="col" class="float-right col-md-1 text-center text-info">العمليات</th>
                            </tr>

                            </thead>

                            <tbody>
                            <?php foreach($rows as $row) {

                                if($row['user_type'] == 1){
                                    $type = 'شؤون الموظفين';
                                }else if($row['user_type'] == 2){
                                    $type = 'رئيس قسم';
                                }else if($row['user_type'] == 3){
                                    $type = 'المالية';
                                }else if($row['user_type'] == 4){
                                    $type = 'موظف عادي';
                                }

                                if($row['status'] == 1){
                                    $status = 'متصل الان';
                                }else {
                                   if($row['last_seen'] == NULL){
                                       $status = 'لم يتم التعين';
                                   }else {
                                       $status = Carbon::parse($row['last_seen'])->diffForHumans();
                                   }
                                }

                                ?>
                                <tr>
                                    <td class="float-right col-md-2 text-center text-info"><?=$row['name']?></td>
                                    <td class="float-right col-md-2 text-center text-info"><?=$type?></td>
                                    <td class="float-right col-md-2 text-center text-info"><?=$row['phone']?></td>
                                    <td class="float-right col-md-3 text-center text-info"><?=$row['email']?></td>
                                    <td class="float-right col-md-2 text-center text-info"><span class="<?php if($row['status'] == 1){echo 'green';} ?>"><?=$status?></span></td>
                                    <td scope="col" class="float-right col-md-1 text-center text-info"><a href="/admin/users/<?=$row['user_id']?>/edit" class="text-warning"><i class="far fa-edit icon-size"></i></a> | <a href="javascript:delete_user(<?=$row['user_id']?>, '<?=$row['name']?>')" class="text-danger"><i class="far fa-trash-alt icon-size"></i></a></td>
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

        function delete_user(id, name){

            if(confirm("هل تريد بالفعل حذف "+ name +".")){

                window.location.href = "/delete-user/"+id;

            }

        }

    </script>


<?php include(ROOT_PATH . "/views/admin/includes/bottom.view.php"); ?>