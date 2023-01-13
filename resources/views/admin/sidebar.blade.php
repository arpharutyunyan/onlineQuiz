{{--<div class="widget">--}}
    {{--<div class="row flex-nowrap">--}}
        {{--<div class="col-auto px-0">--}}
            {{--<div id="sidebar" class="collapse collapse-horizontal show border-end">--}}
                {{--<div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start min-vh-100" style="width: 160px">--}}
                    {{--<a href="/admin/teacher" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="bi bi-bootstrap"></i> <span>Teachers</span> </a>--}}
                    {{--<a href="/admin/student" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="bi bi-film"></i> <span>Students</span></a>--}}
                    {{--<a href="/admin/subject" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="bi bi-heart"></i> <span>Subjects</span></a>--}}
                    {{--<a href="/admin/question" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="bi bi-bricks"></i> <span>Questions</span></a>--}}
                    {{--<a href="/admin/answer" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="bi bi-clock"></i> <span>Answers</span></a>--}}
                    {{--<a href="#" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="bi bi-archive"></i> <span>Item</span></a>--}}
                    {{--<a href="#" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="bi bi-gear"></i> <span>Item</span></a>--}}
                    {{--<a href="#" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="bi bi-calendar"></i> <span>Item</span></a>--}}
                    {{--<a href="#" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="bi bi-envelope"></i> <span>Item</span></a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<main class="col ps-md-2 pt-2">--}}
            {{--<a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class="border rounded-3 p-1 text-decoration-none"><i class="bi bi-list bi-lg py-2 p-1"></i> Menu</a>--}}

            {{--<div class="row">--}}
                {{--@yield('content')--}}
            {{--</div>--}}
        {{--</main>--}}
    {{--</div>--}}
{{--</div>--}}


<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark ">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

        <span class="fs-5 d-none d-sm-inline">Menu</span>

        <br>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">

            <li>
                <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href={{route('admin.subject')}} class="nav-link px-0 text-white"> <span class="d-none d-sm-inline">Subject</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="collapse show nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href={{route('teacher.index')}} class="nav-link px-0 text-white"> <span class="d-none d-sm-inline">Teacher</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="collapse show nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href={{route('student.index')}} class="nav-link px-0 text-white"> <span class="d-none d-sm-inline">Student</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="collapse show nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href={{route('question.index')}} class="nav-link px-0 text-white"> <span class="d-none d-sm-inline">Questions</span></a>
                    </li>
                </ul>
            </li>
{{--            <li>--}}
{{--                <ul class="collapse show nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">--}}
{{--                    <li class="w-100">--}}
{{--                        <a href="#" class="nav-link px-0 text-white"> <span class="d-none d-sm-inline">Quizzes</span></a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
            <li>
                <ul class="collapse show nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href={{route('answer.index')}} class="nav-link px-0 text-white"> <span class="d-none d-sm-inline">Answers</span></a>
                    </li>
                </ul>
            </li>

        </ul>

    </div>
</div>