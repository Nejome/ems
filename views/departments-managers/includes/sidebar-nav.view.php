<aside>
    <div id="sidebar" class="col-sm-3 active">

        <li class="home"><a href="/managers" class="text">الصفحة الرئسية&nbsp;&nbsp;<i class="fas fa-home"></i></a></li>

        <li class="hover-blue"><a href="/login-information/<?=$_SESSION['user_id']?>" class="text">بيانات تسجيل الدخول&nbsp;&nbsp;<i class="fas fa-table"></i></a></li>

        <li class="parent"><a id="attendance" href="#" class="text"><i class="fas fa-angle-down my-angle non-displayed my-down1"></i><i class="fas fa-angle-left my-angle my-left1"></i>الحضور والغياب&nbsp;&nbsp;<i class="fas fa-address-card"></i></a></li>
        <div id="attendance-menu" class="menu">

            <li class="child"><a href="/managers/take-attendance" class="text">تسجيل الحضور&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>
            <li class="child"><a href="/managers/take-departure" class="text">تسجيل الإنصراف&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>
            <li class="child"><a href="/managers/employees-list" class="text">قائمة الحضور والغياب&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>

        </div>

        <li class="parent"><a id="leaves" href="#" class="text"><i class="fas fa-angle-down my-angle non-displayed my-down3"></i><i class="fas fa-angle-left my-angle my-left3"></i>الإجازات&nbsp;&nbsp;<i class="fas fa-suitcase"></i></a></li>
        <div id="leaves-menu" class="menu">

            <li class="child"><a href="/managers/leaves/new-requests" class="text">عرض الطلبات الجديدة&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>
            <li class="child"><a href="/mangers/<?=$_SESSION['user_emp_id']?>/leaves" class="text">معلومات الإجازات / تقديم طلب&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>
            <li class="child"><a href="/managers/leaves/my-archives" class="text"> إرشيف اجازاتي &nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>
            <li class="child"><a href="/managers/leaves/department-archives" class="text"> إرشيف الإجازات للقسم&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>

        </div>

        <li class="parent"><a id="reports" href="#" class="text"><i class="fas fa-angle-down my-angle non-displayed my-down4"></i><i class="fas fa-angle-left my-angle my-left4"></i>التقارير&nbsp;&nbsp;<i class="far fa-file-alt"></i></a></li>
        <div id="reports-menu" class="menu">

            <li class="child"><a href="/managers/reports/new-requests" class="text">طلبات التقارير الواردة&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>

        </div>

        <li class="logout"><a href="/logout" class="text">تسجيل الخروج&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i></a></li>

    </div>
</aside>