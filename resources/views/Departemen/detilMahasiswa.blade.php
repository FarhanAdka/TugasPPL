<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $Title }}</title>
    <link rel="shortcut icon" href="/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon"
        href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
        type="image/png">
    <link rel="stylesheet" href="/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="/assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="/assets/compiled/css/table-datatable.css">
</head>

<body>
    <script src="/assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            {{-- <a href="index.html"><img src="/assets/compiled/svg/logo.svg" alt="Logo" srcset=""></a> --}}
                        </div>

                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark"
                                    style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>

                        <div class="sidebar-toggler  x">
                            <a href="pp" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <x-departemen.sidebar />
            </div>





            <div id="main" class='layout-navbar navbar-fixed'>
                <header>
                    <nav class="navbar navbar-expand navbar-light navbar-top">
                        <div class="container-fluid">
                            <a href="#" class="burger-btn d-block">
                                <i class="bi bi-justify fs-3"></i>
                            </a>

                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto mb-lg-0">

                                </ul>
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="user-menu d-flex">
                                            <div class="user-name text-end me-3">
                                                <h6 class="mb-0 text-gray-600">{{ $UserName }}</h6>
                                                <p class="mb-0 text-sm text-gray-600">{{ $Role }}</p>
                                            </div>
                                            <div class="user-img d-flex align-items-center">
                                                <div class="avatar avatar-md">
                                                    <img src="/assets/compiled/jpg/1.jpg">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                        style="min-width: 11rem;">
                                        <li>
                                            <h6 class="dropdown-header">{{ $UserName }}!</h6>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="/user/departemen/ProfilDepartemen"><i
                                                    class="icon-mid bi bi-person me-2"></i> MyProfile</a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="/user/departemen/Settings"><i
                                                    class="icon-mid bi bi-gear me-2"></i> Settings</a>
                                        </li>

                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="/logout"><i
                                                    class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </header>



                <div id="main-content">
                    <div class="page-heading">
                        <div class="page-title">
                            <div class="row">
                                <div class="p-2 col-12 p-2 col-md-6 order-md-1 order-last">
                                    <h3>{{ $Role }}</h3>
                                    <p class="text-subtitle text-muted">Navbar will appear on the top of the page.</p>
                                </div>
                                <div class="p-2 col-12 p-2 col-md-6 order-md-2 order-first">
                                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a
                                                    href="/user/departemen">{{ $Role }}</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">
                                                {{ $Title }}</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="main-content">
                    <section class="section">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="p-2 col-md-3">
                                            <p class="text-small mb-2"><b>NIM</b></p>
                                            <p>{{ $user->username }}</p>
                                        </div>
                                        <div class="p-2 col-md-3">
                                            <p class="text-small mb-2"> <b>Nama</b></p>
                                            <p>{{ $user->name }}</p>
                                        </div>
                                        <div class="p-2 col-md-3">
                                            <p class="text-small mb-2"><b>Dosen Wali</b></p>
                                            <p>{{ $nama_doswal }}</p>
                                        </div>
                                        <div class="p-2 col-md-3">
                                            <p class="text-small mb-2"> <b>Angkatan</b></p>
                                            <p>{{ $mahasiswa->angkatan }}</p>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h3>Semester</h3>
                                    </div>
                                    <div class="row text-center">
                                        @for ($i = 0; $i < 14; $i++)
                                            <div class="p-2 col-md-2">
                                                @if ($i < 14)

                                                    @php
                                                        if ($i+1 == $smt_skripsi) {
                                                            $color = 'btn-success';
                                                        } else {
                                                            $color = 'btn-primary';
                                                        }
                                                        if($i+1 == $smt_pkl){
                                                            $color = 'btn-secondary';
                                                        }
                                                        if(isset($smt[$i])){
                                                            $disabled = '';
                                                        } else {
                                                            $disabled = 'disabled';
                                                        }
                                                        
                                                    @endphp
                                                    <button class="btn {{$color}}"
                                                        data-bs-target="#semester{{ $i + 1 }}"
                                                        data-bs-toggle="modal" {{$disabled}}>Semester
                                                        {{ $i + 1 }}</button>

                                                    <div class="modal fade" id="semester{{ $i + 1}}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Semester
                                                                        {{ $i + 1 }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <ul class="nav nav-tabs"
                                                                        id="myTab-{{ $i + 1 }}"
                                                                        role="tablist">
                                                                        <li class="nav-item" role="presentation">
                                                                            <button class="nav-link active"
                                                                                id="IRS-tab" data-bs-toggle="tab"
                                                                                data-bs-target="#IRS{{ $i + 1 }}"
                                                                                type="button" role="tab"
                                                                                aria-controls="IRS"
                                                                                aria-selected="true">IRS</button>
                                                                        </li>
                                                                        <li class="nav-item" role="presentation">
                                                                            <button class="nav-link" id="KHS-tab"
                                                                                data-bs-toggle="tab"
                                                                                data-bs-target="#KHS{{ $i + 1 }}"
                                                                                type="button" role="tab"
                                                                                aria-controls="profile"
                                                                                aria-selected="false">KHS</button>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="tab-content" id="myTabContent">
                                                                        <div class="tab-pane fade show active"
                                                                            id="IRS{{ $i + 1 }}"
                                                                            role="tabpanel"
                                                                            aria-labelledby="IRS-tab-{{ $i + 1 }}">
                                                                            <div class="p-1 col-md-4">
                                                                                SKS Diambil: {{ isset($irs[$i]) ? $irs[$i]->jumlah_sks : 0 }}
                                                                            </div>
                                                                            <div class="p-1 col-md-4">
                                                                                <a href="">Lihat IRS</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tab-pane fade"
                                                                            id="KHS{{ $i + 1 }}"
                                                                            role="tabpanel"
                                                                            aria-labelledby="KHS-tab-{{ $i + 1 }}">
                                                                            <div class="p-1 col-md-4">
                                                                                IP Semester: {{ isset($khs[$i]) ? $khs[$i]->ip : 0 }}
                                                                            </div>
                                                                            <div class="p-1 col-md-4">
                                                                                SKS Semester: {{ isset($khs[$i]) ? $khs[$i]->jumlah_sks : 0 }}
                                                                            </div>
                                                                            <div class="p-1 col-md-4">
                                                                                IP Kumulatif: {{ isset($khs[$i]) ? $khs[$i]->ipk : 0 }}
                                                                            </div>
                                                                            <div class="p-1 col-md-4">
                                                                                SKS Kumulatif: {{ isset($khs[$i]) ? $khs[$i]->sks_kumulatif : 0 }}
                                                                            </div>
                                                                            <div class="p-1 col-md-4">
                                                                                <a href="">Lihat KHS</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endfor
                                    </div>

                                </div>
                            </div>

                    </section>

                </div>
            </div>



            <script src="/assets/static/js/components/dark.js"></script>
            <script src="/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
            <script src="/assets/compiled/js/app.js"></script>


            <!-- Need: Apexcharts -->
            <script src="/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
            <script src="/assets/static/js/pages/simple-datatables.js"></script>

</body>

</html>
