<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <link rel="shortcut icon" href="/assets/compiled/svg/favicon.svg" type="image/x-icon">

    <link rel="stylesheet" href="/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/assets/compiled/css/app-dark.css">
</head>

<body>

    <script src="/assets/static/js/initTheme.js"></script>

    <div id="app">

        <x-mahasiswa.sidebar />

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
                                            <p class="mb-0 text-sm text-gray-600">Mahsiswa</p>
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
                                        <h6 class="dropdown-header">Hello, {{ $UserName }}!</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="/user/mahasiswa/profile"><i
                                                class="icon-mid bi bi-person me-2"></i> MyProfile</a></li>

                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>

                                    <li><a class="dropdown-item" href="/logout"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
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
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>{{ $title }}</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data IRS</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data IRS</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Semester</th>
                                            <th>Jumlah SKS</th>
                                            <th>Scan IRS</th>
                                            <th>Status</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($irs as $ir)
                                            <tr>
                                                <td>{{ $ir->semester_aktif }}</td>
                                                <td>{{ $ir->jumlah_sks }}</td>
                                                <td><a href="{{ route('irs.download', ['id' => $ir->id]) }}">Lihat</a>
                                                </td>
                                                <td>{{ $ir->status ? 'Sudah disetujui' : 'Belum disetujui' }}</td>
                                                <td>
                                                    @if (!$ir->status)
                                                        <!-- Check if status is not true -->
                                                        <form action="{{ route('KHS.destroy', $ir->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-primary"
                                                                href="{{ route('KHS.edit', $ir->id) }}">Edit</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger">Delete</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>

                </div>

            </div>

        </div>

        <script src="/assets/static/js/components/dark.js"></script>
        <script src="/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="/assets/compiled/js/app.js"></script>

</body>

</html>
