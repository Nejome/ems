<?php include(ROOT_PATH . "/views/departments-managers/includes/top-nav.view.php"); ?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12 col-md-8 m-auto">

                <p class="text-secondary">  <?=$_SESSION['name']?> / <span class="text-info">الحضور والغياب</span>  / <span class="text-primary">إرشيف الحضور والغياب</span></p>

                <div class="card">

                    <div class="card-header">
                        <h3 class="text-center text-primary">إرشيف الحضور والغياب ل <span class="text-success"><?=$emp['name']?></span></h3>
                    </div>

                    <div class="card-body">

                        <table class="table table-striped table-bordered">

                            <thead>
                            <tr>
                                <th scope="col" class="float-right col-md-3 text-center text-info">اليوم</th>
                                <th scope="col" class="float-right col-md-3 text-center text-info">الحالة</th>
                                <th scope="col" class="float-right col-md-3 text-center text-info">زمن الحضور</th>
                                <th scope="col" class="float-right col-md-3 text-center text-info">زمن الانصراف</th>
                            </tr>

                            </thead>

                            <tbody>

                            <?php foreach($atts as $att) {

                                if($att['status'] == 1){
                                    $status = 'حضر';
                                    $class = 'text-success';
                                }else {
                                    $status = 'لم يحضر';
                                    $class = 'red';
                                }

                                if($att['attend_time'] == null){
                                    $attend_time = 'لا يوجد';
                                }else{
                                    $attend_time = $att['attend_time'];
                                }

                                if($att['departure_time'] == null){
                                    $departure_time = 'لا يوجد';
                                }else{
                                    $departure_time = $att['departure_time'];
                                }

                                ?>
                                <tr>
                                    <td class="float-right col-md-3 text-center"><?=$att['day']?></td>
                                    <td class="float-right col-md-3 text-center <?=$class?>"><?=$status?></td>
                                    <td class="float-right col-md-3 text-center"><?=$attend_time?></td>
                                    <td class="float-right col-md-3 text-center"><?=$departure_time?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                    </div>

                    <div class="card-footer">
                        <div class="col-6">
                            <a href="/managers/employees-list" class="btn btn-secondary">رجوع</a>
                        </div>
                    </div>

                </div>
            </div>
        </main>


        <?php include(ROOT_PATH . "/views/departments-managers/includes/sidebar-nav.view.php"); ?>

    </div>

<?php include(ROOT_PATH . "/views/departments-managers/includes/bottom.view.php"); ?>