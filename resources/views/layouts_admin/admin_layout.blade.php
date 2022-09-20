<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>titipsini.com | Admin </title>
    <link href="{{ url('assets/img/ic2.png') }}" rel="icon">
    <link href="{{ url('assets/css/admin.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/modal.css') }}" rel="stylesheet">
    <link href="{{ url('style/loginview2.css') }}" rel="stylesheet">
    <!-- Boxiocns CDN Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ url('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <div class="profile-content">
                <img class="p-1 mt-1 ms-3" style="width: 45px; height: 45px;" src="{{ url('Frame 172.png') }}"
                alt="Profile">
            </div>

            <a href="/" style="text-decoration: none;">
                <span class="logo_name">Titipsini.com</span>
            </a>
        </div>
        <ul class="nav-links">
            <li class="list {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                <a href="/admin/dashboard">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/admin/dashboard">Dasboard</a></li>
                </ul>
            </li>
            <li class="list {{ Request::segment(2) == 'profile' ? 'active' : '' }}">
                <a href="/admin/profile">
                    <i class='bx bx-key'></i>
                    <span class="link_name">Ubah Password</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/admin/profile">Ubah Password</a></li>
                </ul>
            </li>
            <li class="list {{ Request::segment(2) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/admin/home') }}">
                    <i class='bx bx-home'></i>
                    <span class="link_name">Home</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/admin/home/home">Home</a></li>
                </ul>
            </li>
            <li class="list {{ Request::segment(2) == 'layanan ' ? 'active' : '' }}">
                <div class="iocn-link">
                    <a>
                        <i class="bi bi-columns-gap"></i>
                        <span class="link_name dropBtn">Layanan</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <div class="sub-menu">
                    <div class="drop-box">
                        <a href="{{ url('/admin/layanan')}}">Layanan</a>
                    </div>
                    <div class="drop-box">
                        <a href="{{ url('/sublayanan') }}">Sub Layanan</a>
                    </div>
                    <div class="drop-box">
                        <a href="{{ url('/subdetail')}}">Details Sub Layanan</a>
                    </div>
                    <div class="drop-box">
                        <a href="{{ url('/subslider') }}">Sub Slider</a>
                    </div>
                </div>
            </li>
            <li class="list {{ Request::segment(2) == 'data' ? 'active' : '' }}">
                <div class="iocn-link">
                    <a>
                        <i class='bx bx-data'></i>
                        <span class="link_name dropBtn">Data</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <div class="sub-menu">
                    <div class="drop-box">
                        <a href="/admin/data/order">Order</a>
                        <a href="/admin/data/payment">Payment</a>
                        <a href="/admin/data/pengaturan-user">Pengaturan User</a>
                    </div>
                </div>
            </li>
            <li class="list {{ Request::segment(2) == 'vendor' ? 'active' : '' }}">
                <div class="iocn-link">
                    <a>
                        <i class='bx bxs-shopping-bags'></i>
                        <span class="link_name dropBtn">Vendor</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <div class="sub-menu">
                    <div class="drop-box">
                        <a href="/admin/vendor">Data Vendor</a>
                        <a href="/admin/vendor/trans">Data Transaksi</a>
                        <a href="/admin/vendor/data-pick-up">Data pick up</a>
                    </div>
                </div>
            </li>
            <li class="list {{ Request::segment(2) == 'setting' ? 'active' : '' }}">
                <a href="/admin/setting">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/admin/setting">Setting</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{-- <i class='bx bx-log-out'></i>{{ Auth::user()->name }} --}}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a data-bs-toggle="modal" data-bs-target="#ModalLogout" href=""
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</div>
<!-- Modal Logout -->
<div class="modal fade" id="ModalLogout" tabindex="-1" aria-labelledby="ModalLogoutLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalLogoutLabel">Log Out <i class="bx bxs-lock-alt"></i></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to log-off?
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-danger"> Logout</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@yield('content')

<script src="{{ url('assets/js/my_chart.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>

    <script>
        // Script for sidenav dropdown
        let arrow = document.querySelectorAll(".arrow");
        let dropdownBtn = document.querySelectorAll(".dropBtn");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement;
                arrowParent.classList.toggle("showMenu");
            })
            dropdownBtn[i].addEventListener("click", (e) => {
                let dropdownParent = e.target.parentElement.parentElement.parentElement;
                dropdownParent.classList.toggle("showMenu");
            });
        }
        // script for sidenav toggle
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="{{ url('assets/vendor/aos/aos.js') }}"></script>
    <script>
        AOS.init();
    </script>

    @yield("js")

</body>

</html>
