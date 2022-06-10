<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title></title>

    <link href="/views/css/main.css" rel="stylesheet">
    <link href="/views/css/bootstrap.css" rel="stylesheet">

</head>
<body>

<div id="report-content" class="container-fluid mt-4">

    <div class="text-center">
        <h6>بسم الله الرحمن الرحيم</h6>
        <h2>جامعة قاردن سيتي</h2>
        <h4>ادارة شؤون الموظفين</h4>
        <h6>تقرير اداء اداري</h6>
    </div>

    <hr>


    <div class="text-center mt-5">

        <div class="row">

            <div class="form-group row col">

                <div class="col-md-8 ml-auto">
                    <label class=" col-form-label blue text-left"><?=$row['qualification']?></label>
                </div>

                <label class=" col-form-label col-md-4 text-left">المؤهل العلمي</label>

            </div>

            <div class="form-group row col">

                <div class="col-md-8 ml-auto">
                    <label for="name" class=" col-form-label blue text-left"><?=$row['name']?></label>
                </div>

                <label for="name" class=" col-form-label col-md-4 text-left">الأسم</label>

            </div>

        </div>

        <div class="row">

            <div class="form-group row col">

                <div class="col-md-8 ml-auto">
                    <label  class=" col-form-label blue  text-left"><?=$row['hiring_date']?></label>
                </div>

                <label class=" col-form-label  col-md-4 text-left">تاريخ التعيين</label>

            </div>

            <div class="form-group row col">

                <div class="col-md-8 ml-auto">
                    <label class=" col-form-label blue text-left"><?=$row['branch']?></label>
                </div>

                <label class=" col-form-label  col-md-4 text-left">الادارة</label>

            </div>

        </div>

        <div class="row">

            <?php

            if($rp['r1'] == 1){
                $look = 'ممتاز';
            }else if($rp['r1'] == 2){
                $look = 'جيد جدا';
            }else if($rp['r1'] == 3){
                $look = 'جيد';
            }

            ?>

            <div class="form-group row col">

                <div class="col-md-8 ml-auto">
                    <label class=" col-form-label blue text-left"><?=$look?></label>
                </div>

                <label class=" col-form-label  col-md-4 text-left">المظهر العام</label>

            </div>

            <div class="form-group row col">

                <div class="col-md-8 ml-auto">
                    <label class=" col-form-label blue text-left"><?=$rp['r2']?>/10</label>
                </div>

                <label class=" col-form-label  col-md-4 text-left">المواظبة</label>

            </div>

        </div>

        <div class="row">
            <div class="form-group row col-6 m-auto">

                <div class="col-md-8 ml-auto">
                    <label  class="col-form-label blue  text-left">
                        <?php
                        if($rqs == []){
                            echo 'لا توجد اجازات';
                        }else {
                            foreach($rqs as $rq){
                                echo "<li>".$rq['to_date']."</li>";
                            }
                        }
                        ?>
                    </label>
                </div>

                <label class=" col-form-label  col-md-4 text-left">الاجازات</label>

            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col">

                <a href="#" class="btn btn-success float-right">طباعة</a>

            </div>

            <div class="col">

                <a href="/admin/reports/received-reports" class="btn btn-secondary float-left">رجوع</a>

            </div>
        </div>

    </div>

</div>

</body>
</html>