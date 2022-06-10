<?php
if(!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] == false){
    header('location: /');
}
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>نظام شؤون الأفراد</title>

    <link href="/views/css/main.css" rel="stylesheet">
    <link href="/views/css/bootstrap.css" rel="stylesheet">


</head>
<body>

<nav>
    <div id="top-nav">

        <div id="top-right">

            <span class="top-text">جامعة <span class="red">قاردن</span> سيتي | نظام شؤون الأفراد  </span>&nbsp;
            <a id="control"><i class="fas fa-align-justify top-icons"></i></a>

        </div>

        <div id="top-left">
            <a href="#" class="link">

                <p class="top-text ml-4"> مدير النظام <span class="red"><?=$_SESSION['name']?></span></p>

            </a>
        </div>

    </div>
</nav>