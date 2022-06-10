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
        <h6>تقرير اداء اكاديمي</h6>
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

                <label class=" col-form-label  col-md-4 text-left">الكلية</label>

            </div>

        </div>

        <?php $sum = $rp['r1'] + $rp['r2'] + $rp['r3'] + $rp['r4'] + $rp['r5'] + $rp['r6'] + $rp['r7'] + $rp['r8'] + $rp['r9'] + $rp['r10']?>

        <div class="row">

            <div class="form-group row col">

                <div class="col-md-8 ml-auto">
                    <label  class=" col-form-label blue  text-left">
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

            <div class="form-group row col">

                <div class="col-md-8 ml-auto">
                    <label class=" col-form-label blue text-left"><?=$sum?>/100</label>
                </div>

                <label class=" col-form-label  col-md-4 text-left">التقيم الكلي</label>

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