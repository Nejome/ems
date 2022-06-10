<?php include(ROOT_PATH . "/views/admin/includes/top-nav.view.php"); ?>

    <div id="wrapper" class="container-fluid">

        <main>
            <div id="content" class="col-sm-12 col-md-10 m-auto">

                <p class="text-secondary">مدير النظام /  <span class="text-info">الوظائف</span>  / <span class="green">إضافة وظيفة</span></p>

                <hr>

                <div class="card">

                    <di class="card-header text-center">

                        <h1 class="green">نوع الوظيفة</h1>

                    </di>

                    <div class="card-body">
                        <form method="POST" action="/admin/jobs/add" class="col">

                            <div class="form-group row">

                                <div class="col-md-4 ml-auto">
                                    <select name="type" class="form-control" dir="rtl">
                                        <option value="1">وظيفة إدارية</option>
                                        <option value="2">وظيفة اكاديمية</option>
                                    </select>
                                </div>

                                <label for="sal" class=" col-form-label blue col-md-3 text-left">نوع الوظيفة</label>

                            </div>

                    </div>

                    <div class="card-footer">
                        <div class="form-group row">

                            <div class="col-md-6">

                            </div>

                            <div class="col-md-6">
                                <input type="submit" class="btn btn-primary float-left ml-5" value="إاختيار">
                            </div>

                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </main>

        <?php include(ROOT_PATH . "/views/admin/includes/side-bar.view.php"); ?>

    </div>


<?php include(ROOT_PATH . "/views/admin/includes/bottom.view.php"); ?>