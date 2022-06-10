<aside>
    <div id="sidebar" class="col-sm-3 active">

        <li class="home"><a href="/normal-employee" class="text">الصفحة الرئسية&nbsp;&nbsp;<i class="fas fa-home"></i></a></li>

        <li class="hover-blue"><a href="/login-information/<?=$_SESSION['user_id']?>" class="text">بيانات تسجيل الدخول&nbsp;&nbsp;<i class="fas fa-table"></i></a></li>

        <li class="parent"><a id="leaves" href="#" class="text"><i class="fas fa-angle-down my-angle non-displayed my-down3"></i><i class="fas fa-angle-left my-angle my-left3"></i>الإجازات&nbsp;&nbsp;<i class="fas fa-suitcase"></i></a></li>
        <div id="leaves-menu" class="menu">

            <li class="child"><a href="/employee/<?=$_SESSION['user_emp_id']?>/leaves" class="text">معلومات الإجازات / تقديم طلب&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>
            <li class="child"><a href="/employee/leaves/archives" class="text"> إرشيف الطلبات&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>

        </div>

        <li class="logout"><a href="/logout" class="text">تسجيل الخروج&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i></a></li>

    </div>
</aside>