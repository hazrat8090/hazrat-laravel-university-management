<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no')}}">
    <title>SULTAN</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('backend/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('backend/backend/images/favicon.ico')}}" />

    <!-- CSS DATATABLES YAJRA CONTENTS LINKS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/4.0.1/css/fixedHeader.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <!-- CSS DATATABLES YAJRA CONTENTS LINKS -->



</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('backend/images/logo.svg')}}" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('backend/images/logo-mini.svg')}}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav navbar-nav-right">


                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="{{ asset('backend/images/faces/user.jpg') }}" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-cached me-2 text-success"></i> Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout me-2 text-primary"></i> Signout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                            <i class="mdi mdi-bell-outline"></i>
                            <span class="count-symbol bg-danger"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <h6 class="p-3 mb-0">Notifications</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="mdi mdi-calendar"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                                    <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="mdi mdi-settings"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                                    <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="mdi mdi-link-variant"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                                    <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <h6 class="p-3 mb-0 text-center">See all notifications</h6>
                        </div>
                    </li>
                    <li class="nav-item nav-logout d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-power"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-settings d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-format-line-spacing"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="{{asset('backend/images/faces/user.jpg')}}" alt="profile">
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2"> {{ Auth::user()->name }} </span>
                                <span class="text-secondary text-small"> Full-Stack Developer </span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard')}}">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>



                    @role('super-admin')
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#universityDropdown" aria-expanded="false" aria-controls="universityDropdown" id="universityDropdownToggle">
                            <span class="menu-title">University</span>
                            <i class="mdi mdi-chevron-down menu-arrow"></i>
                        </a>
                        <div class="collapse" id="universityDropdown">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('showUniversity')}}">All universities</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="">Add university</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    @endrole



                    @role('super-admin')
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#facultyDropdown" aria-expanded="false" aria-controls="facultyDropdown" id="facultyDropdownToggle">
                            <span class="menu-title">Faculty</span>
                            <i class="mdi mdi-chevron-down menu-arrow"></i>
                        </a>
                        <div class="collapse" id="facultyDropdown">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('allFaculties')}}">All Faculties</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="">Add Faculty</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    @endrole


                    @role('super-admin')
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#departmentDropdown" aria-expanded="false" aria-controls="departmentDropdown" id="departmentDropdownToggle">
                            <span class="menu-title">Department</span>
                            <i class="mdi mdi-chevron-down menu-arrow"></i>
                        </a>
                        <div class="collapse" id="departmentDropdown">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('allDepartments')}}">All Departments</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">Add Department</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endrole

                    @role('super-admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('viewDepartment')}}
                        " data-toggle="collapse" aria-expanded="false">
                            <span class="menu-title">View Department</span>
                            <i class="mdi mdi-chevron-down menu-arrow"></i>
                        </a>
                    </li>
                    @endrole

                    @role('super-admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('users.index')}}" data-toggle="collapse" aria-expanded="false">
                            <span class="menu-title">View Users</span>
                            <i class="mdi mdi-chevron-down menu-arrow"></i>
                        </a>
                    </li>
                    @endrole

                    @role('super-admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('permissions.index')}}" data-toggle="collapse" aria-expanded="false">
                            <span class="menu-title">View Permissions</span>
                            <i class="mdi mdi-chevron-down menu-arrow"></i>
                        </a>
                    </li>
                    @endrole

                    @role('super-admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('roles.index')}}" data-toggle="collapse" aria-expanded="false">
                            <span class="menu-title">View Roles</span>
                            <i class="mdi mdi-chevron-down menu-arrow"></i>
                        </a>
                    </li>
                    @endrole

                    @role('herat-university-officer|super-admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Huniversity') }}" data-toggle="collapse" aria-expanded="false">
                            <span class="menu-title">Herat University</span>
                            <i class="mdi mdi-chevron-down menu-arrow"></i>
                        </a>
                    </li>
                    @endrole

                    @role('kabul-university-officer|super-admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Kuniversity') }}" data-toggle="collapse" aria-expanded="false">
                            <span class="menu-title">Kabul University</span>
                            <i class="mdi mdi-chevron-down menu-arrow"></i>
                        </a>
                    </li>
                    @endrole

                    @role('mazar-university-officer|super-admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Muniversity') }}" data-toggle="collapse" aria-expanded="false">
                            <span class="menu-title">Mazar University</span>
                            <i class="mdi mdi-chevron-down menu-arrow"></i>
                        </a>
                    </li>
                    @endrole



                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                            <span class="menu-title">sample page</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-medical-bag menu-icon"></i>
                        </a>
                        <div class="collapse" id="general-pages">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </nav>





            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('navandsidebar')
                </div>
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between">
                        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright 2024 created by Ghulam Hazrat SULTANI</span>
                        <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Admin <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank"> template</a> from Hazrat SULTANI</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('backend/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('backend/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery.cookie.js')}}" type="text/javascript')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('backend/js/off-canvas.js')}}"></script>
    <script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('backend/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('backend/js/dashboard.js')}}"></script>
    <script src="{{asset('backend/js/todolist.js')}}"></script>
    <!-- End custom js for this page -->

    <!-- yajra datatables links   -->
    <script src="https://cdn.datatables.net/fixedheader/4.0.1/js/fixedHeader.dataTables.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/4.0.1/js/dataTables.fixedHeader.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <!-- yajra datatables links -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var universityDropdownToggle = document.getElementById('universityDropdownToggle');
            var universityDropdown = document.getElementById('universityDropdown');

            universityDropdownToggle.addEventListener('click', function() {
                if (universityDropdown.classList.contains('show')) {
                    universityDropdown.classList.remove('show');
                } else {
                    universityDropdown.classList.add('show');
                }
            });
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var facultyDropdownToggle = document.getElementById('facultyDropdownToggle');
            var facultyDropdown = document.getElementById('facultyDropdown');

            facultyDropdownToggle.addEventListener('click', function() {
                if (facultyDropdown.classList.contains('show')) {
                    facultyDropdown.classList.remove('show');
                } else {
                    facultyDropdown.classList.add('show');
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var facultyDropdownToggle = document.getElementById('departmentDropdownToggle');
            var facultyDropdown = document.getElementById('departmentDropdown');

            facultyDropdownToggle.addEventListener('click', function() {
                if (facultyDropdown.classList.contains('show')) {
                    facultyDropdown.classList.remove('show');
                } else {
                    facultyDropdown.classList.add('show');
                }
            });
        });
    </script>

    <script>
        new DataTable('#example', {
            initComplete: function() {
                this.api()
                    .columns()
                    .every(function() {
                        let column = this;
                        let title = column.footer().textContent;

                        // Create input element
                        let input = document.createElement('input');
                        input.placeholder = title;
                        column.footer().replaceChildren(input);

                        // Event listener for user input
                        input.addEventListener('keyup', () => {
                            if (column.search() !== this.value) {
                                column.search(input.value).draw();
                            }
                        });
                    });
            },
            fixedHeader: {
                footer: true
            }
        });
    </script>
</body>

</html>