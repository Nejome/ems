<aside>
    <div id="sidebar" class="col-sm-3 active">

        <li class="home"><a href="/admin" class="text">الصفحة الرئسية&nbsp;&nbsp;<i class="fas fa-home"></i></a></li>

        <li class="hover-blue"><a href="/login-information/<?=$_SESSION['user_id']?>" class="text">بيانات تسجيل الدخول&nbsp;&nbsp;<i class="fas fa-table"></i></a></li>

        <li class="parent"><a id="users" href="#" class="text"><i class="fas fa-angle-down my-angle non-displayed my-down7"></i><i class="fas fa-angle-left my-angle my-left7"></i> المستخدمين&nbsp;&nbsp;<i class="fas fa-user"></i></a></li>
        <div id="users-menu" class="menu">

            <li class="child"><a href="/admin/users/add" class="text">اضافة مستخدم&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>
            <li class="child"><a href="/admin/users/manage" class="text">إدارة المستخدمين&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>

        </div>

        <li class="parent"><a id="employees" href="#" class="text"><i class="fas fa-angle-down my-angle non-displayed my-down1"></i><i class="fas fa-angle-left my-angle my-left1"></i>الموظفين&nbsp;&nbsp;<i class="fas fa-address-card"></i></a></li>
        <div id="employees-menu" class="menu">

            <li class="child"><a href="/admin/official/add" class="text">اضافة اداري&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>
            <li class="child"><a href="/admin/academic/add" class="text">اضافة اكاديمي&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>
            <li class="child"><a href="/admin/employees/manage" class="text">إدارة الموظفين&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>

        </div>

        <li class="parent"><a id="managements" href="#" class="text"><i class="fas fa-angle-down my-angle non-displayed my-down5"></i><i class="fas fa-angle-left my-angle my-left5"></i> الإداراة&nbsp;&nbsp;<i class="fa fa-folder-open"></i></a></li>
        <div id="managements-menu" class="menu">

            <li class="child"><a href="/admin/managements/add" class="text">اضافة إدارة&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>
            <li class="child"><a href="/admin/managements/manage" class="text">إدارة الإداراة&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>

        </div>

        <li class="parent"><a id="collages" href="#" class="text"><i class="fas fa-angle-down my-angle non-displayed my-down6"></i><i class="fas fa-angle-left my-angle my-left6"></i> الكليات&nbsp;&nbsp;<i class="fa fa-graduation-cap"></i></a></li>
        <div id="collages-menu" class="menu">

            <li class="child"><a href="/admin/collages/add" class="text">اضافة كلية&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>
            <li class="child"><a href="/admin/collages/manage" class="text">إدارة الكليات&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>

        </div>

        <li class="parent"><a id="jobs" href="#" class="text"><i class="fas fa-angle-down my-angle non-displayed my-down2"></i><i class="fas fa-angle-left my-angle my-left2"></i> الوظائف&nbsp;&nbsp;<i class="fas fa-briefcase"></i></a></li>
        <div id="jobs-menu" class="menu">

            <li class="child"><a href="/admin/jobs/add/type" class="text">اضافة وظيفة&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>
            <li class="child"><a href="/admin/jobs/manage" class="text">إدارة الوظائف&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>

        </div>

        <li class="parent"><a id="leaves" href="#" class="text"><i class="fas fa-angle-down my-angle non-displayed my-down3"></i><i class="fas fa-angle-left my-angle my-left3"></i>الإجازات&nbsp;&nbsp;<i class="fas fa-suitcase"></i></a></li>
        <div id="leaves-menu" class="menu">

            <li class="child"><a href="/admin/leaves/requests" class="text">عرض الطلبات الحالية&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>
            <li class="child"><a href="/admin/leaves/archives" class="text">إرشيف الإجازات&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>

        </div>

        <li class="parent"><a id="reports" href="#" class="text"><i class="fas fa-angle-down my-angle non-displayed my-down4"></i><i class="fas fa-angle-left my-angle my-left4"></i>التقارير&nbsp;&nbsp;<i class="far fa-file-alt"></i></a></li>
        <div id="reports-menu" class="menu">

            <li class="child"><a href="/admin/reports/request-report" class="text">طلب تقرير&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>
            <li class="child"><a href="/admin/reports/received-reports" class="text">التقارير الواردة&nbsp;&nbsp;<i class="fas fa-angle-left"></i></a></li>

        </div>

        <li class="logout"><a href="/logout" class="text">تسجيل الخروج&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i></a></li>

    </div>
</aside>